<?php 

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesCommands;
//use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

//añado esto por las dudas, para usar Imput
use Illuminate\Support\Facades\Input;
// Ahora dentro de nuestro proyecto en la carpeta config/app.php añadir
// 'Input' => Illuminate\Support\Facades\Input::class
//una ves hecho eso, hacemos un sudo composer update
/*
use Validator;
use URL;
use Session;
use Redirect;
si queres llamas a estas clases, y les quitas la \invertida que tiene estos ahi en el codigo
*/

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use App\Order;
use App\OrderItem;

class PaypalController extends Controller
{
	private $_api_context;

	public function __construct()
	{
		// configuramos nuestra api_context
		//este toma nuestro archivo paypal.php dentro de config
		$paypal_conf = \Config::get('paypal');
		//y toma nuestro client_id y secret de nuestra app creada antes en paypal
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	//configuramos todo lo que se le va a enviar a paypal
	public function postPayment()
	{
		//este esta relacionado con el cliente que va hacer el pago, q se config. atraves del metodo setPaymentMethod
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		//ceamos un array para los items
		$items = array();
		//iniciamos un subtotal en 0
		$subtotal = 0;
		//traemos todo nuestro carrito
		$cart = \Session::get('cart');
		//y seteamos el tipo de moneda q se va a manejar en el pago
		$currency = 'USD';

		//recorremos todo nuestro carrito
		foreach($cart as $producto){
			//y x cada producto vamos a crear un obejto de la clase Item y vamos a config. atraves de sus metodos
			//los datos de ese producto tal cual nos pide paypal, osea pasamos los campos respectivos de nuestro 
			//carrito a sus respectivos metodos de paypal
			$item = new Item();
			$item->setName($producto->name)
			->setCurrency($currency)
			->setDescription($producto->extract)
			->setQuantity($producto->quantity)
			->setPrice($producto->price);

			//despues lo agregamos al array, creado antes, al final vamos a tener este array lleno de objetos de tipo Item
			//donde cada obejto tiene ya config. los datos que le corresponde
			$items[] = $item;
			//y config el subtotal q es igual a cantidad x el precio de cada item
			$subtotal += $producto->quantity * $producto->price;
		}

		//ahora creamos otro objeto de tipo ItemList, y en ello solo vamos a configurar el array($items)
		//q ya teniamos antes, osea e contenido de nuestro carrito
		$item_list = new ItemList();
		$item_list->setItems($items);

		//creamos otro obejto de tipo Details, este nos sirve para agregar un costo por el envio, si es que queremos
		//que se agrege o sume al precio una cantidad X x el envio,lo hacemos atraves de este obejto
		$details = new Details();
		//al cual se le pasa el subtotal a pagar
		$details->setSubtotal($subtotal)
		//y un costo por el envio
		->setShipping(100);

		//ahora calculamos el totala pagar, que vendria a ser el subtotal más el costo de envio
		$total = $subtotal + 100;

		//creamos unobejto que va a guardar esas cantidades, q lo hace Amount, y config. ahi
		$amount = new Amount();
		//el tipo de moneda
		$amount->setCurrency($currency)
			//el total
			->setTotal($total)
			//el monto a pagar por le costodel envio
			->setDetails($details);

		//creamos un objeto Transaccion
		$transaction = new Transaction();
		//al cual le pasamos el obejto $amout, q tiene el total a pagar, el costo del envio y el tipo de moneda
		$transaction->setAmount($amount)
			//le pasamos tambien el obejto q contiene los items del carrito, como objeot de la clase Itma_list
			->setItemList($item_list)
			//y le ponemos una pequeña descripcion
			->setDescription('Pedido de prueba en mi Laravel App Store');

		//creamos otro objeto de la clase RediectUrls, q va a recibir la ruta si el usuario acepta hacer el pago
		//si se lleva a cabo aser el pago o se cancela
		$redirect_urls = new RedirectUrls();
		//en este caso lo redirigimos al mismo sitio
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));

		//ahora creamos un objeot de tipo payment, atraves del cual se va a realizar el pago
		$payment = new Payment();
		//y config. el tipo de pago ('Sale') => que significa venta directa, hay otros tipos, checar la documentacion
		$payment->setIntent('Sale')
			//le pasamos el obejtode tipo payer
			->setPayer($payer)
			//tambien las url de redireccionamiento al usuario dependiendo si este acepta pagar o no
			->setRedirectUrls($redirect_urls)
			//y por ultimo el objeto transaccion
			->setTransactions(array($transaction));

		//ahora ejecutamos el metodo create del obejto payment, y lo metemos en un try - catch
		//por que aui se hace la conexion hacia la api de paypal para que valide nuestro api_context
		//y ver si todo esta bien configuado y demas
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			//si algo esta mal entra aqui
			//si tenemos habilitado nuestro debug, nos va a mostrar los mensajes de error q sucedan
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				//si no esta habilitado nuestro debug, nos muestra este mensaje
				die('Ups! Algo salió mal');
			}
		}

		//si todo sale bien paypal nos devuelve un enlace para redirigir al usuario y este se loguee en paypal y
		//continue con el proceso
		foreach($payment->getLinks() as $link) {
			//en el enlace q nos devuelve paypal, en su atributo getRel() debe de traer el valor 'approval_url'
			if($link->getRel() == 'approval_url') {
				//tomamos el valor que nos devuelve y lo guardamos en una variable para usarlo mas adelante, para
				//redirigir al usuario al sitio de paypal
 				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		//con la respuesta q nos da paypal, tambien nos llega otro dato que es un 'id', para darle seguimiento ala
		//sesion del usuario, ese id lo guardamos e una variable de sesion, para trabajar en otro metodo
		//presisamente con ese id (usuario)
		\Session::put('paypal_payment_id', $payment->getId());

		//si todo salio bien, vamos a tener disponible esta url => $redirect_url, xq se creo si todo salio bien
		if(isset($redirect_url)) {
			// redirect to paypal
			//y redireccionamos al usuario a esa url,q ue es de paypal
			//el metodo away permite redirigir a otro dominio a nuestros uusarios
			return \Redirect::away($redirect_url);
		}

		//si hubo algun problema, simplemente lo regresamo al carrito
		return \Redirect::route('cart-show')
			//enviandolo un mensaje de que hubo un error
			->with('error', 'Ups! Error desconocido.');

	}//fin de la config. de postPayment


	//este es el metodo por el cual paypal nos da una respuesta
	public function getPaymentStatus()
	{
		//traemos el id de session de 'paypal_payment_id' creado y guardado antes
		$payment_id = \Session::get('paypal_payment_id');

		//eliminamos esa variable de sesion
		\Session::forget('paypal_payment_id');

		//dentro de la respuesta de paypal vienen 2 datos
		$payerId = \Input::get('PayerID');
		$token = \Input::get('token');

		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		//si esos datos viene vacios o hay algun problema, entonces hubo un error cuando el usuario
		//quiso iniciar sesion en payapl y la transaccion no se puede llevar a cabo
		if (empty($payerId) || empty($token)) {
			//entonces lo redirigimos al home
			return \Redirect::route('home')
				//y le mandamos un mensaje, modificar esto, esto deberia ser una variable de sesion
				->with('message', 'Hubo un problema al intentar pagar con Paypal');
		}

		//si lo datos llegan bien, obtenemos de nuestro cotextoel objeto payment
		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		//est payerID es lo q nos devolvio payal, y con esto ya tendriamo la data necesaria conla que se realizaria 
		//la compra
		$execution->setPayerId(\Input::get('PayerID'));
		//eso se realiza al ejecutar elmetodo execute del objeto payment
		//lanzar este metodo es cuando realmente se realiza la transaccion completa
		$result = $payment->execute($execution, $this->_api_context);

		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

		//si este nos devuelve 'approved' que es una propiedad del metodo getState() obetnido al ejecutar ->execute()
		//la respuesta q nos da '$payment->execute()' se guarda en $result
		if ($result->getState() == 'approved') {
			//si todo sale bien aqui deberia guardar esa compra que se hizo
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar
			/*$this->saveOrder(\Session::get('cart'));
			\Session::forget('cart');*/

			return \Redirect::route('home')
				->with('message', 'Compra realizada de forma correcta');
		}

		return \Redirect::route('home')
			->with('message', 'La compra fue cancelada');

	}


	private function saveOrder($cart)
	{
	    $subtotal = 0;
	    foreach($cart as $item){
	        $subtotal += $item->price * $item->quantity;
	    }
	    
	    $order = Order::create([
	        'subtotal' => $subtotal,
	        'shipping' => 100,
	        'user_id' => \Auth::user()->id
	    ]);
	    
	    foreach($cart as $item){
	        $this->saveOrderItem($item, $order->id);
	    }
	}
	
	private function saveOrderItem($item, $order_id)
	{
		OrderItem::create([
			'quantity' => $item->quantity,
			'price' => $item->price,
			'product_id' => $item->id,
			'order_id' => $order_id
		]);
	}
}
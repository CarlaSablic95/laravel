<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class CartController extends Controller
{
    public function __construct(){
        //si no existe la session cart los creamos(y va a ser de tipo array)
    	if (!Session::has('cart')) {
            //este va a contener los productos almacenado en sessiones 'cart'
    		Session::put('cart', array());
    	}
    }

    public function index(){
        //con 'get' traemos todo el array 'cart'
    	$cart['cart'] = Session::get('cart');
        //llamamos al metodo total y lo mandamo a la vista con el total a pagar
    	$cart['total'] = $this->total();
        //lo mandamos a la vista carpeta 'cart' y archivo 'cart'
    	return view('cart.cart', $cart);
    }

    public function total(){
    	$cart = Session::get('cart');
    	$total = 0;
        //si es de tipo array o objeto
    	if (is_array($cart) || is_object($cart)) {
            //nos recorre 'cart' => todo para sumar el precio uno por uno
    		foreach ($cart as $c) {
                //multiplicamos el precio x la cantidad para saver el total a pagar
    			$total += $c->price * $c->quantity;
    		}
    		return $total;
    	}
    }

    public function add(Product $product){
    	$cart = Session::get('cart');
        //agregamos un nuevo campo 'cantidad'
    	$product->quantity = 1;
        // y lo metemos al array segun q id sea
    	$cart[$product->id] = $product;
        //actualizamos el array con un nuevo valor
    	Session::put('cart', $cart);
        //lo mandamos a la ruta 'cart/show'
    	return redirect('cart/show');
    }

    public function edit(Product $product, $quantity){
    	$cart = Session::get('cart');
        //editamos el producto, y lo cambiamos por el que nos mandan
    	$cart[$product->id]->quantity = $quantity;
        //actualizamos el array con un nuevo valor
    	Session::put('cart', $cart);
        //lo mandamos a la ruta 'cart/show'
    	return redirect('cart/show');
    }

    public function remove(Product $product){
        $cart = Session::get('cart');
        //eliminamos una producto
    	unset($cart[$product->id]);
        //actualizamos el array con un nuevo valor
    	Session::put('cart', $cart);
        //lo mandamos a la ruta 'cart/show'
    	return redirect('cart/show');
    }

    public function clean(){
        //esto limpia, vacia, borra la session indicada
    	$cart = Session::forget('cart');
        //actualizamos el array con un nuevo valor
    	Session::put('cart', $cart);
        //lo mandamos a la ruta 'cart/show'
    	return redirect('cart/show');
    }
}

<?php

namespace App\Http\Controllers\Publicar;

use App\Auto;
use App\CarsImagen;
use App\ConfortCars;
use App\ExteriorCars;
use App\SeguridadCars;
use App\SonidoCars;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ConfirmacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->tipo = $request->tipo;
        $user->dni = $request->dni;
        $user->save();

        $id_user = $user->id;
        $car = new Auto();
        $car->titulo = $request->titulo;
        $car->descripcion = $request->descripcion;
        $car->id_provincia = $request->id_provincia;
        $car->id_ciudad = $request->id_ciudad;
        $car->id_barrio = $request->id_barrio;
        $car->telefono = $request->telefono;
        $car->anio = $request->anio;
        $car->puertas = $request->puertas;
        $car->combustible = $request->combustible;
        $car->km = $request->km;
        $car->color = $request->color;
        $car->direccion = $request->direccion;
        $car->transmision = $request->transmision;
        $car->duenio = $request->duenio;
        $car->version = $request->version;
        $car->precio = $request->precio;
        $car->id_marca = $request->id_marca;
        $car->id_modelo = $request->id_modelo;
        $car->id_usuario = $id_user;
        $car->save();

        $id_auto = $car->id;
        $img = new CarsImagen();
        $img->imagen1 = $request->imagen1;
        $img->imagen2 = $request->imagen2;
        $img->imagen3 = $request->imagen3;
        $img->imagen4 = $request->imagen4;
        $img->imagen5 = $request->imagen5;
        $img->imagen6 = $request->imagen6;
        $img->imagen7 = $request->imagen7;
        $img->id_autos = $id_auto;
        $img->save();

        $seguridad = new SeguridadCars();
        $seguridad->airbag_conductor = $request->airbag_conductor;
        $seguridad->airbag_cortina = $request->airbag_cortina;
        $seguridad->airbag_laterales = $request->airbag_laterales;
        $seguridad->alarma = $request->alarma;
        $seguridad->apoya_cabeza = $request->apoya_cabeza;
        $seguridad->blindado = $request->blindado;
        $seguridad->control_estabilidad = $request->control_estabilidad;
        $seguridad->control_traccion = $request->control_traccion;
        $seguridad->doble_traccion = $request->doble_traccion;
        $seguridad->faros_delanteros = $request->faros_delanteros;
        $seguridad->faros_traseros = $request->faros_traseros;
        $seguridad->faros_xenon = $request->faros_xenon;
        $seguridad->frenos_abs = $request->frenos_abs;
        $seguridad->inmobilizador_motor = $request->inmobilizador_motor;
        $seguridad->isofix = $request->isofix;
        $seguridad->repartidor_electronico = $request->repartidor_electronico;
        $seguridad->tercer_stop = $request->tercer_stop;
        $seguridad->id_autos = $id_auto;
        $seguridad->save();

        $confort = new ConfortCars();
        $confort->aire_acondicionado = $request->aire_acondicionado;
        $confort->alarma_luces_encendidas = $request->alarma_luces_encendidas;
        $confort->apertura_remota_baul = $request->apertura_remota_baul;
        $confort->asiento_conductor_regulable_altura = $request->asiento_conductor_regulable_altura;
        $confort->asiento_trasero_rebatible = $request->asiento_trasero_rebatible;
        $confort->asientos_electronicos = $request->asientos_electronicos;
        $confort->cierre_centralizado_puertas = $request->cierre_centralizado_puertas;
        $confort->climatizador_automatico = $request->climatizador_automatico;
        $confort->computadora_abordo = $request->computadora_abordo;
        $confort->control_velocidad_crucero = $request->control_velocidad_crucero;
        $confort->cristales_electricos = $request->cristales_electricos;
        $confort->espejos_electricos = $request->espejos_electricos;
        $confort->faros_regulables_interior = $request->faros_regulables_interior;
        $confort->gps = $request->gps;
        $confort->sensor_estacionamiento = $request->sensor_estacionamiento;
        $confort->sensor_lluvia = $request->sensor_lluvia;
        $confort->sensor_luz = $request->sensor_luz;
        $confort->tapizado_cuero = $request->tapizado_cuero;
        $confort->id_autos = $id_auto;
        $confort->save();

        $sonido = new SonidoCars();
        $sonido->am_fm = $request->am_fm;
        $sonido->bluetooth = $request->bluetooth;
        $sonido->caja_cd = $request->caja_cd;
        $sonido->cargador_cd = $request->cargador_cd;
        $sonido->cd = $request->cd;
        $sonido->comando_satelital_stereo = $request->comando_satelital_stereo;
        $sonido->dvd = $request->dvd;
        $sonido->entrada_auxiliar = $request->entrada_auxiliar;
        $sonido->entrada_usb = $request->entrada_usb;
        $sonido->mp3 = $request->mp3;
        $sonido->pasacasete = $request->pasacasete;
        $sonido->tarjeta_sd = $request->tarjeta_sd;
        $sonido->id_autos = $id_auto;
        $sonido->save();

        $exterior = new ExteriorCars();
        $exterior->limpia_lava_luneta = $request->limpia_lava_luneta;
        $exterior->llantas_aleacion = $request->llantas_aleacion;
        $exterior->paragolpes_pintados = $request->paragolpes_pintados;
        $exterior->vidrios_polarizados = $request->vidrios_polarizados;
        $exterior->id_autos = $id_auto;
        $exterior->save();

        return redirect('publicado');
    }

    public function publicado()
    {
        Session::flush();
        return view('publicar.vehiculo_publicado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

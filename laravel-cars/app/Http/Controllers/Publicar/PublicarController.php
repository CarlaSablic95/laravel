<?php

namespace App\Http\Controllers\Publicar;

use App\Auto;
use App\Imagen;
use App\ImagenAuto;
use App\Marca;
use App\Modelo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PublicarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('publicar.index');

    }

    public function seleccionoVehiculo()
    {
        Session::flush();
        $data['marcas'] = Marca::all();
        return view('publicar.selecionar_marcas_modelos',$data);
    }

    public function listarModelos($id)
    {
        $modelos = Modelo::where('id_marca',$id)->get();
        echo '<option value="">Seleccioná tu modelo</option>';
        foreach ($modelos as $m) {
            echo '<option class="opciones" value="'.$m->id.'">'.strtolower($m->modelo).'</option>';
        }
        sleep(1);
    }

    public function saveMarcaModelo($id_marca, $id_modelo)
    {
        Session::put('id_marca',$id_marca);
        Session::put('id_modelo',$id_modelo);
        $data['provincias'] = DB::table('provincias')
        ->select('id','nombre')
        ->get();
        return view('publicar.descripcion_vehiculo',$data);
    }

    public function imagen1(Request $request)
    {
        if ($request->ajax()){
            $imagen = new Imagen();
            $img = $request->file('imagen1');
            if ($img == ''){
                //$imagen->imagen1 = 'sin-foto.png';
                $imagen->save();
            }
            $imgTMP = time().'_'.$img->getClientOriginalName();
            Storage::disk('imagenes_autos')->put($imgTMP, file_get_contents($img->getRealPath()));
            $imagen->imagen1 = $imgTMP;
            $imagen->save();

            $lastID = $imagen->id;
            $imagen1 = DB::table('img_temporal')
            ->select('id','imagen1')
            ->where('id',$lastID)
            ->get();
            sleep(1);
            Session::put('imagen1',$imgTMP);
            return response()->json($imagen1);
        }
    }

    public function imagen2(Request $request)
    {
        if ($request->ajax()){
            $imagen = new Imagen();
            $img = $request->file('imagen2');
            if ($img == ''){
                //$imagen2->imagen2 = 'sin-foto.png';
                $imagen->save();
            }
            $imgTMP = time().'_'.$img->getClientOriginalName();
            Storage::disk('imagenes_autos')->put($imgTMP, file_get_contents($img->getRealPath()));
            $imagen->imagen2 = $imgTMP;
            $imagen->save();

            $lastID = $imagen->id;
            $imagen = DB::table('img_temporal')
                ->select('id','imagen2')
                ->where('id',$lastID)
                ->get();
            sleep(1);
            Session::put('imagen2',$imgTMP);
            return response()->json($imagen);
        }
    }

    public function imagen3(Request $request)
    {
        if ($request->ajax()){
            $imagen = new Imagen();
            $img = $request->file('imagen3');
            if ($img == ''){
                //$imagen->imagen3 = 'sin-foto.png';
                $imagen->save();
            }
            $imgTMP = time().'_'.$img->getClientOriginalName();
            Storage::disk('imagenes_autos')->put($imgTMP, file_get_contents($img->getRealPath()));
            $imagen->imagen3 = $imgTMP;
            $imagen->save();

            $lastID = $imagen->id;
            $imagen = DB::table('img_temporal')
                ->select('id','imagen3')
                ->where('id',$lastID)
                ->get();
            sleep(1);
            Session::put('imagen3',$imgTMP);
            return response()->json($imagen);
        }
    }

    public function imagen4(Request $request)
    {
        if ($request->ajax()){
            $imagen = new Imagen();
            $img = $request->file('imagen4');
            if ($img == ''){
                //$imagen->imagen3 = 'sin-foto.png';
                $imagen->save();
            }
            $imgTMP = time().'_'.$img->getClientOriginalName();
            Storage::disk('imagenes_autos')->put($imgTMP, file_get_contents($img->getRealPath()));
            $imagen->imagen4 = $imgTMP;
            $imagen->save();

            $lastID = $imagen->id;
            $imagen = DB::table('img_temporal')
                ->select('id','imagen4')
                ->where('id',$lastID)
                ->get();
            sleep(1);
            Session::put('imagen4',$imgTMP);
            return response()->json($imagen);
        }
    }

    public function imagen5(Request $request)
    {
        if ($request->ajax()){
            $imagen = new Imagen();
            $img = $request->file('imagen5');
            if ($img == ''){
                //$imagen->imagen3 = 'sin-foto.png';
                $imagen->save();
            }
            $imgTMP = time().'_'.$img->getClientOriginalName();
            Storage::disk('imagenes_autos')->put($imgTMP, file_get_contents($img->getRealPath()));
            $imagen->imagen5 = $imgTMP;
            $imagen->save();

            $lastID = $imagen->id;
            $imagen = DB::table('img_temporal')
                ->select('id','imagen5')
                ->where('id',$lastID)
                ->get();
            sleep(1);
            Session::put('imagen5',$imgTMP);
            return response()->json($imagen);
        }
    }

    public function imagen6(Request $request)
    {
        if ($request->ajax()){
            $imagen = new Imagen();
            $img = $request->file('imagen6');
            if ($img == ''){
                //$imagen->imagen3 = 'sin-foto.png';
                $imagen->save();
            }
            $imgTMP = time().'_'.$img->getClientOriginalName();
            Storage::disk('imagenes_autos')->put($imgTMP, file_get_contents($img->getRealPath()));
            $imagen->imagen6 = $imgTMP;
            $imagen->save();

            $lastID = $imagen->id;
            $imagen = DB::table('img_temporal')
                ->select('id','imagen6')
                ->where('id',$lastID)
                ->get();
            sleep(1);
            Session::put('imagen6',$imgTMP);
            return response()->json($imagen);
        }
    }

    public function imagen7(Request $request)
    {
        if ($request->ajax()){
            $imagen = new Imagen();
            $img = $request->file('imagen7');
            if ($img == ''){
                //$imagen->imagen3 = 'sin-foto.png';
                $imagen->save();
            }
            $imgTMP = time().'_'.$img->getClientOriginalName();
            Storage::disk('imagenes_autos')->put($imgTMP, file_get_contents($img->getRealPath()));
            $imagen->imagen7 = $imgTMP;
            $imagen->save();

            $lastID = $imagen->id;
            $imagen = DB::table('img_temporal')
                ->select('id','imagen7')
                ->where('id',$lastID)
                ->get();
            sleep(1);
            Session::put('imagen7',$imgTMP);
            return response()->json($imagen);
        }
    }


    public function dropImagen1(Request $request, $id)
    {
        if ($request->ajax()){
           $imagen = Imagen::FindOrFail($id);
           $dropImagen = $request->dropImagenAuto;
           Storage::disk('imagenes_autos')->delete($dropImagen);
           $imagen->delete();
           return response()->json();
        }
    }

    public function dropImagen2(Request $request, $id)
    {
        if ($request->ajax()){
            $imagen = Imagen::FindOrFail($id);
            $dropImagen = $request->dropImagenAuto2;
            Storage::disk('imagenes_autos')->delete($dropImagen);
            $imagen->delete();
            return response()->json();
        }
    }

    public function dropImagen3(Request $request, $id)
    {
        if ($request->ajax()){
            $imagen = Imagen::FindOrFail($id);
            $dropImagen = $request->dropImagenAuto3;
            Storage::disk('imagenes_autos')->delete($dropImagen);
            $imagen->delete();
            return response()->json();
        }
    }

    public function dropImagen4(Request $request, $id)
    {
        if ($request->ajax()){
            $imagen = Imagen::FindOrFail($id);
            $dropImagen = $request->dropImagenAuto4;
            Storage::disk('imagenes_autos')->delete($dropImagen);
            $imagen->delete();
            return response()->json();
        }
    }

    public function dropImagen5(Request $request, $id)
    {
        if ($request->ajax()){
            $imagen = Imagen::FindOrFail($id);
            $dropImagen = $request->dropImagenAuto5;
            Storage::disk('imagenes_autos')->delete($dropImagen);
            $imagen->delete();
            return response()->json();
        }
    }

    public function dropImagen6(Request $request, $id)
    {
        if ($request->ajax()){
            $imagen = Imagen::FindOrFail($id);
            $dropImagen = $request->dropImagenAuto6;
            Storage::disk('imagenes_autos')->delete($dropImagen);
            $imagen->delete();
            return response()->json();
        }
    }

    public function dropImagen7(Request $request, $id)
    {
        if ($request->ajax()){
            $imagen = Imagen::FindOrFail($id);
            $dropImagen = $request->dropImagenAuto7;
            Storage::disk('imagenes_autos')->delete($dropImagen);
            $imagen->delete();
            return response()->json();
        }
    }

    /* departamentos y localidades */
    public function getDepartamentos($id)
    {
        $dep = DB::table('departamentos')
        ->select('id','provincia_id','nombre')
        ->where('provincia_id',$id)
        ->get();

        echo '<option selected value="" class="opcion">Seleccionar</option>';

        foreach ($dep as $d){
            echo '<option value="'.$d->id.'" class="opcion">'.strtolower($d->nombre).'</option>';
        }
        sleep(1);
    }

    public function getLocalidades($id)
    {
        $loc = DB::table('localidades')
            ->select('id','departamento_id','nombre')
            ->where('departamento_id',$id)
            ->get();
        echo '<option selected value="" class="opcion">Seleccionar</option>';

        foreach ($loc as $l){
            echo '<option value="'.$l->id.'" class="opcion">'.strtolower($l->nombre).'</option>';
        }
        sleep(1);
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
        $car = new Auto();
        $titulo = $car->titulo = $request->titulo;
        $descripcion = $request->descripcion;
        $id_provincia = $request->id_provincia;
        $id_ciudad = $request->id_ciudad;
        $id_barrio = $request->id_barrio;
        $telefono = $request->telefono;
        $anio = $request->anio;
        $puertas = $request->puertas;
        $combustible = $request->combustible;
        $km = $request->km;
        $color = $request->color;
        $direccion = $request->direccion;
        $transmision = $request->transmision;
        $duenio = $request->duenio;
        $version = $request->version;
        $precio = $request->precio;

        //sesion de datos
        Session::put('titulo',$titulo);
        Session::put('descripcion',$descripcion);
        Session::put('id_provincia',$id_provincia);
        Session::put('id_ciudad',$id_ciudad);
        Session::put('id_barrio',$id_barrio);
        Session::put('telefono',$telefono);
        Session::put('anio',$anio);
        Session::put('puertas',$puertas);
        Session::put('combustible',$combustible);
        Session::put('km',$km);
        Session::put('color',$color);
        Session::put('direccion',$direccion);
        Session::put('transmision',$transmision);
        Session::put('duenio',$duenio);
        Session::put('version',$version);
        Session::put('precio',$precio);
        //seguridad
        $se1 = $request->airbag_conductor;
        $se2 = $request->airbag_cortina;
        $se3 = $request->airbag_laterales;
        $se4 = $request->alarma;
        $se5 = $request->apoya_cabeza;
        $se6 = $request->blindado;
        $se7 = $request->control_estabilidad;
        $se8 = $request->control_traccion;
        $se9 = $request->doble_traccion;
        $se10 = $request->faros_delanteros;
        $se11 = $request->faros_traseros;
        $se12 = $request->faros_xenon;
        $se13 = $request->frenos_abs;
        $se14 = $request->inmobilizador_motor;
        $se15 = $request->isofix;
        $se16 = $request->repartidor_electronico;
        $se17 = $request->tercer_stop;
        //sesion de seguridad
        Session::put('se1',$se1);
        Session::put('se2',$se2);
        Session::put('se3',$se3);
        Session::put('se4',$se4);
        Session::put('se5',$se5);
        Session::put('se6',$se6);
        Session::put('se7',$se7);
        Session::put('se8',$se8);
        Session::put('se9',$se9);
        Session::put('se10',$se10);
        Session::put('se11',$se11);
        Session::put('se12',$se12);
        Session::put('se13',$se13);
        Session::put('se14',$se14);
        Session::put('se15',$se15);
        Session::put('se16',$se16);
        Session::put('se17',$se17);
        //confort
        $co1 = $request->aire_acondicionado;
        $co2 = $request->alarma_luces_encendidas;
        $co3 = $request->apertura_remota_baul;
        $co4 = $request->asiento_conductor_regulable_altura;
        $co5 = $request->asiento_trasero_rebatible;
        $co6 = $request->asientos_electronicos;
        $co7 = $request->cierre_centralizado_puertas;
        $co8 = $request->climatizador_automatico;
        $co9 = $request->computadora_abordo;
        $co10 = $request->control_velocidad_crucero;
        $co11 = $request->cristales_electricos;
        $co12 = $request->espejos_electricos;
        $co13 = $request->faros_regulables_interior;
        $co14 = $request->gps;
        $co15 = $request->sensor_estacionamiento;
        $co16 = $request->sensor_lluvia;
        $co17 = $request->sensor_luz;
        $co18 = $request->tapizado_cuero;
        //sesion de confort
        Session::put('co1',$co1);
        Session::put('co2',$co2);
        Session::put('co3',$co3);
        Session::put('co4',$co4);
        Session::put('co5',$co5);
        Session::put('co6',$co6);
        Session::put('co7',$co7);
        Session::put('co8',$co8);
        Session::put('co9',$co9);
        Session::put('co10',$co10);
        Session::put('co11',$co11);
        Session::put('co12',$co12);
        Session::put('co13',$co13);
        Session::put('co14',$co14);
        Session::put('co15',$co15);
        Session::put('co16',$co16);
        Session::put('co17',$co17);
        Session::put('co18',$co18);
        //sonido
        $so1 = $request->am_fm;
        $so2 = $request->bluetooth;
        $so3 = $request->caja_cd;
        $so4 = $request->cargador_cd;
        $so5 = $request->cd;
        $so6 = $request->comando_satelital_stereo;
        $so7 = $request->dvd;
        $so8 = $request->entrada_auxiliar;
        $so9 = $request->entrada_usb;
        $so10 = $request->mp3;
        $so11 = $request->pasacasete;
        $so12 = $request->tarjeta_sd;
        //sesion de sonido
        Session::put('so1',$so1);
        Session::put('so2',$so2);
        Session::put('so3',$so3);
        Session::put('so4',$so4);
        Session::put('so5',$so5);
        Session::put('so6',$so6);
        Session::put('so7',$so7);
        Session::put('so8',$so8);
        Session::put('so9',$so9);
        Session::put('so10',$so10);
        Session::put('so11',$so11);
        Session::put('so12',$so12);
        //exterior
        $ex1 = $request->limpia_lava_luneta;
        $ex2 = $request->llantas_aleacion;
        $ex3 = $request->paragolpes_pintados;
        $ex4 = $request->vidrios_polarizados;
        //sesion de exterior
        Session::put('ex1',$ex1);
        Session::put('ex2',$ex2);
        Session::put('ex3',$ex3);
        Session::put('ex4',$ex4);

    }

    public function registroYconfirmacion()
    {
        return view('publicar.registro_y_publicacion');
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

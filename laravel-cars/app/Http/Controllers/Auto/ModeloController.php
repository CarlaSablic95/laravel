<?php

namespace App\Http\Controllers\Auto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ModeloController extends Controller
{
    public function selectedModelo()
    {
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['0km']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esto no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['0km']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esto no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro una ves elegida ya la marca y el modelo con el precio mayor a 200.000 y menor a 500.000 ascendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esto no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro una ves elegida ya la marca y el modelo con el precio mayor a 200.000 y menor a 500.000 ascendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esto no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['0km']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio',$precio)
                ->where('a.km','=',0)
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            /* $data['precio_doscientos_mil']=DB::table('autos as a')
                 ->join('marcas as mar','mar.id','=','a.id_marca')
                 ->join('modelos as mod','mod.id','=','a.id_modelo')
                 ->select('a.anio','a.precio','mar.marca')
                 ->where('mar.marca',$marca)
                 ->where('mod.modelo',$modelo)
                 ->where('a.anio',$rango)
                 ->where('a.km','=',0)
                 ->count();

             $data['precio_quinientos_mil']=DB::table('autos as a')
                 ->join('marcas as mar','mar.id','=','a.id_marca')
                 ->join('modelos as mod','mod.id','=','a.id_modelo')
                 ->select('a.anio','a.precio','mar.marca')
                 ->where('mar.marca',$marca)
                 ->where('mod.modelo',$modelo)
                 ->where('a.anio',$rango)
                 ->where('a.km','=',0)
                 ->whereBetween('a.precio',[200000,500000])
                 ->count();

             $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                 ->join('marcas as mar','mar.id','=','a.id_marca')
                 ->join('modelos as mod','mod.id','=','a.id_modelo')
                 ->select('a.anio','a.precio','mar.marca')
                 ->where('mar.marca',$marca)
                 ->where('mod.modelo',$modelo)
                 ->where('a.anio',$rango)
                 ->where('a.km','=',0)
                 ->where('a.precio','>=',500000)
                 ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio',$precio)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['0km']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio',$precio)
                ->where('a.km','=',0)
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            /* $data['precio_doscientos_mil']=DB::table('autos as a')
                 ->join('marcas as mar','mar.id','=','a.id_marca')
                 ->join('modelos as mod','mod.id','=','a.id_modelo')
                 ->select('a.anio','a.precio','mar.marca')
                 ->where('mar.marca',$marca)
                 ->where('mod.modelo',$modelo)
                 ->where('a.anio',$rango)
                 ->where('a.km','=',0)
                 ->count();

             $data['precio_quinientos_mil']=DB::table('autos as a')
                 ->join('marcas as mar','mar.id','=','a.id_marca')
                 ->join('modelos as mod','mod.id','=','a.id_modelo')
                 ->select('a.anio','a.precio','mar.marca')
                 ->where('mar.marca',$marca)
                 ->where('mod.modelo',$modelo)
                 ->where('a.anio',$rango)
                 ->where('a.km','=',0)
                 ->whereBetween('a.precio',[200000,500000])
                 ->count();

             $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                 ->join('marcas as mar','mar.id','=','a.id_marca')
                 ->join('modelos as mod','mod.id','=','a.id_modelo')
                 ->select('a.anio','a.precio','mar.marca')
                 ->where('mar.marca',$marca)
                 ->where('mod.modelo',$modelo)
                 ->where('a.anio',$rango)
                 ->where('a.km','=',0)
                 ->where('a.precio','>=',500000)
                 ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio',$precio)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }


        // filtro una ves elegida ya la marca y el modelo con el precio mayor a 200.000 y menor a 500.000 ascendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esto no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro una ves elegida ya la marca y el modelo con el precio mayor a 200.000 y menor a 500.000 descendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esto no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        //filtro la marca, el modelo, el rango y el precio maroy a 500.000 ascendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['mas']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        //filtro la marca, el modelo, el rango y el precio maroy a 500.000 ascendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['mas']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }



        //filtro la marca, el modelo, el rango y el precio maroy a 500.000
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['mas'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                //->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }


        //filtro la marca, el modelo, el rango y el precio menor a 100.000 ascendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        //filtro la marca, el modelo, el rango y el precio menor a 100.000 descendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }


        //filtro los precios descendentemente si cumple estas cuatro condiciones
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',200000)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',500000)
                ->count();

            //nuevos
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();

            //usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        //filtro los precios descendentemente si cumple estas cuatro condiciones
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',200000)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',500000)
                ->count();

            //nuevos
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();

            //usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['mas']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',$precio)
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('precio','<=',200000)
                ->count();*/

            //total de los precios entre los rangos de precio desde 200000 hasta 500000
            /*$data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[200000,500000])
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['mas']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',$precio)
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('precio','<=',200000)
                ->count();*/

            //total de los precios entre los rangos de precio desde 200000 hasta 500000
            /*$data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[200000,500000])
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de precio desde 200000 hasta 500000
            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',500000)
                ->count();

            //total de autos 0km
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de precio desde 200000 hasta 500000
            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',500000)
                ->count();

            //total de autos 0km
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        //filtro el marca con el modelo de solo 0km ascendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['0km']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',200000)
                ->where('a.km','=',0)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',500000)
                ->where('a.km','=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        //filtro el marca con el modelo de solo 0km descendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['0km']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',200000)
                ->where('a.km','=',0)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',500000)
                ->where('a.km','=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro una ves elegida ya la marca y el modelo , el rango y el precio menor a 200.000
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['0km'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();*/

            /* //total de los precios entre los rangos de precio hasta 100000
             $data['precio_doscientos_mil']=DB::table('autos as a')
                 ->join('marcas as mar','mar.id','=','a.id_marca')
                 ->join('modelos as mod','mod.id','=','a.id_modelo')
                 ->select('a.anio','a.precio','mar.marca')
                 ->where('mar.marca',$marca)
                 ->where('mod.modelo',$modelo)
                 ->where('a.anio',$rango)
                 ->where('a.precio','<=',$precio)
                 ->count();*/

            //nuevos
           /* $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            //usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','!=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro una ves elegida ya la marca y el modelo , el rango y el precio menor a 200.000
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

           /* //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->count();*/

            //nuevos
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            //usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','!=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro una ves elegida ya la marca y el modelo , el rango y el precio menor a 200.000
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->count();

            //nuevos
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();

            //usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        //filtro los precios ascendentemente si cumple estas cuatro condiciones
        /*if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',200000)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',500000)
                ->count();

            //nuevos
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();

            //usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }*/

        //filtro los precios descendentemente si cumple estas cuatro condiciones
        /*if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',200000)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',500000)
                ->count();

            //nuevos
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();

            //usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }*/

        // filtro una ves elegida ya la marca y el modelo con el precio mayor a 500.000 ascendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['mas']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->orderBY('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 200000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',200000)
                ->count();*/

            /*$data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                //->where('a.precio','<=',$precio)
                ->count();*/

            //total de autos 0km
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->where('a.precio','>=',$precio)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('km','!=',0)
                ->where('a.precio','>=',$precio)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro una ves elegida ya la marca y el modelo con el precio mayor a 500.000 ascendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['mas']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->orderBY('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 200000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',200000)
                ->count();*/

            /*$data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                //->where('a.precio','<=',$precio)
                ->count();*/

            //total de autos 0km
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->where('a.precio','>=',$precio)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('km','!=',0)
                ->where('a.precio','>=',$precio)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }



        // filtro una ves elegida ya la marca y el modelo con el precio menor a 100.000
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['mas'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 200000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',200000)
                ->count();*/

            /*$data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                //->where('a.precio','<=',$precio)
                ->count();*/

            //total de autos 0km
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->where('a.precio','>=',$precio)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('km','!=',0)
                ->where('a.precio','>=',$precio)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro ascendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['0km']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->orderBy('a.precio','asc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->where('a.precio','>=',500000)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        //preciod descendentemente
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['0km']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->orderBy('a.precio','desc')
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->where('a.precio','>=',500000)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['0km'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $precio = $_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio',$precio)
                ->where('a.km','=',0)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
           /* $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->where('a.precio','>=',500000)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio',$precio)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['0km'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->where('a.precio','>=',500000)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro una ves elegida ya la marca y el modelo con el precio menor a 100.000
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $rango = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
           /* $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 200000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',200000)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->where('a.precio','>=',500000)
                ->count();

            //nuevos
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$rango)
                ->where('a.km','=',0)
                ->count();

            //usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$rango)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.anio',$rango)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro una ves elegida ya la marca y el modelo con el precio mayor a 200.000 y menor a 500.000
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['precio']) && isset($_GET['hasta'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esto no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',$precio)
                ->count();*/

            //total de autos 0km
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->where('a.precio','>=',$precio)
                ->where('a.precio','<=',$hasta)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('km','!=',0)
                ->where('a.precio','>=',$precio)
                ->where('a.precio','<=',$hasta)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        // filtro una ves elegida ya la marca y el modelo con el precio menor a 100.000
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['mas'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',$precio)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
           /* $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',$precio)
                ->count();*/

            //total de autos 0km
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->where('a.precio','>=',$precio)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('km','!=',0)
                ->where('a.precio','>=',$precio)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }


        // filtro una ves elegida ya la marca y el modelo con el precio menor a 100.000
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['precio'])){
        $marca = $_GET['marca'];
        $modelo = $_GET['modelo'];
        $precio = $_GET['precio'];
        $data['auto']=DB::table('autos as a')
            ->join('provincias as pro','pro.id','=','a.id_provincia')
            ->join('img_autos as img','img.id_autos','=','a.id')
            ->join('marcas as mar','mar.id','=','a.id_marca')
            ->join('modelos as mod','mod.id','=','a.id_modelo')
            ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
            ->where('mar.marca',$marca)
            ->where('mod.modelo',$modelo)
            ->where('a.precio','<=',$precio)
            ->get();

        // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
        // solo manda los campos para que se puedan filtrar
        $data['anio']=DB::table('autos as a')
            ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
            ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
            ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
            ->groupBy('a.anio','mar.marca','mod.modelo')
            ->orderBy('a.anio')
            ->where('mar.marca',$marca)
            ->where('mod.modelo',$modelo)
            ->where('a.precio','<=',$precio)
            ->get();

        //total de los precios entre los rangos de precio hasta 100000
        $data['precio_doscientos_mil']=DB::table('autos as a')
            ->join('marcas as mar','mar.id','=','a.id_marca')
            ->join('modelos as mod','mod.id','=','a.id_modelo')
            ->select('a.anio','a.precio','mar.marca','mod.modelo')
            ->where('mar.marca',$marca)
            ->where('mod.modelo',$modelo)
            ->where('a.precio','<=',$precio)
            ->count();

            //total de autos 0km
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->where('a.precio','<=',$precio)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('km','!=',0)
                ->where('a.precio','<=',$precio)
                ->count();

        // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
        $data['total']=DB::table('autos as a')
            ->join('marcas as mar','mar.id','=','a.id_marca')
            ->join('modelos as mod','mod.id','=','a.id_modelo')
            ->where('mar.marca',$marca)
            ->where('mod.modelo',$modelo)
            ->where('a.precio','<=',$precio)
            ->count();
        return view('auto.selecciono_modelo',$data);
        }

        //filtro el marca con el modelo de solo 0km
        if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['0km'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','<=',200000)
                ->where('a.km','=',0)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',500000)
                ->where('a.km','=',0)
                ->count();

            //total de autos 0km
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }

        if (isset($_GET['marca']) && isset($_GET['modelo'])){
            $marca = $_GET['marca'];
            $modelo = $_GET['modelo'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_anio_mar_mod'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('a.anio')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
               ->where('a.precio','<=',200000)
                ->count();

            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.precio','>=',500000)
                ->count();

            //total de autos 0km
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('a.km','=',0)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->where('km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->where('mar.marca',$marca)
                ->where('mod.modelo',$modelo)
                ->count();
            return view('auto.selecciono_modelo',$data);
        }
    }
}

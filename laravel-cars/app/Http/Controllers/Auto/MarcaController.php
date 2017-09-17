<?php

namespace App\Http\Controllers\Auto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MarcaController extends Controller
{
    public function selectedMarca()
    {
        //cuando se selecciona la marca ya estando el precio entre 200.000 hasta 500.000 ascendentemente
        if (isset($_GET['marca']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
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
                ->whereBetween('a.precio',[$precio,$hasta])
                ->orderBy('a.precio','asc')
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->groupBy('a.precio','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('mar.marca',$marca)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_marca',$data);
        }

        //cuando se selecciona la marca ya estando el precio entre 200.000 hasta 500.000 descendentemente
        if (isset($_GET['marca']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
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
                ->whereBetween('a.precio',[$precio,$hasta])
                ->orderBy('a.precio','desc')
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->groupBy('a.precio','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('mar.marca',$marca)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_marca',$data);
        }

        //con esto filtramos el precio desde a 200.000 hasta 500000 de las marcas el rango y el precio
        if (isset($_GET['marca']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta'])){
            $marca = $_GET['marca'];
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
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->groupBy('a.precio','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('mar.marca',$marca)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            /*$data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->get();*/

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$rango)
                ->where('precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$rango)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_marca',$data);
        }

        //con esto filtramos el precio menor a 200.000 de las marcas el rango y el precio
        if (isset($_GET['marca']) && isset($_GET['rango']) && isset($_GET['precio'])){
            $marca = $_GET['marca'];
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
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->groupBy('a.precio','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('mar.marca',$marca)
                ->where('a.anio',$rango)
                ->where('a.precio','<=',$precio)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$rango)
                ->where('precio','<=',$precio)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->count();
            return view('auto.selecciono_marca',$data);
        }

        //con esto filtramos el precio mayor a 500.000 de las marcas pero ascendentemente
        if (isset($_GET['marca']) && isset($_GET['mas']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('a.precio','>=',$precio)
                ->orderBY('a.precio','asc')
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->groupBy('a.precio','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('mar.marca',$marca)
                ->where('a.precio','>=',$precio)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','>=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_marca',$data);
        }

        //con esto filtramos el precio mayor a 500.000 de las marcas pero ascendentemente
        if (isset($_GET['marca']) && isset($_GET['mas']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('a.precio','>=',$precio)
                ->orderBY('a.precio','desc')
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->groupBy('a.precio','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('mar.marca',$marca)
                ->where('a.precio','>=',$precio)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','>=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            /*$data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->count();*/

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','>=',$precio)
                ->count();
            return view('auto.selecciono_marca',$data);
        }


        //con esto filtramos el precio menor a 100.000 de las marcas del index pero ascendentemente
        if (isset($_GET['marca']) && isset($_GET['precio']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $precio = $_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->orderBY('a.precio','asc')
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->groupBy('a.precio','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->count();

            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->where('a.km','=',0)
                ->count();

            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->count();
            return view('auto.selecciono_marca',$data);
        }

        //con esto filtramos el precio menor a 100.000 de las marcas del index pero descendentemente
        if (isset($_GET['marca']) && isset($_GET['precio']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $precio = $_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->orderBY('a.precio','desc')
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->groupBy('a.precio','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esto no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->count();

            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->where('a.precio','<=',$precio)
                ->count();

            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','!=',0)
                ->where('a.precio','>=',$precio)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',$precio)
                ->count();
            return view('auto.selecciono_marca',$data);
        }

        // marca y 0km ascendentemente
        if (isset($_GET['marca']) && isset($_GET['0km']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->orderBy('a.precio','asc')
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->groupBy('a.precio','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->get();

            //total de los precios entre los rangos de precio hasta 200000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',200000)
                ->where('a.km','=',0)
                ->count();

            //total de los precios entre 200000 hasta 500000
            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->where('a.precio','>=',500000)
                ->count();

            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->count();

            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_marca',$data);
        }

        // marca y 0km descendentemente
        if (isset($_GET['marca']) && isset($_GET['0km']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->orderBy('a.precio','desc')
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->groupBy('a.precio','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->get();

            //total de los precios entre los rangos de precio hasta 200000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',200000)
                ->where('a.km','=',0)
                ->count();

            //total de los precios entre 200000 hasta 500000
            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->whereBetween('a.precio',[200000,500000])
                ->count();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->where('a.precio','>=',500000)
                ->count();

            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->count();

            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->count();
            return view('auto.selecciono_marca',$data);
        }


        //filtro los precios cuando se selcciona la marca
        if (isset($_GET['marca']) && isset($_GET['precio_asc'])){
            $marca = $_GET['marca'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->orderBy('a.precio','asc')
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->where('mar.marca',$marca)
                ->groupBy('mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();


            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->get();

            //total de los precios entre los rangos de precio hasta 500000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',200000)
                ->count();


            //total de los precios entre los rangos de precio hasta 500000
            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio',[200000,500000])
                ->count();

            //total de los precios mas de 500000
            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','>=',500000)
                ->count();

            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->count();

            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->count();
            return view('auto.selecciono_marca',$data);
        }

        /* filtro los precios ya cuando se selecciona la marca */
        if (isset($_GET['marca']) && isset($_GET['precio_desc'])){
            $marca = $_GET['marca'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->orderBy('a.precio','desc')
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->where('mar.marca',$marca)
                ->groupBy('mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();


            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de precio hasta 500000
            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio',[200000,500000])
                ->count();

            //total de los precios mas de 500000
            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.anio','a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.precio','>=',500000)
                ->count();

            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','=',0)
                ->count();

            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->count();
            return view('auto.selecciono_marca',$data);
        }

        /* listo las marca elegida */
        // aqui entra si existe el anio ha sido elegido y despues eligen
        // la marca entonces se filtra por marca y anio
        if (isset($_GET['marca']) && isset($_GET['rango'])){
            $marca = $_GET['marca'];
            $anio = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('mar.marca',$marca)
                ->where('a.anio',$anio)
                ->get();

            // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
            // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                ->where('mar.marca',$marca)
                ->groupBy('mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('a.anio',$anio)
                ->get();

            // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
            // solo manda los campos para que se puedan filtrar
            $data['anio']=DB::table('autos as a')
                ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->where('mar.marca',$marca)
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_doscientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$anio)
                ->where('a.precio','<=',200000)
                ->count();

            //total del precio de 200000 hasta los 500000
            $data['precio_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$anio)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total del precio mas de los 500000
            $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$anio)
                ->where('precio','>=',500000)
                ->count();

            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$anio)
                ->where('a.km','=',0)
                ->count();

            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$anio)
                ->where('a.km','!=',0)
                ->count();

            //nuevos
            $data['nuevos']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$anio)
                ->where('a.km','=',0)
                ->count();

            //usados
            $data['usados']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->select('a.precio','mar.marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$anio)
                ->where('a.km','!=',0)
                ->count();

            // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
            $data['total']=DB::table('autos as a')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->where('mar.marca',$marca)
                ->where('a.anio',$anio)
                ->count();
            return view('auto.selecciono_marca',$data);
        }else {
            //cuando se selecciona la marca ya estando el precio entre 200.000 hasta 500.000
            if (isset($_GET['marca']) && isset($_GET['precio']) && isset($_GET['hasta'])){
                $marca = $_GET['marca'];
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
                    ->whereBetween('a.precio',[$precio,$hasta])
                    ->get();

                // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
                // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
                $data['modelo']=DB::table('modelos as mod')
                    ->join('autos as a','a.id_modelo','=','mod.id')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                    ->groupBy('a.precio','mod.modelo')
                    ->orderBy('mod.modelo','desc')
                    ->where('mar.marca',$marca)
                    ->whereBetween('a.precio',[$precio,$hasta])
                    ->get();

                // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
                // solo manda los campos para que se puedan filtrar
                $data['anio']=DB::table('autos as a')
                    ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                    ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                    ->groupBy('a.anio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->whereBetween('a.precio',[$precio,$hasta])
                    ->get();

                $data['nuevos']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->whereBetween('a.precio',[$precio,$hasta])
                    ->count();

                $data['usados']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','!=',0)
                    ->whereBetween('a.precio',[$precio,$hasta])
                    ->count();

                // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
                $data['total']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->whereBetween('a.precio',[$precio,$hasta])
                    ->count();
                return view('auto.selecciono_marca',$data);
            }

            if (isset($_GET['marca']) && isset($_GET['precio']) && isset($_GET['0km'])){
                $marca = $_GET['marca'];
                $precio = $_GET['precio'];
                $data['auto']=DB::table('autos as a')
                    ->join('provincias as pro','pro.id','=','a.id_provincia')
                    ->join('img_autos as img','img.id_autos','=','a.id')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->join('modelos as mod','mod.id','=','a.id_modelo')
                    ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                        'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->where('a.km','=',0)
                    ->get();

                // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
                // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
                $data['modelo']=DB::table('modelos as mod')
                    ->join('autos as a','a.id_modelo','=','mod.id')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                    ->groupBy('a.precio','mod.modelo')
                    ->orderBy('mod.modelo','desc')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->where('a.km','=',0)
                    ->get();

                // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
                // solo manda los campos para que se puedan filtrar
                $data['anio']=DB::table('autos as a')
                    ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                    ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                    ->groupBy('a.anio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->where('a.km','=',0)
                    ->get();

                //total de los precios entre los rangos de precio hasta 100000
                $data['precio_doscientos_mil']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->count();

                $data['nuevos']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->where('a.precio','<=',$precio)
                    ->count();

                $data['usados']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','!=',0)
                    ->where('a.precio','<=',$precio)
                    ->count();

                // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
                $data['total']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->where('a.km','=',0)
                    ->count();
                return view('auto.selecciono_marca',$data);
            }

            //con esto filtramos el precio mayor a 500.000 de las marcas
            if (isset($_GET['marca']) && isset($_GET['mas'])){
                $marca = $_GET['marca'];
                $precio = $_GET['mas'];
                $data['auto']=DB::table('autos as a')
                    ->join('provincias as pro','pro.id','=','a.id_provincia')
                    ->join('img_autos as img','img.id_autos','=','a.id')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->join('modelos as mod','mod.id','=','a.id_modelo')
                    ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                        'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','>=',$precio)
                    ->get();

                // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
                // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
                $data['modelo']=DB::table('modelos as mod')
                    ->join('autos as a','a.id_modelo','=','mod.id')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                    ->groupBy('a.precio','mod.modelo')
                    ->orderBy('mod.modelo','desc')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','>=',$precio)
                    ->get();

                // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
                // solo manda los campos para que se puedan filtrar
                $data['anio']=DB::table('autos as a')
                    ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                    ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                    ->groupBy('a.anio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','>=',$precio)
                    ->get();

                //total de los precios entre los rangos de precio hasta 100000
                $data['precio_doscientos_mil']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->count();

                $data['nuevos']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->where('a.precio','>=',$precio)
                    ->count();

                $data['usados']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','!=',0)
                    ->where('a.precio','>=',$precio)
                    ->count();

                // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
                $data['total']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','>=',$precio)
                    ->count();
                return view('auto.selecciono_marca',$data);
            }

            //con esto filtramos el precio menor a 100.000 de las marcas del index
            if (isset($_GET['marca']) && isset($_GET['precio'])){
                $marca = $_GET['marca'];
                $precio = $_GET['precio'];
                $data['auto']=DB::table('autos as a')
                    ->join('provincias as pro','pro.id','=','a.id_provincia')
                    ->join('img_autos as img','img.id_autos','=','a.id')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->join('modelos as mod','mod.id','=','a.id_modelo')
                    ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                        'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->get();

                // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
                // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
                $data['modelo']=DB::table('modelos as mod')
                    ->join('autos as a','a.id_modelo','=','mod.id')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                    ->groupBy('a.precio','mod.modelo')
                    ->orderBy('mod.modelo','desc')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->get();

                // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
                // solo manda los campos para que se puedan filtrar
                $data['anio']=DB::table('autos as a')
                    ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                    ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                    ->groupBy('a.anio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->get();

                //total de los precios entre los rangos de precio hasta 100000
                $data['precio_doscientos_mil']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->count();

                $data['nuevos']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->where('a.precio','<=',$precio)
                    ->count();

                $data['usados']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','!=',0)
                    ->where('a.precio','<=',$precio)
                    ->count();

                // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
                $data['total']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',$precio)
                    ->count();
                return view('auto.selecciono_marca',$data);
            }

            //masrcas de solo 0km
            if (isset($_GET['marca']) && isset($_GET['0km'])){
                $marca = $_GET['marca'];
                $data['auto']=DB::table('autos as a')
                    ->join('provincias as pro','pro.id','=','a.id_provincia')
                    ->join('img_autos as img','img.id_autos','=','a.id')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->join('modelos as mod','mod.id','=','a.id_modelo')
                    ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                        'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->get();

                // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
                // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
                $data['modelo']=DB::table('modelos as mod')
                    ->join('autos as a','a.id_modelo','=','mod.id')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos'))
                    ->groupBy('a.precio','mod.modelo')
                    ->orderBy('mod.modelo','desc')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->get();

                // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
                // solo manda los campos para que se puedan filtrar
                $data['anio']=DB::table('autos as a')
                    ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                    ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                    ->groupBy('a.anio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->get();

                //total de los precios entre los rangos de precio hasta 200000
                $data['precio_doscientos_mil']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',200000)
                    ->where('a.km','=',0)
                    ->count();

                //total de los precios entre 200000 hasta 500000
                $data['precio_quinientos_mil']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->whereBetween('a.precio',[200000,500000])
                    ->count();

                //total de los precios entre los rangos de precio hasta 100000
                $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->where('a.precio','>=',500000)
                    ->count();

                // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
                $data['total']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->count();
                return view('auto.selecciono_marca',$data);
            }

            //aqui entra si solo existe la variable marca
            if (isset($_GET['marca'])) {
                $marca = $_GET['marca'];
                $data['auto'] = DB::table('autos as a')
                    ->join('provincias as pro', 'pro.id', '=', 'a.id_provincia')
                    ->join('img_autos as img', 'img.id_autos', '=', 'a.id')
                    ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                    ->join('modelos as mod', 'mod.id', '=', 'a.id_modelo')
                    ->select('a.id', 'a.anio', 'a.precio', 'a.km', 'pro.nombre as provincia',
                        'a.titulo', 'img.imagen1', 'a.id_marca','mar.marca', 'mod.modelo')
                    ->where('mar.marca', $marca)
                    ->get();

                // con esto filtramos los modelos que se listan en categorias , pero ya solo los modelos segun
                // la marca elegida, poreso el $marca xq ahi esta marca que viene por get
                $data['modelo'] = DB::table('modelos as mod')
                    ->join('autos as a', 'a.id_modelo', '=', 'mod.id')
                    ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                    ->select('mod.modelo', DB::raw('COUNT(mod.modelo) as total_modelos'))
                    ->where('mar.marca', $marca)
                    ->groupBy('mod.modelo')
                    ->orderBy('mod.modelo', 'desc')
                    ->get();

                // una ves seleccionada la marca puedo filtrar la marca por año, esot no filtra
                // solo manda los campos para que se puedan filtrar
                $data['anio']=DB::table('autos as a')
                    ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                    ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                    ->groupBy('a.anio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->get();

                //total de los precios entre los rangos de precio hasta 100000
                $data['precio_doscientos_mil']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.precio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','<=',200000)
                    ->count();

                //total de los precios entre los rangos de precio hasta 500000
                $data['precio_quinientos_mil']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.anio','a.precio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->whereBetween('a.precio',[200000,500000])
                    ->count();

                //total de los precios entre los rangos de precio hasta 500000
                $data['precio_mas_quinientos_mil']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->select('a.anio','a.precio','mar.marca')
                    ->where('mar.marca',$marca)
                    ->where('a.precio','>=',500000)
                    ->count();

                //total de autos 0km
                $data['nuevos']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('a.km','=',0)
                    ->count();

                //total de autos usados
                $data['usados']=DB::table('autos as a')
                    ->join('marcas as mar','mar.id','=','a.id_marca')
                    ->where('mar.marca',$marca)
                    ->where('km','!=',0)
                    ->count();

                // esto muestra la cantidad total de autos encontrados segun la marca elegida poreso el $marca
                $data['total'] = DB::table('autos as a')
                    ->join('marcas as mar', 'mar.id', '=', 'a.id_marca')
                    ->where('mar.marca', $marca)
                    ->count();
                return view('auto.selecciono_marca', $data);
            }
        }
    }
}

<?php

namespace App\Http\Controllers\Auto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AutoController extends Controller
{
    public function index()
    {
        //filtro el precio de 200.000 hasta 500000 ascendentemente
        if (isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['precio_asc'])){
            $precio=$_GET['precio'];
            $hasta=$_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->whereBetween('a.precio', [$precio,$hasta])
                ->orderBy('a.precio','asc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //total de los precios entre los rangos de 200.000 hasta los 500.000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->whereBetween('precio', [$precio,$hasta])
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->whereBetween('precio',[$precio,$hasta])
                ->count();
            return view('auto.index',$data);
        }

        //filtro el precio de 200.000 hasta 500000 descendentemente
        if (isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['precio_desc'])){
            $precio=$_GET['precio'];
            $hasta=$_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->whereBetween('a.precio', [$precio,$hasta])
                ->orderBy('a.precio','desc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //total de los precios entre los rangos de 200.000 hasta los 500.000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->whereBetween('precio', [$precio,$hasta])
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->whereBetween('precio',[$precio,$hasta])
                ->count();
            return view('auto.index',$data);
        }

        //filtro el precio mas de 200000 ascendentemente
        if (isset($_GET['mas']) && isset($_GET['precio_asc'])){
            $precio=$_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.precio','>=',$precio)
                ->orderBY('a.precio','asc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->where('a.precio','>=',$precio)
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('a.precio','>=',$precio)
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->where('precio','>=',$precio)
                ->get();

            //filtro el precio menor a 100.000 descendentemente
            /*$data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','>=',$precio)
                ->count();*/

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('precio','>=',$precio)
                ->count();
            return view('auto.index',$data);
        }

        //filtro el precio mas de 200000 descendentemente
        if (isset($_GET['mas']) && isset($_GET['precio_desc'])){
            $precio=$_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.precio','>=',$precio)
                ->orderBY('a.precio','desc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->where('a.precio','>=',$precio)
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('a.precio','>=',$precio)
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->where('precio','>=',$precio)
                ->get();

            //filtro el precio menor a 100.000 descendentemente
            /*$data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','>=',$precio)
                ->count();*/

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('precio','>=',$precio)
                ->count();
            return view('auto.index',$data);
        }

        //filtro el precio hasta 100.000 ascendientemente
        if (isset($_GET['precio']) && isset($_GET['precio_asc'])){
            $precio=$_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.precio','<=',$precio)
                ->orderBy('a.precio','asc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno, con precio menor a 200.000
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(a.precio) as total_marcas'))
                ->where('a.precio','<=',$precio)
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos, precio menor a 200.000
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(a.precio) as total_modelos_general'))
                ->where('a.precio','<=',$precio)
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mar.marca','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor, con precio menor a 200.000
            $data['anio']=DB::table('autos')
                ->select('precio','anio',DB::raw('COUNT(precio) as total_anio'))
                ->where('precio','<=',$precio)
                ->groupBy('precio','anio')
                ->orderBy('precio','desc')
                ->get();
            //filtro el precio menor a 100.000 descendentemente
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','<=',$precio)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('precio','<=',$precio)
                ->count();
            return view('auto.index',$data);
        }

        //filtro el precio hasta 100.000 descendientemente
        if (isset($_GET['precio']) && isset($_GET['precio_desc'])){
            $precio=$_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.precio','<=',$precio)
                ->orderBy('a.precio','desc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno, con precio menor a 200.000
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(a.precio) as total_marcas'))
                ->where('a.precio','<=',$precio)
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos, precio menor a 200.000
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(a.precio) as total_modelos_general'))
                ->where('a.precio','<=',$precio)
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mar.marca','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor, con precio menor a 200.000
            $data['anio']=DB::table('autos')
                ->select('precio','anio',DB::raw('COUNT(precio) as total_anio'))
                ->where('precio','<=',$precio)
                ->groupBy('precio','anio')
                ->orderBy('precio','desc')
                ->get();

            //filtro el precio menor a 100.000 descendentemente
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','<=',$precio)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('precio','<=',$precio)
                ->count();
            return view('auto.index',$data);
        }

        //autos 0km ascendentemente
        if (isset($_GET['0km']) && isset($_GET['precio_asc'])){
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.km','=',0)
                ->orderBy('a.precio','asc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->where('a.km','=',0)
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->where('a.km','=',0)
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->where('km','=',0)
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //precio hasta 200.000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','=',0)
                ->where('precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de 200.000 hasta los 500.000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','=',0)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total de los precios con mas de 500.000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','=',0)
                ->where('precio','>=',500000)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('km','=',0)
                ->count();
            return view('auto.index',$data);
        }

        //autos 0km descendentemente
        if (isset($_GET['0km']) && isset($_GET['precio_desc'])){
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.km','=',0)
                ->orderBy('a.precio','desc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->where('a.km','=',0)
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->where('a.km','=',0)
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->where('km','=',0)
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //precio hasta 200.000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','=',0)
                ->where('precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de 200.000 hasta los 500.000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','=',0)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total de los precios con mas de 500.000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','=',0)
                ->where('precio','>=',500000)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('km','=',0)
                ->count();
            return view('auto.index',$data);
        }

        // filtro solo autos usados ascendentemente
        if (isset($_GET['usados']) && isset($_GET['precio_asc'])){
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.km','!=',0)
                ->orderBY('a.precio','asc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->where('a.km','!=',0)
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->where('a.km','!=',0)
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->where('km','!=',0)
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //precio hasta 200.000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','!=',0)
                ->where('precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de 200.000 hasta los 500.000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','!=',0)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total de los precios con mas de 500.000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','!=',0)
                ->where('precio','>=',500000)
                ->count();

            //total de autos 0km
            $data['nuevos']=DB::table('autos')
                ->where('km','=',0)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos')
                ->where('km','!=',0)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('km','!=',0)
                ->count();
            return view('auto.index',$data);
        }

        // filtro solo autos usados ascendentemente
        if (isset($_GET['usados']) && isset($_GET['precio_desc'])){
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.km','!=',0)
                ->orderBY('a.precio','desc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->where('a.km','!=',0)
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->where('a.km','!=',0)
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->where('km','!=',0)
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //precio hasta 200.000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','!=',0)
                ->where('precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de 200.000 hasta los 500.000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','!=',0)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total de los precios con mas de 500.000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','!=',0)
                ->where('precio','>=',500000)
                ->count();

            //total de autos 0km
            $data['nuevos']=DB::table('autos')
                ->where('km','=',0)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos')
                ->where('km','!=',0)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('km','!=',0)
                ->count();
            return view('auto.index',$data);
        }


        /* los filtros de precios de menor a mayor */
        if (isset($_GET['precio_asc'])){
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1')
                ->orderBy('a.precio','asc')
                ->get();

            //listo las marcas de la navegacion de la izquierda con sus respectivos totales
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //filtro el precio menor a 100.000 descendentemente
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','>=',200000)
                ->where('precio','<=',500000)
                ->count();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','5=',500000)
                ->count();

            //total de autos 0km
            $data['nuevos']=DB::table('autos')
                ->where('km','=',0)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos')
                ->where('km','!=',0)
                ->count();

            $data['total']=DB::table('autos')->count();
            return view('auto.index',$data);
        }

        if (isset($_GET['precio_desc'])){
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1')
                ->orderBy('a.precio','desc')
                ->get();

            //listo las marcas de la navegacion de la izquierda con sus respectivos totales
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //filtro el precio menor a 100.000 descendentemente
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','>=',200000)
                ->where('precio','<=',500000)
                ->count();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','5=',500000)
                ->count();

            //total de autos 0km
            $data['nuevos']=DB::table('autos')
                ->where('km','=',0)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos')
                ->where('km','!=',0)
                ->count();

            $data['total']=DB::table('autos')->count();
            return view('auto.index',$data);
        }

        //filtro el precio de 200.000 hasta 500000
        if (isset($_GET['precio']) && isset($_GET['hasta'])){
            $precio=$_GET['precio'];
            $hasta=$_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->whereBetween('a.precio', [$precio,$hasta])
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->whereBetween('a.precio',[$precio,$hasta])
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->whereBetween('a.precio',[$precio,$hasta])
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->whereBetween('precio',[$precio,$hasta])
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //total de los precios entre los rangos de precio hasta 100000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->whereBetween('precio',[$precio,$hasta])
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
            ->whereBetween('precio',[$precio,$hasta])
            ->count();
            return view('auto.index',$data);
        }

        //filtro el precio mas de 500.000
        if (isset($_GET['mas'])){
            $precio=$_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.precio','>=',$precio)
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->where('a.precio','>=',$precio)
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('a.precio','>=',$precio)
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->where('precio','>=',$precio)
                ->get();

            //precio hasta 200.000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de 200.000 hasta los 500.000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','>=',200000)
                ->where('precio','<=',500000)
                ->count();

            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','>=',$precio)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('precio','>=',$precio)
                ->count();
            return view('auto.index',$data);
        }

        //filtro el precio hasta 100.000
        if (isset($_GET['precio'])){
            $precio=$_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.precio','<=',$precio)
                ->get();

            //listo las marcas que esten disponibles con su total cada uno, con precio menor a 200.000
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(a.precio) as total_marcas'))
                ->where('a.precio','<=',$precio)
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos, precio menor a 200.000
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(a.precio) as total_modelos_general'))
                ->where('a.precio','<=',$precio)
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mar.marca','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor, con precio menor a 200.000
            $data['anio']=DB::table('autos')
                ->select('precio','anio',DB::raw('COUNT(precio) as total_anio'))
                ->where('precio','<=',$precio)
                ->groupBy('precio','anio')
                ->orderBy('precio','desc')
                ->get();

            $data['precio_doscientos_mil']=DB::table('autos')
            ->select('precio')
                ->where('precio','<=',$precio)
            ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('precio','<=',$precio)
                ->count();
            return view('auto.index',$data);
        }

        // filtro solo autos nuevos
        if (isset($_GET['0km'])){
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.km','=',0)
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->where('a.km','=',0)
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->where('a.km','=',0)
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->where('km','=',0)
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //precio hasta 200.000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','=',0)
                ->where('precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de 200.000 hasta los 500.000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','=',0)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total de los precios con mas de 500.000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','=',0)
                ->where('precio','>=',500000)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('km','=',0)
                ->count();
            return view('auto.index',$data);
        }

        // filtro solo autos usados
        if (isset($_GET['usados'])){
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.km','!=',0)
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
                ->where('a.km','!=',0)
                ->groupBy('mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();


            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->where('a.km','!=',0)
                ->groupBy('mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->where('km','!=',0)
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //precio hasta 200.000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','!=',0)
                ->where('precio','<=',200000)
                ->count();

            //total de los precios entre los rangos de 200.000 hasta los 500.000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','!=',0)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total de los precios con mas de 500.000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('km','!=',0)
                ->where('precio','>=',500000)
                ->count();

            //total de autos 0km
            $data['nuevos']=DB::table('autos')
                ->where('km','=',0)
                ->count();

            //total de autos usados
            $data['usados']=DB::table('autos')
                ->where('km','!=',0)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('km','!=',0)
                ->count();
            return view('auto.index',$data);
        }


        /*############################## filtro de las marcas index principal ############################*/
        $data['auto']=DB::table('autos as a')
        ->join('provincias as pro','pro.id','=','a.id_provincia')
        ->join('img_autos as img','img.id_autos','=','a.id')
        ->join('marcas as mar','mar.id','=','a.id_marca')
        ->join('modelos as mod','mod.id','=','a.id_modelo')
        ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
        ->get();

        //listo las marcas que esten disponibles con su total cada uno
        $data['marca']=DB::table('marcas as mar')
            ->join('autos as a','a.id_marca','=','mar.id')
            ->select('mar.marca',DB::raw('COUNT(mar.marca) as total_marcas'))
            ->groupBy('mar.marca')
            ->orderBy('mar.marca','desc')
            ->get();


        // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
        //groupBy puede agrupar mas de dos campos
        $data['modelo']=DB::table('modelos as mod')
            ->join('autos as a','a.id_modelo','=','mod.id')
            ->join('marcas as mar','mar.id','=','mod.id_marca')
            ->select('mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
            ->groupBy('mar.marca','mod.modelo')
            ->orderBy('mod.modelo','desc')
            ->get();

        //listo los años que esten disponibles de mayor a menor
        $data['anio']=DB::table('autos')
        ->select('anio',DB::raw('COUNT(anio) as total_anio'))
            ->groupBy('anio')
            ->orderBy('anio','desc')
        ->get();

        //precio hasta 200.000
        $data['precio_doscientos_mil']=DB::table('autos')
            ->select('precio')
            ->where('precio','<=',200000)
            ->count();

        //total de los precios entre los rangos de 200.000 hasta los 500.000
        $data['precio_quinientos_mil']=DB::table('autos')
            ->select('precio')
            ->where('precio','>=',200000)
            ->where('precio','<=',500000)
            ->count();

        //total de los precios con mas de 500.000
        $data['precio_mas_quinientos_mil']=DB::table('autos')
            ->select('precio')
            ->where('precio','>=',500000)
            ->count();

        //total de autos 0km
        $data['nuevos']=DB::table('autos')
            ->where('km','=',0)
            ->count();

        //total de autos usados
        $data['usados']=DB::table('autos')
            ->where('km','!=',0)
            ->count();

        //el total que se muestra en el encabezado
        $data['total']=DB::table('autos')->count();
        return view('auto.index',$data);
    }
}

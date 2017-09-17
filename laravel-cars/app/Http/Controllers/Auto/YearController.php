<?php

namespace App\Http\Controllers\Auto;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class YearController extends Controller
{
    public function year()
    {
        // ordeno de menor a mayor
        if (isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['precio_asc'])){
            $anio = $_GET['rango'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.anio',$anio)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->orderBy('a.precio','asc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->where('a.anio',$anio)
                ->groupBy('a.anio','mar.marca')
                ->orderBy('mar.marca','desc')
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_modelos_general'))
                ->where('a.anio',$anio)
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['date_anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            /*//total del precio hasta los 100000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','<=',200000)
                ->count();*/

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('anio',$anio)
                ->whereBetween('precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_anio',$data);
        }

        //ordeno de mayo a menor
        if (isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['precio_desc'])){
            $anio = $_GET['rango'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.anio',$anio)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->orderBy('a.precio','desc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->where('a.anio',$anio)
                ->groupBy('a.anio','mar.marca')
                ->orderBy('mar.marca','desc')
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_modelos_general'))
                ->where('a.anio',$anio)
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['date_anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            /*//total del precio hasta los 100000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','<=',200000)
                ->count();*/

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('anio',$anio)
                ->whereBetween('precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_anio',$data);
        }

        if (isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta'])){
            $anio = $_GET['rango'];
            $precio = $_GET['precio'];
            $hasta = $_GET['hasta'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.anio',$anio)
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->where('a.anio',$anio)
                ->groupBy('a.anio','mar.marca')
                ->orderBy('mar.marca','desc')
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_modelos_general'))
                ->where('a.anio',$anio)
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->whereBetween('a.precio',[$precio,$hasta])
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['date_anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            /*//total del precio hasta los 100000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','<=',200000)
                ->count();*/

            //total autos nuevos
            $data['nuevos']=DB::table('autos')
                ->where('anio',$anio)
                ->whereBetween('precio',[$precio,$hasta])
                ->where('km','=',0)
                ->count();

            //total autos usados
            $data['usados']=DB::table('autos')
                ->where('anio',$anio)
                ->whereBetween('precio',[$precio,$hasta])
                ->where('km','!=',0)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('anio',$anio)
                ->whereBetween('precio',[$precio,$hasta])
                ->count();
            return view('auto.selecciono_anio',$data);
        }


        //cuando se quiere filtrar por el precio  mas bajo
        /* filtro de las marcas */
        if (isset($_GET['rango']) && isset($_GET['precio_asc'])){
            $anio = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.anio',$anio)
                ->orderBy('a.precio','asc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->orderBy('mar.marca','desc')
                ->where('a.anio',$anio)
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('a.anio',$anio)
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['date_anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->where('anio',$anio)
                ->get();

            //total del precio hasta los 500000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('anio',$anio)
                ->where('precio','<=',200000)
                ->count();

            //total del precio de 200000 hasta los 500000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('anio',$anio)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total del precio mas de los 500000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio','anio')
                ->where('anio',$anio)
                ->where('precio','>=',500000)
                ->count();

            //total autos nuevos
            $data['nuevos']=DB::table('autos')
                ->where('anio',$anio)
                ->where('km','=',0)
                ->count();

            //total autos usados
            $data['usados']=DB::table('autos')
                ->where('anio',$anio)
                ->where('km','!=',0)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('anio',$anio)
                ->count();

            return view('auto.selecciono_anio',$data);
        }

        //cuando se quiere filtrar por el precio mas alto
        /* filtro de las marcas */
        if (isset($_GET['rango']) && isset($_GET['precio_desc'])){
            $anio = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.anio',$anio)
                ->orderBy('a.precio','desc')
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->orderBy('mar.marca','desc')
                ->where('a.anio',$anio)
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(mod.modelo) as total_modelos_general'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('a.anio',$anio)
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['date_anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //total del precio hasta los 500000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('anio',$anio)
                ->where('precio','<=',200000)
                ->count();

            //total del precio de 200000 hasta los 500000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('anio',$anio)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total del precio mas de los 500000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio','anio')
                ->where('anio',$anio)
                ->where('precio','>=',500000)
                ->count();

            //total autos nuevos
            $data['nuevos']=DB::table('autos')
                ->where('anio',$anio)
                ->where('km','=',0)
                ->count();

            //total autos usados
            $data['usados']=DB::table('autos')
                ->where('anio',$anio)
                ->where('km','!=',0)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('anio',$anio)
                ->count();
            return view('auto.selecciono_anio',$data);
        }

        if (isset($_GET['rango']) && isset($_GET['precio'])){
            $anio = $_GET['rango'];
            $precio = $_GET['precio'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.anio',$anio)
                ->where('a.precio','<=',$precio)
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->where('a.anio',$anio)
                ->where('a.precio','<=',$precio)
                ->groupBy('a.anio','mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_modelos_general'))
                ->where('a.anio',$anio)
                ->where('a.precio','<=',$precio)
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['date_anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //total del precio hasta los 100000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('precio','<=',200000)
                ->count();

            //total del precio desde 200000 hasta los 500000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio','anio')
                ->where('anio',$anio)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total del precio mas de los 500000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio','anio')
                ->where('anio',$anio)
                ->where('precio','>=',500000)
                ->count();

            //total autos nuevos
            $data['nuevos']=DB::table('autos')
                ->where('anio',$anio)
                ->where('precio','<=',$precio)
                ->where('km','=',0)
                ->count();

            //total autos usados
            $data['usados']=DB::table('autos')
                ->where('anio',$anio)
                ->where('precio','<=',$precio)
                ->where('km','!=',0)
                ->count();


            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('anio',$anio)
                ->where('precio','<=',$precio)
                ->count();
            return view('auto.selecciono_anio',$data);
        }

        if (isset($_GET['rango']) && isset($_GET['mas'])){
            $anio = $_GET['rango'];
            $precio = $_GET['mas'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.anio',$anio)
                ->where('a.precio','>=',$precio)
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->where('a.anio',$anio)
                ->where('a.precio','>=',$precio)
                ->groupBy('a.anio','mar.marca')
                ->orderBy('mar.marca','desc')
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_modelos_general'))
                ->where('a.anio',$anio)
                ->where('a.precio','>=',$precio)
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['date_anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //total del precio hasta los 100000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio')
                ->where('anio',$anio)
                ->where('precio','<=',200000)
                ->count();

            //total del precio desde 200000 hasta los 500000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio','anio')
                ->where('anio',$anio)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total del precio mas de los 500000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio','anio')
                ->where('anio',$anio)
                ->where('precio','>=',500000)
                ->count();

            //total autos nuevos
            $data['nuevos']=DB::table('autos')
                ->where('anio',$anio)
                ->where('precio','>=',500000)
                ->where('km','=',0)
                ->count();

            //total autos usados
            $data['usados']=DB::table('autos')
                ->where('anio',$anio)
                ->where('precio','>=',500000)
                ->where('km','!=',0)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('anio',$anio)
                ->where('precio','>=',$precio)
                ->count();
            return view('auto.selecciono_anio',$data);
        }


        //listo los autos segun el anio elegido osea, los filtro por el anio
        /* filtro de las marcas */
        if (isset($_GET['rango'])){
            $anio = $_GET['rango'];
            $data['auto']=DB::table('autos as a')
                ->join('provincias as pro','pro.id','=','a.id_provincia')
                ->join('img_autos as img','img.id_autos','=','a.id')
                ->join('marcas as mar','mar.id','=','a.id_marca')
                ->join('modelos as mod','mod.id','=','a.id_modelo')
                ->select('a.id','a.anio','a.precio','a.km','pro.nombre as provincia',
                    'a.titulo','img.imagen1','a.id_marca','mar.marca','mod.modelo')
                ->where('a.anio',$anio)
                ->get();

            //listo las marcas que esten disponibles con su total cada uno
            $data['marca']=DB::table('marcas as mar')
                ->join('autos as a','a.id_marca','=','mar.id')
                ->select('a.anio','mar.marca',DB::raw('COUNT(a.anio) as total_anios'))
                ->groupBy('a.anio','mar.marca')
                ->orderBy('mar.marca','desc')
                ->where('a.anio',$anio)
                ->get();

            // listo los modelos en la navegacion de la izquierda debajo de las marcas con sus totales de cada uno
            //groupBy puede agrupar mas de dos campos
            $data['modelo']=DB::table('modelos as mod')
                ->join('autos as a','a.id_modelo','=','mod.id')
                ->join('marcas as mar','mar.id','=','mod.id_marca')
                ->select('a.anio','mar.marca','mod.modelo',DB::raw('COUNT(a.anio) as total_modelos_general'))
                ->groupBy('a.anio','mar.marca','mod.modelo')
                ->orderBy('mod.modelo','desc')
                ->where('a.anio',$anio)
                ->get();

            //listo los años que esten disponibles de mayor a menor
            $data['date_anio']=DB::table('autos')
                ->select('anio',DB::raw('COUNT(anio) as total_anio'))
                ->groupBy('anio')
                ->orderBy('anio','desc')
                ->get();

            //total del precio hasta los 100000
            $data['precio_doscientos_mil']=DB::table('autos')
                ->select('precio','anio')
                ->where('anio',$anio)
                ->where('precio','<=',200000)
                ->count();

            //total del precio desde 200000 hasta los 500000
            $data['precio_quinientos_mil']=DB::table('autos')
                ->select('precio','anio')
                ->where('anio',$anio)
                ->whereBetween('precio',[200000,500000])
                ->count();

            //total del precio mas de los 500000
            $data['precio_mas_quinientos_mil']=DB::table('autos')
                ->select('precio','anio')
                ->where('anio',$anio)
                ->where('precio','>=',500000)
                ->count();

            //total autos nuevos
            $data['nuevos']=DB::table('autos')
                ->where('anio',$anio)
                ->where('km','=',0)
            ->count();

            //total autos usados
            $data['usados']=DB::table('autos')
                ->where('anio',$anio)
                ->where('km','!=',0)
                ->count();

            //el total que se muestra en el encabezado
            $data['total']=DB::table('autos')
                ->where('anio',$anio)
                ->count();
            return view('auto.selecciono_anio',$data);
        }
    }
}

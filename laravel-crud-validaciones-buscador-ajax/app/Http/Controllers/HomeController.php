<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function paginate()
    {
        $data['pro']=DB::table('products as p')
            ->join('categories as c','c.id','=','p.cat_id')
            ->select('p.id','p.name','p.description','p.price','c.cat_name','p.photo')
            ->paginate(3);
        return view('data-products',$data);
    }

    //metodo para dar los resultados de la busqueda del usuario
    public function results($palabra){

        $data=DB::table('products as p')
            ->join('categories as c','c.id','=','p.cat_id')
            ->select('p.id','p.name','p.description','p.price','c.cat_name','p.photo')
            ->where('p.name','like','%'.$palabra.'%')
            ->orderBy('p.id','desc')
            ->get();
            //importante pasarloa a array
            //->toArray();

        //y lo mandamos de esta manera, y lo capturamos desde el otro lado parseandolo
        return response()->json($data);

    }
}

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
        $data['products'] = DB::table('products as p')
                            ->join('categories as c','c.id','=','p.cat_id')
                            ->select('p.id','p.name','p.description','p.price','p.price','p.cat_id','p.photo','c.cat_name')
                            ->paginate(3);

        return view('home', $data);
    }

    //detalles del producto para comprarlo
    public function details($id)
    {
        $data['p'] = DB::table('products as p')
                    ->join('categories as c','c.id','=','p.cat_id')
                    ->select('p.id','p.name','p.description','p.price','p.price','p.cat_id','p.photo','c.cat_name')
                    ->where('p.id', $id)
                    ->first();

        return view('cart/details', $data);
    }
}

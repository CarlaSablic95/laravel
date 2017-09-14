<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
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
        //tenemos problemas con las relaciones x eloquent en la paginacion, xreso recurro al query builder
        //$product['product'] = Product::paginate(5);
        $product['product'] = DB::table('products as p')
                            ->join('categories as c','c.id','=','p.cat_id')
                            ->select('p.id','p.name','p.description','p.price','p.cat_id','p.photo','c.cat_name')
                            ->orderBy('p.id','desc')
                            ->paginate(3);
        //dd($products);
        return view('home', $product);
    }
}

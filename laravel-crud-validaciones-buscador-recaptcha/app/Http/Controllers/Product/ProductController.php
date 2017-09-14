<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RequestCreateProduct;
use App\Http\Requests\RequestUpdateProduct;
use DB;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['product'] = DB::table('products as p')
                            ->join('categories as c','c.id','=','p.cat_id')
                            ->select('p.id','p.name','p.description','p.price','p.cat_id','p.photo','c.cat_name')
                            ->paginate(3);
        return view('home', $data);
    }

    //buscador
    public function search(Request $request)
    {
        //este nos sirve por que nos dice que no se puede convertir un objeto a string
        //$query = trim($request->query);
        //este si sirve, lo toma como texto el valor del input
        $query = trim($request->input('query'));
        //dd('$query');
        if ($query != '') {
            $data['pro'] = DB::table('products as p')
                                ->join('categories as c','c.id','=','p.cat_id')
                                ->select('p.id','p.name','p.description','p.price','p.cat_id','p.photo','c.cat_name')
                                ->where('p.name','LIKE','%'.$query.'%')
                                ->get();
            //variable para ocultar la paginacion
            $data['withPaginate'] = false;
            return view('results', $data);

        }else{
            $data['pro'] = DB::table('products as p')
                                ->join('categories as c','c.id','=','p.cat_id')
                                ->select('p.id','p.name','p.description','p.price','p.cat_id','p.photo','c.cat_name')
                                ->where('p.name','LIKE','%'.$query.'%')
                                ->paginate(3);
            //variable para mostrar la paginacion
            $data['withPaginate'] = true;
            return view('results', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['category'] = Category::all();
        return view('product/create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateProduct $request)
    {
        $p = new Product();
        $p->name = $request->name;
        $p->description = $request->description;
        $p->price = $request->price;
        $p->cat_id = $request->cat_id;
        //capturo de el campo de la imagen
        $img = $request->file('photo');
        //solo entra a este bloque si no se selecciono ninguna foto
        if($img == ''){
            $imgTMP = 'sin-foto.png';
            $p->photo = $imgTMP;
            $p->save();
            Session::flash('saved','El alta del producto fue exitoso');
            return redirect('/home');
        }

        $imgTMP = time().'_'.$img->getClientOriginalName();
        Storage::disk('images')->put($imgTMP, file_get_contents($img->getRealPath()));
        
        $p->photo = $imgTMP;
        $p->save();
        Session::flash('saved','El alta del producto fue exitoso');
        return redirect('/home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['p'] = DB::table('products as p')
                    ->join('categories as c','c.id','=','p.cat_id')
                    ->select('p.id','p.name','p.description','p.price','p.cat_id','p.photo','c.cat_name')
                    ->where('p.id', $id)
                    ->first();
        return view('product/show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['p'] = Product::FindOrFail($id);
        $data['category'] = Category::all();
        return view('product/edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestUpdateProduct $request, $id)
    {
        $p = Product::FindOrFail($id);
        $p->name = $request->name;
        $p->description = $request->description;
        $p->price = $request->price;
        $p->cat_id = $request->cat_id;
        //capturo de el campo de la imagen
        $img = $request->file('photo');
        //solo entra a este bloque si no se selecciono ninguna foto
        if($img == ''){
            $p->save();
            Session::flash('updated','La modificacion del producto fue exitoso');
            return redirect('/home');
        }

        $imgTMP = time().'_'.$img->getClientOriginalName();
        Storage::disk('images')->put($imgTMP, file_get_contents($img->getRealPath()));
        //capturo el nombre de la foto antigua si este cambia, para eliminarlo
        $dropImage = $request->dropImage;
        if($dropImage != 'sin-foto.png'){
            //lo eliminamos del disco virtual
            Storage::disk('images')->delete($dropImage);
        }
        //y continua el camino
        $p->photo = $imgTMP;
        $p->save();
        Session::flash('updated','La modificacion del producto fue exitoso');
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $p = Product::FindOrFail($id);
        $dropImage = $request->dropImage;
        if ($dropImage != 'sin-foto.png') {
            Storage::disk('images')->delete($dropImage);
        }
        $p->delete();
        Session::flash('removed','El producto fue eliminado exitosamente');
        return redirect('/home');
    }
}
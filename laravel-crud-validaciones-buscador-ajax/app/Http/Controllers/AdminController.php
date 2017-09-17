<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestCreateProduct;
use App\Http\Requests\RequestUpdateProduct;
use DB;
use App\Category;
use App\Product;
use Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['pro']=DB::table('products as p')
            ->join('categories as c','c.id','=','p.cat_id')
            ->select('p.id','p.name','p.description','p.price','c.cat_name','p.photo')
            ->orderBy('p.id','desc')
            ->get();
        //tambien le mandamos el total de productos que dispone
        $data['total'] = Product::all()->count();
        return view('admin/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['cat']=Category::all();
        return view('admin/create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestCreateProduct $request)
    {
        //esta forma es solo para cuando se quiere guardar datos en texto plano son imagenes
        /*if ($request->ajax()){
            Producto::create($request->all());
            return response()->json();
        }*/

        //le decimos si la data viene por ajax
        if($request->ajax()){
            $p = new Product();
            $p->name = $request->name;
            $p->description = $request->description;
            $p->price = $request->price;
            $p->cat_id = $request->cat_id;
            
            $img = $request->file('photo');
            if($img == ''){
                $img = 'sin-foto.png';
                $p->photo = $img;
                $p->save();
                //debemos de retornar una respuesta
                return response()->json();
            }

            $imgTMP = time().'_'.$img->getClientOriginalName();
            Storage::disk('images')->put($imgTMP, file_get_contents($img->getRealPath()));
            $p->photo = $imgTMP;
            $p->save();
            //debemos de retornar una respuesta
            return response()->json();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['p']=DB::table('products as p')
            ->join('categories as c','c.id','=','p.cat_id')
            ->select('p.id','p.name','p.description','p.price','c.cat_name','p.photo')
            ->where('p.id',$id)
            ->first();
        return view('admin/show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['p']=Product::FindOrFail($id);
        $data['cat']=Category::all();
        return view('admin/edit',$data);
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
        /* esto es cuando solo trbajas con texto plano
        if ($request->ajax()){
            $pro = Producto::FindOrFail($id);
            $input = $request->all();
            $pro->fill($input)->save();
            return response()->json();
        }*/
        if($request->ajax()){
            $p = Product::FindOrFail($id);
            $p->name = $request->name;
            $p->description = $request->description;
            $p->price = $request->price;
            $p->cat_id = $request->cat_id;
            
            $img = $request->file('photo');

            //$dropImage = $request->dropImage;
            if($img == ''){
                $p->save();
                return response()->json();
            }

            $imgTMP = time().'_'.$img->getClientOriginalName();
            Storage::disk('images')->put($imgTMP, file_get_contents($img->getRealPath()));
            
            //capturo el campo oculto para la eliminacion de la imagen
            $dropImage = $request->dropImage;
            //si este cmpo es distinto de sin-foto.png sera eliminado, entra aqui soo si el usuario cambio
            //de imagen par el producto o x cosa
            if($dropImage != 'sin-foto.png'){
                Storage::disk('images')->delete($dropImage);
            }

            $p->photo = $imgTMP;
            $p->save();
            //debemos de retornar una respuesta
            return response()->json();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->ajax()){
            $p = Product::FindOrFail($id);
            $dropImage = $request->dropImage;
            if($dropImage != 'sin-foto.png'){
                Storage::disk('images')->delete($dropImage);
            }
            $p->delete();
            return response()->json();
        }
    }
}

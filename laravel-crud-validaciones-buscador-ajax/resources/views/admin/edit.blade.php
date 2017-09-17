@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-offset-3">
                <div class="panel panel-success">
                    <div class="panel panel-heading text-center"><h4>Editar producto</h4></div>
                    <div class="panel panel-body">

                        <div id="msj-edit-pro" class="alert alert-info text-center" style="display: none">
                            <strong>Producto actualizado con exito</strong>
                        </div>

                        <div class="alert alert-danger" id="errores" style="display: none"></div>

                        <form id="formEdit" action="{{ route('products.update', $p->id) }}" method="post" enctype="multipart/form-data">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <td><input type="text" name="name" value="{{ $p->name }}"></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><textarea name="description" cols="20" rows="2">{{ $p->description }}</textarea></td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td><input type="text" name="price" value="{{ $p->price }}"></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td><select name="cat_id" id="">
                                            <option value="0">Seleccionar</option>
                                        @foreach($cat as $c)
                                                <option <?php if($p->cat_id == $c->id){ echo 'selected'; } ?> value="{{ $c->id }}">{{ $c->cat_name }}</option>
                                                @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Image Actually</td>
                                    <td>
                                        <img src="/images/{{ $p->photo }}" width="80">
                                        <input type="hidden" name="dropImage" value="{{ $p->photo }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Change Image</td>
                                    <td>
                                        <input type="file" name="photo">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="submit" value="update" class="btn btn-primary btn-xs">
                                        <a href="{{ url('admin') }}" class="btn btn-info btn-xs">volver</a>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
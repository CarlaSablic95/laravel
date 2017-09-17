@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-offset-3">
                <div class="panel panel-success">
                    <div class="panel panel-heading text-center"><h4>Nuevo producto</h4></div>
                    <div class="panel panel-body">

                        <div id="msj-add-pro" class="alert alert-info text-center" style="display: none">
                            <strong>Producto agregado con exito</strong>
                        </div>
                        <div class="alert alert-danger" id="errores" style="display: none"></div>

                        <form id="formAdd" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <td><input type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><textarea name="description" cols="20" rows="2"></textarea></td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td><input type="text" name="price"></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td><select name="cat_id" id="">
                                            <option value="0">Seleccionar</option>
                                        @foreach($cat as $c)
                                                <option value="{{ $c->id }}">{{ $c->cat_name }}</option>
                                                @endforeach
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td><input type="file" name="photo"></td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">
                                        {{ csrf_field() }}
                                        <input type="submit" value="save" class="btn btn-primary btn-xs">
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
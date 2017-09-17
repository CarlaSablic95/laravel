@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-offset-3">
                <div class="panel panel-success">
                    <div class="panel panel-heading text-center"><h4>Eliminar producto</h4></div>
                    <div class="panel panel-body">

                        <div id="msj-delete-pro" class="alert alert-info text-center" style="display: none">
                            <strong>Producto actualizado con exito</strong>
                        </div>

                        <div class="alert alert-danger" id="errores" style="display: none"></div>

                        <form id="formDelete" action="{{ route('products.destroy', $p->id) }}" method="post" enctype="multipart/form-data">
                            <table class="table table-striped">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $p->name }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $p->description }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $p->price }}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{ $p->cat_name }}</td>
                                </tr>
                                <tr>
                                    <td>Image</td>
                                    <td>
                                        <img src="/images/{{ $p->photo }}" width="80">
                                        <input type="hidden" name="dropImage" value="{{ $p->photo }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-center" colspan="2">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" value="delete" class="btn btn-primary btn-xs">
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
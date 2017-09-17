@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel panel-heading text-center"><h3>Bienvenido al panel de administracion</h3></div>
                    <div class="panel panel-body">
                        <table class="table table-striped">
                            <tr>
                                <th>nmae</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Photo</th>
                                <th class="text-center" colspan="7">
                                    <a href="{{ route('products.create') }}" class="btn btn-success">
                                        NEW
                                    </a>
                                </th>
                            </tr>
                            @foreach($pro as $p)
                                <tr>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ str_limit($p->description, 50) }}</td>
                                    <td>{{ $p->price }}</td>
                                    <td>{{ $p->cat_name }}</td>
                                    <td><img src="/images/{{ $p->photo }}" width="80"></td>
                                    <td>
                                        <a href="{{ route('products.edit',$p->id) }}" class="btn btn-info">E</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('products.show',$p->id) }}" class="btn btn-danger">X</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" class="text-center">
                                    <strong>{{ $total }}</strong> productos disponibles</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Detalle del producto</div>

                <div class="panel-body">
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
                            <td>$ {{ $p->price }}</td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td>{{ $p->cat_name }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img src="/images/{{ $p->photo }}" width="80"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" class="text-center">
                        		<a href="/cart/add/{{ $p->id }}" class="btn btn-primary btn-xs">comprar</a>
                        		<a href="/home" class="btn btn-info btn-xs">volver</a>
                        	</td> 
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

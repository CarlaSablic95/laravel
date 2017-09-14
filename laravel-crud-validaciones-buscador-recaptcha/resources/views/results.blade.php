@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Productos Disponibles</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Photo</th>
                            <!-- si esta logueado y es admin puede ver estos botones para hacer el CRUD -->
                            @if(auth()->check() && auth()->user()->role == 'admin')
                                <th colspan="2" class="text-center">
                                    <a href="{{ route('products.create') }}" class="btn btn-success btn-xs">add</a>
                                </th>
                            @endif
                        </tr>
                        @foreach($pro as $p)
                        <tr>
                            <td>{{ $p->name }}</td>
                            <!-- si esta logueado y es admin puede ver la descripcion resumida -->
                            @if(auth()->check() && auth()->user()->role == 'admin')
                                <td>{{ str_limit($p->description, 60) }}</td>
                            @else
                                <td>{{ $p->description }}</td>
                            @endif
                            <td>{{ $p->price }}</td>
                            <!-- ahi 'category' es la funcion(metodo) y forma en la q nosostros relacionamos el
                            producto con la categoria, no es cualquier nombre 
                            esta linea funciona pero para la paginacion hay problemas -->
                            <!-- <td><?php// $p->category->cat_name ?></td> -->
                            <td>{{ $p->cat_name }}</td>
                            <td><img src="/images/{{ $p->photo }}" width="80"></td>
                            <!-- si esta logueado y es admin puede ver estos botones para hacer el CRUD -->
                            @if(auth()->check() && auth()->user()->role == 'admin')
                                <td><a href="{{ route('products.edit', $p->id) }}" class="btn btn-primary btn-xs">Edit</a></td>
                                <td><a href="{{ route('products.show', $p->id) }}" class="btn btn-danger btn-xs">Delete</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
                @if($withPaginate)
                <div class="panel-footer text-center">
                    {{ $pro->links() }}
                </div>
                @else
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

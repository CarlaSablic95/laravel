@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Productos disponibles</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Details</th>
                        </tr>
                        @foreach($products as $p)
                        <tr>
                            <td>{{ $p->name }}</td>
                            <td>{{ str_limit($p->description, 50) }}</td>
                            <td>{{ $p->price }}</td>
                            <td>{{ $p->cat_name }}</td>
                            <td><img src="images/{{ $p->photo }}" width="80"></td>
                            <td>
                                <a href="/details/{{ $p->id }}" class="btn btn-info btn-xs">ver detalles</a>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" class="text-center">
                                {{ $products->links() }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

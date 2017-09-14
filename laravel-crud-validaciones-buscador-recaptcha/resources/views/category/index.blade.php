@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                
                <!-- mensajes flash -->
                @include('messages.messages')

                <div class="panel-heading text-center">Categorias Disponibles</div>

                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <!-- si esta logueado y es admin puede ver estos botones para hacer el CRUD -->
                            @if(auth()->check() && auth()->user()->role == 'admin')
                                <th colspan="2" class="text-center">
                                    <a href="{{ route('categories.create') }}" class="btn btn-success btn-xs">add</a>
                                </th>
                            @endif
                        </tr>
                        @foreach($category as $c)
                        <tr>
                            <td>{{ $c->cat_name }}</td>
                            <!-- si esta logueado y es admin puede ver estos botones para hacer el CRUD -->
                            @if(auth()->check() && auth()->user()->role == 'admin')
                                <td><a href="{{ route('categories.edit', $c->id) }}" class="btn btn-primary btn-xs">Edit</a></td>
                                <td><a href="{{ route('categories.show', $c->id) }}" class="btn btn-danger btn-xs">Delete</a></td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

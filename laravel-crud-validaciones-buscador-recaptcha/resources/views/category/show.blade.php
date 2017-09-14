@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Eliminar una categoria</div>

                <div class="panel-body">
                    <form action="{{ route('categories.destroy', $c->id) }}" method="POST">
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <td>{{ $c->cat_name }}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="delete">
                                    <a href="/categories" class="btn btn-info btn-xs">volver</a>
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
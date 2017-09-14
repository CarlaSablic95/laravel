@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Alta de un nuevo producto</div>

                <div class="panel-body">
                    
                    <form action="{{ route('products.destroy', $p->id) }}" method="POST" onsubmit="return removed()">
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
                                <th>Image Actually</th>
                                <td>
                                    <img src="/images/{{ $p->photo }}" width="80">
                                    <input type="hidden" name="dropImage" value="{{ $p->photo }}">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-primary btn-md" value="delete">
                                    <a href="/home" class="btn btn-info btn-md">volver</a>
                                </td>
                            </tr>
                        </table>
                    </form>
                        
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    window.onload = function(){
        function removed(){
            if(confirm('Esta seguro que lo quiere eliminar?')){
                return true;
            }
            window.location= '/home';
            return false;
        }
    }
</script>
@endsection
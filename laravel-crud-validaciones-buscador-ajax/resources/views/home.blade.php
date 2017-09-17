@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h4>Listado de todos nuestros productos disponibles</h4>
                </div>

                <div class="panel-heading text-center">
                    <form>
                        <label for="bus">Buscar producto
                        <input type="text" id="bus" class="form-control query" name="query" size="50">
                    </form>
                </div>

                <div class="panel-body">
                   <div id="paginate"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

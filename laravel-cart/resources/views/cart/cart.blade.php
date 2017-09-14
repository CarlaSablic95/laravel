@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if(empty($cart))
            <div class="alert alert-danger text-center">
                <b>TU CARRITO DE COMPRAS SE ENCUENTRA VACIO :(</b><br>
                <strong class="text-center">
                    <a href="{{ url('/home') }}" class="btn btn-primary btn-xs">volver</a>
                </strong>
            </div>
            @else
            <div class="panel panel-primary">
                <div class="panel panel-heading text-center">
                    <b>BIENVENIDO A TU CARRITO DE COMPRAS :)</b><br>
                    <strong class="text-center">
                        <a href="{{ url('/cart/clean') }}" class="btn btn-danger">vaciar carrito</a>
                    </strong>
                </div>
                <div class="panel panel-body">
                    <table class="table table-striped">
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Photo</th>
                            <th class="text-center">
                                <a href="{{ url('/home') }}" class="btn btn-info btn-xs">NEW</a>
                            </th>
                        </tr>
                        @foreach($cart as $c)
                        <tr>
                            <td>{{ $c->name }}</td>
                            <td>{{ str_limit($c->description, 100) }}</td>
                            <td style="width: 100px">$ {{ $c->price * $c->quantity}}</td>
                            <td style="width: 100px">
                                <input style="width:50px" id="product_{{ $c->id }}" type="number" value="{{ $c->quantity }}">
                                <a href="{{ url('cart/edit', $c->id) }}" data-id="{{ $c->id }}" class="btn btn-primary btn-xs btn-editar">E</a>
                            </td>
                            <td><img src="/images/{{ $c->photo }}" width="80"></td>
                            <td>
                                <a href="{{ url('cart/remove', $c->id) }}" class="btn btn-danger btn-xs">QUITAR</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="alert alert-info text-center"><b>Total a pagar: </b>$ {{$total}}</div>
                </div>
            @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        $('.btn-editar').click(function(e){
            e.preventDefault();
            var ruta = $(this).attr('href');
            var id = $(this).data('id');
            var cantidad = $('#product_' + id).val();
            if(cantidad <= 0){
                return;
            }else{
                window.location.href = ruta + "/" + cantidad;
            }
        })
    </script>
@endpush
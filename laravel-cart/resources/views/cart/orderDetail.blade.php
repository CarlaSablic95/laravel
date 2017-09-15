@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-primary">
                <div class="panel panel-heading text-center">
                    <b>DETALLE DEL PEDIDO</b><br>
                </div>
                <!-- <div class="panel panel-body"> -->
                    <div class="page">
                        <h3 class="text-center">Datos del usuario</h3>
                        <table class="table table-striped text-center">
                            <tr class="text-center">
                                <th>Name:</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="page">
                        <table class="table table-striped">
                            <h3 class="text-center">Datos del pedido</h3>
                            <tr>
                                <th>Name</th>
                                <!-- <th>Description</th> -->
                                <th>Price</th>
                                <th>Sub Total</th>
                                <th>Quantity</th>
                                <th>Photo</th>
                            </tr>
                            @foreach($cart as $c)
                            <tr>
                                <td>{{ $c->name }}</td>
                                <td style="width: 100px">$ {{ $c->price}}</td>
                                <td style="width: 100px">$ {{ $c->price * $c->quantity}}</td>
                                <td style="width: 100px">{{ $c->quantity }}</td>
                                <td><img src="/images/{{ $c->photo }}" width="80"></td>
                            </tr>
                            @endforeach
                         </table>
                    </div>

                    <div class="alert alert-info text-center">
                        <b>Total a pagar: </b>$ {{ number_format($total, 2) }}
                    </div>
                    <div class="alert alert-info text-center">
                        <a href="{{ url('cart/show') }}" class="btn btn-info btn-md">regresar</a>
                        <a href="/home" class="btn btn-primary btn-md">Seguir comprando</a>
                        <a href="{{ route('payment') }}" class="btn btn-success btn-md">Pagar con Paypal</a>
                    </div>
                <!-- </div> -->

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
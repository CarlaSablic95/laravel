@extends('layouts.master')
@section('title')
    Publicación exitosa
@endsection
@section('content')
    <br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="contenedor-img-success">
                            <div class="img-success">
                                <img class="img-responsive success1" src="/img/success.jpg" alt="">
                                <img class="img-responsive success1" src="/img/success-car.jpeg" alt="">
                            </div>
                            <div class="mensaje-success">
                                Su vehiculo se publicó correctamente, puede seguir publicando
                                o bien ingresar a su cuenta para ver sus datos y su publicación
                            </div>
                            <div class="links-success">
                                <a href="{{ url('publicar/seleccion') }}" class="btn btn-primary negrita">Seguir publicando</a>
                                <a href="{{ url('/login') }}" class="btn btn-primary negrita">Ver mi publicación</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
@endsection

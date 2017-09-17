@extends('layouts.master')
@section('title')
    Ingresar a mi cuenta
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="contenido-pregunta">
                    <div class="tipo-pregunta">
                        <div class="contenido-logo-verificacion">
                            <img class="img-responsive" src="/img/índice.png" alt="">
                        </div>
                        <p class="aviso">Para vender, necesitas una cuenta</p>
                        <span><a class="btn btn-info" href="{{ url('/publicar/seleccion') }}">Soy nuevo</a></span>
                        <span class="tiene-cuenta"><a href="{{ url('/register/login') }}">ya tengo cuenta</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
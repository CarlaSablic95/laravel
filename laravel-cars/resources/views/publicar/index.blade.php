@extends('layouts.master')
@section('title')
    Elige qué publicas
    @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="seleccionar-tipos">
                    <div class="tipos">
                        <span class="sub-links activo">Elige que quieres publicar</span>
                        <span class="sub-links segundo">Describe tu producto</span>
                        <span class="sub-links tercero">Registrate y confirma</span>
                    </div>
                    <div class="img-tipos">
                        <a href="{{ url('/publicar/vehiculo') }}">
                            <div class="cubo autos">
                                <p class="title-tipos negro">Vehículos</p>
                                <img class="img-responsive" src="/img/autos.jpg" alt="Autos">
                            </div>
                        </a>
                        <a href="">
                            <div class="cubo motos">
                                <p class="title-tipos rojo">Motos</p>
                                <img class="img-responsive" src="/img/motos.jpg" alt="Motos">
                            </div>
                        </a>
                        <a href="">
                            <div class="cubo otros">
                                <p class="title-tipos violeta">Productos y otros</p>
                                <img class="img-responsive" src="/img/accesorios.png" alt="Motos">
                            </div>
                        </a>
                    </div>
                    <p class="question">
                        Asegúrate de que tu publicación cumpla con las Políticas de <a href="{{ url('/') }}">cars.com.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
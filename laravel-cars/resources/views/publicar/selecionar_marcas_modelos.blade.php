@extends('layouts.master')
@section('title')
    Seleccioná la categoria
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

                        <div class="caja-vehiculo">
                            <p class="title-tipos negro">Vehículos</p>
                            <img class="img-responsive img-vehiculo" src="/img/autos.jpg" alt="Autos">
                        </div>

                        <form id="formMarcaModelo" action="{{ url('/publicar/vehiculo') }}" method="get">
                            <div class="select">
                                <select name="marca" id="marca_cars" class="select-modelo">
                                    <option class="opciones" value="">Seleccioná tu marca</option>
                                    @foreach($marcas as $m)
                                        <option class="opciones" value="{{ $m->id }}">{{ strtolower($m->marca ) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="select">
                                <div class="caja-img-ajax">
                                    <img id="imgAjaxModelos" src="/img/ajax-loader.gif" alt="" style="display: none">
                                </div>
                                <select name="modelo" id="modelo_cars" class="select-modelo">

                                </select>
                            </div>

                            <div class="select continuar" style="display: none">
                                <div class="ok text-center">
                                    <img class="img-responsive" src="/img/ok.png">
                                    <h3 class="text-center ">¡Listo!</h3>
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-info">Continuar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <p class="question">
                        Asegúrate de que tu publicación cumpla con las Políticas de <a href="{{ url('/') }}">cars.com.</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
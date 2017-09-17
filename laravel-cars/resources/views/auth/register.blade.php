@extends('layouts.master')
@section('title')
    Registrate y publicá
@endsection
@section('content')
    <br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-sm-offset-1 col-md-offset-2">
            <div class="panel panel-default">
                <div class="text-center"><h4>Regístrate</h4></div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="col-sm-12{{ $errors->has('nombre') ? ' has-error' : '' }} col-md-6">
                            <div class="col-md-12">
                                <label for="name" class="col-md-4 letra-small">Nombre</label>
                                <input id="name" type="text" class="borde-invisible" name="nombre" value="{{ old('nombre') }}" maxlength="30">
                                @if ($errors->has('nombre'))
                                    <span class="help-block letra-small">
                                        <span>{{ $errors->first('nombre') }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-sm-12{{ $errors->has('apellido') ? ' has-error' : '' }} col-md-6">
                            <div class="col-md-12">
                                <label for="last_name" class="col-md-4 letra-small">Apellido</label>
                                <input id="last_name" type="text" class="borde-invisible" name="apellido" value="{{ old('apellido') }}" maxlength="30">

                                @if ($errors->has('apellido'))
                                    <span class="help-block letra-small">
                                        <span>{{ $errors->first('apellido') }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-12{{ $errors->has('dni') ? ' has-error' : '' }} col-md-6">
                            <div class="col-md-12">
                                <label for="dni" class="col-md-12 letra-small">DNI</label>
                                <input id="dni" type="text" class="borde-invisible" name="dni" value="{{ old('telefono') }}" placeholder="   Ingresa tu DNI" maxlength="8">

                                @if ($errors->has('dni'))
                                    <span class="help-block letra-small">
                                        <span>{{ $errors->first('dni') }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group  col-sm-12{{ $errors->has('email') ? ' has-error' : '' }} col-md-6">
                            <div class="col-md-12">
                                <label for="email" class="col-md-4 letra-small">E-Mail</label>
                                <input id="email" type="email" class="borde-invisible" name="email" value="{{ old('email') }}" placeholder="   nombre@ejemplo.com" maxlength="50">

                                @if ($errors->has('email'))
                                    <span class="help-block letra-small">
                                        <span>{{ $errors->first('email') }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-sm-12{{ $errors->has('password') ? ' has-error' : '' }} col-md-6">
                            <div class="col-md-12">
                                <label for="password" class="col-md-4 letra-small">Password</label>
                                 <input id="password" type="password" class="borde-invisible" name="password" placeholder="   usa entre 6 y 20 caracteres" min="6" max="20">

                                @if ($errors->has('password'))
                                    <span class="help-block letra-small">
                                        <span>{{ $errors->first('password') }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group col-sm-12 col-md-6">
                            <div class="col-md-12">
                                <label for="password-confirm" class="col-md-12 letra-small">Confirmar Password</label>
                                <input id="password-confirm" type="password" class="borde-invisible" name="password_confirmation" placeholder="   repetir password" min="6" max="20">
                            </div>
                        </div>

                        <div class="pull-left" style="margin-top: 30px">
                            <div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
                               <p class="letra-small">Al registrarme, declaro que soy mayor de edad y acepto los <a href="#">Terminos y condiciones</a>
                               y las <a href="#">Políticas de privacidad</a> de CARS.com
                               </p>
                            </div>

                            <div class="pull-right">
                                <div class="col-xs-12 col-md-12">
                                    <input type="hidden" name="tipo" value="user">
                                    <button type="submit" class="btn btn-primary">
                                        Registrarme
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <br><br><br><br><br>
@endsection
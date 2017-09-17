@extends('layouts.master')
@section('title')
    Ingresar a mi cuenta
@endsection
@section('content')
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-3 col-lg-offset-3">
                <div class="panel panel-default">
                    <div class="text-center"><h4>Publicar un articulo</h4></div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                            <div class="form-group  col-sm-12{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                                <div class="col-md-8 col-md-offset-2">
                                    <label for="email" class="col-md-4 letra-small">E-Mail</label>
                                    <input id="email" type="email" class="borde-invisible" name="email" value="" maxlength="50">

                                    @if ($errors->has('email'))
                                        <span class="help-block letra-small">
                                    <span>{{ $errors->first('email') }}</span>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-sm-12{{ $errors->has('password') ? ' has-error' : '' }} col-md-12">
                                <div class="col-md-8 col-md-offset-2">
                                    <label for="password" class="col-md-4 letra-small">Password</label>
                                    <input id="password" type="password" class="borde-invisible" name="password" min="6" max="20">

                                    @if ($errors->has('password'))
                                        <span class="help-block letra-small">
                                    <span>{{ $errors->first('password') }}</span>
                                </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-md-8 col-md-offset-2">
                                    <div class="checkbox pull-left letra-small">
                                        <label>
                                            <input type="checkbox" name="remember"> &nbsp; Recordarme
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="" style="margin-top: 30px">
                                <div class="col-xs-12 col-sm-12 col-md-9 col-md-offset-2 col-lg-9">
                                    <button type="submit" class="btn btn-primary">
                                        Ingresar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer text-center">
                        <a class="btn btn-link letra-small" href="{{ url('/password/reset') }}">
                            Olvidaste tu contraseña?
                        </a>
                        <p class="letra-small">Aún no tienes cuenta?
                            <span>
                                <a href="{{ url('/register') }}" class="btn btn-info">Registrate y publicá</a>
                            </span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
@endsection

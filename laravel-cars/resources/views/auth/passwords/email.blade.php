@extends('layouts.master')

@section('content')
    <br><br><br><br><br><br><br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-sm-offset-1 col-md-offset-3 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="text-center"><h4>Recuperar contraseña</h4></div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group  col-sm-12{{ $errors->has('email') ? ' has-error' : '' }} col-md-12">
                            <div class="col-md-8 col-md-offset-2">
                                <label for="email" class="col-md-4 letra-small">E-Mail</label>
                                <input id="email" type="email" class="borde-invisible" name="email" value="{{ old('email') }}" maxlength="50">

                                @if ($errors->has('email'))
                                    <span class="help-block letra-small">
                                        <span>{{ $errors->first('email') }}</span>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="" style="margin-top: 30px">
                            <div class="col-xs-12 col-sm-12 col-md-9 col-md-offset-2 col-lg-9">
                                <button type="submit" class="btn btn-primary">resetear</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
    <br><br><br><br><br>
    <br><br><br><br>
@endsection
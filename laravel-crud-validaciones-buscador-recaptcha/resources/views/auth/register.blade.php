@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form id="form_register" class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="g-recaptcha" data-sitekey="6LfKGxIUAAAAADVm5XkpBm56i2GXEiTVAW5nySmK"></div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block" style="color: darkred">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <input type="submit" class="btn btn-primary" value="Register">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        //solo anda si todo el documento esta cargado
        $(function(){
            //capturo la form y le digo que este a la escucha de un click
            $('#form_register').on('click',function(e){
                //alert('entro');
                //capturo si el recaptcha fue completado por el usuario
                let verified = grecaptcha.getResponse();
                //y verifique si el campo es mayor a 0
                if(verified.length === 0){
                    //si entra aqui es porque no hiciceron checked sobre ello
                    e.preventDefault();
                }else{
                    //si entro acá, es porque todo los campos del form estan llenos y se envia o procesa el form
                    $(this).submit();
                }
            });
        });

        /*************************** importante **************************/
        /*debemos de instalar el paquete guzzle para que esto funcione con el siguiente comando por console
        - composer require guzzlehttp/guzzle
        - instalamos ese paquete para hacer una validacion del recaptcha del lado del servidor(mas seguridad)
        visitar: http://docs.guzzlephp.org/en/stable/ para mas info.
        */

    </script>
@endpush
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>formulario de contacto</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/app.css">

    </head>
    <body>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-4 center-block" style="float: none">
                <h2 class="text-center">Formulario de contacto</h2>
                <h4 class="text-center">Envio de correo Gmail</h4>
                    <form action="{{ route('mails.store') }}" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Ingrese su nombre">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" placeholder="Ingrese su correo">
                        </div>
                        <div class="form-group">
                            <textarea name="consulta" cols="20" rows="3" class="form-control" placeholder="Ingrese su comentario"></textarea>
                        </div>
                        {{ csrf_field() }}
                        <input type="submit" value="enviar" class="form-control btn btn-primary">
                    </form>
                    @if(Session::has('success'))
                        <br>
                        <p class="text-center alert alert-info">{{ Session::get('success') }}</p>
                    @endif
                </div>
            </div>
        </div>
           
    </body>
</html>

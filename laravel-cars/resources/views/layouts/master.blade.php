<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/img/logo.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/normalize.css">
    <link href="/css/app.css" rel="stylesheet">
    <!--  slide show index-->
    <link rel="stylesheet" href="/css/slideIndex.css">
    <link rel="stylesheet" href="/css/carrusel.css">
    <!-- end slide -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <!-- btn ir arriba -->
    <link rel="stylesheet" href="/ir_arriba/arriba.css">
    <link rel="stylesheet" href="/ir_arriba/estilos.css">
    <!-- fin btn ir arriba -->
    <!-- slide de la vista del auto solo -->
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">

        <nav class="navbar navbar-default navbar-static-top" style="background-color: #051426;" id="nav-principal">
            <div class="container">

                <div class="navbar-header relleno">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse-1">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" id="logo" href="{{ url('/') }}"><i class="fa fa-car" aria-hidden="true"></i>
                        CARS</a>
                    <div class="subir">
                        <form id="formBuscar" action="{{ url('selected') }}" method="get" role="search" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group col-xs-8 col-sm-10 col-md-11 col-lg-5 mark-input">
                                <input id="input-marca" name="marca" type="text" class="form-control" placeholder="Ingresá la marca">
                            </div>
                            <div class="form-group col-xs-8 col-sm-10 col-md-11 col-lg-5 model-input">
                                <input id="input-modelo" name="modelo" type="text" class="form-control" placeholder="Ingresá el modelo">
                            </div>
                            <div class="form-group col-xs-1 col-sm-2 col-md-1 col-lg-2 acercar">
                                <button type="submit" title="Buscar">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse-1">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-left bajar">
                        <li class="link"><a href="{{ url('/autos') }}">Autos</a></li>
                        <li class="link"><a href="{{ url('/motos') }}">Motos</a></li>
                        <li class="link"><a href="{{ url('/otros') }}">Articulos y otros</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right mover-derecha">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="link"><a href="{{ url('/login') }}"><i class="fa fa-user" aria-hidden="true"></i>
                                    Ingresar</a></li>
                            <li class="link"><a href="{{ url('/register') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>
                                    Registrarse</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->nombre.' '.Auth::user()->apellido }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>

    <div id="footer">
    <!-- listas de lo que hay -->
        <div class="listado-footer col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="caja-1 col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <span class="title-logo"><i class="fa fa-car" aria-hidden="true"></i> CARS.com</span>
                <p class="logo-sugerencias"><a href="#">Programa para concesionarias</a></p>
                <p class="logo-sugerencias"><a href="#">Seguridad</a></p>
                <p class="logo-sugerencias"><a href="#">MediaKit</a></p>
                <div class="redes-sociales">
                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="caja- col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <h4>Autos nuevos</h4>
                <ul class="lista-nuevos">
                    <li><a href="">Fiat</a></li>
                    <li><a href="">Ford</a></li>
                    <li><a href="">Peugeot</a></li>
                    <li><a href="">Renault</a></li>
                    <li><a href="">Volkswagen</a></li>
                    <li><a href="">BMW</a></li>
                    <li><a href="">Toyota</a></li>
                    <li><a href="">Chevrolet</a></li>
                </ul>
            </div>
            <div class="caja-1 col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <h4>Autos usados</h4>
                <ul class="lista-nuevos">
                    <li><a href="">Fiat</a></li>
                    <li><a href="">Ford</a></li>
                    <li><a href="">Peugeot</a></li>
                    <li><a href="">Renault</a></li>
                    <li><a href="">Volkswagen</a></li>
                    <li><a href="">BMW</a></li>
                    <li><a href="">Toyota</a></li>
                    <li><a href="">Chevrolet</a></li>
                </ul>
            </div>
            <div class="caja-1 col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <h4>Motos</h4>
                <ul class="lista-nuevos">
                    <li><a href="">Fiat</a></li>
                    <li><a href="">Ford</a></li>
                    <li><a href="">Peugeot</a></li>
                    <li><a href="">Renault</a></li>
                    <li><a href="">Volkswagen</a></li>
                    <li><a href="">BMW</a></li>
                    <li><a href="">Toyota</a></li>
                    <li><a href="">Chevrolet</a></li>
                </ul>
            </div>
            <div class="caja-1 col-xs-6 col-sm-2 col-md-2 col-lg-2">
                <h4>Otros</h4>
                <ul class="lista-nuevos">
                    <li><a href="">Fiat</a></li>
                    <li><a href="">Ford</a></li>
                    <li><a href="">Peugeot</a></li>
                    <li><a href="">Renault</a></li>
                    <li><a href="">Volkswagen</a></li>
                    <li><a href="">BMW</a></li>
                    <li><a href="">Toyota</a></li>
                    <li><a href="">Chevrolet</a></li>
                </ul>
            </div>
        </div>
        <!-- findel listado -->
    <!-- footer -->
        <div class="footer col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <span>Copyright &copy 2015 - <?php echo date('Y'); ?> CARS.com S.R.L. </span>
            <div class="redes-sociales pull-right col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a>
            </div>
            <span class="footer-descripcion">El uso de este sitio web implica la aceptación de los Términos y Condiciones y de las Políticas de Privacidad de cars.com, creado por <strong> Cristian Veizaga </strong> </span>
        </div>
        <!--  fin footer-->
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <!-- script slide index -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/jquery.flexisel.js"></script>
    <!-- end slide -->
    <!-- ir arriba boton -->
    <script src="/ir_arriba/arriba.js"></script>
    <!-- fin arriba btn -->
    <!-- editor de texto para la descripcion -->
    <script src="/tinymce/tinymce.min.js"></script>
    <script src="/tinymce/init-tinymce.js"></script>
    <!-- fin editor -->
    <script src="/js/autos.js"></script>
    <script src="/js/slider_cars.js"></script>

    <script>
        var listarModelos = "{{ url('/listar/modelos') }}";
        var imagen1 = "{{ url('/imagen') }}";
        var imagen2 = "{{ url('/imagen2') }}";
        var imagen3 = "{{ url('/imagen3') }}";
        var imagen4 = "{{ url('/imagen4') }}";
        var imagen5 = "{{ url('/imagen5') }}";
        var imagen6 = "{{ url('/imagen6') }}";
        var imagen7 = "{{ url('/imagen7') }}";
        var dropImagen1 = "{{ url('/dropImagen') }}";
        var dropImagen2 = "{{ url('/dropImagen2') }}";
        var dropImagen3 = "{{ url('/dropImagen3') }}";
        var dropImagen4 = "{{ url('/dropImagen4') }}";
        var dropImagen5 = "{{ url('/dropImagen5') }}";
        var dropImagen6 = "{{ url('/dropImagen6') }}";
        var dropImagen7 = "{{ url('/dropImagen7') }}";
        /* listar departamentos y localidades */
        var getDepartamentos = "{{ url('/getDepartamentos') }}";
        var getLocalidades = "{{ url('/getLocalidades') }}";

        /* registro y confirmacion */
        var registroYconfirmacion = '{{ url('publicar/vehiculo/confirmacion') }}';
    </script>
    <script src="/js/publicar.js"></script>
    @stack('script')
</body>
</html>
@extends('layouts.master')
@section('title','CARS/encontrá tu auto')
@section('content')
<!-- booton de ir arriba -->
    <span class="ir-arriba icon-keyboard_arrow_up"></span>
<!-- fin del booton de ir arriba -->
<!-- Slider index Container -->
<section class="slider-container">
    <ul id="slider" class="slider-wrapper">
        <li class="slide-current">
            <img class="img-responsive" src="/img/2.jpg" alt="">
        </li>
        <li>
            <img class="img-responsive" src="/img/1.jpg" alt="">
        </li>
        <li>
            <img class="img-responsive" src="/img/3.jpg" alt="">
        </li>
        <li>
            <img class="img-responsive" src="/img/6.jpg" alt="">
        </li>
    </ul>
    <!-- Controles -->
    <ul id="slider-controls" class="slider-controls"></ul>
</section>
<!-- fin slider index -->
<br>
<!-- publicar -->
<div class="panel panel-footer">
    <div class="text-center">
        <span class="sin-cuenta">Publica tu vehiculo </span>
        <a href="{{ url('/verificacion/login') }}" class="btn btn-primary">Publicar</a>
    </div>
</div>
<!-- fin publicar -->
<!-- buscador avanzado -->
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-footer text-center buscador-avanzado">
                <h4 class="title-buscador">Autos 0km, Autos usados y Motos</h4>
            </div>
            <div class="buscador-avanzado fondo-buscador">
                <form action="" class="form-group">
                    <select name="" id="" class="form-control select-buscador">
                        <option value="0">Autos y Motos</option>
                        <option value="1">Autos nuevos</option>
                        <option value="2">Autos usados</option>
                        <option value="3">Motos</option>
                    </select>
                    <select name="" id="" class="form-control select-buscador">
                        <option value="0">Todas las marcas</option>
                    </select>
                    <select name="" id="" class="form-control select-buscador">
                        <option value="0">Todos los modelos</option>
                    </select>

                    <p class="borde-buscador"></p>
                    <p class="pesos-buscador">T. de moneda: $</p>
                    <p class="input-buscador">desde: <input class="input-etiqueta" type="text" name="desde" placeholder="  indistinto" maxlength="8"></p>
                    <p class="input-buscador">hasta: <input class="input-etiqueta" type="text" name="hasta" placeholder="  indistinto" maxlength="8"></p>
                    <p class="borde-buscador"></p>

                    <p class="anio-buscador">Año</p>
                    <p class="letras-buscador">desde:
                        <select name="" id="" class="form-control select-buscador-anio">
                            <option value="0">desde</option>
                        </select>
                    </p>
                    <p class="letras-buscador">hasta:
                        <select name="" id="" class="form-control select-buscador-anio">
                            <option value="0">hasta</option>
                        </select>
                    </p>
                    <p class="borde-buscador"></p>

                    <div class="caja-btn-submit text-center">
                        <button type="submit" class="btn btn-primary">Búscar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- fin buscador avanzado -->
<!-- imagen de regalos y cuenta y tipos de pagos y seguridad -->
<div class="centrar-regalos">
    <img class="img-responsive" src="/img/regalos.png" alt="">
</div>
<div class="panel panel-footer text-center">
    <span class="sin-cuenta">¿Aún no tienes cuenta? </span>
    <a href="{{ url('/register') }}" class="btn btn-primary">Registrate gratis</a>

    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <p class="title-pago">Paga online</p>
                    <div class="img-pago"><img class="img-responsive" src="/img/information.png" alt=""></div>
                    <span class="desc-pago">Usa Mercado Pago ó Paypal la solución de cars para pagar de forma segura en hasta 12 cuotas sin interés y con el medio de pago que prefieras. </span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <p class="title-pago">Recibe el producto</p>
                    <div class="img-pago"><img class="img-responsive" src="/img/information-shipping.png" alt=""></div>
                    <span class="desc-pago">Calcula el costo y tiempo de entrega con cars Envíos en cada publicación. Págalo con Mercado Pago, ¡el envío es más barato y está asegurado! </span>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <p class="title-pago">Compra Protegida</p>
                    <div class="img-pago"><img class="img-responsive" src="/img/information-segura.png" alt=""></div>
                    <span class="desc-pago">Recibe el producto que esperabas o te devolvemos tu dinero. Paga a través de Mercado Pago y disfruta la tranquilidad de comprar seguro. </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- fin regalos y cuenta-->

<div class="img-concesionaria text-center">
    <img class="img-responsive" src="/img/bg-concesionaria.jpg" alt="">
    <p class="title-concesionaria">¿Sos concesionaria? Asesorate sin cargo.</p>
    <p class="desc-concesionaria">Las mejores concesionarias del país confían en nosotros. <br>
        ¡Formá parte de esta experiencia!</p>
    <a href="#" class="btn btn-info link-concesionaria">Contactate con un representante</a>
</div>

<!-- slide de autos index -->
<div class="feature_sec" id="hidden-slide-cars-index">
    <div class="container">
        <div class="feature_head">
            <h3 class="title-slide">Autos Destacados</h3>
            <span></span>
        </div>
        <ul id="flexiselDemo3">
            <li>
                <div class="biseller-column">
                    <a href="#"><img src="images/pic6.jpg" alt=""/></a>
                    <div class="contenido-slide">
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra. </p>
                    </div>
                    <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
                </div>
            </li>
            <li>
                <div class="biseller-column">
                    <a href="#"><img src="images/pic5.jpg" alt=""/></a>
                    <div class="contenido-slide">
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra. </p>
                    </div>
                    <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
                </div>
            </li>
            <li>
                <div class="biseller-column">
                    <a href="#"><img src="images/pic8.jpg" alt=""/></a>
                    <div class="contenido-slide">
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra. </p>
                    </div>
                    <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
                </div>
            </li>
            <li>
                <div class="biseller-column">
                    <a href="#"><img src="images/pic4.jpg" alt=""/></a>
                    <div class="contenido-slide">
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra. </p>
                    </div>
                    <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
                </div>
            </li>
            <li>
                <div class="biseller-column">
                    <a href="#"><img src="images/pic6.jpg" alt=""/></a>
                    <div class="contenido-slide">
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra. </p>
                    </div>
                    <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
                </div>
            </li>
            <li>
                <div class="biseller-column">
                    <a href="#"><img src="images/pic5.jpg" alt=""/></a>
                    <div class="contenido-slide">
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra. </p>
                    </div>
                    <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
                </div>
            </li>
            <li>
                <div class="biseller-column">
                    <a href="#"><img src="images/pic8.jpg" alt=""/></a>
                    <div class="contenido-slide">
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra. </p>
                    </div>
                    <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
                </div>
            </li>
            <li>
                <div class="biseller-column">
                    <a href="#"><img src="images/pic4.jpg" alt=""/></a>
                    <div class="contenido-slide">
                        <h4>Donec lacinia</h4>
                        <p>Cras pulvinar iaculis ex. Nullam vitae justo vel sapien malesuada varius ac blandit egestas nec felis. Nunc pharetra. </p>
                    </div>
                    <a class="more hvr-bounce-to-bottom" href="gallery.html">Read More..</a>
                </div>
            </li>
        </ul>

    </div>
</div>
<!-- end slide -->

<!-- comunicado -->
<div class="panel panel-footer col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <p class="title-pago">Comprá y vendé</p>
        <p class="letra-small">En cars.com Argentina encontrás el listado más completo de autos, camiones, camionetas, 4x4, motos y utilitarios para que puedas conseguir el vehículo que estás buscando de forma rápida y fácil. El sitio cuenta con publicaciones de concesionarias y usuarios particulares interesados en vender su auto.</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <p class="title-pago">Marcas</p>
        <p class="letra-small">El listado de publicaciones de cars.com Argentina comprende Volkswagen usados y Volkswagen 0km; Chevrolet usados y Chevrolet 0km; Ford usados y Ford 0km; Renault usados y Renault 0km; Peugeot usados y Peugeot 0km; Fiat usados y Fiat 0km, junto con todas las marcas del mercado automotriz.</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
        <p class="title-pago">Recursos</p>
        <p class="letra-small">cars.com Argentina te ofrece herramientas para filtrar por marca, modelo, año y precio.
            Además, cuenta con un comparador de autos 0km para cotejar las características de hasta 4 modelos, reviews de autos, el análisis de los últimos lanzamientos y la posibilidad de comparar fichas técnicas.</p>
    </div>
</div>
<!-- fin comunicado -->
@endsection
<!-- js de slide de autos en carrusel -->
@push('script')
<script type="text/javascript">
    $(window).load(function() {
        $("#flexiselDemo3").flexisel({
            visibleItems:4,
            animationSpeed: 1000,
            autoPlay: true,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint:480,
                    visibleItems:2
                },
                landscape: {
                    changePoint:640,
                    visibleItems:2
                },
                tablet: {
                    changePoint:768,
                    visibleItems:3
                }
            }
        });

    });
</script>
<!-- fin js slide de autos -->
@endpush
@extends('layouts.master')
@section('title','Autos 0km y Autos usados en cars.com')
@section('content')
    <div class="contenido-autos">
    <div class="caja-submenu aumentar-margen">
        <div class="submenu">
            <!-- links del submenu que esta en el pricipio, para una navegacion mas rapida -->
            <a href="{{ url('/') }}">inicio » </a>
            <a href="{{ url('/autos') }}">Autos nuevos y usados » </a>
            @foreach($car as $c)
            <a href="{{ url('selected') }}?marca={{ strtolower($c->marca) }}">{{ ucwords(strtolower($c->marca)) }} » </a>
            <a href="{{ url('selected/modelo') }}?marca={{ strtolower($c->marca) }}&modelo={{ strtolower($c->modelo) }}">{{ ucwords(strtolower($c->modelo)) }}</a>
            @endforeach
        </div>
    </div>
    <div class="panel-autos">
        <!-- pequeño slide de la vista del auto -->
        <div class="content">
            <article>
                <div class="slider">
                    @foreach($img_cars as $img)

                        @if($img->imagen1 != '')
                             <div id="ele1" class="s_element s_visible">
                                 <img src="/imagenes_autos/{{ $img->imagen1 }}" alt="">
                             </div>
                        @else @endif
                        @if($img->imagen2 != '')
                            <div id="ele2" class="s_element">
                                <img src="/imagenes_autos/{{ $img->imagen2 }}" alt="">
                            </div>
                        @else @endif
                        @if($img->imagen3 != '')
                            <div id="ele3" class="s_element">
                                <img src="/imagenes_autos/{{ $img->imagen3 }}" alt="">
                            </div>
                        @else @endif
                        @if($img->imagen4 != '')
                            <div id="ele3" class="s_element">
                                <img src="/imagenes_autos/{{ $img->imagen4 }}" alt="">
                            </div>
                        @else @endif
                        @if($img->imagen5 != '')
                            <div id="ele3" class="s_element">
                                <img src="/imagenes_autos/{{ $img->imagen5 }}" alt="">
                            </div>
                        @else @endif
                        @if($img->imagen6 != '')
                            <div id="ele3" class="s_element">
                                 <img src="/imagenes_autos/{{ $img->imagen6 }}" alt="">
                            </div>
                        @else @endif
                        @if($img->imagen7 != '')
                            <div id="ele3" class="s_element">
                                <img src="/imagenes_autos/{{ $img->imagen7 }}" alt="">
                            </div>
                        @else @endif

                    @endforeach
                <span id="left"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                <span id="right"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                </div>
            </article>
        </div>
        <!-- fin slide -->

        <div class="info-car">
            @foreach($car as $c)
                <h1 class="car_title">{{ $c->titulo }}</h1>
                <p class="car_precio">$ {{ number_format($c->precio,'0',',','.') }}</p>
                <p class="car_anio_km">{{ $c->anio }} | {{ $c->km }} km</p>
                <p class="car_pro_ciu_bar">{{ ucwords(strtolower($c->provincia)) }} - {{ ucwords(strtolower($c->ciudad)) }} - {{ ucwords(strtolower($c->barrio)) }}</p>
                <div class="mini_info">
                    <div class="caja_gris">
                    <p class="name_lastname"><b class="anun">Anunciante: </b>{{ ucwords($c->usuario) }} {{ ucwords($c->apellido) }}</p>
                    <p class="telefono">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <a id="view_telefono" href="{{ url('telefono',$c->id) }}/{{ strtolower(str_replace(' ','-',$c->titulo)) }}"> Ver teléfono</a>
                        <img id="mini-ajax" src="/img/small-loader.gif" style="display: none">
                        <span id="mostrar_telefono"></span>
                    </p>
                    </div>
                    <textarea name="consulta_cars" class="consulta_cars" cols="60" rows="3" placeholder="Escribe tu consulta..."></textarea>
                </div>
                <input type="submit" id="enviar_consulta_cars" value="Consultar" class="btn-consultar" title="Consultar al vendedor">
        </div>

        <div class="content_info_general">
            <div class="consejos_seguridad">
                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                <p class="title_consejo">Consejos de seguridad</p>
                <ul class="con1">
                    <li class="consejo">No uses servicios de pago anónimos, ni envíes dinero al exterior.</li>
                    <li class="consejo">No pagues sin verificar personalmente la documentación y el estado del vehículo.</li>
                    <li class="consejo">Mercado Libre y sus afiliadas no tienen vehículos bajo su custodia.</li>
                </ul>
                <ul class="con2">
                    <li class="consejo">Cuídate si mencionan ventas rápidas por mudanzas.</li>
                    <li class="consejo">Desconfía de ofertas debajo del precio de mercado. Mira nuestra </li>
                </ul>
            </div>
            <p class="text-denunciar">¿Crees que este no es un vendedor seguro?
                <a href="" data-toggle="modal" data-target="#myModal">Denúncialo.</a>
            </p>

            <!-- Modal  de denuncia-->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Denunciar Publicación</h4>
                        </div>
                        <div class="modal-body">
                            <h4>Elige el motivo de tu denuncia</h4>
                            <input type="radio" value="ofrece otros valores en la publicacion">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- fin modal -->
            <div>
                <ul class="detalle_tecnico_cars">
                    <li>@if($c->combustible != '')
                        <span>Combustible</span>
                        <strong>{{ $c->combustible }}</strong>
                        @else @endif
                    </li>
                    <li>@if($c->puertas != '')
                        <span>Cant. de puertas</span>
                        <strong>{{ $c->puertas }}</strong>
                        @else @endif
                    </li>
                    <li>@if($c->km != '' || $c->km == 0)
                        <span>Kilómetros</span>
                        <strong>{{ $c->km }}</strong>
                        @else @endif
                    </li>
                    <li>@if($c->marca != '')
                        <span>Marca</span>
                        <strong>{{ ucwords(strtolower($c->marca)) }}</strong>
                        @else @endif
                    </li>
                    <li>
                        @if($c->modelo != '')
                        <span>Modelo</span>
                        <strong>{{ ucwords(strtolower($c->modelo)) }}</strong>
                        @else @endif
                    </li>
                    <li>
                        @if($c->transmision != '')
                        <span>Transmision</span>
                        <strong>{{ $c->transmision }}</strong>
                        @else @endif
                    </li>
                    <li>
                        @if($c->anio != '')
                        <span>Año</span>
                        <strong>{{ $c->anio }}</strong>
                        @else @endif
                    </li>
                    <li>
                        @if($c->version != '')
                        <span>Versión</span>
                        <strong>{{ $c->version }}</strong>
                        @else @endif
                    </li>
                </ul>
            </div>
            <div class="adicionales_cars">
                <h3><span>Adicionales</span><span class="linea1"></span></h3>
                <ul class="adicionales">
                    @if($c->color != '')<li>Color: {{ $c->color }}</li>@else @endif
                    @if($c->direccion != '')<li>Dirección: {{ $c->direccion }}</li>@else @endif
                    @if($c->duenio != '')<li>Único dueño: {{ $c->duenio }}</li>@else @endif
                </ul>
                @foreach($sonido as $so)
                @if($so->am_fm != '' || $so->bluetooth != '' || $so->caja_cd != '' ||
                $so->cargador_cd != '' || $so->cd != '' || $so->comando_satelital_stereo != '' ||
                $so->dvd != '' || $so->entrada_auxiliar != '' || $so->entrada_usb != '' || $so->mp3 != '' ||
                $so->pasacasete != '' || $so->tarjeta_sd != '')
                <h3><span>Sonido</span><span class="linea2"></span></h3>
                @else @endif
                <ul class="adicionales">
                    @if($so->am_fm != '')<li>{{ $so->am_fm }}</li>@else @endif
                    @if($so->bluetooth != '')<li>{{ $so->bluetooth }}</li>@else @endif
                    @if($so->caja_cd != '')<li>{{ $so->caja_cd }}</li>@else @endif
                    @if($so->cargador_cd != '')<li>{{ $so->cargador_cd }}</li>@else @endif
                    @if($so->cd != '')<li>{{ $so->cd }}</li>@else @endif
                    @if($so->comando_satelital_stereo != '')<li>{{ $so->comando_satelital_stereo }}</li>@else @endif
                    @if($so->dvd != '')<li>{{ $so->dvd }}</li>@else @endif
                    @if($so->entrada_auxiliar != '')<li>{{ $so->entrada_auxiliar }}</li>@else @endif
                    @if($so->entrada_usb != '')<li>{{ $so->entrada_usb }}</li>@else @endif
                    @if($so->mp3 != '')<li>{{ $so->mp3 }}</li>@else @endif
                    @if($so->pasacasete != '')<li>{{ $so->pasacasete }}</li>@else @endif
                    @if($so->tarjeta_sd != '')<li>{{ $so->tarjeta_sd }}</li>@else @endif
                </ul>
                @endforeach

                @foreach($exterior as $ex)
                @if($ex->limpia_lava_luneta != '' || $ex->llantas_aleacion != '' ||
                    $ex->paragolpes_pintados != '' || $ex->vidrios_polarizados != '')
                <h3><span>Exterior</span><span class="linea3"></span></h3>
                @else @endif
                <ul class="adicionales">
                    @if($ex->limpia_lava_luneta != '')<li>{{ $ex->limpia_lava_luneta }}</li>@else @endif
                    @if($ex->llantas_aleacion != '')<li>{{ $ex->llantas_aleacion }}</li>@else @endif
                    @if($ex->paragolpes_pintados != '')<li>{{ $ex->paragolpes_pintados }}</li>@else @endif
                    @if($ex->vidrios_polarizados != '')<li>{{ $ex->vidrios_polarizados }}</li>@else @endif
                </ul>
                @endforeach

                @foreach($confort as $co)
                @if($co->aire_acondicionado != '' || $co->alarma_luces_encendidas != '' || $co->apertura_remota_baul != '' ||
                  $co->asiento_conductor_regulable_altura != '' || $co->asiento_trasero_rebatible != '' ||
                   $co->asientos_electronicos != '' || $co->cierre_centralizado_puertas != '' ||
                   $co->climatizador_automatico != '' || $co->computadora_abordo != '' || $co->control_velocidad_crucero != '' ||
                  $co->cristales_electricos != '' || $co->espejos_electricos != '' || $co->faros_regulables_interior != '' ||
                   $co->gps != '' || $co->sensor_estacionamiento != '' || $co->sensor_lluvia != '' ||
                    $co->sensor_luz != '' || $co->tapizado_cuero != '')
                    <h3><span>Confort</span><span class="linea3"></span></h3>
                 @else @endif
                    <ul class="adicionales">
                    @if($co->aire_acondicionado != '')<li>{{ $co->aire_acondicionado }}</li>@else @endif
                    @if($co->alarma_luces_encendidas != '')<li>{{ $co->alarma_luces_encendidas }}</li>@else @endif
                    @if($co->apertura_remota_baul != '')<li>{{ $co->apertura_remota_baul }}</li>@else @endif
                    @if($co->asiento_conductor_regulable_altura != '')<li>{{ $co->asiento_conductor_regulable_altura }}</li>@else @endif
                    @if($co->asiento_trasero_rebatible != '')<li>{{ $co->asiento_trasero_rebatible }}</li>@else @endif
                    @if($co->asientos_electronicos != '')<li>{{ $co->asientos_electronicos }}</li>@else @endif
                    @if($co->cierre_centralizado_puertas != '')<li>{{ $co->cierre_centralizado_puertas }}</li>@else @endif
                    @if($co->climatizador_automatico != '')<li>{{ $co->climatizador_automatico }}</li>@else @endif
                    @if($co->computadora_abordo != '')<li>{{ $co->computadora_abordo }}</li>@else @endif
                    @if($co->control_velocidad_crucero != '')<li>{{ $co->control_velocidad_crucero }}</li>@else @endif
                    @if($co->cristales_electricos != '')<li>{{ $co->cristales_electricos }}</li>@else @endif
                    @if($co->espejos_electricos != '')<li>{{ $co->espejos_electricos }}</li>@else @endif
                    @if($co->faros_regulables_interior != '')<li>{{ $co->faros_regulables_interior }}</li>@else @endif
                    @if($co->gps != '')<li>{{ $co->gps }}</li>@else @endif
                    @if($co->sensor_estacionamiento != '')<li>{{ $co->sensor_estacionamiento }}</li>@else @endif
                    @if($co->sensor_lluvia != '')<li>{{ $co->sensor_lluvia }}</li>@else @endif
                    @if($co->sensor_luz != '')<li>{{ $co->sensor_luz }}</li>@else @endif
                    @if($co->tapizado_cuero != '')<li>{{ $co->tapizado_cuero }}</li>@else @endif
                </ul>
                @endforeach

                @foreach($seguridad as $se)
                  @if($se->airbag_conductor != '' || $se->airbag_cortina != '' || $se->airbag_laterales != '' ||
                      $se->alarma != '' || $se->apoya_cabeza != '' || $se->blindado != '' ||
                       $se->control_estabilidad != '' || $se->control_traccion != '' ||
                       $se->doble_traccion != '' || $se->faros_delanteros != '' ||
                      $se->faros_traseros != '' || $se->faros_xenon != '' || $se->frenos_abs != '' ||
                      $se->inmobilizador_motor != '' || $se->isofix != '' || $se->repartidor_electronico != '' ||
                      $se->tercer_stop != '')
                    <h3><span>Seguridad</span><span class="linea1"></span></h3>
                    @else @endif
                    <ul class="adicionales">
                    @if($se->airbag_conductor != '')<li>{{ $se->airbag_conductor }}</li>@else @endif
                    @if($se->airbag_cortina != '')<li>{{ $se->airbag_cortina }}</li>@else @endif
                    @if($se->airbag_laterales != '')<li>{{ $se->airbag_laterales }}</li>@else @endif
                    @if($se->alarma != '')<li>{{ $se->alarma }}</li>@else @endif
                    @if($se->apoya_cabeza != '')<li>{{ $se->apoya_cabeza }}</li>@else @endif
                    @if($se->blindado != '')<li>{{ $se->blindado }}</li>@else @endif
                    @if($se->control_estabilidad != '')<li>{{ $se->control_estabilidad }}</li>@else @endif
                    @if($se->control_traccion != '')<li>{{ $se->control_traccion }}</li>@else @endif
                    @if($se->doble_traccion != '')<li>{{ $se->doble_traccion }}</li>@else @endif
                    @if($se->faros_delanteros != '')<li>{{ $se->faros_delanteros }}</li>@else @endif
                    @if($se->faros_traseros != '')<li>{{ $se->faros_traseros }}</li>@else @endif
                    @if($se->faros_xenon != '')<li>{{ $se->faros_xenon }}</li>@else @endif
                    @if($se->frenos_abs != '')<li>{{ $se->frenos_abs }}</li>@else @endif
                    @if($se->inmobilizador_motor != '')<li>{{ $se->inmobilizador_motor }}</li>@else @endif
                    @if($se->isofix != '')<li>{{ $se->isofix }}</li>@else @endif
                    @if($se->repartidor_electronico != '')<li>{{ $se->repartidor_electronico }}</li>@else @endif
                    @if($se->tercer_stop != '')<li>{{ $se->tercer_stop }}</li>@else @endif
                </ul>
                @endforeach
                <span class="linea-final"></span>

                <textarea id="desc-hide" style="display: none">{{ $c->descripcion }}</textarea>
                <div id="desc-show"></div>
                @endforeach
            </div>
        </div>

        <div class="info-car">
            @foreach($car as $c)
                <h1 class="car_title">{{ $c->titulo }}</h1>
                <p class="car_precio">$ {{ number_format($c->precio,'0',',','.') }}</p>
                <p class="car_anio_km">{{ $c->anio }} | {{ $c->km }} km</p>
                <p class="car_pro_ciu_bar">{{ ucwords(strtolower($c->provincia)) }} - {{ ucwords(strtolower($c->ciudad)) }} - {{ ucwords(strtolower($c->barrio)) }}</p>
                <a href="#"><input type="submit" id="consultar" value="Consultar" class="btn-consultar" title="Consultar al vendedor"></a>
            @endforeach
        </div>

        </div>

    </div>
</div>
<script>
    /* os datos guardados solo se pueden mostrar con javascript,
     para que no se muestren las etiquetas tambien */
    var descripcion = document.getElementById("desc-hide").value;
    document.getElementById("desc-show").innerHTML = descripcion;

</script>
@endsection

@extends('layouts.master')
@section('title')
    Describe tu producto
    @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="completar-datos">
                    <div class="tipos">
                        <span class="sub-links segundo">Elige que quieres publicar</span>
                        <span class="sub-links activo">Describe tu producto</span>
                        <span class="sub-links tercero">Registrate y confirma</span>
                    </div>
                    <div class="contenedor-datos-vehiculo">
                        <p class="title-datos">Ingresa Fotos de tu vehiculo</p>
                        <p class="letra-ve"><b>¡Tu vehiculo es el protagonista!</b> No incluyas logos, banners, bordes ni marcas de agua</p>
                        <p class="letra-ve">Agregá tus fotos en el orden que quieras</p>
                        
                            <div class="contenedor-img-vehiculo">
                            <form id="formAddAutos" action="{{ route('confirmacion.store') }}" method="post" enctype="multipart/form-data">

                                <div class="img-principal caja-img1">
                                    <span class="foto-principal">Foto principal</span>
                                    <span title="Borrar" class="btn-delete-auto" style="display: none">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </span>
                                    <input type="hidden" name="dropImagen1" class="dropImagen1">
                                    <input type="hidden" name="id_imagen1" class="id_imagen1">

                                    <div class="centrar-load-ajax" style="display: none">
                                        <img src="/img/load-img-autos.gif" alt="">
                                    </div>

                                    <img class="img-responsive load-img" src="/img/perfiles-cars.jpg" alt="">
                                    <input id="file_img" class="imagen1" type="file" name="imagen1">

                                    <span class="agregar-vehiculo">agregar</span>
                                </div>

                                <div class="img-principal caja-img2">
                                    <span title="Borrar" class="btn-delete-auto2" style="display: none">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </span>
                                    <input type="hidden" name="dropImagen2" class="dropImagen2">
                                    <input type="hidden" name="id_imagen2" class="id_imagen2">

                                    <div class="centrar-load-ajax2" style="display: none">
                                        <img src="/img/load-img-autos.gif" alt="">
                                    </div>

                                    <img class="img-responsive posicionar-img2 load-img2" src="/img/perfiles-cars.jpg" alt="">
                                    <input id="file_img" type="file" class="imagen2" name="imagen2">
                                    <span class="agregar-vehiculo2">agregar</span>
                                </div>

                                <div class="img-principal caja-img3">
                                    <span title="Borrar" class="btn-delete-auto3" style="display: none">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </span>
                                    <input type="hidden" name="dropImagen3" class="dropImagen3">
                                    <input type="hidden" name="id_imagen3" class="id_imagen3">

                                    <div class="centrar-load-ajax3" style="display: none">
                                        <img src="/img/load-img-autos.gif" alt="">
                                    </div>

                                    <img class="img-responsive posicionar-img3 load-img3" src="/img/perfiles-cars.jpg" alt="">
                                    <input id="file_img" type="file" name="imagen3" class="imagen3">
                                    <span class="agregar-vehiculo3">agregar</span>
                                </div>

                                <div class="img-principal caja-img4">
                                    <span title="Borrar" class="btn-delete-auto4" style="display: none">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </span>
                                    <input type="hidden" name="dropImagen4" class="dropImagen4">
                                    <input type="hidden" name="id_imagen4" class="id_imagen4">

                                    <div class="centrar-load-ajax4" style="display: none">
                                        <img src="/img/load-img-autos.gif" alt="">
                                    </div>

                                    <img class="img-responsive posicionar-img4 load-img4" src="/img/perfiles-cars.jpg" alt="">
                                    <input id="file_img" type="file" name="imagen4" class="imagen4">
                                    <span class="agregar-vehiculo4">agregar</span>
                                </div>

                                <div class="img-principal caja-img5">
                                    <span title="Borrar" class="btn-delete-auto5" style="display: none">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </span>
                                    <input type="hidden" name="dropImagen5" class="dropImagen5">
                                    <input type="hidden" name="id_imagen5" class="id_imagen5">

                                    <div class="centrar-load-ajax5" style="display: none">
                                        <img src="/img/load-img-autos.gif" alt="">
                                    </div>

                                    <img class="img-responsive posicionar-img5 load-img5" src="/img/perfiles-cars.jpg" alt="">
                                    <input id="file_img" type="file" name="imagen5" class="imagen5">
                                    <span class="agregar-vehiculo5">agregar</span>
                                </div>

                                <div class="img-principal caja-img6">
                                    <span title="Borrar" class="btn-delete-auto6" style="display: none">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </span>
                                    <input type="hidden" name="dropImagen6" class="dropImagen6">
                                    <input type="hidden" name="id_imagen6" class="id_imagen6">

                                    <div class="centrar-load-ajax6" style="display: none">
                                        <img src="/img/load-img-autos.gif" alt="">
                                    </div>

                                    <img class="img-responsive posicionar-img6 load-img6" src="/img/perfiles-cars.jpg" alt="">
                                    <input id="file_img" type="file" name="imagen6" class="imagen6">
                                    <span class="agregar-vehiculo6">agregar</span>
                                </div>

                                <div class="img-principal caja-img7">
                                    <span title="Borrar" class="btn-delete-auto7" style="display: none">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </span>
                                    <input type="hidden" name="dropImagen7" class="dropImagen7">
                                    <input type="hidden" name="id_imagen7" class="id_imagen7">

                                    <div class="centrar-load-ajax7" style="display: none">
                                        <img src="/img/load-img-autos.gif" alt="">
                                    </div>

                                    <img class="img-responsive posicionar-img7 load-img7" src="/img/perfiles-cars.jpg" alt="">
                                    <input id="file_img" type="file" name="imagen7" class="imagen7">
                                    <span class="agregar-vehiculo7">agregar</span>
                                </div>

                            </div>

                            <div class="contenido-info">
                                <p class="title-datos2">Ubicación de tu vehiculo</p>
                                <p class="datos-obligatorios">* Datos obligatorios</p>

                                <label class="labeles" for="provincia">Provincia: *</label>
                                <span class="imgAjaxProvincia" style="display: none">
                                    <img src="/img/ajax-loader.gif" alt="">
                                </span>

                                <select class="select-info" name="id_provincia" id="provincia" required>
                                    <option selected class="opcion" value="">Seleccionar</option>
                                    @foreach($provincias as $pro)
                                        <option class="opcion" value="{{ $pro->id }}">{{ strtolower($pro->nombre) }}</option>
                                        @endforeach
                                </select><br>

                                <div class="hide-ciudad" style="display: none;">
                                    <label class="labeles" for="ciudad">Ciudad: *</label>
                                    <span class="imgAjaxCiudad" style="display: none">
                                        <img src="/img/ajax-loader.gif" alt="">
                                    </span>
                                    <select class="select-info" name="id_ciudad" id="ciudad" required></select><br>
                                </div>

                                <div class="hide-barrio" style="display: none">
                                    <label class="labeles" for="barrio">Barrio: *</label>
                                    <select class="select-info" name="id_barrio" id="barrio" required></select>
                                </div>

                                <p class="title-datos2">Teléfono de contacto</p>
                                <label class="labeles" for="telefono">Teléfono: *</label>
                                <input class="select-info modificar-input-number" min="1111111111" max="9999999999" type="number" name="telefono" id="telefono" placeholder="Ej: 1122410088" maxlength="10" required>

                                <p class="title-datos2">Describe tu vehiculo</p>
                                <p class="datos-obligatorios">* Datos obligatorios</p>

                                <label class="labeles" for="anio">Año: *</label>
                                <?php
                                    $anio = date('Y');
                                    $nuevo_anio = strtotime('+1 year',strtotime($anio));
                                    $nuevo_anio2 = date('Y',$nuevo_anio);
                                ?>
                                <select class="select-info" name="anio" id="anio" required>
                                    <option class="opcion" value="">Seleccionar</option>
                                    <?php for($i = $nuevo_anio2; $i >= 1980; $i--){ ?>
                                    <option class="opcion" value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                </select><br>

                                <label class="labeles" for="puertas">Cantidad de puertas: *</label>
                                <select class="select-info" name="puertas" id="puertas" required>
                                    <option class="opcion" value="">Seleccionar</option>
                                    <option class="opcion" value="2">2</option>
                                    <option class="opcion" value="3">3</option>
                                    <option class="opcion" value="4">4</option>
                                    <option class="opcion" value="5">5</option>
                                </select><br>

                                <label class="labeles" for="combustible">Combustible: *</label>
                                <select class="select-info" name="combustible" id="combustible" required>
                                    <option class="opcion" value="">Seleccionar</option>
                                    <option class="opcion" value="Diesel">Diesel</option>
                                    <option class="opcion" value="Nafta">Nafta</option>
                                    <option class="opcion" value="Nafta/Gnc">Nafta/Gnc</option>
                                </select><br>

                                <label class="labeles" for="km">Kilómetros: *</label>
                                <input type="number" class="select-info modificar-input-number" name="km" id="km" min="0" max="9999999" required><br>

                                <div class="letra-especificaciones ocultar-espe">
                                    <a href="#" id="especificaciones" class="especificaciones1">
                                        <i class="fa fa-caret-up" aria-hidden="true"></i>
                                        Menos especificaciones
                                    </a>
                                </div>

                                <div class="letra-especificaciones mostrar-espe" style="display: none;">
                                    <a href="#" id="especificaciones" class="especificaciones2">
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        Más especificaciones
                                    </a>
                                </div>

                                <!-- mas especificaciones -->
                                <div class="caja-especificaciones">
                                    <br>
                                    <label class="labeles-normales" for="color">Color: </label>
                                    <?php
                                    $colores = array(
                                            'Amarillo'=>'Amarillo','Azul'=>'Azul','Beige'=>'Beige',
                                            'Blanco'=>'Blanco','Bordo'=>'Bordo','Celeste'=>'Celeste',
                                            'Champagne'=>'Champagne','Gris'=>'Gris','Marron'=>'Marron',
                                            'Negro'=>'Negro','Oro'=>'Oro','Plata'=>'Plata',
                                            'Rojo'=>'Rojo','Rosado'=>'Rosado','Verde'=>'Verde','Otro'=>'Otro'
                                    );
                                    ?>
                                    <select class="select-info" name="color" id="color">
                                        <option value="0">Seleccionar</option>
                                        <?php foreach ($colores as $key => $c){ ?>
                                        <option value="<?php echo $key; ?>"><?php echo $c; ?></option>
                                        <?php } ?>
                                    </select><br>

                                    <label class="labeles-normales" for="direccion">Direccion: </label>
                                    <select class="select-info" name="direccion" id="direccion">
                                        <option value="0">Seleccionar</option>
                                        <option value="Asistida">Asistida</option>
                                        <option value="Hidraulica">Hidraúlica</option>
                                        <option value="Mecanica">Mecanica</option>
                                    </select><br>

                                    <label class="labeles-normales" for="transmision">Transmisión: </label>
                                    <select class="select-info" name="transmision" id="transmision">
                                        <option value="0">Seleccionar</option>
                                        <option value="Automatica">Automática</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Secuencial">Secuencial</option>
                                    </select><br>

                                    <label class="labeles-normales" for="duenio">Único dueño: </label>
                                    <select class="select-info" name="duenio" id="duenio">
                                        <option value="0">Seleccionar</option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select><br>

                                    <label class="labeles-normales" for="version">Version: </label>
                                    <input type="text" class="select-info" name="version" id="version" placeholder="4.2 FSI Tiptronic Quattro" maxlength="23"><br>

                                    <!-- Seguridad -->
                                    <p class="title-datos2">Seguridad</p>

                                    <div class="seguridad-auto col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" name="airbag_conductor" value="Airbag conductor">Airbag conductor</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" name="airbag_cortina" value="Airbag de cortina">Airbag de cortina</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" name="airbag_laterales" value="Airbag Laterales">Airbag Laterales</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" name="alarma" value="Alarma">Alarma</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" name="apoya_cabeza" value="Apoya cabeza en asientos traseros">Apoya cabeza en asientos traseros</label>
                                            </li>
                                        </div>

                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" name="blindado" value="Blindado">Blindado</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" name="control_estabilidad" value="Control de estabilidad">Control de estabilidad</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Control de traccion" name="control_traccion">Control de traccion</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Doble traccion" name="doble_traccion">Doble traccion</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" name="faros_delanteros" value="Faros antinieblas delanteros">Faros antinieblas delanteros</label>
                                            </li>
                                        </div>

                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Faros antinieblas delanteros" name="faros_traseros">Faros antinieblas delanteros</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Faros de xenón" name="faros_xenon">Faros de xenón</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Frenos ABS" name="frenos_abs">Frenos ABS</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Inmobilizador de motor" name="inmobilizador_motor">Inmobilizador de motor</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Isofix" name="isofix">Isofix</label>
                                            </li>
                                        </div>

                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Repartidor electrónico de fuerza de frenado" name="repartidor_electronico">Repartidor electrónico de fuerza de frenado</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Tercer stop" name="tercer_stop">Tercer stop</label>
                                            </li>
                                        </div>

                                     </div>

                                    <!-- Confort -->
                                    <p class="title-datos2">Confort</p>

                                    <div class="seguridad-auto col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Aire acondicionado" name="aire_acondicionado">Aire acondicionado</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Alarma de luces encendidas" name="alarma_luces_encendidas">Alarma de luces encendidas</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Apertura remota de baul" name="apertura_remota_baul">Apertura remota de baul</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Asiento conductor regulable en altura" name="asiento_conductor_regulable_altura">Asiento conductor regulable en altura</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Asiento trasero rebatible" name="asiento_trasero_rebatible">Asiento trasero rebatible</label>
                                            </li>
                                        </div>

                                       <div class="columna">
                                           <li class="checkbox">
                                               <label><input type="checkbox" value="Asientos electrónicos" name="asientos_electronicos">Asientos electrónicos</label>
                                           </li>
                                           <li class="checkbox">
                                               <label><input type="checkbox" value="Cierre centralizado de puertas" name="cierre_centralizado_puertas">Cierre centralizado de puertas</label>
                                           </li>
                                           <li class="checkbox">
                                               <label><input type="checkbox" value="Climatizador automatico" name="climatizador_automatico">Climatizador automatico</label>
                                           </li>
                                           <li class="checkbox">
                                               <label><input type="checkbox" value="Computadora abordo" name="computadora_abordo">Computadora abordo</label>
                                           </li>
                                           <li class="checkbox">
                                               <label><input type="checkbox" value="Control de velocidad de crucero" name="control_velocidad_crucero">Control de velocidad de crucero</label>
                                           </li>
                                       </div>

                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Cristales aléctricos" name="cristales_electricos">Cristales aléctricos</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Espejos eléctricos" name="espejos_electricos">Espejos eléctricos</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Faros regulables desde el interior" name="faros_regulables_interior">Faros regulables desde el interior</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="GPS" name="gps">GPS</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Sensor de estacionamiento" name="sensor_estacionamiento">Sensor de estacionamiento</label>
                                            </li>
                                        </div>

                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Sensor de lluvia" name="sensor_lluvia">Sensor de lluvia</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Sensor de luz" name="sensor_luz">Sensor de luz</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Tapizado de cuero" name="tapizado_cuero">Tapizado de cuero</label>
                                            </li>
                                        </div>

                                    </div>

                                    <!-- sonido -->
                                    <p class="title-datos2">Sonido</p>

                                    <div class="seguridad-auto col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="AM/FM" name="am_fm">AM/FM</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Bluetooth" name="bluetooth">Bluetooth</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Caja de CD" name="caja_cd">Caja de CD</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Cargador de CD" name="cargador_cd">Cargador de CD</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="CD" name="cd">CD</label>
                                            </li>
                                        </div>

                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Comando satelital de stereo" name="comando_satelital_stereo">Comando satelital de stereo</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="DVD" name="dvd">DVD</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Entrada auxiliar" name="entrada_auxiliar">Entrada auxiliar</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Entrada USB" name="entrada_usb">Entrada USB</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="MP3" name="mp3">MP3</label>
                                            </li>
                                        </div>

                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Pasacassette" name="pasacasete">Pasacassette</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Tarjeta SD" name="tarjeta_sd">Tarjeta SD</label>
                                            </li>
                                        </div>

                                    </div>

                                    <!-- Exterior -->
                                    <p class="title-datos2">Exterior</p>

                                    <div class="seguridad-auto ultimo col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <div class="columna">
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Limpia/lava luneta" name="limpia_lava_luneta">Limpia/lava luneta</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="LLantas de aleación" name="llantas_aleacion">LLantas de aleación</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Paragolpes pintados" name="paragolpes_pintados">Paragolpes pintados</label>
                                            </li>
                                            <li class="checkbox">
                                                <label><input type="checkbox" value="Vidrios polarizados" name="vidrios_polarizados">Vidrios polarizados</label>
                                            </li>
                                        </div>

                                    </div>

                                </div>
                                <!-- fin especificaiones -->
                                <br>
                                <label class="labeles" for="titulo">Titulo: *</label>
                                <input class="select-info agrandar-titulo" type="text" name="titulo" id="titulo" maxlength="60" placeholder="Volkswagen Golf Motor 2.0 2006 Azul 5 Puertas" required><br>

                                <label class="labeles" for="precio">Precio: *</label>
                                <input class="select-info modificar-input-number" min="9999" max="9999999" type="number" placeholder="Ingresa el precio sin ( . ) ni ( , )" name="precio" id="precio" required><br>

                                <label class="labeles" for="texteditor">Descripcion: </label>
                                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                                    <div class="adjoined-bottom">
                                        <div class="grid-container">
                                            <div class="grid-width-100">
                                                <textarea name="descripcion" id="texteditor" class="tinymce"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <br>
                                <div class="col-xs-8 col-sm-10 col-sm-offset-3 col-md-3 col-md-offset-2 col-lg-3 col-lg-offset-2">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
                                    <input id="btn-save-cars" type="submit" value="continuar" class="btn btn-info">
                                    &nbsp;&nbsp;<span><a href="{{ url('publicar/vehiculo') }}">volver</a></span>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    $(document).ready(function(){

        $("#get-data-form").submit(function(e){

            var content = tinymce.get("texteditor").getContent();

            $("#data-container").html(content);

            return false;

        });

    });
</script>

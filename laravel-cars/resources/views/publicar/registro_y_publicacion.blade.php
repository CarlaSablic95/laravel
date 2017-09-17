@extends('layouts.master')
@section('title')
    Registrate y confirmá
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2">
                <br><br><br><br><br>
                <div class="completar-datos">
                    <div class="tipos">
                        <span class="sub-links tercero">Elige que quieres publicar</span>
                        <span class="sub-links segundo">Describe tu producto</span>
                        <span class="sub-links activo">Registrate y confirma</span>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ route('saveCars.store') }}" enctype="multipart/form-data">
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
                                    <input id="dni" type="text" class="borde-invisible" name="dni" value="{{ old('dni') }}" placeholder="Ingresa tu DNI" maxlength="8">

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
                                <div class="col-xs-12 col-sm-8 col-md-9 col-lg-8">
                                    <p class="letra-small">Al registrarme, declaro que soy mayor de edad y acepto los <a href="#">Terminos y condiciones</a>
                                        y las <a href="#">Políticas de privacidad</a> de CARS.com
                                    </p>
                                </div>

                                <!-- datos del vehiculo guardados en sesion -->
                                <!-- pirmero las imagenes y luego sus datos -->
                                <input type="hidden" name="imagen1" value="{{ Session::get('imagen1') }}">
                                <input type="hidden" name="imagen2" value="{{ Session::get('imagen2') }}">
                                <input type="hidden" name="imagen3" value="{{ Session::get('imagen3') }}">
                                <input type="hidden" name="imagen4" value="{{ Session::get('imagen4') }}">
                                <input type="hidden" name="imagen5" value="{{ Session::get('imagen5') }}">
                                <input type="hidden" name="imagen6" value="{{ Session::get('imagen6') }}">
                                <input type="hidden" name="imagen7" value="{{ Session::get('imagen7') }}">

                                <input type="hidden" name="titulo" value="{{ Session::get('titulo') }}">
                                <textarea name="descripcion" style="display: none">{{ Session::get('descripcion') }}</textarea>
                                <input type="hidden" name="id_provincia" value="{{ Session::get('id_provincia') }}">
                                <input type="hidden" name="id_ciudad" value="{{ Session::get('id_ciudad') }}">
                                <input type="hidden" name="id_barrio" value="{{ Session::get('id_barrio') }}">
                                <input type="hidden" name="telefono" value="{{ Session::get('telefono') }}">
                                <input type="hidden" name="anio" value="{{ Session::get('anio') }}">
                                <input type="hidden" name="puertas" value="{{ Session::get('puertas') }}">
                                <input type="hidden" name="combustible" value="{{ Session::get('combustible') }}">
                                <input type="hidden" name="km" value="{{ Session::get('km') }}">
                                <input type="hidden" name="color" value="{{ Session::get('color') }}">
                                <input type="hidden" name="direccion" value="{{ Session::get('direccion') }}">
                                <input type="hidden" name="transmision" value="{{ Session::get('transmision') }}">
                                <input type="hidden" name="duenio" value="{{ Session::get('duenio') }}">
                                <input type="hidden" name="version" value="{{ Session::get('version') }}">
                                <input type="hidden" name="precio" value="{{ Session::get('precio') }}">
                                <input type="hidden" name="id_marca" value="{{ Session::get('id_marca') }}">
                                <input type="hidden" name="id_modelo" value="{{ Session::get('id_modelo') }}">
                                <!-- los botones de checkbox -->
                                <!-- seguridad -->
                                <input type="hidden" name="airbag_conductor" value="{{ Session::get('se1') }}">
                                <input type="hidden" name="airbag_cortina" value="{{ Session::get('se2') }}">
                                <input type="hidden" name="airbag_laterales" value="{{ Session::get('se3') }}">
                                <input type="hidden" name="alarma" value="{{ Session::get('se4') }}">
                                <input type="hidden" name="apoya_cabeza" value="{{ Session::get('se5') }}">
                                <input type="hidden" name="blindado" value="{{ Session::get('se6') }}">
                                <input type="hidden" name="control_estabilidad" value="{{ Session::get('se7') }}">
                                <input type="hidden" name="control_traccion" value="{{ Session::get('se8') }}">
                                <input type="hidden" name="doble_traccion" value="{{ Session::get('se9') }}">
                                <input type="hidden" name="faros_delanteros" value="{{ Session::get('se10') }}">
                                <input type="hidden" name="faros_traseros" value="{{ Session::get('se11') }}">
                                <input type="hidden" name="faros_xenon" value="{{ Session::get('se12') }}">
                                <input type="hidden" name="frenos_abs" value="{{ Session::get('se13') }}">
                                <input type="hidden" name="inmobilizador_motor" value="{{ Session::get('se14') }}">
                                <input type="hidden" name="isofix" value="{{ Session::get('se15') }}">
                                <input type="hidden" name="repartidor_electronico" value="{{ Session::get('se16') }}">
                                <input type="hidden" name="tercer_stop" value="{{ Session::get('se17') }}">
                                <!-- confort -->
                                <input type="hidden" value="{{ Session::get('co1') }}" name="aire_acondicionado">
                                <input type="hidden" value="{{ Session::get('co2') }}" name="alarma_luces_encendidas">
                                <input type="hidden" value="{{ Session::get('co3') }}" name="apertura_remota_baul">
                                <input type="hidden" value="{{ Session::get('co4') }}" name="asiento_conductor_regulable_altura">
                                <input type="hidden" value="{{ Session::get('co5') }}" name="asiento_trasero_rebatible">
                                <input type="hidden" value="{{ Session::get('co6') }}" name="asientos_electronicos">
                                <input type="hidden" value="{{ Session::get('co7') }}" name="cierre_centralizado_puertas">
                                <input type="hidden" value="{{ Session::get('co8') }}" name="climatizador_automatico">
                                <input type="hidden" value="{{ Session::get('co9') }}" name="computadora_abordo">
                                <input type="hidden" value="{{ Session::get('co10') }}" name="control_velocidad_crucero">
                                <input type="hidden" value="{{ Session::get('co11') }}" name="cristales_electricos">
                                <input type="hidden" value="{{ Session::get('co12') }}" name="espejos_electricos">
                                <input type="hidden" value="{{ Session::get('co13') }}" name="faros_regulables_interior">
                                <input type="hidden" value="{{ Session::get('co14') }}" name="gps">
                                <input type="hidden" value="{{ Session::get('co15') }}" name="sensor_estacionamiento">
                                <input type="hidden" value="{{ Session::get('co16') }}" name="sensor_lluvia">
                                <input type="hidden" value="{{ Session::get('co17') }}" name="sensor_luz">
                                <input type="hidden" value="{{ Session::get('co18') }}" name="tapizado_cuero">
                                <!-- sonido -->
                                <input type="hidden" value="{{ Session::get('so1') }}" name="am_fm">
                                <input type="hidden" value="{{ Session::get('so2') }}" name="bluetooth">
                                <input type="hidden" value="{{ Session::get('so3') }}" name="caja_cd">
                                <input type="hidden" value="{{ Session::get('so4') }}" name="cargador_cd">
                                <input type="hidden" value="{{ Session::get('so5') }}" name="cd">
                                <input type="hidden" value="{{ Session::get('so6') }}" name="comando_satelital_stereo">
                                <input type="hidden" value="{{ Session::get('so7') }}" name="dvd">
                                <input type="hidden" value="{{ Session::get('so8') }}" name="entrada_auxiliar">
                                <input type="hidden" value="{{ Session::get('so9') }}" name="entrada_usb">
                                <input type="hidden" value="{{ Session::get('so10') }}" name="mp3">
                                <input type="hidden" value="{{ Session::get('so11') }}" name="pasacasete">
                                <input type="hidden" value="{{ Session::get('so12') }}" name="tarjeta_sd">
                                <!-- exterior -->
                                <input type="hidden" value="{{ Session::get('ex1') }}" name="limpia_lava_luneta">
                                <input type="hidden" value="{{ Session::get('ex2') }}" name="llantas_aleacion">
                                <input type="hidden" value="{{ Session::get('ex3') }}" name="paragolpes_pintados">
                                <input type="hidden" value="{{ Session::get('ex4') }}" name="vidrios_polarizados">
                                <!-- end datos -->

                                <div class="pull-right">
                                    <div class="col-xs-12 col-md-12">
                                        <input type="hidden" name="tipo" value="user">
                                        <button type="submit" class="btn btn-primary">
                                            Registrarme y publicar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <br><br><br><br><br>
            </div>
        </div>
    </div>
@endsection
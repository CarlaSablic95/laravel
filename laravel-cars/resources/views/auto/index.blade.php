@extends('layouts.master')
@section('title','Autos 0km y Autos usados en cars.com')
@section('content')
<div class="contenido-autos">
    <div class="caja-submenu">
        <div class="submenu">
            <a href="{{ url('/') }}">inicio » </a>
            <?php if (isset($_GET['marca'])){ ?>
            <a href="{{ url('/autos') }}">Autos nuevos y usados » </a>
            <?php }else{ ?>
            <strong>Autos nuevos y usados</strong>
            <?php } ?>
            <strong><?php if (isset($_GET['marca'])){ echo $_GET['marca'];  } ?></strong>
            <span style="float: right"><b>{{ $total }}</b> <?php if (isset($_GET['marca'])){ echo $_GET['marca']; }else{ echo 'Autos'; } ?> encontrados</span>
        </div>
        <div class="atajo-relevantes">
            <a id="relevantes">Más relevantes <i class="fa fa-caret-down" aria-hidden="true"></i></a>
            <div class="filtro-precios" style="display: none">
                <?php if (isset($_GET['precio']) && isset($_GET['hasta'])){ ?>
                    <a href="?precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&precio_asc">Menor precio</a><br>
                    <a href="?precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&precio_desc">Mayor precio</a>
                <?php }elseif(isset($_GET['precio'])){ ?>
                    <a href="?precio=<?php echo $_GET['precio']; ?>&precio_asc">Menor precio</a><br>
                    <a href="?precio=<?php echo $_GET['precio']; ?>&precio_desc">Mayor precio</a>
                <?php }elseif(isset($_GET['mas'])){ ?>
                    <a href="?mas=<?php echo $_GET['mas']; ?>&precio_asc">Menor precio</a><br>
                    <a href="?mas=<?php echo $_GET['mas']; ?>&precio_desc">Mayor precio</a>
                <?php }elseif(isset($_GET['0km'])){ ?>
                    <a href="?0km&precio_asc">Menor precio</a><br>
                    <a href="?0km&precio_desc">Mayor precio</a>
                <?php }elseif(isset($_GET['usados'])){ ?>
                    <a href="?usados&precio_asc">Menor precio</a><br>
                    <a href="?usados&precio_desc">Mayor precio</a>
                <?php }else{ ?>
                    <a href="?precio_asc">Menor precio</a><br>
                    <a href="?precio_desc">Mayor precio</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="panel-autos">
        <div class="categorias-navegacion">
            <p class="title-nav btn-min-320 btn-min-marca">Marca</p>
           <div class="contenido-min-320 down-marca">
               <?php if (isset($_GET['precio']) && isset($_GET['hasta'])){ ?>
                   @foreach($marca as $mar)
                       <li class="list-marcas">
                           <a href="selected?marca={{ strtolower($mar->marca) }}&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>">
                               {{ ucwords(strtolower($mar->marca)) }}
                           </a>
                           ({{ $mar->total_marcas }})
                       </li>
                   @endforeach
               <?php }elseif(isset($_GET['mas'])){ ?>
           @foreach($marca as $mar)
                <li class="list-marcas">
                    <a href="selected?marca={{ strtolower($mar->marca) }}&mas=<?php echo $_GET['mas']; ?>">
                        {{ ucwords(strtolower($mar->marca)) }}
                    </a>
                    ({{ $mar->total_marcas }})
                </li>
            @endforeach
               <?php }elseif(isset($_GET['precio'])){ ?>
                   @foreach($marca as $mar)
                       <li class="list-marcas">
                           <a href="selected?marca={{ strtolower($mar->marca) }}&precio=<?php echo $_GET['precio']; ?>">
                               {{ ucwords(strtolower($mar->marca)) }}
                           </a>
                           ({{ $mar->total_marcas }})
                       </li>
                    @endforeach
               <?php }elseif (isset($_GET['0km'])){ ?>
                   @foreach($marca as $mar)
                       <li class="list-marcas">
                           <a href="selected?marca={{ strtolower($mar->marca) }}&0km">
                               {{ ucwords(strtolower($mar->marca)) }}
                           </a>
                           ({{ $mar->total_marcas }})
                       </li>
                   @endforeach
               <?php }else{ ?>
                   @foreach($marca as $mar)
                       <li class="list-marcas">
                           <a href="selected?marca={{ strtolower($mar->marca) }}">
                               {{ ucwords(strtolower($mar->marca)) }}
                           </a>
                           ({{ $mar->total_marcas }})
                       </li>
                    @endforeach
                <?php } ?>

               <li class="desplegar ocultar-marca">
                   <a href="#" class="mas-opciones-marcas link-opciones">Más opciones
                       <i class="fa fa-caret-down" aria-hidden="true"></i>
                   </a>
               </li>
               <li class="desplegar mostrar-marca" style="display: none">
                   <a href="#" class="menos-opciones-marcas link-opciones">Menos opciones
                       <i class="fa fa-caret-up" aria-hidden="true"></i>
                   </a>
               </li>
            </div>

            <p class="title-nav btn-min-320 btn-min-modelo">Modelo</p>
            <div class="contenido-min-320 down-modelo">
                <?php if (isset($_GET['precio']) && isset($_GET['hasta'])){ ?>
                    @foreach($modelo as $mod)
                        <li class="list-marcas">
                            <a href="{{ url('selected') }}/modelo?marca={{ strtolower($mod->marca) }}&modelo={{ strtolower($mod->modelo) }}&precio=<?php echo $_GET['precio']; ?>&hasta=<?php  echo $_GET['hasta']; ?>">
                                {{ ucwords(strtolower($mod->modelo)) }}
                            </a> ({{ $mod->total_modelos_general }})
                        </li>
                    @endforeach
                <?php }elseif(isset($_GET['mas'])){ ?>
                    @foreach($modelo as $mod)
                        <li class="list-marcas">
                            <a href="{{ url('selected') }}/modelo?marca={{ strtolower($mod->marca) }}&modelo={{ strtolower($mod->modelo) }}&mas=<?php echo $_GET['mas']; ?>">
                                {{ ucwords(strtolower($mod->modelo)) }}
                            </a> ({{ $mod->total_modelos_general }})
                        </li>
                    @endforeach
                    <?php }elseif(isset($_GET['precio'])){ ?>
                    @foreach($modelo as $mod)
                        <li class="list-marcas">
                            <a href="{{ url('selected') }}/modelo?marca={{ strtolower($mod->marca) }}&modelo={{ strtolower($mod->modelo) }}&precio=<?php echo $_GET['precio']; ?>">
                                {{ ucwords(strtolower($mod->modelo)) }}
                            </a> ({{ $mod->total_modelos_general }})
                        </li>
                    @endforeach
                <?php }elseif(isset($_GET['0km'])){ ?>
                    @foreach($modelo as $mod)
                        <li class="list-marcas">
                            <a href="{{ url('selected') }}/modelo?marca={{ strtolower($mod->marca) }}&modelo={{ strtolower($mod->modelo) }}&0km">
                                {{ ucwords(strtolower($mod->modelo)) }}
                            </a> ({{ $mod->total_modelos_general }})
                        </li>
                    @endforeach
                    <?php }else{ ?>
                @foreach($modelo as $mod)
                    <li class="list-marcas">
                        <a href="{{ url('selected') }}/modelo?marca={{ strtolower($mod->marca) }}&modelo={{ strtolower($mod->modelo) }}">
                            {{ ucwords(strtolower($mod->modelo)) }}
                        </a> ({{ $mod->total_modelos_general }})
                    </li>
                @endforeach
                <?php } ?>

                <li class="desplegar ocultar-modelo">
                    <a href="#" class="mas-opciones-modelos link-opciones">Más opciones
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="desplegar mostrar-modelo" style="display: none">
                    <a href="#" class="menos-opciones-modelos link-opciones">Menos opciones
                        <i class="fa fa-caret-up" aria-hidden="true"></i>
                    </a>
                </li>
            </div>

            <p class="title-nav btn-min-320 btn-min-anio">Año</p>
            <div class="contenido-min-320 down-anio">
                <?php if (isset($_GET['precio']) && isset($_GET['hasta'])){ ?>
                    @foreach($anio as $an)
                        <li class="list-marcas">
                            <a href="year?rango={{ $an->anio }}&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>">
                                {{ $an->anio }}
                            </a>
                            ({{ $an->total_anio }})
                        </li>
                    @endforeach
                <?php }elseif(isset($_GET['mas'])){ ?>
                    @foreach($anio as $an)
                        <li class="list-marcas">
                            <a href="year?rango={{ $an->anio }}&mas=<?php echo $_GET['mas']; ?>">
                                {{ $an->anio }}
                            </a>
                            ({{ $an->total_anio }})
                        </li>
                    @endforeach
                <?php }elseif(isset($_GET['precio'])){ ?>
                    @foreach($anio as $an)
                        <li class="list-marcas">
                            <a href="year?rango={{ $an->anio }}&precio=<?php echo $_GET['precio']; ?>">
                                {{ $an->anio }}
                            </a>
                            ({{ $an->total_anio }})
                        </li>
                    @endforeach
                <?php }elseif(isset($_GET['0km'])){ ?>
                    @foreach($anio as $an)
                        <li class="list-marcas">
                            <a href="year?rango={{ $an->anio }}&0km">{{ $an->anio }}</a>
                            ({{ $an->total_anio }})
                        </li>
                    @endforeach
                <?php }else{ ?>
                @foreach($anio as $an)
                    <li class="list-marcas">
                        <a href="year?rango={{ $an->anio }}">{{ $an->anio }}</a>
                        ({{ $an->total_anio }})
                    </li>
                @endforeach
                <?php } ?>

                <li class="desplegar ocultar-anio">
                    <a href="#" class="mas-opciones-anio link-opciones">Más opciones
                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </a>
                </li>
                <li class="desplegar mostrar-anio" style="display: none">
                    <a href="#" class="menos-opciones-anio link-opciones">Menos opciones
                        <i class="fa fa-caret-up" aria-hidden="true"></i>
                    </a>
                </li>
            </div>

            <?php if (isset($_GET['mas'])){ ?>

            <?php }elseif (isset($_GET['precio'])){ ?>

            <?php }elseif (isset($_GET['rango'])){?>
                <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
                <div class="contenido-min-320 down-precio">
                    <li class="list-marcas"><a href="?rango=<?php echo $_GET['rango']; ?>&precio=200000">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                    <li class="list-marcas"><a href="?rango=<?php echo $_GET['rango']; ?>&precio=200000&hasta=500000">$200.000 a $00.000 </a>()</li>
                    <li class="list-marcas"><a href="?rango=<?php echo $_GET['rango']; ?>&mas=500000">Más de $200.000 </a>()</li>
                </div>
            <?php }elseif(isset($_GET['0km'])){ ?>
            <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
            <div class="contenido-min-320 down-precio">
                <li class="list-marcas"><a href="?precio=200000&0km">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                <li class="list-marcas"><a href="?precio=200000&hasta=500000&0km">$200.000 a $500.000 </a>({{ $precio_quinientos_mil }})</li>
                <li class="list-marcas"><a href="?mas=500000&0km">Más de $500.000 </a>({{ $precio_mas_quinientos_mil }})</li>
            </div>
            <?php }else{ ?>
                <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
                <div class="contenido-min-320 down-precio">
                    <li class="list-marcas"><a href="?precio=200000">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                    <li class="list-marcas"><a href="?precio=200000&hasta=500000">$200.000 a $500.000 </a>({{ $precio_quinientos_mil }})</li>
                    <li class="list-marcas"><a href="?mas=500000">Más de $500.000 </a>({{ $precio_mas_quinientos_mil }})</li>
                </div>
            <?php } ?>

          <!-- ESTADO -->
            <?php if (isset($_GET['0km'])){ ?>

            <?php }elseif (isset($_GET['usados'])){ ?>

            <?php }else{ ?>
            <p class="title-nav btn-min-320 btn-min-estado">Estado</p>
            <div class="contenido-min-320 down-estado">
                <li class="list-marcas"><a href="?0km">Nuevo </a>({{ $nuevos }})</li>
                <li class="list-marcas"><a href="?usados">Usado </a>({{ $usados }})</li>
            </div>
            <?php } ?>

            <p class="title-nav btn-min-320 btn-min-ubicacion">Ubicación</p>
            <div class="contenido-min-320 down-ubicacion">
                <li class="list-marcas"><a href="">Buenos Aires </a>()</li>
                <li class="list-marcas"><a href="">Chaco </a>()</li>
                <li class="list-marcas"><a href="">Cordoba </a>()</li>
                <li class="list-marcas"><a href="">Santa Fé </a>()</li>
                <li class="list-marcas"><a href="">Mendoza </a>()</li>
            </div>



            <p class="title-nav btn-min-320 btn-min-combustible">Combustible</p>
            <div class="contenido-min-320 down-combustible">
                <li class="list-marcas"><a href="">Nafta </a>()</li>
                <li class="list-marcas"><a href="">GNC </a>()</li>
                <li class="list-marcas"><a href="">Nafta/GNC </a>()</li>
            </div>

            <p class="title-nav btn-min-320 btn-min-puertas">Cantidad de puertas</p>
            <div class="contenido-min-320 down-puertas">
                <li class="list-marcas"><a href="">2 puertas </a>()</li>
                <li class="list-marcas"><a href="">3 puertas </a>()</li>
                <li class="list-marcas"><a href="">4 puertas </a>()</li>
                <li class="list-marcas"><a href="">5 puertas </a>()</li>
            </div>

            <p class="title-nav btn-min-320 btn-min-transmision">Transmisión</p>
            <div class="contenido-min-320 down-transmision">
                <li class="list-marcas"><a href="">Manual </a>()</li>
                <li class="list-marcas"><a href="">Automática </a>()</li>
            </div>

            <p class="title-nav btn-min-320 btn-min-color">Color</p>
            <div class="contenido-min-320 down-color">
                <li class="list-marcas"><a href="">Otro </a>()</li>
                <li class="list-marcas"><a href="">Gris </a>()</li>
                <li class="list-marcas"><a href="">Blanco </a>()</li>
                <li class="list-marcas"><a href="">Negro </a>()</li>
                <li class="list-marcas"><a href="">Azul </a>()</li>
                <li class="list-marcas"><a href="">Plata </a>()</li>
                <li class="list-marcas"><a href="">Rojo </a>()</li>
                <li class="list-marcas"><a href="">Bordo </a>()</li>
                <li class="list-marcas"><a href="">Verde </a>()</li>
                <div class="contenido-color" style="display: none">
                    <li class="list-marcas"><a href="">Amarillo </a>()</li>
                    <li class="list-marcas"><a href="">Beige </a>()</li>
                    <li class="list-marcas"><a href="">Celeste </a>()</li>
                    <li class="list-marcas"><a href="">Champagne </a>()</li>
                    <li class="list-marcas"><a href="">Marrón </a>()</li>
                    <li class="list-marcas"><a href="">Oro </a>()</li>
                    <li class="list-marcas"><a href="">Rosado </a>()</li>
                </div>
                <li class="list-marcas"><a class="mas-opciones-color link-opciones">Más opciones <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>

            </div>

            <p class="title-nav btn-min-320 btn-min-direccion">Dirección</p>
            <div class="contenido-min-320 down-direccion">
                <li class="list-marcas"><a href="">Asistida </a>()</li>
                <li class="list-marcas"><a href="">Hidraúlica </a>()</li>
                <li class="list-marcas"><a href="">Mecánica </a>()</li>
            </div>


        </div>

        <div class="listado-autos">
            @foreach($auto as $a)
                <div class="relleno-auto">
                    <div class="caja-auto">
                        <a href="{{ url('autos',$a->id) }}/{{ strtolower(str_replace(' ','-',$a->titulo)) }}">
                            <div class="cont-img-car">
                                <img class="img-car" src="/imagenes_autos/{{ $a->imagen1 }}" alt="">
                            </div>
                        </a>
                        <p class="title-auto"><a href="{{ url('autos',$a->id) }}/{{ strtolower(str_replace(' ','-',$a->titulo)) }}">{{ $a->titulo }}</a></p>
                        <p class="precio-auto">$ {{ number_format($a->precio,0,'','.') }}</p>
                        <p class="anio-km">{{ $a->anio }} | {{ number_format($a->km,0,'','.') }} km</p>
                        <p class="provincia-auto">{{ ucwords(strtolower($a->provincia)) }}</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>
@endsection
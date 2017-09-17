@extends('layouts.master')
@section('title','Autos 0km y Autos usados en cars.com')
@section('content')
<div class="contenido-autos">
    <div class="caja-submenu">
        <div class="submenu">
            <!-- links del submenu que esta en el pricipio, para una navegacion mas rapida -->
            <a href="{{ url('/') }}">inicio » </a>
            <a href="{{ url('/autos') }}">Autos nuevos y usados » </a>
            <?php if (!isset($_GET['rango'])){ ?>
                <a href="{{ url('selected') }}?marca=<?php echo $_GET['marca']; ?>"><?php echo $_GET['marca']; ?> »</a>
            <?php } ?>

            <?php if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango'])){ ?>
                <a href="{{ url('selected') }}?marca=<?php echo $_GET['marca']; ?>"><?php echo $_GET['marca']; ?> »</a>
                <a href="{{ url('selected') }}/modelo?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>"><?php echo $_GET['modelo']; ?> »</a>
                <strong><?php echo $_GET['rango']; ?></strong>
            <?php  ?>

            <?php }elseif (isset($_GET['rango'])){ ?>
                <a href="{{ url('year') }}?rango=<?php echo $_GET['rango']; ?>"><?php echo $_GET['rango']; ?> »</a>
                <a href="{{ url('selected') }}?marca=<?php echo $_GET['marca']; ?>"><?php echo $_GET['marca']; ?> »</a>
                <strong><?php echo $_GET['modelo']; ?></strong>
            <?php }else{ ?>
                <strong><?php if (isset($_GET['modelo'])){ echo $_GET['modelo']; } ?></strong>
            <?php } ?>
            <!-- el total de auto encontrado mas la marca y el modelo -->
            <span style="float: right"><b>{{ $total }}</b> <?php if (isset($_GET['marca'])){ echo $_GET['marca'].' '.$_GET['modelo']; }else{ echo 'Autos'; } ?> encontrados</span>
        </div>
        <div class="atajo-relevantes">
            <a id="relevantes">Más relevantes <i class="fa fa-caret-down" aria-hidden="true"></i></a>
            <div class="filtro-precios" style="display: none">
            <?php if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['0km'])){ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&0km&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&0km&precio_desc">Mayor precio</a>
            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta'])){ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&precio_desc">Mayor precio</a>
            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['0km'])){ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&0km&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&0km&precio_desc">Mayor precio</a>
            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['precio']) && isset($_GET['hasta'])){ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&precio_desc">Mayor precio</a>
            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['mas'])){ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&mas=<?php echo $_GET['mas']; ?>&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&mas=<?php echo $_GET['mas']; ?>&precio_desc">Mayor precio</a>
            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio'])){ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&precio_desc">Mayor precio</a>
            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['0km'])){ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&0km&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&0km&precio_desc">Mayor precio</a>
            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango'])){ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio_desc">Mayor precio</a>
            <?php }elseif(isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['mas'])){ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&mas=<?php echo $_GET['mas']; ?>&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&mas=<?php echo $_GET['mas']; ?>&precio_desc">Mayor precio</a>
            <?php }elseif(isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['0km'])){ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&0km&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&0km&precio_desc">Mayor precio</a>
            <?php }else{ ?>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&precio_asc">Menor precio</a><br>
                <a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&precio_desc">Mayor precio</a>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="panel-autos">
        <div class="categorias-navegacion">
            <?php if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta'])){ ?>

            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['precio']) && isset($_GET['hasta'])){ ?>
                <p class="title-nav btn-min-320 btn-min-anio">Año</p>
                @foreach($anio as $an)
                    <li class="list-marcas">
                        <a href="?marca={{ strtolower($an->marca) }}&modelo={{ strtolower($an->modelo) }}&rango={{ $an->anio }}&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>">
                            {{ $an->anio }}
                        </a> ({{ $an->total_anio_mar_mod }})
                    </li>
                @endforeach
            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango'])){ ?>

            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['mas'])){ ?>
                <p class="title-nav btn-min-320 btn-min-anio">Año</p>
                @foreach($anio as $an)
                    <li class="list-marcas">
                        <a href="?marca={{ strtolower($an->marca) }}&modelo={{ strtolower($an->modelo) }}&rango={{ $an->anio }}&mas=<?php echo $_GET['mas']; ?>">
                            {{ $an->anio }}
                        </a> ({{ $an->total_anio_mar_mod }})
                    </li>
                @endforeach
            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['precio'])){ ?>
                <p class="title-nav btn-min-320 btn-min-anio">Año</p>
                @foreach($anio as $an)
                    <li class="list-marcas">
                        <a href="?marca={{ strtolower($an->marca) }}&modelo={{ strtolower($an->modelo) }}&rango={{ $an->anio }}&precio=<?php echo $_GET['precio']; ?>">
                            {{ $an->anio }}
                        </a> ({{ $an->total_anio_mar_mod }})
                    </li>
                @endforeach
            <?php }elseif(isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['0km'])){ ?>
                <p class="title-nav btn-min-320 btn-min-anio">Año</p>
                    @foreach($anio as $an)
                        <li class="list-marcas">
                            <a href="?marca={{ strtolower($an->marca) }}&modelo={{ strtolower($an->modelo) }}&rango={{ $an->anio }}&0km">
                                {{ $an->anio }}
                            </a> ({{ $an->total_anio_mar_mod }})
                        </li>
                    @endforeach
            <?php }else{ ?>
                <p class="title-nav btn-min-320 btn-min-anio">Año</p>
                <div class="contenido-min-320 down-anio">
                @foreach($anio as $an)
                    <li class="list-marcas">
                        <a href="?marca={{ strtolower($an->marca) }}&modelo={{ strtolower($an->modelo) }}&rango={{ $an->anio }}">
                            {{ $an->anio }}
                        </a> ({{ $an->total_anio_mar_mod }})
                    </li>
                @endforeach
                    <!--<li class="list-marcas"><a href="">2017 </a>()</li>
                    <li class="list-marcas"><a href="">2016 </a>()</li>
                    <li class="list-marcas"><a href="">2015 </a>()</li>
                    <li class="list-marcas"><a href="">2014 </a>()</li>
                    <li class="list-marcas"><a href="">2013 </a>()</li>
                    <li class="list-marcas"><a href="">2012 </a>()</li>
                    <li class="list-marcas"><a href="">2011 </a>()</li>
                    <li class="list-marcas"><a href="">2010 </a>()</li>
                    <li class="list-marcas"><a href="">2009 </a>()</li>
                    <div class="contenido-años" style="display: none">
                        <li class="list-marcas"><a href="">2008 </a>()</li>
                        <li class="list-marcas"><a href="">2007 </a>()</li>
                        <li class="list-marcas"><a href="">2006 </a>()</li>
                        <li class="list-marcas"><a href="">2005 </a>()</li>
                        <li class="list-marcas"><a href="">2004 </a>()</li>
                        <li class="list-marcas"><a href="">2003 </a>()</li>
                        <li class="list-marcas"><a href="">2002 </a>()</li>
                        <li class="list-marcas"><a href="">2001 </a>()</li>
                        <li class="list-marcas"><a href="">2000 </a>()</li>
                        <li class="list-marcas"><a href="">1999 </a>()</li>
                        <li class="list-marcas"><a href="">1998 </a>()</li>
                        <li class="list-marcas"><a href="">Otras años</a></li>
                    </div>
                    <li class="list-marcas"><a class="mas-opciones-años link-opciones">Más opciones <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
                    -->
                </div>

            <?php } ?>

                <?php if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio'])){ ?>

                <?php }elseif(isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['mas'])){ ?>

                <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['precio'])){ ?>

                <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['0km'])){ ?>
                <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
                <div class="contenido-min-320 down-precio">
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=200000&0km">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=200000&hasta=500000&0km">$200.000 a $500.000 </a>({{ $precio_quinientos_mil }})</li>
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&mas=500000&0km">Más de $500.000 </a>({{ $precio_mas_quinientos_mil }})</li>
                </div>
                <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango'])){ ?>
                <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
                <div class="contenido-min-320 down-precio">
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=200000">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=200000&hasta=500000">$200.000 a $500.000 </a>({{ $precio_quinientos_mil }})</li>
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&mas=500000">Más de $500.000 </a>({{ $precio_mas_quinientos_mil }})</li>
                </div>
                <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo'])){ ?>
                <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
                <div class="contenido-min-320 down-precio">
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&precio=200000">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&precio=200000&hasta=500000">$200.000 a $500.000 </a>({{ $precio_quinientos_mil }})</li>
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&mas=500000">Más de $500.000 </a>({{ $precio_mas_quinientos_mil }})</li>
                </div>
                <?php }elseif (isset($_GET['marca']) && isset($_GET['rango'])){ ?>
                <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
                <div class="contenido-min-320 down-precio">
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=200000">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=200000&hasta=500000">$200.000 a $500.000 </a>({{ $precio_quinientos_mil }})</li>
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&rango=<?php echo $_GET['rango']; ?>&mas=500000">Más de $500.000 </a>({{ $precio_mas_quinientos_mil }})</li>
                </div>
                <?php }elseif (isset($_GET['rango'])){?>
                <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
                <div class="contenido-min-320 down-precio">
                    <li class="list-marcas"><a href="?rango=<?php echo $_GET['rango']; ?>&precio=200000">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                    <li class="list-marcas"><a href="?rango=<?php echo $_GET['rango']; ?>&precio=200000&hasta=500000">$200.000 a $500.000 </a>({{ $precio_quinientos_mil }})</li>
                    <li class="list-marcas"><a href="?rango=<?php echo $_GET['rango']; ?>&mas=500000">Más de $500.000 </a>({{ $precio_mas_quinientos_mil }})</li>
                </div>
                <?php }elseif(isset($_GET['marca'])){ ?>
                <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
                <div class="contenido-min-320 down-precio">
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&precio=200000">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&precio=200000&hasta=500000">$200.000 a $500.000 </a>({{ $precio_quinientos_mil }})</li>
                    <li class="list-marcas"><a href="?marca=<?php echo $_GET['marca']; ?>&mas=500000">Más de $500.000 </a>({{ $precio_mas_quinientos_mil }})</li>
                </div>
                <?php }else{ ?>
                <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
                <div class="contenido-min-320 down-precio">
                    <li class="list-marcas"><a href="?precio=200000">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                    <li class="list-marcas"><a href="?precio=200000&hasta=500000">$200.000 a $500.000 </a>({{ $precio_quinientos_mil }})</li>
                    <li class="list-marcas"><a href="?mas=500000">Más de $500.000 </a>({{ $precio_mas_quinientos_mil }})</li>
                </div>
                <?php } ?>

            <!--<p class="title-nav btn-min-320 btn-min-vendedor">Vendedor</p>
            <div class="contenido-min-320 down-vendedor">
                <li class="list-marcas"><a href="">Concesionaria </a>()</li>
                <li class="list-marcas"><a href="">Dueño directo </a>()</li>
            </div>-->

            <?php  if (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta']) && isset($_GET['0km'])){ ?>

            <?php  }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta'])){ ?>
                <p class="title-nav btn-min-320 btn-min-estado">Estado</p>
                <div class="contenido-min-320 down-estado">
                    <li class="list-marcas"><a href="{{ url('selected') }}/modelo?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&0km">Nuevo </a>({{ $nuevos }})</li>
                    <li class="list-marcas"><a href="{{ url('selected') }}/modelo?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&usados">Usado </a>({{ $usados }})</li>
                </div>
            <?php  }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['0km'])){ ?>

             <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['0km'])){ ?>

            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango']) && isset($_GET['precio'])){ ?>
                <p class="title-nav btn-min-320 btn-min-estado">Estado</p>
                <div class="contenido-min-320 down-estado">
                    <li class="list-marcas"><a href="{{ url('selected') }}/modelo?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&0km">Nuevo </a>({{ $nuevos }})</li>
                    <li class="list-marcas"><a href="{{ url('selected') }}/modelo?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&usados">Usado </a>({{ $usados }})</li>
                </div>
            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['0km'])){ ?>

            <?php }elseif (isset($_GET['marca']) && isset($_GET['modelo']) && isset($_GET['rango'])){ ?>
                <p class="title-nav btn-min-320 btn-min-estado">Estado</p>
                <div class="contenido-min-320 down-estado">
                    <li class="list-marcas"><a href="{{ url('selected') }}/modelo?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&0km">Nuevo </a>({{ $nuevos }})</li>
                    <li class="list-marcas"><a href="{{ url('selected') }}/modelo?marca=<?php echo $_GET['marca']; ?>&modelo=<?php echo $_GET['modelo']; ?>&rango=<?php echo $_GET['rango']; ?>&usados">Usado </a>({{ $usados }})</li>
                </div>
            <?php }else{ ?>
            <p class="title-nav btn-min-320 btn-min-estado">Estado</p>
            <div class="contenido-min-320 down-estado">
                <li class="list-marcas"><a href="">Nuevo </a>({{ $nuevos }})</li>
                <li class="list-marcas"><a href="">Usado </a>({{ $usados }})</li>
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
                        <p class="title-auto">
                            <a href="{{ url('autos',$a->id) }}/{{ strtolower(str_replace(' ','-',$a->titulo)) }}">{{ $a->titulo }}</a>
                        </p>
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
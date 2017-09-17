@extends('layouts.master')
@section('title','Autos 0km y Autos usados en cars.com')
@section('content')
<div class="contenido-autos">
    <div class="caja-submenu">
        <div class="submenu">
            <a href="{{ url('/') }}">inicio » </a>
            <a href="{{ url('/autos') }}">Autos nuevos y usados » </a>
            <?php if (isset($_GET['rango'])){ ?>
            <strong><?php echo $_GET['rango']; ?></strong>
            <?php } ?>
            <strong><?php if (isset($_GET['marca'])){ echo $_GET['marca'];  } ?></strong>
            <span style="float: right"><b>{{ $total }}</b> <?php if (isset($_GET['marca'])){ echo $_GET['marca']; }else{ echo 'Autos'; } ?> encontrados</span>
        </div>
        <div class="atajo-relevantes">
            <a id="relevantes">Más relevantes <i class="fa fa-caret-down" aria-hidden="true"></i></a>
            <div class="filtro-precios" style="display: none">
                <?php if (isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta'])){ ?>
                <a href="year?rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&precio_asc">Menor precio</a><br>
                <a href="year?rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>&precio_desc">Mayor precio</a>
                <?php }else{ ?>
                <a href="year?rango=<?php echo $_GET['rango']; ?>&precio_asc">Menor precio</a><br>
                <a href="year?rango=<?php echo $_GET['rango']; ?>&precio_desc">Mayor precio</a>
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="panel-autos">
        <div class="categorias-navegacion">
            <p class="title-nav btn-min-320 btn-min-marca">Marca</p>
           <div class="contenido-min-320 down-marca">
               <?php if (isset($_GET['rango']) && isset($_GET['precio']) && isset($_GET['hasta'])){ ?>
                   @foreach($marca as $mar)
                       <li class="list-marcas">
                           <a href="selected?marca={{ strtolower($mar->marca) }}&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>&hasta=<?php echo $_GET['hasta']; ?>">{{ strtolower($mar->marca) }}</a>
                           ({{ $mar->total_anios }})
                       </li>
                   @endforeach
               <?php }elseif (isset($_GET['rango']) && isset($_GET['precio'])){ ?>
                   @foreach($marca as $mar)
                       <li class="list-marcas">
                           <a href="selected?marca={{ strtolower($mar->marca) }}&rango=<?php echo $_GET['rango']; ?>&precio=<?php echo $_GET['precio']; ?>">{{ strtolower($mar->marca) }}</a>
                           ({{ $mar->total_anios }})
                       </li>
                   @endforeach
               <?php }elseif (isset($_GET['rango'])){ ?>
            @foreach($marca as $mar)
                <li class="list-marcas">
                    <a href="selected?marca={{ strtolower($mar->marca) }}&rango=<?php echo $_GET['rango']; ?>">{{ strtolower($mar->marca) }}</a>
                    ({{ $mar->total_anios }})
                </li>
            @endforeach
               <?php }else{ ?>
                   @foreach($marca as $mar)
                       <li class="list-marcas">
                           <a href="selected?marca={{ strtolower($mar->marca) }}&rango=<?php echo $_GET['rango']; ?>">{{ strtolower($mar->marca) }}</a>
                           ({{ $mar->total_anios }})
                       </li>
               @endforeach
               <?php } ?>
            <!--<div class="contenido-min-320 down-marca">
                <li class="list-marcas"><a href="selected?marca=volkswagen">Volkswagen </a>()</li>
                <li class="list-marcas"><a href="selected?marca=ford">Ford </a>()</li>
                <li class="list-marcas"><a href="selected?marca=fiat">Fiat </a>()</li>
                <li class="list-marcas"><a href="selected?marca=renault">Renault </a>()</li>
                <li class="list-marcas"><a href="selected?marca=peugeot">Peugeot </a>()</li>
                <li class="list-marcas"><a href="selected?marca=chevrolet">Chevrolet </a>()</li>
                <li class="list-marcas"><a href="selected?marca=citroen">Citroén </a>()</li>
                <li class="list-marcas"><a href="selected?marca=toyota">Toyota </a>()</li>
                <li class="list-marcas"><a href="selected?marca=honda">Honda </a>()</li>

                <div class="contenido-marcas" style="display: none">
                    <li class="list-marcas"><a href="?marca=alfa romeo">Alfa Romeo </a></li>
                    <li class="list-marcas"><a href="?marca=asia">Asia </a></li>
                    <li class="list-marcas"><a href="?marca=audi">Audi </a></li>
                    <li class="list-marcas"><a href="?marca=bmw">BMW </a></li>
                    <li class="list-marcas"><a href="?marca=chery">Chery </a></li>
                    <li class="list-marcas"><a href="?marca=chrysler">Chrysler </a></li>
                    <li class="list-marcas"><a href="?marca=daewoo">Daewoo </a></li>
                    <li class="list-marcas"><a href="?marca=daihatsu">Daihatsu </a></li>
                    <li class="list-marcas"><a href="?marca=dodge">Dodge </a></li>
                    <li class="list-marcas"><a href="?marca=ferrari">Ferrari </a></li>
                    <li class="list-marcas"><a href="?marca=hummer">Hummer </a></li>
                    <li class="list-marcas"><a href="?marca=hyundai">Hyundai </a></li>
                    <li class="list-marcas"><a href="?marca=isuzu">Isuzu </a></li>
                    <li class="list-marcas"><a href="?marca=jaguar">Jaguar </a></li>
                    <li class="list-marcas"><a href="?marca=jepp">Jepp </a></li>
                    <li class="list-marcas"><a href="?marca=kia">Kia </a></li>
                    <li class="list-marcas"><a href="?marca=lada">Lada </a></li>
                    <li class="list-marcas"><a href="?marca=land rover">Land Rober </a></li>
                    <li class="list-marcas"><a href="?marca=lifan">Lifan </a></li>
                    <li class="list-marcas"><a href="?marca=mazda">Mazda </a></li>
                    <li class="list-marcas"><a href="?marca=mercedes benz">Mercedes Benz</a></li>
                    <li class="list-marcas"><a href="?marca=mini">Mini </a></li>
                    <li class="list-marcas"><a href="?marca=mitsubishi">Mitsubishi </a></li>
                    <li class="list-marcas"><a href="?marca=nissan">Nissan </a></li>
                    <li class="list-marcas"><a href="?marca=porsche">Porsche </a></li>
                    <li class="list-marcas"><a href="?marca=ram">Ram </a></li>
                    <li class="list-marcas"><a href="?marca=rover">Rover </a></li>
                    <li class="list-marcas"><a href="?marca=seat">Seat </a></li>
                    <li class="list-marcas"><a href="?marca=smart">Smart </a></li>
                    <li class="list-marcas"><a href="?marca=ssangyong">Ssangyong </a></li>
                    <li class="list-marcas"><a href="?marca=subaru">Subaru </a></li>
                    <li class="list-marcas"><a href="?marca=susuki">Susuki </a></li>
                    <li class="list-marcas"><a href="?marca=tata">Tata </a></li>
                    <li class="list-marcas"><a href="?marca=volvo">Volvo </a></li>
                    <li class="list-marcas"><a href="?marca?otras marcas">Otras Marcas</a></li>
                </div>
                <li class="list-marcas"><a class="mas-opciones-marcas link-opciones">Más opciones <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
            -->
            </div>

            <p class="title-nav btn-min-320 btn-min-modelo">Modelo</p>
            <div class="contenido-min-320 down-modelo">

                <?php if (isset($_GET['rango']) && isset($_GET['precio'])){ ?>
                    @foreach($modelo as $mod)
                        <li class="list-marcas">
                            <a href="{{ url('selected') }}/modelo?marca={{ strtolower($mod->marca) }}&modelo={{ strtolower($mod->modelo) }}&rango={{ $mod->anio }}&precio=<?php echo $_GET['precio']; ?>">
                                {{ strtolower($mod->modelo) }}
                            </a> ({{ $mod->total_modelos_general }})
                        </li>
                    @endforeach
                <?php }elseif (isset($_GET['rango'])){ ?>
                @foreach($modelo as $mod)
                    <li class="list-marcas">
                        <a href="{{ url('selected') }}/modelo?marca={{ strtolower($mod->marca) }}&modelo={{ strtolower($mod->modelo) }}&rango={{ $mod->anio }}">
                            {{ strtolower($mod->modelo) }}
                        </a> ({{ $mod->total_modelos_general }})
                    </li>
            @endforeach
                <?php }else{ ?>
                    @foreach($modelo as $mod)
                        <li class="list-marcas">
                            <a href="{{ url('selected') }}/modelo?marca={{ strtolower($mod->marca) }}&modelo={{ strtolower($mod->modelo) }}&rango={{ $mod->anio }}">
                                {{ strtolower($mod->modelo) }}
                            </a> ({{ $mod->total_modelos_general }})
                        </li>
                @endforeach
                <?php } ?>
                    <!--<li class="list-marcas"><a href="">Ranger </a>()</li>
                    <li class="list-marcas"><a href="">DS3 </a>()</li>
                    <li class="list-marcas"><a href="">208 </a>()</li>
                    <li class="list-marcas"><a href="">Tracker </a>()</li>
                    <li class="list-marcas"><a href="">Ecosport </a>()</li>
                    <li class="list-marcas"><a href="">Gol </a>()</li>
                    <li class="list-marcas"><a href="">Amarok </a>()</li>
                    <li class="list-marcas"><a href="">Suran </a>()</li>
                    <li class="list-marcas"><a href="">Palio </a>()</li>
                    <div class="contenido-modelos" style="display: none">
                        <li class="list-marcas"><a href="">Partner </a></li>
                        <li class="list-marcas"><a href="">Duster </a></li>
                        <li class="list-marcas"><a href="">Vento </a></li>
                        <li class="list-marcas"><a href="">106 </a></li>
                        <li class="list-marcas"><a href="">121 </a></li>
                        <li class="list-marcas"><a href="">125 </a></li>
                        <li class="list-marcas"><a href="">128 </a></li>
                        <li class="list-marcas"><a href="">145 </a></li>
                        <li class="list-marcas"><a href="">146 </a></li>
                        <li class="list-marcas"><a href="">147 </a></li>
                        <li class="list-marcas"><a href="">1500 </a></li>
                        <li class="list-marcas"><a href="">Otras Marcas</a></li>
                    </div>
                    <li class="list-marcas"><a class="mas-opciones-modelos link-opciones">Más opciones <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>
                    -->
            </div>

            <?php if (isset($_GET['rango']) && isset($_GET['precio'])){ ?>

            <?php }elseif(isset($_GET['rango'])){ ?>

            <?php }else{ ?>
            <p class="title-nav btn-min-320 btn-min-anio">Año</p>
            <div class="contenido-min-320 down-anio">
                @foreach($date_anio as $ani)
                    <li class="list-marcas">
                        <a href="year?rango={{ $ani->anio }}">
                            {{ $ani->anio }}</a>
                        ({{ $ani->total_anio }})
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

            <?php if (isset($_GET['rango']) && isset($_GET['precio'])){ ?>

            <?php }elseif (isset($_GET['rango'])){?>
            <p class="title-nav btn-min-320 btn-min-precio">Rango de precios</p>
            <div class="contenido-min-320 down-precio">
                <li class="list-marcas"><a href="?rango=<?php echo $_GET['rango']; ?>&precio=200000">Hasta $200.000 </a>({{ $precio_doscientos_mil }})</li>
                <li class="list-marcas"><a href="?rango=<?php echo $_GET['rango']; ?>&precio=200000&hasta=500000">$200.000 a $500.000 </a>({{ $precio_quinientos_mil }})</li>
                <li class="list-marcas"><a href="?rango=<?php echo $_GET['rango']; ?>&mas=500000">Más de $500.000 </a>({{ $precio_mas_quinientos_mil }})</li>
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


            <p class="title-nav btn-min-320 btn-min-estado">Estado</p>
            <div class="contenido-min-320 down-estado">
                <li class="list-marcas"><a href="">Nuevo </a>({{ $nuevos }})</li>
                <li class="list-marcas"><a href="">Usado </a>({{ $usados }})</li>
            </div>

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
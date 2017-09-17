@extends('layouts.app')

@section('content')

<div class="container col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="row">
        <!--<div class="">-->
            <div class="contenido-submenu">
                <div class="submenu">
                    <a href="{{ url('/') }}" class="sub-home"><i class="fa fa-home" aria-hidden="true"></i></a><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    <a href="{{ url('/foros') }}" class="sub-home">Foros</a>
                </div>
                <div class="search-general">
                    <form action="{{ url('search') }}" method="get" id="buscadorGeneral">
                        <div class="">
                            <input type="text" name="user" id="nameUser" class="input-search" placeholder="Búscar usuario">
                        </div>
                        <button type="submit" class="btn-submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="contenido-body">
                <div class="cat-title">
                    <i class="fa fa-align-justify" aria-hidden="true"></i> GENERAL
                    <!--<img src="/img/php.png" alt=""> PHP-->
                    <a href="#" id="show-cat" style="display: none" title="Mostrar más">
                        <i class="fa fa-plus masYmenos" aria-hidden="true"></i>
                    </a>
                    <a href="#" id="hiden-cat" title="Mostrar menos">
                        <i class="fa fa-minus masYmenos" aria-hidden="true"></i>
                    </a>
                </div>
                <div class="caja-cat">
                    @foreach($foro_libre as $t)
                        <div class="mini-categorias">
                            <div class="separador-cat">
                                <i class="fa fa-comments agrandar-icono" aria-hidden="true"></i>
                                <a href="{{ url('/foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}" class="title-cat" title="{{ $t->cat_descripcion }}" data-toggle="tooltip" data-placement="top">{{ $t->cat_nombre }}</a>
                                <p class="preg">
                                    <i class="fa fa-comment-o color-icon" aria-hidden="true" title="Total de preguntas"></i>
                                    <b>{{ $cantidad_preguntas_foro }}</b>
                                </p>
                                <p class="resp">
                                    <i class="fa fa-files-o color-icon" aria-hidden="true" title="Total de respuestas"></i>
                                    <b>{{ $cantidad_respuestas_foro }}</b>
                                </p>
                            </div>
                            <p class="ultimo-cat"><b class="u-cat">Último: </b>
                                <a class="link-cat" href="{{ url('pregunta',$t->slug) }}" title="{{ $t->titulo }}" data-toggle="tooltip" data-placement="top">
                                    {{ str_limit($t->titulo, 24) }}
                                </a>
                            </p>
                            <p class="ultimo-cat"><b class="u-cat">
                                    <a class="link-cat color_negro" href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">
                                        {{ str_limit($t->name,9) }}
                                        </a>,
                                </b>{{ $t->fecha }}</p>
                        </div>
                    @endforeach

                    @foreach($humor as $t)
                        <div class="mini-categorias">
                            <div class="separador-cat">
                                <i class="fa fa-comments agrandar-icono" aria-hidden="true"></i>
                                <a href="{{ url('/foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}" class="title-cat" title="{{ $t->cat_descripcion }}" data-toggle="tooltip" data-placement="top">{{ $t->cat_nombre }}</a>
                                <p class="preg">
                                    <i class="fa fa-comment-o color-icon" aria-hidden="true" title="Total de preguntas"></i>
                                    <b>{{ $cantidad_preguntas_humor }}</b>
                                </p>
                                <p class="resp">
                                    <i class="fa fa-files-o color-icon" aria-hidden="true" title="Total de respuestas"></i>
                                    <b>{{ $cantidad_respuestas_humor }}</b>
                                </p>
                            </div>
                            <p class="ultimo-cat"><b class="u-cat">Último: </b>
                                <a class="link-cat" href="{{ url('pregunta',$t->slug) }}" title="{{ $t->titulo }}" data-toggle="tooltip" data-placement="top">
                                    {{ str_limit($t->titulo, 22) }}
                                </a>
                            </p>
                            <p class="ultimo-cat"><b class="u-cat">
                                    <a class="link-cat color_negro" href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">
                                        {{ str_limit($t->name,9) }}
                                    </a>,
                                </b>{{ $t->fecha }}</p>
                        </div>
                    @endforeach

                    @foreach($paranormal as $t)
                        <div class="mini-categorias">
                            <div class="separador-cat">
                                <i class="fa fa-comments agrandar-icono" aria-hidden="true"></i>
                                <a href="{{ url('/foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}" class="title-cat" title="{{ $t->cat_descripcion }}" data-toggle="tooltip" data-placement="top">{{ $t->cat_nombre }}</a>
                                <p class="preg">
                                    <i class="fa fa-comment-o color-icon" aria-hidden="true" title="Total de preguntas"></i>
                                    <b>{{ $cantidad_preguntas_paranormal }}</b>
                                </p>
                                <p class="resp">
                                    <i class="fa fa-files-o color-icon" aria-hidden="true" title="Total de respuestas"></i>
                                    <b>{{ $cantidad_respuestas_paranormal }}</b>
                                </p>
                            </div>
                            <p class="ultimo-cat"><b class="u-cat">Último: </b>
                                <a class="link-cat" href="{{ url('pregunta',$t->slug) }}" title="{{ $t->titulo }}" data-toggle="tooltip" data-placement="top">
                                    {{ str_limit($t->titulo, 22) }}
                                </a>
                            </p>
                            <p class="ultimo-cat"><b class="u-cat">
                                    <a class="link-cat color_negro" href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">
                                        {{ str_limit($t->name,9) }}
                                    </a>,
                                </b>{{ $t->fecha }}</p>
                        </div>
                    @endforeach

                    @foreach($curiosidades as $t)
                        <div class="mini-categorias">
                            <div class="separador-cat">
                                <i class="fa fa-comments agrandar-icono" aria-hidden="true"></i>
                                <a href="{{ url('/foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}" class="title-cat" title="{{ $t->cat_descripcion }}" data-toggle="tooltip" data-placement="top">{{ $t->cat_nombre }}</a>
                                <p class="preg">
                                    <i class="fa fa-comment-o color-icon" aria-hidden="true" title="Total de preguntas"></i>
                                    <b>{{ $cantidad_preguntas_curiosidades }}</b>
                                </p>
                                <p class="resp">
                                    <i class="fa fa-files-o color-icon" aria-hidden="true" title="Total de respuestas"></i>
                                    <b>{{ $cantidad_respuestas_curiosidades }}</b>
                                </p>
                            </div>
                            <p class="ultimo-cat"><b class="u-cat">Último: </b>
                                <a class="link-cat" href="{{ url('pregunta',$t->slug) }}" title="{{ $t->titulo }}" data-toggle="tooltip" data-placement="top">
                                    {{ str_limit($t->titulo, 22) }}
                                </a>
                            </p>
                            <p class="ultimo-cat"><b class="u-cat">
                                    <a class="link-cat color_negro" href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">
                                        {{ str_limit($t->name,9) }}
                                    </a>,
                                </b>{{ $t->fecha }}</p>
                        </div>
                    @endforeach

                    @foreach($libros as $t)
                        <div class="mini-categorias">
                            <div class="separador-cat">
                                <i class="fa fa-comments agrandar-icono" aria-hidden="true"></i>
                                <a href="{{ url('/foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}" class="title-cat" title="{{ $t->cat_descripcion }}" data-toggle="tooltip" data-placement="top">{{ $t->cat_nombre }}</a>
                                <p class="preg">
                                    <i class="fa fa-comment-o color-icon" aria-hidden="true" title="Total de preguntas"></i>
                                    <b>{{ $cantidad_preguntas_libros}}</b>
                                </p>
                                <p class="resp">
                                    <i class="fa fa-files-o color-icon" aria-hidden="true" title="Total de respuestas"></i>
                                    <b>{{ $cantidad_respuestas_libros}}</b>
                                </p>
                            </div>
                            <p class="ultimo-cat"><b class="u-cat">Último: </b>
                                <a class="link-cat" href="{{ url('pregunta',$t->slug) }}" title="{{ $t->titulo }}" data-toggle="tooltip" data-placement="top">
                                    {{ str_limit($t->titulo, 22) }}
                                </a>
                            </p>
                            <p class="ultimo-cat"><b class="u-cat">
                                    <a class="link-cat color_negro" href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">
                                        {{ str_limit($t->name,9) }}
                                    </a>,
                                </b>{{ $t->fecha }}</p>
                        </div>
                    @endforeach

                    @foreach($anime as $t)
                        <div class="mini-categorias">
                            <div class="separador-cat">
                                <i class="fa fa-comments agrandar-icono" aria-hidden="true"></i>
                                <a href="{{ url('/foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}" class="title-cat" title="{{ $t->cat_descripcion }}" data-toggle="tooltip" data-placement="top">{{ $t->cat_nombre }}</a>
                                <p class="preg">
                                    <i class="fa fa-comment-o color-icon" aria-hidden="true" title="Total de preguntas"></i>
                                    <b>{{ $cantidad_preguntas_anime}}</b>
                                </p>
                                <p class="resp">
                                    <i class="fa fa-files-o color-icon" aria-hidden="true" title="Total de respuestas"></i>
                                    <b>{{ $cantidad_respuestas_anime}}</b>
                                </p>
                            </div>
                            <p class="ultimo-cat"><b class="u-cat">Último: </b>
                                <a class="link-cat" href="{{ url('pregunta',$t->slug) }}" title="{{ $t->titulo }}" data-toggle="tooltip" data-placement="top">
                                    {{ str_limit($t->titulo, 22) }}
                                </a>
                            </p>
                            <p class="ultimo-cat"><b class="u-cat">
                                    <a class="link-cat color_negro" href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">
                                        {{ str_limit($t->name,9) }}
                                    </a>,
                                </b>{{ $t->fecha }}</p>
                        </div>
                    @endforeach

                    @foreach($musica as $t)
                        <div class="mini-categorias">
                            <div class="separador-cat">
                                <i class="fa fa-comments agrandar-icono" aria-hidden="true"></i>
                                <a href="{{ url('/foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}" class="title-cat" title="{{ $t->cat_descripcion }}" data-toggle="tooltip" data-placement="top">{{ $t->cat_nombre }}</a>
                                <p class="preg">
                                    <i class="fa fa-comment-o color-icon" aria-hidden="true" title="Total de preguntas"></i>
                                    <b>{{ $cantidad_preguntas_musica}}</b>
                                </p>
                                <p class="resp">
                                    <i class="fa fa-files-o color-icon" aria-hidden="true" title="Total de respuestas"></i>
                                    <b>{{ $cantidad_respuestas_musica}}</b>
                                </p>
                            </div>
                            <p class="ultimo-cat"><b class="u-cat">Último: </b>
                                <a class="link-cat" href="{{ url('pregunta',$t->slug) }}" title="{{ $t->titulo }}" data-toggle="tooltip" data-placement="top">
                                    {{ str_limit($t->titulo, 22) }}
                                </a>
                            </p>
                            <p class="ultimo-cat"><b class="u-cat">
                                    <a class="link-cat color_negro" href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">
                                        {{ str_limit($t->name,9) }}
                                    </a>,
                                </b>{{ $t->fecha }}</p>
                        </div>
                    @endforeach

                    @foreach($cine as $t)
                        <div class="mini-categorias">
                            <div class="separador-cat">
                                <i class="fa fa-comments agrandar-icono" aria-hidden="true"></i>
                                <a href="{{ url('/foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}" class="title-cat" title="{{ $t->cat_descripcion }}" data-toggle="tooltip" data-placement="top">{{ $t->cat_nombre }}</a>
                                <p class="preg">
                                    <i class="fa fa-comment-o color-icon" aria-hidden="true" title="Total de preguntas"></i>
                                    <b>{{ $cantidad_preguntas_cine}}</b>
                                </p>
                                <p class="resp">
                                    <i class="fa fa-files-o color-icon" aria-hidden="true" title="Total de respuestas"></i>
                                    <b>{{ $cantidad_respuestas_cine}}</b>
                                </p>
                            </div>
                            <p class="ultimo-cat"><b class="u-cat">Último: </b>
                                <a class="link-cat" href="{{ url('pregunta',$t->slug) }}" title="{{ $t->titulo }}" data-toggle="tooltip" data-placement="top">
                                    {{ str_limit($t->titulo, 22) }}
                                </a>
                            </p>
                            <p class="ultimo-cat"><b class="u-cat">
                                    <a class="link-cat color_negro" href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">
                                        {{ str_limit($t->name,9) }}
                                    </a>,
                                </b>{{ $t->fecha }}</p>
                        </div>
                    @endforeach

                    @foreach($deportes as $t)
                        <div class="mini-categorias">
                            <div class="separador-cat">
                                <i class="fa fa-comments agrandar-icono" aria-hidden="true"></i>
                                <a href="{{ url('/foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}" class="title-cat" title="{{ $t->cat_descripcion }}" data-toggle="tooltip" data-placement="top">{{ $t->cat_nombre }}</a>
                                <p class="preg">
                                    <i class="fa fa-comment-o color-icon" aria-hidden="true" title="Total de preguntas"></i>
                                    <b>{{ $cantidad_preguntas_deportes}}</b>
                                </p>
                                <p class="resp">
                                    <i class="fa fa-files-o color-icon" aria-hidden="true" title="Total de respuestas"></i>
                                    <b>{{ $cantidad_respuestas_deportes}}</b>
                                </p>
                            </div>
                            <p class="ultimo-cat"><b class="u-cat">Último: </b>
                                <a class="link-cat" href="{{ url('pregunta',$t->slug) }}" title="{{ $t->titulo }}" data-toggle="tooltip" data-placement="top">
                                    {{ str_limit($t->titulo, 22) }}
                                </a>
                            </p>
                            <p class="ultimo-cat"><b class="u-cat">
                                    <a class="link-cat color_negro" href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">
                                        {{ str_limit($t->name,9) }}
                                    </a>,
                                </b>{{ $t->fecha }}</p>
                        </div>
                    @endforeach

                    @foreach($tutoriales as $t)
                        <div class="mini-categorias">
                            <div class="separador-cat">
                                <i class="fa fa-comments agrandar-icono" aria-hidden="true"></i>
                                <a href="{{ url('/foros') }}/{{ $t->cat_id }}/{{ $t->cat_slug }}" class="title-cat" title="{{ $t->cat_descripcion }}" data-toggle="tooltip" data-placement="top">{{ $t->cat_nombre }}</a>
                                <p class="preg">
                                    <i class="fa fa-comment-o color-icon" aria-hidden="true" title="Total de preguntas"></i>
                                    <b>{{ $cantidad_preguntas_tutoriales}}</b>
                                </p>
                                <p class="resp">
                                    <i class="fa fa-files-o color-icon" aria-hidden="true" title="Total de respuestas"></i>
                                    <b>{{ $cantidad_respuestas_tutoriales}}</b>
                                </p>
                            </div>
                            <p class="ultimo-cat"><b class="u-cat">Último: </b>
                                <a class="link-cat" href="{{ url('pregunta',$t->slug) }}" title="{{ $t->titulo }}" data-toggle="tooltip" data-placement="top">
                                    {{ str_limit($t->titulo, 22) }}
                                </a>
                            </p>
                            <p class="ultimo-cat"><b class="u-cat">
                                    <a class="link-cat color_negro" href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">
                                        {{ str_limit($t->name,9) }}
                                    </a>,
                                </b>{{ $t->fecha }}</p>
                        </div>
                    @endforeach

                </div>
            </div>

            <?php
                //cortar fecha
                function cortarFecha($palabras, $cantidad){
                    $cortar = substr($palabras,0, $cantidad);
                    return $cortar;
                }
            ?>

            <div class="static-aside">
                @if(Auth::check())
                    <div class="aside-contenido-r" style="width: 100%;margin: 20px 0px 20px 0px;">
                        <a href="{{ url('/tema') }}" class="btn-register">Formular una pregunta</a>
                    </div>
                @else
                    <div class="aside-contenido-r" style="width: 100%;margin: 20px 0px 0px 0px;">
                        <a href="{{ url('/register') }}" class="btn-register">Registrate Ahora</a>
                    </div>
                @endif
                <div class="aside-contenido" style="margin-top: 80px">
                    <div class="cat-title-aside">
                        <i class="fa fa-play-circle" aria-hidden="true"></i> &nbsp;&nbsp;&nbsp;ÚLTIMOS TEMAS
                    </div>
                    @foreach($foro_libre as $f)
                    <div class="caja-ult-tema">
                        @if($f->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt=""></a>
                        @elseif($f->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt=""></a>
                        @elseif($f->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt=""></a>
                        @elseif($f->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt=""></a>
                        @elseif($f->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt=""></a>
                        @endif

                        <p class="title-ult-tema"><a title="{{ $f->titulo }}" href="{{ url('pregunta') }}/{{ $f->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($f->titulo, 42) }}</a></p>
                        <p class="user-ult-tema">
                            <a href="{{ url('miembros') }}/{{ $f->user_id }}/{{ $f->name_slug }}" title="{{ $f->name }}" data-toggle="tooltip" data-placement="top">{{ str_limit($f->name,12) }}</a> - {{ cortarFecha($f->fecha,12) }}
                        </p>
                    </div>
                    @endforeach

                    @foreach($humor as $h)
                    <div class="caja-ult-tema">
                        @if($h->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $h->user_id }}/{{ $h->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt=""></a>
                        @elseif($h->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $h->user_id }}/{{ $h->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt=""></a>
                        @elseif($h->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $h->user_id }}/{{ $h->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt=""></a>
                        @elseif($h->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $h->user_id }}/{{ $h->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt=""></a>
                        @elseif($h->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $h->user_id }}/{{ $h->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt=""></a>
                        @endif

                        <p class="title-ult-tema"><a title="{{ $h->titulo }}" href="{{ url('pregunta') }}/{{ $h->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($h->titulo, 42) }}</a></p>
                         <p class="user-ult-tema">
                            <a href="{{ url('miembros') }}/{{ $h->user_id }}/{{ $h->name_slug }}" title="{{ $h->name }}" data-toggle="tooltip" data-placement="top">{{ str_limit($h->name,12) }}</a> - {{ cortarFecha($h->fecha,12) }}
                        </p>
                    </div>
                    @endforeach

                    @foreach($paranormal as $p)
                    <div class="caja-ult-tema">
                        @if($p->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $p->user_id }}/{{ $p->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt=""></a>
                        @elseif($p->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $p->user_id }}/{{ $p->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt=""></a>
                        @elseif($p->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $p->user_id }}/{{ $p->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt=""></a>
                        @elseif($p->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $p->user_id }}/{{ $p->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt=""></a>
                        @elseif($p->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $p->user_id }}/{{ $p->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt=""></a>
                        @endif

                        <p class="title-ult-tema"><a title="{{ $p->titulo }}" href="{{ url('pregunta') }}/{{ $p->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($p->titulo, 42) }}</a></p>
                         <p class="user-ult-tema">
                            <a href="{{ url('miembros') }}/{{ $p->user_id }}/{{ $p->name_slug }}" title="{{ $p->name }}" data-toggle="tooltip" data-placement="top">{{ str_limit($p->name,12) }}</a> - {{ cortarFecha($p->fecha,12) }}
                        </p>
                    </div>
                    @endforeach

                    @foreach($curiosidades as $c)
                    <div class="caja-ult-tema">
                        @if($c->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $c->user_id }}/{{ $c->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt=""></a>
                        @elseif($c->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $c->user_id }}/{{ $c->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt=""></a>
                        @elseif($c->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $c->user_id }}/{{ $c->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt=""></a>
                        @elseif($c->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $c->user_id }}/{{ $c->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt=""></a>
                        @elseif($c->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $c->user_id }}/{{ $c->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt=""></a>
                        @endif

                        <p class="title-ult-tema"><a title="{{ $c->titulo }}" href="{{ url('pregunta') }}/{{ $c->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($c->titulo, 42) }}</a></p>
                        <p class="user-ult-tema">
                            <a href="{{ url('miembros') }}/{{ $c->user_id }}/{{ $c->name_slug }}" title="{{ $c->name }}" data-toggle="tooltip" data-placement="top">{{ str_limit($c->name,12) }}</a> - {{ cortarFecha($c->fecha,12) }}
                        </p>
                    </div>
                    @endforeach

                    @foreach($libros as $l)
                    <div class="caja-ult-tema">
                        @if($l->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $l->user_id }}/{{ $l->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt=""></a>
                        @elseif($l->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $l->user_id }}/{{ $l->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt=""></a>
                        @elseif($l->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $l->user_id }}/{{ $l->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt=""></a>
                        @elseif($l->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $l->user_id }}/{{ $l->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt=""></a>
                        @elseif($l->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $l->user_id }}/{{ $l->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt=""></a>
                        @endif

                        <p class="title-ult-tema"><a title="{{ $l->titulo }}" href="{{ url('pregunta') }}/{{ $l->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($l->titulo, 42) }}</a></p>
                         <p class="user-ult-tema">
                            <a href="{{ url('miembros') }}/{{ $l->user_id }}/{{ $l->name_slug }}" title="{{ $l->name }}" data-toggle="tooltip" data-placement="top">{{ str_limit($l->name,12) }}</a> - {{ cortarFecha($l->fecha,12) }}
                        </p>
                    </div>
                    @endforeach

                    @foreach($anime as $a)
                    <div class="caja-ult-tema">
                        @if($a->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $a->user_id }}/{{ $a->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt=""></a>
                        @elseif($a->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $a->user_id }}/{{ $a->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt=""></a>
                        @elseif($a->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $a->user_id }}/{{ $a->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt=""></a>
                        @elseif($a->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $a->user_id }}/{{ $a->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt=""></a>
                        @elseif($a->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $a->user_id }}/{{ $a->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt=""></a>
                        @endif

                        <p class="title-ult-tema"><a title="{{ $a->titulo }}" href="{{ url('pregunta') }}/{{ $a->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($a->titulo, 42) }}</a></p>
                         <p class="user-ult-tema">
                            <a href="{{ url('miembros') }}/{{ $a->user_id }}/{{ $a->name_slug }}" title="{{ $a->name }}" data-toggle="tooltip" data-placement="top">{{ str_limit($a->name,12) }}</a> - {{ cortarFecha($a->fecha,12) }}
                        </p>
                    </div>
                    @endforeach

                    @foreach($musica as $m)
                    <div class="caja-ult-tema">
                        @if($m->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $m->user_id }}/{{ $m->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt=""></a>
                        @elseif($m->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $m->user_id }}/{{ $m->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt=""></a>
                        @elseif($m->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $m->user_id }}/{{ $m->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt=""></a>
                        @elseif($m->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $m->user_id }}/{{ $m->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt=""></a>
                        @elseif($m->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $m->user_id }}/{{ $m->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt=""></a>
                        @endif

                        <p class="title-ult-tema"><a title="{{ $m->titulo }}" href="{{ url('pregunta') }}/{{ $m->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($m->titulo, 42) }}</a></p>
                         <p class="user-ult-tema">
                            <a href="{{ url('miembros') }}/{{ $m->user_id }}/{{ $m->name_slug }}" title="{{ $m->name }}" data-toggle="tooltip" data-placement="top">{{ str_limit($m->name,12) }}</a> - {{ cortarFecha($m->fecha,12) }}
                        </p>
                    </div>
                    @endforeach

                    @foreach($cine as $ci)
                    <div class="caja-ult-tema">
                        @if($ci->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $ci->user_id }}/{{ $ci->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt=""></a>
                        @elseif($ci->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $ci->user_id }}/{{ $ci->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt=""></a>
                        @elseif($ci->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $ci->user_id }}/{{ $ci->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt=""></a>
                        @elseif($ci->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $ci->user_id }}/{{ $ci->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt=""></a>
                        @elseif($ci->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $ci->user_id }}/{{ $ci->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt=""></a>
                        @endif

                        <p class="title-ult-tema"><a title="{{ $ci->titulo }}" href="{{ url('pregunta') }}/{{ $ci->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($ci->titulo, 42) }}</a></p>
                         <p class="user-ult-tema">
                            <a href="{{ url('miembros') }}/{{ $ci->user_id }}/{{ $ci->name_slug }}" title="{{ $ci->name }}" data-toggle="tooltip" data-placement="top">{{ str_limit($ci->name,12) }}</a> - {{ cortarFecha($ci->fecha,12) }}
                        </p>
                    </div>
                    @endforeach

                    @foreach($deportes as $d)
                    <div class="caja-ult-tema">
                        @if($d->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $d->user_id }}/{{ $d->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt=""></a>
                        @elseif($d->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $d->user_id }}/{{ $d->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt=""></a>
                        @elseif($d->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $d->user_id }}/{{ $d->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt=""></a>
                        @elseif($d->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $d->user_id }}/{{ $d->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt=""></a>
                        @elseif($d->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $d->user_id }}/{{ $d->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt=""></a>
                        @endif
                        
                        <p class="title-ult-tema"><a title="{{ $d->titulo }}" href="{{ url('pregunta') }}/{{ $d->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($d->titulo, 42) }}</a></p>
                         <p class="user-ult-tema">
                            <a href="{{ url('miembros') }}/{{ $d->user_id }}/{{ $d->name_slug }}" title="{{ $d->name }}" data-toggle="tooltip" data-placement="top">{{ str_limit($d->name,12) }}</a> - {{ cortarFecha($d->fecha,12) }}
                        </p>
                    </div>
                    @endforeach

                    @foreach($tutoriales as $t)
                    <div class="caja-ult-tema">
                        @if($t->genero == 'M')
                        <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}"><img src="/img/man.png" class="img-ult-tema" alt=""></a>
                        @elseif($t->genero == 'F')
                        <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}"><img src="/img/woman.png" class="img-ult-tema" alt=""></a>
                        @elseif($t->genero == 'facebook')
                        <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}"><img src="/img/facebook.png" class="img-ult-tema" alt=""></a>
                        @elseif($t->genero == 'twitter')
                        <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}"><img src="/img/twitter.png" class="img-ult-tema" alt=""></a>
                        @elseif($t->genero == 'google')
                        <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}"><img src="/img/google.png" class="img-ult-tema" alt=""></a>
                        @endif
                        <p class="title-ult-tema"><a title="{{ $t->titulo }}" href="{{ url('pregunta') }}/{{ $t->slug }}" data-toggle="tooltip" data-placement="top">{{ str_limit($t->titulo, 42) }}</a></p>
                         <p class="user-ult-tema">
                            <a href="{{ url('miembros') }}/{{ $t->user_id }}/{{ $t->name_slug }}" title="{{ $t->name }}" data-toggle="tooltip" data-placement="top">{{ str_limit($t->name,12) }}</a> - {{ cortarFecha($t->fecha,12) }}
                        </p>
                    </div>
                    @endforeach

                </div>

                <div class="aside-contenido">
                    <div class="cat-title-aside">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;ESTADÍSTICAS DEL FORO
                    </div>
                    <div class="estadisticas">
                        <p>Temas: <b>{{ $total_temas }}</b></p>
                        <p>Mensajes: <b>{{ $total_mensajes }}</b></p>
                        <p>Miembros: <b>{{ $total_usuarios }}</b></p>
                        <p>Último miembro: <b>{{ $ult_user->name }}</b></p>
                    </div>
                </div>

                <div class="aside-contenido">
                    <div class="cat-title-aside">
                        <i class="fa fa-share" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;COMPARTIR ESTA PÁGINA
                    </div>
                    <div class="caja-redes-sociales">
                        <!-- twitter -->
                        <div class="redes-compartir">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://debatexpress.esy.es/">Tweet</a>
                        </div>
                        <!-- facebook -->
                        <div class="redes-compartir" style="margin-bottom: 8px">
                            <div class="fb-share-button" data-href="http://debatexpress.esy.es/" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdebatexpress.esy.es%2F&amp;src=sdkpreparse">Compartir</a></div>
                        </div>
                        <!-- google -->
                        <div class="redes-compartir">
                            <!-- Inserta esta etiqueta donde quieras que aparezca Botón Compartir. -->
                            <div class="g-plus" data-action="share" data-width="200" data-height="24" data-href="http://debatexpress.esy.es/"></div>
                        </div>

                    </div>
                </div>

            </div>

        <!--</div>-->
    </div>
</div>
@endsection
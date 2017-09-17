$(document).ready(function () {
    /* listado de modelos de las marcas */
    $('#marca_cars').change(function () {
        var idMarca = $('#marca_cars option:selected').val();
        $('#imgAjaxModelos').show();

        $.ajax({
            url:listarModelos+'/'+idMarca,
            type:'get',
            success:function (modelos) {
                $('#modelo_cars').html(modelos);
                $('#imgAjaxModelos').hide();

                $('#modelo_cars').change(function () {
                    var modelo = $('#modelo_cars option:selected').val();
                    if (modelo != ''){
                        $('.continuar').delay(900).fadeIn();
                    }else{
                        $('.continuar').hide();
                    }
                });
            }
        });
    });

    $('#marca_cars').change(function () {
        var marca = $('#marca_cars option:selected').val();
        if (marca == ''){
            $('.continuar').hide();
        }else{
            $('.continuar').hide();
        }
    });

    /* capturo los datos de marcas y modleos y los envio al controlador por get */
    $('#formMarcaModelo').submit(function (e) {
        e.preventDefault();

        var ruta = $(this).attr('action');
        var id_marca = $('#marca_cars option:selected').val();
        var id_modelo = $('#modelo_cars option:selected').val();
        var formData = $(this).serialize();

        $.ajax({
            url:ruta+'/'+id_marca+'/'+id_modelo+'/datos',
            type:'get',
            data:formData,
            success:function (data) {
            }
        });
        window.location.href = ruta+'/'+id_marca+'/'+id_modelo+'/datos';
    });

    /*##############################################################################################
     ####################### mando la imagen y lo traigo con jquery ################################
     ###############################################################################################*/
    $('.imagen1').on('change',function () {
        var formData = new FormData($('#formAddAutos')[0]);

        $('.foto-principal').hide();
        $('.load-img').hide();
        $('.agregar-vehiculo').hide();
        $('.imagen1').hide();
        $('.centrar-load-ajax').fadeIn();

        $.ajax({
            url:imagen1,
            type:'post',
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function (data) {
                $(data).each(function (i,item) {
                    $('.btn-delete-auto').show();
                    $('.caja-img1').append(
                        '<img class="img-responsive imagen-subida" src="/imagenes_autos/'+item.imagen1+'">'
                    );
                    $('.dropImagen1').val(item.imagen1);
                    $('.id_imagen1').val(item.id);
                    $('.centrar-load-ajax').hide();

                });
            }
        });

    });
    /* -------------------- imagen2 ----------------------------------------------------------- */
    $('.imagen2').on('change',function () {
        var formData = new FormData($('#formAddAutos')[0]);

        $('.load-img2').hide();
        $('.agregar-vehiculo2').hide();
        $('.imagen2').hide();
        $('.centrar-load-ajax2').fadeIn();

        $.ajax({
            url:imagen2,
            type:'post',
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function (data) {
                $(data).each(function (i,item) {
                    $('.btn-delete-auto2').show();
                    $('.caja-img2').append(
                        '<img class="img-responsive imagen-subida2" src="/imagenes_autos/'+item.imagen2+'">'
                    );
                    $('.dropImagen2').val(item.imagen2);
                    $('.id_imagen2').val(item.id);
                    $('.centrar-load-ajax2').hide();

                });
            }
        });

    });

    /* -------------------- imagen3 ----------------------------------------------------------- */
    $('.imagen3').on('change',function () {
        var formData = new FormData($('#formAddAutos')[0]);

        $('.load-img3').hide();
        $('.agregar-vehiculo3').hide();
        $('.imagen3').hide();
        $('.centrar-load-ajax3').fadeIn();

        $.ajax({
            url:imagen3,
            type:'post',
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function (data) {
                $(data).each(function (i,item) {
                    $('.btn-delete-auto3').show();
                    $('.caja-img3').append(
                        '<img class="img-responsive imagen-subida3" src="/imagenes_autos/'+item.imagen3+'">'
                    );
                    $('.dropImagen3').val(item.imagen3);
                    $('.id_imagen3').val(item.id);
                    $('.centrar-load-ajax3').hide();

                });
            }
        });

    });

    /* -------------------- imagen4 ----------------------------------------------------------- */
    $('.imagen4').on('change',function () {
        var formData = new FormData($('#formAddAutos')[0]);

        $('.load-img4').hide();
        $('.agregar-vehiculo4').hide();
        $('.imagen4').hide();
        $('.centrar-load-ajax4').fadeIn();

        $.ajax({
            url:imagen4,
            type:'post',
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function (data) {
                $(data).each(function (i,item) {
                    $('.btn-delete-auto4').show();
                    $('.caja-img4').append(
                        '<img class="img-responsive imagen-subida4" src="/imagenes_autos/'+item.imagen4+'">'
                    );
                    $('.dropImagen4').val(item.imagen4);
                    $('.id_imagen4').val(item.id);
                    $('.centrar-load-ajax4').hide();

                });
            }
        });

    });

    /* -------------------- imagen5 ----------------------------------------------------------- */
    $('.imagen5').on('change',function () {
        var formData = new FormData($('#formAddAutos')[0]);

        $('.load-img5').hide();
        $('.agregar-vehiculo5').hide();
        $('.imagen5').hide();
        $('.centrar-load-ajax5').fadeIn();

        $.ajax({
            url:imagen5,
            type:'post',
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function (data) {
                $(data).each(function (i,item) {
                    $('.btn-delete-auto5').show();
                    $('.caja-img5').append(
                        '<img class="img-responsive imagen-subida5" src="/imagenes_autos/'+item.imagen5+'">'
                    );
                    $('.dropImagen5').val(item.imagen5);
                    $('.id_imagen5').val(item.id);
                    $('.centrar-load-ajax5').hide();

                });
            }
        });

    });

    /* -------------------- imagen6 ----------------------------------------------------------- */
    $('.imagen6').on('change',function () {
        var formData = new FormData($('#formAddAutos')[0]);

        $('.load-img6').hide();
        $('.agregar-vehiculo6').hide();
        $('.imagen6').hide();
        $('.centrar-load-ajax6').fadeIn();

        $.ajax({
            url:imagen6,
            type:'post',
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function (data) {
                $(data).each(function (i,item) {
                    $('.btn-delete-auto6').show();
                    $('.caja-img6').append(
                        '<img class="img-responsive imagen-subida6" src="/imagenes_autos/'+item.imagen6+'">'
                    );
                    $('.dropImagen6').val(item.imagen6);
                    $('.id_imagen6').val(item.id);
                    $('.centrar-load-ajax6').hide();

                });
            }
        });

    });

    /* -------------------- imagen7 ----------------------------------------------------------- */
    $('.imagen7').on('change',function () {
        var formData = new FormData($('#formAddAutos')[0]);

        $('.load-img7').hide();
        $('.agregar-vehiculo7').hide();
        $('.imagen7').hide();
        $('.centrar-load-ajax7').fadeIn();

        $.ajax({
            url:imagen7,
            type:'post',
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function (data) {
                $(data).each(function (i,item) {
                    $('.btn-delete-auto7').show();
                    $('.caja-img7').append(
                        '<img class="img-responsive imagen-subida7" src="/imagenes_autos/'+item.imagen7+'">'
                    );
                    $('.dropImagen7').val(item.imagen7);
                    $('.id_imagen7').val(item.id);
                    $('.centrar-load-ajax7').hide();

                });
            }
        });

    });


    /*############################################################################################
    ############################### eliminamos la imagen si el usuario quiere ####################
    ##############################################################################################*/

    $('.btn-delete-auto').on('click',function () {

        var dropImage1 = $('.dropImagen1').val();
        var id_imagen1 = $('.id_imagen1').val();
        var token = $('#token').val();

        $.ajax({
            url:dropImagen1+'/'+id_imagen1,
            type:'post',
            data:{
                _token:token,
                dropImagenAuto:dropImage1
            },
            success:function (data) {
                $('.btn-delete-auto').hide();
                $('.imagen-subida').hide();
                $('.foto-principal').show();
                $('.load-img').show();
                $('.agregar-vehiculo').show();
                $('.imagen1').show();
                $('.centrar-load-ajax').hide();
                $('.imagen1').val('');
            }
        });

    });

    /*--------------  drop imagen2 -----------------------------------------*/
    $('.btn-delete-auto2').on('click',function () {

        var dropImage2 = $('.dropImagen2').val();
        var id_imagen2 = $('.id_imagen2').val();
        var token = $('#token').val();

        $.ajax({
            url:dropImagen2+'/'+id_imagen2,
            type:'post',
            data:{
                _token:token,
                dropImagenAuto2:dropImage2
            },
            success:function (data) {
                $('.btn-delete-auto2').hide();
                $('.imagen-subida2').hide();
                $('.load-img2').show();
                $('.agregar-vehiculo2').show();
                $('.imagen2').show();
                $('.centrar-load-ajax2').hide();
                $('.imagen2').val('');
            }
        });

    });

    /*--------------  drop imagen3 -----------------------------------------*/
    $('.btn-delete-auto3').on('click',function () {

        var dropImage3 = $('.dropImagen3').val();
        var id_imagen3 = $('.id_imagen3').val();
        var token = $('#token').val();

        $.ajax({
            url:dropImagen3+'/'+id_imagen3,
            type:'post',
            data:{
                _token:token,
                dropImagenAuto3:dropImage3
            },
            success:function (data) {
                $('.btn-delete-auto3').hide();
                $('.imagen-subida3').hide();
                $('.load-img3').show();
                $('.agregar-vehiculo3').show();
                $('.imagen3').show();
                $('.centrar-load-ajax3').hide();
                $('.imagen3').val('');
            }
        });

    });

    /*--------------  drop imagen4 -----------------------------------------*/
    $('.btn-delete-auto4').on('click',function () {

        var dropImage4 = $('.dropImagen4').val();
        var id_imagen4 = $('.id_imagen4').val();
        var token = $('#token').val();

        $.ajax({
            url:dropImagen4+'/'+id_imagen4,
            type:'post',
            data:{
                _token:token,
                dropImagenAuto4:dropImage4
            },
            success:function (data) {
                $('.btn-delete-auto4').hide();
                $('.imagen-subida4').hide();
                $('.load-img4').show();
                $('.agregar-vehiculo4').show();
                $('.imagen4').show();
                $('.centrar-load-ajax4').hide();
                $('.imagen4').val('');
            }
        });

    });

    /*--------------  drop imagen5 -----------------------------------------*/
    $('.btn-delete-auto5').on('click',function () {

        var dropImage5 = $('.dropImagen5').val();
        var id_imagen5 = $('.id_imagen5').val();
        var token = $('#token').val();

        $.ajax({
            url:dropImagen5+'/'+id_imagen5,
            type:'post',
            data:{
                _token:token,
                dropImagenAuto5:dropImage5
            },
            success:function (data) {
                $('.btn-delete-auto5').hide();
                $('.imagen-subida5').hide();
                $('.load-img5').show();
                $('.agregar-vehiculo5').show();
                $('.imagen5').show();
                $('.centrar-load-ajax5').hide();
                $('.imagen5').val('');
            }
        });

    });

    /*--------------  drop imagen6 -----------------------------------------*/
    $('.btn-delete-auto6').on('click',function () {

        var dropImage6 = $('.dropImagen6').val();
        var id_imagen6 = $('.id_imagen6').val();
        var token = $('#token').val();

        $.ajax({
            url:dropImagen6+'/'+id_imagen6,
            type:'post',
            data:{
                _token:token,
                dropImagenAuto6:dropImage6
            },
            success:function (data) {
                $('.btn-delete-auto6').hide();
                $('.imagen-subida6').hide();
                $('.load-img6').show();
                $('.agregar-vehiculo6').show();
                $('.imagen6').show();
                $('.centrar-load-ajax6').hide();
                $('.imagen6').val('');
            }
        });

    });

    /*--------------  drop imagen7 -----------------------------------------*/
    $('.btn-delete-auto7').on('click',function () {

        var dropImage7 = $('.dropImagen7').val();
        var id_imagen7 = $('.id_imagen7').val();
        var token = $('#token').val();

        $.ajax({
            url:dropImagen7+'/'+id_imagen7,
            type:'post',
            data:{
                _token:token,
                dropImagenAuto7:dropImage7
            },
            success:function (data) {
                $('.btn-delete-auto7').hide();
                $('.imagen-subida7').hide();
                $('.load-img7').show();
                $('.agregar-vehiculo7').show();
                $('.imagen7').show();
                $('.centrar-load-ajax7').hide();
                $('.imagen7').val('');
            }
        });

    });


    /* ------------ mandamos el id de provincias para traer los datos de departamentos ---------- */
    $('#provincia').change(function () {
        var idPro = $('#provincia option:selected').val();
        var token = $('#token').val();
        $('.imgAjaxProvincia').show();
        $.ajax({
            url:getDepartamentos+'/'+idPro,
            type:'post',
            data:{_token:token},
            success:function (departamentos) {
                $('.hide-ciudad').show();
                $('#ciudad').html(departamentos);
                $('.imgAjaxProvincia').hide();

            }

        });
        if (idPro == ''||idPro == 0){
            $('.hide-ciudad').hide();
            $('.hide-barrio').hide();
            $('.imgAjaxProvincia').hide();
        }

    });

    $('#ciudad').change(function () {
        var idDep = $('#ciudad option:selected').val();
        var token = $('#token').val();
        $('.imgAjaxCiudad').show();

        $.ajax({
            url:getLocalidades+'/'+idDep,
            type:'post',
            data:{_token:token},
            success:function (localidades) {
                $('.hide-barrio').show();
                $('#barrio').html(localidades);
                $('.imgAjaxCiudad').hide();

            }
        });
        if (idDep == ''||idDep == 0){
            $('.hide-barrio').hide();
            $('.imgAjaxCiudad').hide();
        }

    });

    /* prueba de obtener los datos del editor  de texto personalizado */
    /*$('#btn-save-cars').click(function (e) {
        e.preventDefault();
        var content = tinymce.get("texteditor").getContent();
    });*/

    /* mostrar y ocultar la caja de especificaciones */
    /*$('.especificaciones').on('click',function () {
        $('.caja-especificaciones').slideToggle();
    });*/

    $('.especificaciones1').click(function (e) {
        e.preventDefault();
        $('.caja-especificaciones').slideToggle();
        $('.ocultar-espe').toggle();
        $('.mostrar-espe').toggle();
    });

    $('.especificaciones2').click(function (e) {
        e.preventDefault();
        $('.caja-especificaciones').slideToggle();
        $('.mostrar-espe').toggle();
        $('.ocultar-espe').toggle();
    });


    /*#########################################################################################
    * ########## mando los datos del auto l controlador #######################################
    * #########################################################################################*/
    $('#formAddAutos').submit(function (e) {
        e.preventDefault();
        var ruta = $(this).attr('action');
        var descripcion = tinymce.get("texteditor").getContent();

        var formData = $(this).serializeArray();
        formData.push({name:'descripcion',value:descripcion});

        $.ajax({
            url:ruta,
            type:'post',
            data:formData,
            success:function (response) {

            }
        });
        window.location.href=registroYconfirmacion;

    });




});
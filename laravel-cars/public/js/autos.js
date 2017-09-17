$(document).ready(function () {

    //boton de relevantes filtrando el precio
    $('#relevantes').on('click',function () {
        $('.filtro-precios').slideToggle();
    });

    /* mas opciones de marcas */
    $('.mas-opciones-marcas').on('click',function () {
        $('.contenido-marcas').slideToggle();
    });

    /* mas opciones de modelos */
    $('.mas-opciones-modelos').on('click',function () {
        $('.contenido-modelos').slideToggle();
    });

    /* mas opciones de años */
    $('.mas-opciones-años').on('click',function () {
        $('.contenido-años').slideToggle();
    });

    /* mas opciones de color */
    $('.mas-opciones-color').on('click',function () {
        $('.contenido-color').slideToggle();
    });

    /* ########## tamaño pequeño #################### */
    /* modificamos el estilo de las categorias cuando es menor a 767px */
    $('.btn-min-marca').on('click',function () {
        $('.down-marca').slideToggle();
    });

    $('.btn-min-modelo').on('click',function () {
        $('.down-modelo').slideToggle();
    });

    $('.btn-min-anio').on('click',function () {
        $('.down-anio').slideToggle();
    });

    $('.btn-min-precio').on('click',function () {
        $('.down-precio').slideToggle();
    });

    $('.btn-min-vendedor').on('click',function () {
        $('.down-vendedor').slideToggle();
    });

    $('.btn-min-estado').on('click',function () {
        $('.down-estado').slideToggle();
    });

    $('.btn-min-ubicacion').on('click',function () {
        $('.down-ubicacion').slideToggle();
    });

    $('.btn-min-combustible').on('click',function () {
        $('.down-combustible').slideToggle();
    });

    $('.btn-min-puertas').on('click',function () {
        $('.down-puertas').slideToggle();
    });

    $('.btn-min-transmision').on('click',function () {
        $('.down-transmision').slideToggle();
    });

    $('.btn-min-color').on('click',function () {
        $('.down-color').slideToggle();
    });

    $('.btn-min-direccion').on('click',function () {
        $('.down-direccion').slideToggle();
    });


    /*
     * Esto ya es cuando se elige un auto
     */

    /* capturo los datos de la uri del telefono para mostrarlo por ajax */
    $('#view_telefono').on('click',function (e) {
        e.preventDefault();
        var ruta = $(this).attr('href');
        $('#mini-ajax').show();
        $.ajax({
            url:ruta,
            type:'get',
            success:function (data) {
                $(data).each(function (i, item) {
                    $('#view_telefono').hide();
                    $('#mostrar_telefono').text(item.telefono);
                    $('#mini-ajax').hide();
                });

            }
        });

    });

    /* cuando se hace click en consultar y lo manda arriba ddonde se encuentra el pequeño form de consultar */
    $('#consultar').on('click',function () {
        $('.consulta_cars').addClass('foco-consultar');
    });

    /* remuevo la clase contenido-autos para que ocupe toda la pantalla en dispositivos moviles*/
    /*var width = $(window).width();
    if (width < 767){
        $('.contenido-autos').removeClass('contenido-autos');
    }*/

    /* form de buscar filtros segun marca y modelo */
    $('#formBuscar').submit(function (e) {
        e.preventDefault();
        var marca = $('#input-marca').val();
        var modelo = $('#input-modelo').val();

        if(marca == '' && modelo == ''){
            window.location.href='autos';
        }else if (marca != '' && modelo == ''){
            window.location.href='selected?marca='+marca;
        }else if (marca != '' && modelo != ''){
            window.location.href='selected/modelo?marca='+marca+'&modelo='+modelo;
        }

    });

    /* hacemos el desplegable de las categorias del lado izquierdo */

    //deslis de las marcas
    $('.down-marca .list-marcas:nth-child(1n+5)').css('display','none');

    $('.mas-opciones-marcas').click(function (e) {
        e.preventDefault();
        $('.down-marca .list-marcas:nth-child(1n+5)').slideToggle();
        $('.ocultar-marca').toggle();
        $('.mostrar-marca').toggle();
    });

    $('.menos-opciones-marcas').click(function (e) {
        e.preventDefault();
        $('.down-marca .list-marcas:nth-child(1n+5)').slideToggle();
        $('.mostrar-marca').toggle();
        $('.ocultar-marca').toggle();
    });


    // deslis de los modelos
    $('.down-modelo .list-marcas:nth-child(1n+5)').css('display','none');

    $('.mas-opciones-modelos').click(function (e) {
        e.preventDefault();
        $('.down-modelo .list-marcas:nth-child(1n+5)').slideToggle();
        $('.ocultar-modelo').toggle();
        $('.mostrar-modelo').toggle();
    });

    $('.menos-opciones-modelos').click(function (e) {
        e.preventDefault();
        $('.down-modelo .list-marcas:nth-child(1n+5)').slideToggle();
        $('.mostrar-modelo').toggle();
        $('.ocultar-modelo').toggle();
    });

    // deslis de los años
    $('.down-anio .list-marcas:nth-child(1n+5)').css('display','none');

    $('.mas-opciones-anio').click(function (e) {
        e.preventDefault();
        $('.down-anio .list-marcas:nth-child(1n+5)').slideToggle();
        $('.ocultar-anio').toggle();
        $('.mostrar-anio').toggle();
    });

    $('.menos-opciones-anio').click(function (e) {
        e.preventDefault();
        $('.down-anio .list-marcas:nth-child(1n+5)').slideToggle();
        $('.mostrar-anio').toggle();
        $('.ocultar-anio').toggle();
    });


});
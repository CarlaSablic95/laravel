$(document).ready(function () {

    //llamo a la variable que se encuentra en alyouts app.blade.php, esas q creamos espcialmnete para  el 
    //llamado a las rutas, esa varible llamada paginacion contiene una ruta, po eso usamos esa varible aqui
    $.get(paginacion,function (data) {
        //y todo el contenido que trae al hacer el llamdo a esa ruta, lo metemos al div con id paginate
        //que esta en home.blade.php, con eso traemos data via ajax
        $('#paginate').html(data);
    });


    //este codigo sirve para paginar via ajax
    $('body').on('click','.pagination li a',function (e) {
        e.preventDefault();
        var page = $(this).attr('href');
        //y todo ese cntenido se lo volvemos a meter al div con id paginate para que siga en la misma pagina
        $.get(page,function (data) {
            $('#paginate').html(data);
        });
    });


});
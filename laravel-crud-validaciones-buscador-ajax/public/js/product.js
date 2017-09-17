$(document).ready(function () {
    
    //buscador en tiempo real
    $('.query').keyup(function(){
        var query = $(this).val();
        $('#dataProduct').html('')
        $.ajax({
            url: resultados+'/'+query,
            type: 'get',
            //dataType: 'html',
            //data: {query: query},
            success: function(data){
                //var res = JSON.parse(data);
                //este ya no necesita parsear por ya te devielve un objeto
                $.each(data, function(index, item){
                    //alert(value.name);
                    $('#dataProduct').append(`
                        <tr>
                            <td>${item.name}</td>
                            <td>${item.description}</td>
                            <td>${item.price}</td>
                            <td>${item.cat_name}</td>
                            <td><img src="/images/${item.photo}" width="80"/></td>
                        </tr>
                    `);
                });
            }
        });
        
    });


    //agregar
    //cuando el form con id formAdd se haga submit, se dispara esta funcion
    $('#formAdd').submit(function (e) {
        e.preventDefault();

        $('#errores').html('');
        var ruta = $(this).attr('action');
        //este no toma las imagenes, pero la data de tipo texto plano si
        //var dataForm = $(this).serialize();
        //con esto tomo todos los campo del formualario y si tiene imagens tambien lo toma
        var dataform = new FormData($(this)[0]);
        //mando por ajax toda la dat del form, capturado por new formData()
        $.ajax({
            url:ruta,
            type:'post',
            data:dataform,
            //esto es necesario cuando se guardan imagenes via ajax
            contentType: false,
            processData: false,
            cache: false,
            //hasta aqui, creo que cache no es necesario
            success:function (data) {
                $('#formAdd')[0].reset();
                $('#msj-add-pro').fadeIn().delay(5000).fadeOut();
            },
            error: function(xhr, textStatus, thrownError) {
                /*$.each($.parseJSON(xhr.responseText), function (index, item) {
                    $('#errores').fadeIn();
                    $('#errores').append('<li>'+item.name+'</li>');
                });*/
                console.log(xhr.responseText);
                
                //debemos parsear este json a un obejto js, para poder acceder a  los campos
                let err = JSON.parse(xhr.responseText);
                //este no muestra un array de objetos o creo que al reves
                console.log(err.errors);

                //recorremos cada objeto y mostramos su valor
                $.each(err.errors, function(index, value){
                    $('#errores').fadeIn();
                    $('#errores').append('<li>'+value+'</li>');
                });
            }
        });
        
    });
    
    //editar
    $('#formEdit').submit(function (e) {
        e.preventDefault();

        var ruta = $(this).attr('action');
        //var dataForm = $(this).serialize();
        var dataForm = new FormData($(this)[0]);
        //si este ya tiene los errores, los borramos cada que se hace submit
        $('#errores').html('');

        $.ajax({
            url:ruta,
            type:'post',
            data:dataForm,
            contentType: false,
            processData: false,
            cache: false,
            success:function (data) {
                $('#msj-edit-pro').fadeIn().delay(5000).fadeOut();
            },
            error: function(xhr, textStatus, thrownError) {
                /*$.each($.parseJSON(xhr.responseText), function (index, item) {
                    $('#errores').fadeIn();
                    $('#errores').append('<li>'+item+'</li>');
                });*/
                //console.log(xhr.responseText);
                //debemos parsear este json a un obejto js, para poder acceder a  los campos
                let err = JSON.parse(xhr.responseText);
                //este no muestra un array de objetos o creo que al reves
                //console.log(err.errors);
                //recorremos cada objeto y mostramos su valor
                $.each(err.errors, function(index, value){
                    $('#errores').fadeIn();
                    $('#errores').append('<li>'+value+'</li>');
                });
            }
        });
        
    });

    //eliminar
    $('#formDelete').submit(function (e) {
        e.preventDefault();

        var ruta = $(this).attr('action');
        var dataForm = $(this).serialize();

        if (confirm('Esta seguro que quiere eliminar el producto?')){
            $.ajax({
                url:ruta,
                type:'post',
                data:dataForm,
                success:function (data) {}
            });

            window.location=baseurl;
            return true;
        }
        
        window.location=baseurl;
        return false;
    });
    
});
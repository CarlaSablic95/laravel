//console.log("hola");
//por get solo retorna elementos
/*
$.ajax({
	url:"http://localhost:3000/test",
	type: "get",
	success: function (respuesta) {
		 //console.log(respuesta);
	}
});

//por post inserta elementos
var obj = {};
obj.id = 2;
obj.nombre = "juan";

$.ajax({
	//url: la url del source destino
	url:"http://localhost:3000/test",
	//type: verbo de HTTP 
	type: "post",
	//data: variables para enviar por POST
	data: {id:obj.id, nombre:obj.nombre},
	//Success: function que me atrapa la respuesta
	//Si no agarro la respuesta como parametro
	//no la puedo usar en ningun momento del scope de
	//mi funcion
	success: function (respuesta) {
		 //console.log(respuesta);
	}
});

var randomName = faker.name.findName();
//console.log(randomName);

$('#table-container').DataTable();

//console.log($);
//fn es el objeto neto jQuery
//console.log($.fn);


//1 Extiendo el objeto

//extiendo el objeto agregando un atributo
//nuevo e igualandolo a una funcion
//anonima
/*$.fn.myNuevaFuncion = function () {
	console.log('hola');
}*/


//2 invoco jQuery dentro del scope de una funcion auto invocada

//No uso jQuery como $ y lo instancio en 
//modo noConflict
//var j = jQuery.noConflict();

//Funcion auto invocada
/*(function ($) {

	$.fn.myNuevaFuncion = function () {
		console.log('Funcion auto invocada');
		console.log(this);
	}

})(jQuery)*/


//3 devuelvo el objeto jquery para posterior proceso
//Funcion auto invocada

//4 Asegurarme de que abarco todos los objetos que 
// llaman a mi metodo

/*(function ($) {

	$.fn.myNuevaFuncion = function () {
		console.log(this);
		this.each(function () {
			console.log(this);
			$(this).css('color', 'red');
		});
		return this;
	}

})(jQuery)*/

/*

(function ($) {

	$.fn.myNuevaFuncion = function (opciones) {


		//console.log(this);

		var defaultSettings = {
			size: 16,
			op:1,
			color:"red"
		}

		var configuracionesFinal = $.extend({},defaultSettings,opciones)

		this.each(function () {

			$(this).css({
				"font-size":configuracionesFinal.size+"px",
				"opacity":configuracionesFinal.op,
				"color":configuracionesFinal.color
			});
		});
		return this;
	}

})(jQuery)
*/
/*
//hago el llamado como una funcion 
//jQuery normal
$('.link').myNuevaFuncion({
	size:24,
	op:0.5,
	color: "green"
});

*/

(function ($) {
      $.fn.textAnimate=function (options) {
          var defaultSettings = {
              delay:200,
              ease:"fadeIn",
              size:"16px"
          }
          var config = $.extend({}, defaultSettings, options);

          //En este scope this es un objeto jQuery todavia
        //console.log(this);

        var texto = this.text();
        this.text("");
        //console.log(texto);
        
        /*this.each(function(index, el) {
            $(el).css({
                "color":config.color,
                "opacity":config.opacity,
                "font-size":config.size||"16px"
            });
        });*/

        for (var i = 0, len = texto.length; i < len; i++) {
            $(this)[0].innerHTML+="<i>"+texto[i]+"</i>";
        };
        $(this).find('i').hide();
        //Una vez que encerramos cada caracter en un <i> animamos cada elemento
        //individualmente

        if (config.ease=="fadeIn") {
            var iEl = this.find('i');
            for (var i = 0; i < iEl.length; i++) {
                //iEl[i]
                var delay = config.delay*i;
                $(iEl[i]).css("font-size", config.size);
                $(iEl[i]).delay(delay).fadeIn();
            }
        }else{
            var iEl = this.find('i');
            for (var i = 0; i < iEl.length; i++) {
                //iEl[i]
                if ($(iEl[i]).text()==" ") {
                    $(iEl[i])[0].innerHTML="&nbsp;";
                }
                $(iEl[i]).css("font-size", config.size);
                $(iEl[i]).css("-webkit-animation-delay", (config.delay*i)+"ms");
                $(iEl[i]).addClass('fadeInUpDown');
            }
        }
        return this;
    };
})(jQuery);

$('.website').textAnimate({
    delay:150,
    /*ease:"fadeIn",*/
    size:"54px",
    ease:"fadeInUpDown"
});

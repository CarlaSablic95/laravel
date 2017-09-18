<?php
    include'departamentos.php';
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>The HTML5 Herald</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  
    <div class="contenedor">

        <h1>Combo Dinámico con Jquery, PHP y MySQL</h1>
        <h1>Departamentos, Provincia y distritos</h1>
         <select id="departamento">
             <option value="0">Seleccionar Departamento</option>
             <?php listarDepartamentos(); ?>
         </select>
        <br><br>
         <select id="provincia"></select>
        <br><br>
        <select id="distrito"></select>

    </div>

<script src="js/jquery.min.js"></script>
<script>

    $( "#departamento" ).change(function() { //seleccionamos el ID del select y cunado cambie ejecute esta funcion
    var provincia = $("#departamento option:selected").val(); //aqui tomamos el valor seleccionado en departamento
    var datastring = 'provincia='+provincia; //esto se va a comparar en el archivo provincias.php mediante post que lo datos de IdDepatamento sean iguales al IdDepartamento de provincias

        $.ajax({
        	type: 'POST',
        	url: 'provincias.php',
        	data: datastring,
            success: function(data){
        	   	 $('#provincia').html(data);
        	}
        });
    });

    $( "#provincia" ).change(function() {
        var distrito = $("#provincia option:selected").val();
        var datastring = 'distrito='+distrito;

        $.ajax({
            type: 'POST',
            url: 'distritos.php',
            data: datastring,
            success: function(data){
                $('#distrito').html(data);
            }
        });
    });

</script>
</body>
</html>
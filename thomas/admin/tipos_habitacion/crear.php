

<?php 
require '../../includes/funciones.php';

$bd = conectar_db();

//El arreglo $errores nos guarda mensajes de error en caso de no escribir nada en el formulario
$errores =  [];


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $tipo = $_POST['tipo'];
    $mobiliario = $_POST['mobiliario'];
    $cantidad = $_POST['cantidad'];
    $valor = $_POST['valor'];

   

  
    if(!$tipo){
        $errores1[] = 'El numero de habitacion es obligatorio';
    }
    if(!$mobiliario){
        $errores[] = 'El tipo es obligatorio';
    }
    if(!$cantidad){
        $errores1[] = 'la descripcion es obligatorio';
    }
    if(!$valor){
        $errores1[] = 'la descripcion es obligatorio';
    }
    
    if(empty($errores1)){
    
        $sql = "INSERT INTO tipo_habitacion  VALUES ( '$tipo', '$mobiliario', '$cantidad','$valor')" ;

        echo $sql;

        $resultado = mysqli_query($bd, $sql);

        if($resultado){
            
            header('location: ../../index.php');

        }
        }
        else{
            foreach($errores1 as $error){
                echo '<br>' . $error;
            }
        }
    }        
?>
<div>

<p>Nueva tipo de habitacion</p>

<a href="../../../index.php">Regresar</a>
<form class="formulario1" method="POST" action="crear.php">
    <fieldset>
        <legend>Datos</legend>
        <label for="tipo">Digite la nueva habitacion:</label><br>
        <input type="text" id="tipo" name="tipo"><br>

        <label for="mobiliario">Digite el numero de mobiliario:</label><br>
        <input type="text" id="mobiliario" name="mobiliario"><br>

        <label for="cantidad">Digite la cantidad de personas:</label><br>
        <input type="text" id="cantidad" name="cantidad" ><br>

        <label for="valor">Digite el valor:</label><br>
        <input type="float" id="valor" name="valor" ><br>

        <input type="submit" id="enviar" name="enviar" value="Enviar datos">
    </fieldset>
    
</form>

</div>

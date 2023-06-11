<?php 
require '../../includes/funciones.php';


$bd = conectar_db();

$errores =  [];


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tipo = $_POST['tipo'];
    $mobiliario = $_POST['mobiliario'];
    $cantidad = $_POST['cantidad'];
    $valor = $_POST['valor'];



    if(!$tipo){
        $errores[] = 'El número de identificación es obligatorio';}
    
    if(!$mobiliario){
        $errores[] = 'El número de identificación es obligatorio';}

    if(!$cantidad){
        $errores[] = 'El número de identificación es obligatorio';
    }
    if(!$valor){
        $errores[] = 'El número de identificación es obligatorio';
    }
    if(empty($errores)){

    }
    $sql = "UPDATE tipo_habitacion SET mobiliario='$mobiliario',cantidad_p='$cantidad',valor_b='$valor' WHERE mobiliario = '$mobiliario'" ;

    echo $sql;
    
    $resultado = mysqli_query($bd, $sql);
    
    if($resultado){
        header('location: ../../../index.php');
    }
    }
    
    else{
        foreach($errores as $error){
            echo '<br>' . $error;
        }
    }      

?>
<div>
    <p>Actualizar datos de la habitacion</p>

    <a href="../../index.php">Regresar</a>

    <form class="formulario_ac" method="POST" action="actualizar.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="tipo">Digite el tipo de habitacion</label><br>
            <input class="text" type="text" id="tipo" name="tipo"><br>

            <label for="mobiliario">Digite el numero de mobiliario:</label><br>
            <input class="text" type="text" id="mobiliario" name="mobiliario" ><br>

            <label for="cantidad">Digite la cantidad de personas:</label><br>
            <input class="text" type="text" id="cantidad" name="cantidad" ><br>

            <label for="valor">Digite el valor del tipo de habitacion:</label><br>
            <input class="float" type="text" id="valor" name="valor" ><br>
            

            <input class="formulario" type="submit" id="enviar" name="enviar" value="Enviar datos">

         
        </fieldset>
        
    </form>

</div>


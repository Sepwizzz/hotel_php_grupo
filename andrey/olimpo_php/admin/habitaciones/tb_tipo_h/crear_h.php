<link rel="stylesheet" href="http://localhost/OLIMPO_PHP/build/css/a2.css">

<?php 
require '../../../includes/funciones.php';

$bd = conectar_db();

$errores1 =  [];



    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $tipo = $_POST['tipo'];
        $mobiliario = $_POST['mobiliario'];
        $cantidad_p = $_POST['cantidad_p'];
        $valor_b = $_POST['valor_b'];

       

      
        if(!$tipo){
            $errores1[] = 'El numero de habitacion es obligatorio';
        }
        if(!$tipo){
            $mobiliario[] = 'El tipo es obligatorio';
        }
        if(!$cantidad_p){
            $errores1[] = 'la descripcion es obligatorio';
        }
        if(!$valor_b){
            $errores1[] = 'la descripcion es obligatorio';
        }
        
        if(empty($errores1)){
        
            $sql = "INSERT INTO tipo_habitacion  VALUES ( '$tipo', '$mobiliario', '$cantidad_p','$valor_b')" ;

            echo $sql;

            $resultado = mysqli_query($bd, $sql);

            if($resultado){
                
                header('location: ../../../index.php');

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
    <form class="formulario1" method="POST" action="crear_h.php">
        <fieldset>
            <legend>Datos</legend>
            
            <label for="tipo">ponga el tipo de la habitacion</label><br>
            <input  class="formu" type="text" id="tipo" name="tipo"><br>

            <label for="mobiliario">ponga el numero de moviliario :</label><br>
            <input  class="formu" type="text" id="mobiliario" name="mobiliario"><br>

            <label for="cantidad_p">ponga cantidad de personas :</label><br>
            <input  class="formu" type="text" id="cantidad_p" name="cantidad_p" ><br>

            <label for="valor_b">ponga el valor :</label><br>
            <input  class="formu" type="float" id="valor_b" name="valor_b" ><br>

            <input  class="formu" type="submit" id="enviar" name="enviar" value="Enviar datos">
        </fieldset>
        
    </form>

</div>


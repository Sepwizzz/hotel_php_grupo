<link rel="stylesheet" href="http://localhost/OLIMPO_PHP/build/css/a2.css">

<?php 
require '../../../includes/funciones.php';

$bd = conectar_db();

$errores1 =  [];



    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $numero_H = $_POST['numero_H'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];
       

      
        if(!$numero_H){
            $errores1[] = 'El numero de habitacion es obligatorio';
        }
        if(!$tipo){
            $errores1[] = 'El tipo es obligatorio';
        }
        if(!$descripcion){
            $errores1[] = 'la descripcion es obligatorio';
        }
        
        if(empty($errores1)){
        
            
            $sql = "INSERT INTO habitacion VALUES ( '$numero_H', '$tipo', '$descripcion')" ;

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

    <p>Nueva habitacion</p>

    <a href="../../../index.php">Regresar</a>

    <form class="formulario1" method="POST" action="crear.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="numero_H">ponga el numero de la habitacion</label><br>
            <input type="text" id="id" name="numero_H"><br>

            <label for="tipo">ponga el tipo de habitacion:</label><br>
            <input type="text" id="primer_apellido" name="tipo"><br>

            <label for="descripcion">pongs descripcion:</label><br>
            <input type="text" id="segundo_apellido" name="descripcion" ><br>

            <input type="submit" id="enviar" name="enviar" value="Enviar datos">
        </fieldset>
        
    </form>

</div>


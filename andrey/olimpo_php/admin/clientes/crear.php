<link rel="stylesheet" href="http://localhost/andrey/hotel_PHP/build/css/a2.css">

<?php 
require '../../includes/funciones.php';

$bd = conectar_db();

$errores1 =  [];



    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_POST['id'];
        $primer_apellido = $_POST['primer_apellido'];
        $segundo_apellido = $_POST['segundo_apellido'];
        $nombres = $_POST['nombres'];
        $correo = $_POST['correo'];

        if(!$id){
            $errores1[] = 'El número de identificación es obligatorio';
        }
        if(!$primer_apellido){
            $errores1[] = 'El primer apellido es obligatorio';
        }
        if(!$nombres){
            $errores1[] = 'El nombre es obligatorio';
        }
        if(!$correo){
            $errores1[] = 'El correo es obligatorio';
        }
        
        if(empty($errores1)){
        
        
            $sql = "INSERT INTO clientes (id, primer_apellido, segundo_apellido, nombres, correo) 
            VALUES ('$id', '$primer_apellido', '$segundo_apellido', '$nombres', '$correo')" ;

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

    <p>Nuevo cliente</p>

    <a href="../../index.php">Regresar</a>

    <form class="formulario" method="POST" action="crear.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="id">No. Identificación</label><br>
            <input type="text" id="id" name="id"><br>

            <label for="primer_apellido">Primer Apellido:</label><br>
            <input type="text" id="primer_apellido" name="primer_apellido"><br>

            <label for="segundo_apellido">Segundo Apellido:</label><br>
            <input type="text" id="segundo_apellido" name="segundo_apellido" ><br>

            <label for="nombres">Nombres:</label><br>
            <input type="text" id="nombres" name="nombres" ><br>

            <label for="correo">Correo electrónico:</label><br>
            <input type="mail" id="correo" name="correo" ><br>

            <input type="submit" id="enviar" name="enviar" value="Enviar datos">
        </fieldset>
        
    </form>

</div>


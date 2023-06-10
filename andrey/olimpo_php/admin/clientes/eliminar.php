
<link rel="stylesheet" href="http://localhost/andrey/hotel_PHP/build/css/a2.css">

<?php 

require '../../includes/funciones.php';

$bd = conectar_db();

$errores =  [];



    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $codigo = $_POST['id'];
    

        if(!$codigo){
            $errores[] = 'El número de identificación es obligatorio';
        }
        if(empty($errores)){
        
        
            $sql = "DELETE FROM clientes WHERE codogo='$codigo'" ;

            echo $sql;

            $resultado = mysqli_query($bd, $sql);

            if($resultado){
                
                header('location: ../../index.php');

            }
            }
            else{
                foreach($errores as $error){
                    echo '<br>' . $error;
                }
            }
        }      
?>
<div>

    <p>eliminar cliente</p>

    <form class="formulario1" method="POST" action="eliminar.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="id">No. de codigo</label><br>
            <input type="text" id="id" name="id"><br>

            <input type="submit" id="enviar" name="enviar" value="Enviar datos">

         
        </fieldset>
        
    </form>

</div>


<link rel="stylesheet" href="http://localhost/OLIMPO_PHP/build/css/a2.css">

<?php 
require '../../../includes/funciones.php';

$bd = conectar_db();

//El arreglo $errores nos guarda mensajes de error en caso de no escribir nada en el formulario
$errores =  [];

//echo '<pre>';
//if(($_SERVER['REQUEST_METHOD'])){
//echo '<pre>';
//var_dump(($_POST));
//}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $codigo = $_POST['id'];
        $tipo= $_POST['tipo'];
        $descripcion= $_POST['descripcion'];

    

        if(!$codigo){
            $errores[] = 'El número de identificación es obligatorio';
        }
        if(empty($errores)){
        //Insertar los datos a la BD
        
            $sql = "UPDATE habitacion SET tipo='$tipo',descripcion='$descripcion' WHERE numero_H = '$codigo'" ;

            echo $sql;

            $resultado = mysqli_query($bd, $sql);

            if($resultado){
                //'El registro se ha insertado correctamente';
                //Nos devolvemos a la página inicial
                header('location: ../../../index.php');

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

    <p>actrualizar habitacion</p> <br>
    

    <form class="formulario1" method="POST" action="actualizar.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="id">No. de habitacion</label><br>
            <input type="text" id="id" name="id"><br>

            <label for="tipo">nuevo tipo:</label><br>
            <input type="mail" id="tipo" name="tipo" ><br>
            
            <label for="descripcion">nuevo descripcion:</label><br>
            <input type="mail" id="descripcion" name="descripcion" ><br>

            <input type="submit" id="enviar" name="enviar" value="Enviar datos">

         
        </fieldset>
        
    </form>

</div>


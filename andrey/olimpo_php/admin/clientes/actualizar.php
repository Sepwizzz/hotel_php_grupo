<link rel="stylesheet" href="http://localhost/andrey/hotel_PHP/build/css/a2.css">

<?php 
require '../../includes/funciones.php';

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
        $new_correo= $_POST['correo'];
    

        if(!$codigo){
            $errores[] = 'El número de identificación es obligatorio';
        }
        if(empty($errores)){
        //Insertar los datos a la BD
        
            $sql = "UPDATE clientes SET correo='$new_correo' WHERE codogo = '$codigo'" ;

            echo $sql;

            $resultado = mysqli_query($bd, $sql);

            if($resultado){
                //'El registro se ha insertado correctamente';
                //Nos devolvemos a la página inicial
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

    <p>actrualizar cliente</p> <br>
    <p>ponga el Nuevo correo</p>

    <form class="formulario1" method="POST" action="actualizar.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="id">No. de codigo</label><br>
            <input type="text" id="id" name="id"><br>
            <label for="correo">Nuevo correo electrónico:</label><br>
            <input type="mail" id="correo" name="correo" ><br>

            <input type="submit" id="enviar" name="enviar" value="Enviar datos">

         
        </fieldset>
        
    </form>

</div>


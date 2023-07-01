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

        $numero_doc = $_POST['numero_doc'];
        $nombre = $_POST['nombre'];

        if(!$numero_doc){
            $errores[] = 'El número de identificación es obligatorio';
        }
        
        if(!$nombre){
            $errores[] = 'El nombre es obligatorio';
        }
        
        if(empty($errores)){
        //Insertar los datos a la BD
        
            $sql = "INSERT INTO cliente(numero_doc,nombre) 
            VALUES ('$numero_doc', '$nombre')" ;

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
<head>
<link rel="stylesheet" href="../../estilos/estilos.css">
</head>
<div>
    <h3>Nuevo cliente</h3>
        
        <a href="../../index.php"><input type="button" id="regresar" name="regresar" value="Regresar"></a>
        

    <form class="formulario" method="POST" action="crear.php">
        <fieldset>
            <legend>Datos del cliente</legend>
            <label for="id">No. Identificación</label><br>
            <input type="text" id="numero_doc" name="numero_doc"><br>

            <label for="nombre">Nombres:</label><br>
            <input type="text" id="nombre" name="nombre" ><br>


            <input type="submit" id="enviar" name="enviar" value="Enviar datos">
        </fieldset>
        
    </form>

</div>


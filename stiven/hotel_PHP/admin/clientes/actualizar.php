<?php 
require '../../includes/funciones.php';

//Verificar con filter validate que el dato enviado sea válido para poder actualizar por el id entero que se recibe en el GET
$codigo_actualizar = $_GET['numero_doc'];
// $codigo_actualizar = filter_var($codigo_actualizar, FILTER_VALIDATE_VARCHAR);

if(!$codigo_actualizar){
    header('../../index.php');
}

$bd = conectar_db();

$consulta_cliente = "SELECT * FROM cliente WHERE numero_doc = $codigo_actualizar";
$resultado = mysqli_query($bd, $consulta_cliente);
$cliente = mysqli_fetch_assoc($resultado);


$numero_doc = $cliente['numero_doc'];
$nombre = $cliente['nombre'];


if($_SERVER['REQUEST_METHOD'] == 'POST'){


    $numero_doc= $_POST['numero_doc'];
    $nombre = $_POST['nombre'];
    

   
    if(!$numero_doc){
        $errores[] = 'El numero del documento es obligatorio';
    }
    if(!$nombre){
        $errores[] = 'El nombre es obligatorio';
    }
    
    if(empty($errores)){
    //Actualizar los datos a la BD
    
        $sql = "UPDATE cliente SET 
        
        nombre = '$nombre'
      
        WHERE numero_doc = '$codigo_actualizar'";

        echo $sql;

        $resultado = mysqli_query($bd, $sql);

        if($resultado){
            //'El registro se ha actualizado correctamente';
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
    <h3>Actualizar cliente</h3>

    <a href="../../index.php"><input type="button" id="regresar" name="regresar" value="Regresar"></a>

    <form class="formulario" method="POST">
        <fieldset>
            <legend>Datos</legend>
            
            <label for="numero_doc">numero_doc:</label><br>
            <input type="text" id="numero_doc" name="numero_doc" value="<?php echo $numero_doc?>"><br>

            <label for="nombre">nombre:</label><br>
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre?>"><br>
            

            <input type="submit" id="enviar" name="enviar" value="Actualizar datos">
        </fieldset>
        
    </form>

</div>


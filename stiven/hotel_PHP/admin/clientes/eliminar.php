<?php 
require '../../includes/funciones.php';

//Verificar con filter validate que el dato enviado sea válido para poder eliminar por el codigo del cliente que se recibe en el GET
$codigo_eliminar = $_GET['numero_doc'];
$codigo_eliminar = filter_var($codigo_eliminar, FILTER_VALIDATE_INT);

if(!$codigo_eliminar){
    header('../../index.php');
}

$bd = conectar_db();

    $sql = "DELETE FROM cliente WHERE numero_doc = '$codigo_eliminar'";
    echo $sql;
    $resultado = mysqli_query($bd, $sql);

    if($resultado){
        //'El registro se ha eliminado correctamente';
        //Nos devolvemos a la página inicial
        header('location: ../../index.php');
    }

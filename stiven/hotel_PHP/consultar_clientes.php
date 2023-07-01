<?php
 require 'includes/funciones.php';

 $consulta = consultar_cliente();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel olympo</title>
    
</head>

<body>
   
    <p>Hotel olympo - Administración de cliente</p>
   
    <?php
        
    while($cliente = mysqli_fetch_assoc($cliente)){
            echo $cliente['numero_doc'].$cliente['nombre'].'<br>';
    }
        
    ?>

    <a href="admin/cliente/crear.php">Crear cliente</a>


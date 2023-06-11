<?php


require '../../includes/funciones.php';

$bd = conectar_db();


$consulta = "SELECT * FROM tipo_habitacion";


$resultado_consulta = mysqli_query($bd, $consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar habitaciones</title>
</head>
<body>
<h3>Gestion de habitaciones</h3>  

<table>

    <th>
        <tr>
            <td>Numero de Habitacion</td>
            <td>Tipo de Habitacion</td>
            <td>Descripcion de Habitacion</td>
           
        </tr> 
    </th>
    <?php 
    

    ?>
    <?php while($cliente = mysqli_fetch_assoc($resultado_consulta)){?>
    <tr>
    <td> <?php echo $cliente['tipo'];?> </td>
        <td> <?php echo $cliente['mobiliario'];?> </td>
        <td> <?php echo $cliente['cantidad_p'];?> </td>
        <td> <?php echo $cliente['valor_b'];?> </td>
        
        <td>
            <a href="eliminar.php">Eliminar</a>
            <a href="actualizar.php">Actualizar</a>
            <?php } ?>
        </td>
          
        
    </tr>
    <a href="../../index.php">Regresar</a>
</table>
<?php 
mysqli_close($bd);
?>

</body>
</html>
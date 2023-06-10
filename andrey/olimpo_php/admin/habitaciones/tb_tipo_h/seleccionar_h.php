<?php



//1. Importar la conexión a la base de datos para seleccionar los registros de la tabla clientes

require '../../../includes/funciones.php';

$bd = conectar_db();

//2. Escribir el query o cadena SQL para seleccionar los datos:

$consulta = "SELECT * FROM tipo_habitacion";

//3. Consultar la base de datos agregando el query y la variable $bd donde viene el resultado de la conexión:

$resultado_consulta = mysqli_query($bd, $consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="http://localhost/OLIMPO_PHP/build/css/a2.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Clientes</title>
</head>
<body>
<h3>Gestion de habitaciones - Consultar</h3>  

<table>

    <th>
        <tr>
            <td>numero_H</td>
            <td>tipo</td>
            <td>descripcion</td>
           
        </tr> 
    </th>
    <?php 
    
    //Vamos a MEZCLAR codigo PHP incrustado en una tabla HTML para mostrar los datos de la tabla cliente
    //Vamos a seleccionar todos los datos de la tabla cliente para ser mostrados en una página HTML
    //Usamos WHILE para que se ejecute mientras la tabla tenga datos
    //Si la tabla clientes tiene 10 registros, while se ejecuta 10 veces y PHP repetirá  10 veces el código de HTML
    //Observe que debimos hacer una sola linea PHP para imprimir un cierre } para encerrar el codigo HTML que se repite
    ?>
    <?php while($cliente = mysqli_fetch_assoc($resultado_consulta)){?>
    <tr>
    <td> <?php echo $cliente['tipo'];?> </td>
        <td> <?php echo $cliente['mobiliario'];?> </td>
        <td> <?php echo $cliente['cantidad_p'];?> </td>
        <td> <?php echo $cliente['valor_b'];?> </td>
        
        <td>
            <a href="eliminar_h.php">Eliminar</a>
            <a href="actualizar_h.php">Actualizaar</a>
            <?php } ?>
        </td>
          
        
    </tr>
    <a href="../../../index.php">Regresar...</a>
</table>

<?php 
//Recuerde que podemos OPCIONALMENTE cerrar la base de datos actual, si no lo hacemos PHP lo hace
mysqli_close($bd);
?>

</body>
</html>
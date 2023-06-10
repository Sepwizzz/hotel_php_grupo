<?php



//1. Importar la conexión a la base de datos para seleccionar los registros de la tabla clientes

require '../../includes/funciones.php';

$bd = conectar_db();

//2. Escribir el query o cadena SQL para seleccionar los datos:

$consulta = "SELECT * FROM clientes";

//3. Consultar la base de datos agregando el query y la variable $bd donde viene el resultado de la conexión:

$resultado_consulta = mysqli_query($bd, $consulta);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="http://localhost/andrey/hotel_PHP/build/css/a2.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Clientes</title>
</head>
<body>
<h3>Gestion de clientes - Consultar</h3>  

<table>
    <th>
        <tr>
            <td>Codigo</td>
            <td>Id</td>
            <td>Primer Apellido</td>
            <td>Segundo Apellido</td>
            <td>Nombres</td>
            <td>Correo</td>
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
        <td> <?php echo $cliente['codogo'];?> </td>
        <td> <?php echo $cliente['id'];?> </td>
        <td> <?php echo $cliente['primer_apellido'];?> </td>
        <td> <?php echo $cliente['segundo_apellido'];?></td>
        <td> <?php echo $cliente['nombres'];?></td>
        <td> <?php echo $cliente['correo'];?></td>
        <td>
            <a href="eliminar.php">Eliminar</a>
            <a href="actualizar.php">Actualizaar</a>
            <?php } ?>
        </td>
        
        
    </tr>
    <a href="../../index.php">Regresar...</a>
</table>

<?php 
//Recuerde que podemos OPCIONALMENTE cerrar la base de datos actual, si no lo hacemos PHP lo hace
mysqli_close($bd);
?>

</body>
</html>
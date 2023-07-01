<?php

require ('../../includes/funciones.php');

    //1. Conectarse a la base de datos con la funcion que se construyó para tal efecto
    $db = conectar_db();    
    //2. Escribir la consulta o query SQL
    $sql = "SELECT * FROM cliente ORDER BY numero_doc;";
    //Hacer la consulta 
    $consulta = mysqli_query($db, $sql);
    //3. Acceder a los resultados (Impresos una table HTML para mejor comprension)
    ?>
    <head>
        <title>cliente</title>
        <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="../../estilos/estilos.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>

    </head>
    <h4>Consulta de Clientes</h4>
    <a href="../../index.php"><input type="button" id="regresar" name="regresar" value="Regresar"></a>
    <table>
        <tr>
            <thead>
                
                <th>numero_doc</th>
                <th>nombre</th>
               
            </thead>
            <tbody>
                </tr>
                
                <?php while($cliente = mysqli_fetch_assoc($consulta)) 
                //Combinamos codigo PHP con tablas HTML
                //Por eficiencia, dejamos que el navegador haga las tareas de HTML
                {?>
                <tr>
                    <td><?php echo $cliente['numero_doc'];?></td>
                    <td><?php echo $cliente['nombre'];?></td>
                    
                    <td><a href="actualizar.php?numero_doc=<?php echo $cliente['numero_doc'];?>">Actualizar</a></td>
                    <td><a href="eliminar.php?numero_doc=<?php echo $cliente['numero_doc'];?>">Eliminar</a></td>

                </tr>
                
            </tbody>
            <?php };?>
    </table>

    <?php 
    //El cierre es opcional. PHP cierra la conexión al final si está abierta
    mysqli_close($db);
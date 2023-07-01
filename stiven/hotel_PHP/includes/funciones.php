<?php



function conectar_db(){

    $db = mysqli_connect('localhost', 'root', '', 'olympo');

    if(!$db){
        'No se pudo conectar a la base de datos';
        exit;
    }
    return $db;
}


































function consultar_cliente()
{

    //1. Conectarse a la base de datos con la funcion que se construyó para tal efecto
    $db = conectar_db();    
    //2. Escribir la consulta o query SQL
    $sql = "SELECT * FROM cliente ORDER BY nombre;";
    //Hacer la consulta  
    $consulta = mysqli_query($db, $sql);
    //3. Acceder a los resultados (Impresos una table HTML para mejor comprension)
    ?>
    <h3>Consulta de Cliente</h3>
    <a href="../../index.php">Regresar</a>
    <table>
        <tr>
            <thead>
                
                <th>numero_doc</th>
                <th>nombre</th>
                
            </thead>
            <tbody>
                </tr>
                <?php while($cliente = mysqli_fetch_assoc($consulta)) 
                {?>
                <tr>
                    
                    <td><?php echo $cliente['numero_doc'];?></td>
                    <td><?php echo $cliente['nombre'];?></td>
                    
                    <td><?php echo '<a href="">Actualizar</a>'?></td>
                    <td><?php echo '<a href="">Eliminar</a>';}?></td>

                </tr>
                
            </tbody>
            
    </table>

    <?php 
    //El cierre es opcional. PHP cierra la conexión al final si está abierta
    mysqli_close($db);
            
    return;
}


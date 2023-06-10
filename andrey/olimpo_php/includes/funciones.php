<?php
//1. Consultar una tabla de la base de datos
//Crear la función gestionar_bd()
function conectar_db(){

    $db = mysqli_connect('localhost', 'root', '', 'hotel_php');

    if(!$db){
        'No se pudo conectar a la base de datos';
        exit;
    }
    return $db;
}
function obtener_clien(){


    try{
        require conectar_db();
    
    //Usar las credenciales de conexión
    
    
    
    //Escribir la consulta o query SQL
    
    $sql = "SELECT * FROM cliente;";
    
    
    //Hacer la consulta
    
    $consulta = mysqli_query($db, $sql);
    
    
    //Acceder a los resultados
    
    echo('<pre>');
    
    var_dump(mysqli_fetch_all($consulta));
    
    echo('</pre>');
    
    
    //Cerrar la conexion
    
    //Cierre de la conexión para que libere la memoria
    
    }
    
    catch(\Throwable $th){
    
    echo('<pre>');
    
    var_dump($th);
    
    echo('</pre>');
    
    }
    
    }
    

//2. Conectar a una base de datos
//Credenciales de base de datos


<link rel="stylesheet" href="http://localhost/OLIMPO_PHP/build/css/a2.css">

<?php 
require '../../../includes/funciones.php';

$bd = conectar_db();

//El arreglo $errores nos guarda mensajes de error en caso de no escribir nada en el formulario
$errores =  [];

//echo '<pre>';
//if(($_SERVER['REQUEST_METHOD'])){
//echo '<pre>';
//var_dump(($_POST));
//}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $tipo = $_POST['tipo'];
        $mobiliario= $_POST['mobiliario'];
        $cantidad_p= $_POST['cantidad_p'];
        $valor_b= $_POST['valor_b'];
    

        if(!$tipo){
            $errores[] = 'El número de identificación es obligatorio';
        }
        if(!$mobiliario){
            $errores[] = 'El número de identificación es obligatorio';
        }
        if(!$cantidad_p){
            $errores[] = 'El número de identificación es obligatorio';
        }
        if(!$valor_b){
            $errores[] = 'El número de identificación es obligatorio';
        }
        if(empty($errores)){
        //Insertar los datos a la BD
        
            $sql = "UPDATE tipo_habitacion SET mobiliario='$mobiliario',cantidad_p='$cantidad_p',valor_b='$valor_b'
             WHERE tipo = '$tipo'" ;
            
            echo $sql;

            $resultado = mysqli_query($bd, $sql);

            if($resultado){
                //'El registro se ha insertado correctamente';
                //Nos devolvemos a la página inicial
                header('location: ../../../index.php');

            }
            }
            else{
                foreach($errores as $error){
                    echo '<br>' . $error;
                }
            }
        }      
?>
<div>

    <p>actualizar tipo de habitacion</p> <br>
    <form class="formulario1" method="POST" action="actualizar_h.php">
        <fieldset>
            <legend>Datos</legend>
            <label for="tipo">ponga el tipo de habitacion</label><br>
            <input class="formu" type="text" id="tipo" name="tipo"><br>

            <label for="mobiliario">ponga el numero de moviliario :</label><br>
            <input class="formu" type="text" id="mobiliario" name="mobiliario" ><br>

            <label for="cantidad_p">ponga la cantidad de personas :</label><br>
            <input class="formu" type="text" id="cantidad_p" name="cantidad_p" ><br>

            <label for="valor_b">ponga el valor del tipo :</label><br>
            <input class="formu" type="text" id="valor_b" name="valor_b" ><br>
            

            <input class="formu" type="submit" id="enviar" name="enviar" value="Enviar datos">

         
        </fieldset>
        
    </form>

</div>


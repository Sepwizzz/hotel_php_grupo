<?php
//Filtros de validación
//Sentencias PHP que permiten determinar si un dato cumple con alguna condición
//Ejemplo: Si su aplicación espera que se ingrese un dato de tipo float PHP permite verificarlo con código
//El validador determina si un valor cumple o no una condición

// Ver mas detalles en https://www.php.net/manual/es/filter.filters.php

//1. FILTROS DE VALIDACIÓN

//Ejemplo: PHP VALIDA si el valor de una variable es float así:

//PHP Usa la función filter_var que recibe dos argumentos: una variable y la expresión FILTER_VALIDATE_FLOAT

//Se usa la función filter_var() de esta manera:

//2. Validación de un dato de tipo correo electrónico:

$correo = 'juan#sena.edu.co'; //Verifica si so correo cumple con los tipos esperados de correo electrónico xxx@ccc :

if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
    echo 'Tu correo es correcto, puedes continuar';
}
else{
    echo 'Corrije el correo electrónico';
}


//2. FILTROS DE SANIDAD O SANITIZACIÓN
//Permiten limpiar los datos de entradas extrañas, ejemplo, números con caracteres especiales o alfabéticos.
//Los usuarios maliciosos pueden intentar enviar datos sucios o dañinos al sistema
//PHP ofrece la sanitización de datos con los filtros de saneamiento que se aplican como una función así:



$correo2 = 'juan@/sena.edu';

//FILTER_SANITIZE_EMAIL permite eliminar caracteres no deseados en un correo electrónico:

$correo2_saneado = filter_var($correo2, FILTER_SANITIZE_EMAIL);

echo '<br>'  . 'El correo se ha saneado: ' . $correo2_saneado;

$mi_nombre = 'Juan Eduardo';

$mi_nombre_saneado = filter_var($mi_nombre, FILTER_SANITIZE_STRING);

echo $mi_nombre_saneado;
?>
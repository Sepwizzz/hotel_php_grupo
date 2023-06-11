<?php
declare(strict_types=1);

class Persona{
    private $nombre;
    private $edad;

    function __construct($nombre, $edad=18){
    $this->nombre = $nombre;
    $this->edad = $edad;
    
    }

    function set_nombre($nombre){

        if(strlen($nombre) <= 2 || $nombre = Null){
            echo 'El nombre es muy corto';       
        }
        else{
            $this->nombre = $nombre;
        }
    }
    function set_edad($edad){
        if($edad<=0){
            echo 'La edad está equivocada';
            exit;
        }
        else{
            $this->edad = $edad;
        }
 
    }   

    function get_nombre(){
        return $this->nombre;
    }

    function get_edad(){
        return $this->edad;
    }
}

$p1 = new Persona('Lucia', 0);

//$p1->set_edad(0);



echo $p1->get_nombre() . ' tiene '. $p1->get_edad() . ' años';

?>

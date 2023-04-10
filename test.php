<?php
require "Jugada.php";
require "Clave.php";


class cosa{
    public $atributo1;
    public $atributo2;

    public function __construct($a,$b){
        $this->atributo1 = $a;
        $this->atributo2 = $b;

    }

    public function __toString(){
        $salida = serialize($this);
        //var_dump($salida);
        return $salida;
    }
}

$object = new cosa("Hola","mundo");
/*var_dump($object);
echo "<br>";
var_dump(serialize($object));*/
echo $object;
<?php

class Clave
{
const COLORES = ['Azul','Rojo','Naranja','Verde','Violeta','Amarillo','Marron','Rosa'];
private static $clave = [];
static public function obtener_clave()
{
    if(isset($_SESSION['clave'])){
        $clave = $_SESSION['clave'];
    }else{
        self::generar_clave();
        $_SESSION['clave'] = self::$clave;
    }
    return $clave;
}
//En $clave se guardan las posiciones aleatorias del array COLORES (laposición, no el valor).
//Recorriendo el array $claves cambio cada valor que es un indice del array COLORES por su valor en este último
static private function generar_clave(){
    self::$clave = array_rand(self::COLORES,4);
    foreach(self::$clave as $valor){
        $valor = self::COLORES[$valor];
    }
}
}
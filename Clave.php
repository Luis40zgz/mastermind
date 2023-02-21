<?php

class Clave
{
const COLORES = ['Azul','Rojo','Naranja','Verde','Violeta','Amarillo','Marron','Rosa'];
private static $clave = [];
public function obtener_clave()
{
    if(isset($_SESSION['clave'])){
        $clave = $_SESSION['clave'];
    }else{
        self::generar_clave();
        $_SESSION['clave'] = self::$clave;
    }
    return $clave;
}
private function generar_clave(){
    array_rand(self::$clave,4);
    foreach(self::$clave as $valor){
        $valor = self::COLORES[$valor];
    }
}
}
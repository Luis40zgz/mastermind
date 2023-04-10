<?php

class Clave
{
    const COLORES = ['Azul','Rojo','Naranja','Verde','Violeta','Amarillo','Marron','Rosa'];
    private static array $clave = [];
    public static function obtener_clave()
    {
        if(isset($_SESSION['clave'])){
            self::$clave = $_SESSION['clave'];
        }else{
            self::generar_clave();
            $_SESSION['clave'] = self::$clave;
        }
        return self::$clave;
    }
    private static function generar_clave(){
        $colores = self::COLORES;
        $posiciones = array_rand($colores, 4);
        foreach ($posiciones as $posicionColores) {self::$clave[] = $colores[$posicionColores];}
    }
    public static function resetear_clave()
    {
        self::$clave = [];
        session_destroy();
        session_start();
        self::generar_clave();

        echo "CLAVE RESETEADA";
    }
}
<?php

class Jugada
{
private array $combinacion;
private int $colores_acertados;
private int $posiciones_acertadas;


    public function __construct(array $combinacion){
        $this->combinacion = $combinacion;
        $this->posiciones_acertadas = 0;
        $this->colores_acertados = 0;
        $this->evaluar_jugada();
    }

    private function evaluar_jugada(){
        $clave = Clave::obtener_clave();
        foreach($clave as $color){
            if(in_array($color,$this->combinacion)){$this->colores_acertados++;}
        }
        foreach($this->combinacion as $key=>$color){
            if($clave[$key]===$color){$this->posiciones_acertadas++;}
        }
    }
    public function almacenar_en_historial(){
        $_SESSION['jugadas'][] = serialize($this);
    }

    public function getCombinacion(): array
    {
        return $this->combinacion;
    }
    public function getColoresAcertados(): int
    {
        return $this->colores_acertados;
    }
    public function getPosicionesAcertadas(): int
    {
        return $this->posiciones_acertadas;
    }
    public function __toString() : string {
        $posiciones = $this->getPosicionesAcertadas();
        $colores = $this->getColoresAcertados();
        $salida = "<p>Jugada actual: </p><br><p>Resultado : $colores Colores y $posiciones posiciones</p>";
        return $salida;
    }
}
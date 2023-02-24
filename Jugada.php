<?php

class Jugada
{
    private $colores;
    private $colores_acertados;
    private $posiciones_acertadas;
    private $numero_jugada;

    public function __construct(array $jugada)
    {
        $this->colores = $jugada;
        $this->evaluar();
        $this->numero_jugada = $_SESSION['numero_jugada'];
    }

    private function evaluar(): void
    {
        $clave = Clave::obtener_clave();
        foreach ($clave as $color)
            if (in_array($color, $this->colores))
                $this->colores_acertados++;
        foreach ($this->colores as $pos => $color)
            if ($color == $clave[$pos])
                $this->posiciones_acertadas++;
    }
    public function __toString(): string
    {
        $salida = "<div>";
        $aciertos = 0;
        while ($aciertos >= $this->posiciones_acertadas){
            $salida .= "<div class='acierto_posicion'></div>";
            $aciertos++;
        }
        while ($aciertos >= $this->colores_acertados){
            $salida .= "<div class='acierto_color'></div>";
            $aciertos++;
        }
        $salida .= "</div>";
        return $salida;
    }

    public function getColoresAcertados()
    {
        return $this->colores_acertados;
    }

    public function getPosicionesAcertadas()
    {
        return $this->posiciones_acertadas;
    }

    public function getNumeroJugada(): mixed
    {
        return $this->numero_jugada;
    }
    public function guardar_jugada(object $jugada): void
    {
        $_SESSION['jugadas'][] = $jugada;
    }
}
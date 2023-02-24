<?php

class Plantilla
{
    static public function genera_formulario_juego():string
    {
        $colores = Clave::COLORES;
        $formulario = '<form action="jugar.php" method="POST"><fieldset><legend>Menú jugar</legend><h3> Selecciona 4 colores para jugar</h3>';
        for($i = 0;$i < 4;$i++){
            $formulario .= "<select onchange='cambia_color($i)'  class='{$_POST['combinacion'][$i]}' name='combinacion[]' id='combinacion$i'><option value='' selected disabled hidden>Color</option>";
                foreach($colores as $color){
                    $select = $color == $_POST['combinacion'][$i] ? "selected" : "";
                    $formulario .= "<option class=\"$color\" value='$color' $select >$color</option>";
                }
             $formulario .= "</select>";
        }
        $formulario .= '<br><button type="submit" value="jugar" name="submit">Jugar</button></fieldset></form>';
        return $formulario;
    }
    static public function muestra_clave():string
    {
        $clave = Clave::obtener_clave();
        $salida = "<h2>Clave Actual</h2><div class='jugada'>";
        foreach($clave as $color){
            $salida .= "<span class='Color $color'>$color</span>";
        }
        $salida .= "</div>";
        return $salida;
    }
    static public function muestra_historial():string
    {
        $salida = "<div><p>Jugada actual {$_SESSION['numero_jugada']}</p><p>Resultado: </p>";
        foreach($_SESSION['juagada'] as $jugada)
            $salida .= $jugada;
        return $salida .= "</div>";
    }
}
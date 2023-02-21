<?php

class Plantilla
{
    static public function genera_formulario_juego():string
    {
        $colores = Clave::COLORES;
        $formulario = '<form action="jugar.php" method="POST"><div class="grupo_select"><h3> Selecciona 4 colores para jugar</h3>';
        for($i = 0;$i < 4;$i++){
            $formulario .= "<select onchange='cambia_color($i)'  name='combinacion[]' id='combinacion$i'><option value='' selected disabled hidden>Color</option>";
                foreach($colores as $color){
                    $formulario .= "<option class=\"$color\" value='$color'>$color</option>";
                }
             $formulario .= "</select>";
        }
        $formulario .= '<br><button type="submit" value="jugar" name="submit">Jugar</button></form>';
        return $formulario;
    }
}
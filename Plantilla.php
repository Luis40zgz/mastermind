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

    static public function mostrar_historial(){
        if(isset($_SESSION['jugadas'])){
            $html = "";
            foreach($_SESSION['jugadas'] as $key=>$jugada) {
                $num_jugada = (int) $key + 1;
                $html .= "<p>Jugada numero $num_jugada:</p><div class='flex'>";
                $jugada=unserialize($jugada);
                foreach ($jugada->getCombinacion() as $color) {
                    $html .= "<span class='$color color'>$color</span>";

                    $html .= "<br>";
                }
                for ($n = 0; $n < $jugada->getPosicionesAcertadas(); $n++) {
                    $html .= "<span class='negro acierto'>$n</span>";
                }
                for ($n = $jugada->getPosicionesAcertadas(); $n < $jugada->getColoresAcertados(); $n++) {
                    $html .= "<span class='blanco acierto'>$n</span>";
                }
                $html .= "</div>";
            }
        }else { $html = "<p>No hay información que mostrar.</p>";}
        return $html;
    }
    static public function mostrar_clave(){
        $clave = Clave::obtener_clave();
        $html = "<div class='flex'>";
        foreach ($clave as $color) {
            $html .= "<span class='$color color'>$color</span>";
        }
        $html .= "</div>";
        return $html;
    }
}
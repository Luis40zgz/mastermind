<?php
session_start();
if(!isset($_POST['submit'])){
    session_destroy();
    header('location:index.php');
    die;
}
$carga = fn($clase)=>require_once "$clase.php";
spl_autoload_register($carga);

function evaluar_fin_juego(Jugada $jugada)
{
    if ($jugada->getPosicionesAcertadas() == 4) {
        $win = true;
        header("location:fin.php?win=$win");
        exit();
    }
    if (sizeof($_SESSION['jugadas']) >= 14) {
        $win = false;
        header("location:fin.php?win=$win");
        exit();
    }
}

$mostrar_ocultar_clave="Mostrar Clave";
$clave =Clave::obtener_clave();
$informacion="<p>No hay información que mostrar.</p>";
if(isset($_POST['submit'])){
    $caso=$_POST['submit'];
    switch($caso){
        case "Mostrar Clave":
            $mostrar_ocultar_clave="Ocultar Clave";
            $informacion = Plantilla::mostrar_clave();
            break;
        case "Ocultar Clave":
            $mostrar_ocultar_clave="Mostrar Clave";
            $informacion = Plantilla::mostrar_historial();
            break;
        case "Resetear la Clave":
            Clave::resetear_clave();
            break;
        case "jugar":
            if(!isset($_POST['combinacion'])||(count($_POST['combinacion'])<4)){
                $informacion = Plantilla::mostrar_historial();
                $warning = "Debe intorducir 4 colores";
            }else{
                $jugada = new Jugada ($_POST['combinacion']);
                $jugada->almacenar_en_historial();
                evaluar_fin_juego($jugada);
                $informacion = $jugada . "<br>" . Plantilla::mostrar_historial();
            }
            break;
    }
}
$_SESSION['partida_empezada'] = true;
$plantilla = new Plantilla;
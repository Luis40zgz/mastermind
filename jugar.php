<?php
session_start();
$carga = fn($clase)=>require_once "$clase.php";
spl_autoload_register($carga);

$opcion =$_POST['submit']??"";

function  inicializar(){
    Clave::obtener_clave();
    $_SESSION['numero_jugada'] = 0;
    $informacion = "<p>Sin datos que mostrar</p>";
    $instruccion = "<p>Selecciona 4 colores.</p>";
}
switch($opcion){
    case "iniciar":
        inicializar();
        break;
    case "jugar":
        if(sizeof($_POST['combinacion'])<4){
            $instruccion = "<p>Debes seleccionar 4 colores</p>";
            $informacion = "<p>Sin datos que mostrar</p>";
        }else{
            $_SESSION['numero_jugada'] ++;
            $jugada = new Jugada($_POST['combinacion']);
            $informacion = "" . Plantilla::muestra_historial();
        }
        break;
    case "mostrar":
        $button = "Ocultar clave";
        break;
    case "ocultar":

        break;
    case "reiniciar":
        session_destroy();
        session_start();
        inicializar();
        break;

    default:
        header("location:index.php");
        exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
    <script>
        function cambia_color(numero) {
            color = document.getElementById("combinacion" + numero).value;
            elemento = document.getElementById("combinacion" + numero);
            elemento.className = color;
        }
    </script>
</head>
<body>
<div class="contenedorJugar">
    <div class="opciones">
        <h2>OPCIONES</h2>
        <form action="<?= $_SERVER['PHP_SELF'];?>" method="POST">
            <fieldset>
                <legend>Acciones posibles</legend>
                <button type="submit" value="<?= $_POST['submit'] == 'mostrar' ? 'ocultar' : 'mostrar';?>" name="submit"><?= $button ?? "Mostrar Clave"?></button>
                <button type="submit" value="0" name="submit">Resetar clave</button>
            </fieldset>
        </form>
        <?= Plantilla::genera_formulario_juego();?>
    </div>
    <div class="informacion">
        <h2>INFORMACIÓN</h2>
        <fieldset>
            <legend>Sección de información</legend>
            <?= $estado;?>
            <?= $informacion;?>
        </fieldset>
    </div>
</div>
<script src="js/script.js"></script>
</body>
</html>

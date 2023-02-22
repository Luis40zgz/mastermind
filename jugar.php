<?php
$carga = fn($clase)=>require_once "$clase.php";
spl_autoload_register($carga);


/*$opcion =$_POST['submit']??"";
switch($opcion){
    case "iniciar":

        Clave::obtener_clave();
        break;
    case "jugar":
        break;
    case "mostrar":
        break;
    case "ocultar":
        break;
    case "reiniciar":
        break;

    default:
    header("location:index.php")
    exit();
}*/
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
                <button type="submit" value="1" name="submit">Mostrar clave</button>
                <button type="submit" value="0" name="submit">Ocultar clave</button>
            </fieldset>
        </form>
        <?= Plantilla::genera_formulario_juego();?>
    </div>
    <div class="informacion">
        <h2>INFORMACIÓN</h2>
        <fieldset>
            <legend>Sección de información</legend>

        </fieldset>
    </div>
</div>
<script src="js/script.js"></script>
</body>
</html>

<?php
$carga = fn($clase)=>require_once "$clase.php";
spl_autoload_register($carga);
$plantilla = new Plantilla;
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/estilo.css">
    <title>Document</title>
</head>
<body>
<?= $plantilla -> genera_formulario_juego();?>
<script src="js/script.js"></script>
</body>
</html>

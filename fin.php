<?php
session_start();
if(!isset($_GET['win'])){
    session_destroy();
    header('location:index.php');
    exit;
}
if($_GET['win']){
    $mensaje="<h1>¡¡¡ ENHORABUENA !!!</h1>";
}else{
    $mensaje="<h1>¡¡¡Ohhh vueve a intentarlo!!!</h1>";
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Juego Master Bind</title>
    <link rel="stylesheet" href="./css/estilo.css" type="text/css">
</head>
<body>
<div class="containerIndex">
    <div class="presentacion">
        <?= $mensaje;?>
        <form action="index.php" method="post">
            <button type="submit" name="submit" value="Volver a jugar">Volver a jugar</button>
        </form>
    </div>
</div>
</body>
</html>

<?php
session_start();
if(isset($_SESSION['clave'])){
    session_destroy();
    session_start();
}
$carga = fn($clase)=>require_once "$clase.php";
spl_autoload_register($carga);

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
        <h2>DESCRIPCIÓN DEL JUEGO DE MASTER BIND</h2>
        <hr/>
        <ol>
            <li>Esta es una presentación personalizada del juego.</li>
            <li>El usuario deberá de adivinar una secuencia de 4 colores diferentes.</li>
            <li>Los colores se establecerán aleatoriamente de entre 10 colores preestablecidos.</li>
            <li>En total habrá 14 intentos para adivinar la clave.</li>
            <li>En cada jugada la app informará:
                <ul>
                    <li>cuántos colores has acertado de la combinación</li>
                    <li>cuántos de ellos están en la posición correcta.</li>
                </ul>
            <li>No se especificará cuáles son las posiciones acertadas en caso de acierto.</li>
        </ol>
        <hr/>
        <form action="jugar.php">
            <button type="submit" value="iniciar">Empezar a Jugar</button>
        </form>
    </div>
</div>
</body>
</html>

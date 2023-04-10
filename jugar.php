<?php
require "controlador.php";
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
<header></header>
<main>
    <div class="contenedorJugar">
        <div class="opciones">
            <section>
                <form action="jugar.php" method="POST">
                    <fieldset>
                        <legend>Acciones posibles</legend>
                        <input type="submit" value="<?=$mostrar_ocultar_clave?>" name="submit">
                        <input type="submit" value="Resetear la Clave" name="submit">
                    </fieldset>
                </form>
            </section>
            <section>
                <h2>Opciones</h2>
                <div></div>
                <div><?= $plantilla -> genera_formulario_juego();?></div>
                <?= $warning ?? "";?>
            </section>
        </div>
        <div class="informacion">
            <h2>Información</h2>
            <?= $informacion;?>
        </div>
    </div>
</main>
<script src="js/script.js"></script>
</body>
</html>

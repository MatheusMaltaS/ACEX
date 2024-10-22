<?php
session_start();

include "verificar_admin.php";

$_SESSION['url_anterior'] = 'mapa.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Expo FSA</title>
    <?php
    include "links.php";
    ?>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main class="main-padding">
        <section class="mapa">
            <div class="imagem-div">
                <img src="./imagens/mapa.EXPO.svg" name="mapa" id="mapa" alt="Descrição da imagem">
            </div>
        </section>
    </main>

</body>

</html>
<?php
session_start();
$_SESSION['url_anterior'] = '../mapa.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expo FSA</title>
    <?php
    include "links.php";
    ?>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main>
        <section class="mapa">
            <div id="imagem-div">
                <img src="./imagens/Mapa-FSA-2024.jpg" alt="Descrição da imagem">
            </div>
        </section>
    </main>

</body>

</html>
<?php
session_start();
$_SESSION['url_anterior'] = '../chat.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte Expo FSA</title>
    <?php
    include "links.php";
    ?>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main>
        <section class="main-padding">
            <div class="suporte">
                <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSduqFxYaq4TSp_y2D1MEucrssRDfETOzoLMveuKSfNgTGjpYQ/viewform"
                    frameborder="0" marginheight="0" marginwidth="0">Carregando…
                </iframe>
            </div>
        </section>
    </main>
</body>

</html>
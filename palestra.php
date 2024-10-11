<?php
session_start();
$_SESSION['url_anterior'] = '../palestra.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestras Expo FSA</title>
    <?php
    include "links.php";
    ?>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main>
        <section class="palestras">
            <div class="palestra">
                <div class="palestra-texto">
                    <div id="nome-palestrante">
                        Michell Pereira dos Santos da Silva
                    </div>
                    <div id="curriculo-palestrante">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure sit ea maiores ratione aliquid, neque at nisi vel reiciendis quidem quod assumenda sunt consequatur velit dolores consequuntur deleniti, veniam labore culpa a eligendi fugiat error cumque natus. Quod odit corporis rem! Maxime, tempora architecto. Atque nemo assumenda modi consectetur asperiores.
                    </div>
                    <div id="titulo-palestra">
                        O impacto das IAS no mercado de trabalho
                    </div>
                </div>
                <img src="./imagens/fundo.textopal.svg" style="pointer-events: none;" alt="Fundo de texto para palestrantes">
                <div class="palestrante">
                    <div id="foto-palestrante">
                        <img src="./imagens/pessoa-vr-alt-1024x1017.png" alt="Imagem do palestrante">
                    </div>
                    <img src="./imagens/fundo.palestrante.svg" id="moldura-palestrante" alt="Moldura para palestrante">
                    <img src="./imagens/bolhas.fundo.svg" id="bolhas" alt="Fundo de bolhas">
                </div>
            </div>
            <div class="palestra">
                <div class="palestra-texto">
                    <div id="nome-palestrante">
                        Michell Pereira dos Santos da Silva
                    </div>
                    <div id="curriculo-palestrante">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iure sit ea maiores ratione aliquid, neque at nisi vel reiciendis quidem quod assumenda sunt consequatur velit dolores consequuntur deleniti, veniam labore culpa a eligendi fugiat error cumque natus. Quod odit corporis rem! Maxime, tempora architecto. Atque nemo assumenda modi consectetur asperiores.
                    </div>
                    <div id="titulo-palestra">
                        O impacto das IAS no mercado de trabalho
                    </div>
                </div>
                <img src="./imagens/fundo.textopal.svg" alt="Fundo de texto para palestrantes">
                <div class="palestrante">
                    <div id="foto-palestrante">
                        <img src="./imagens/pessoa-vr-alt-1024x1017.png" alt="Imagem do palestrante">
                    </div>
                    <img src="./imagens/fundo.palestrante.svg" id="moldura-palestrante" alt="Moldura para palestrante">
                    <img src="./imagens/bolhas.fundo.svg" id="bolhas" alt="Fundo de bolhas">
                </div>
            </div>
        </section>
    </main>
</body>

</html>
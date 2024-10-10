<?php
session_start();
$_SESSION['url_anterior'] = '../index.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

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
        <section>

        </section>
        <section class="sobre">
            <div class="texto">
                <h2>SOBRE O SITE</h2>
                <p>Ao longo dos últimos anos na Fundação Santo André (FSA), questões relacionadas aos Eventos Internos,
                    como
                    locais de palestras, processos de inscrição e emissão de certificados, têm sido frequentes. Esta
                    situação persiste tanto para calouros quanto para veteranos, devido à escassez de informações e à
                    falta
                    de praticidade no acesso a essas informações. Frente a esses desafios, é imperativo reavivar o
                    interesse
                    dos alunos pela participação em eventos. Nesse contexto, o projeto "Expo FSA" surge como uma
                    iniciativa
                    para auxiliar todos os interessados em eventos promovidos pela instituição. Para alcançar esse
                    objetivo,
                    será desenvolvido um site utilizando linguagens como HTML, CSS e JavaScript. O design do site será
                    inspirado no Portal FSA, oferecendo um menu intuitivo que proporcionará acesso rápido a todas as
                    funcionalidades. O site contará com um sistema de cadastro para administradores e estudantes,
                    visando
                    facilitar o gerenciamento e a participação nos eventos. As principais funcionalidades do site
                    incluirão:
                    Um mapa interativo apresentando a localização do campus e os locais onde serão realizados os
                    eventos,
                    datas e detalhes dos palestrantes serão inseridos e atualizados pelos administradores do site, um
                    link
                    direto para facilitar o acesso aos eventos cadastrados no Sympla, guias e instruções claras para
                    auxiliar os usuários na emissão de certificados após a participação nos eventos, um formulário para
                    que
                    os alunos possam avaliar os eventos e expressar suas expectativas para futuras edições. Osite será
                    projetado para oferecer uma comunicação simplificada e eficiente, fornecendo apenas as informações
                    essenciais ao usuário. Será desenvolvido com foco na responsividade e na clareza, visando
                    proporcionar
                    uma experiência de usuário direta e intuitiva.</p>
            </div>
            <div class="imagemSobre">
                <img src="./imagens/pessoa-vr-alt-1024x1017.png">
            </div>
        </section>





    </main>


</body>

</html>
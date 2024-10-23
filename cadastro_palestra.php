<?php
session_start();
$admin = $_SESSION['admin'] ?? 0;

if ($admin == 0) {
    if (isset($_SESSION['url_anterior']) ? header("Location: " . $_SESSION['url_anterior']) : header("Location: ./index.php"));
}
$_SESSION['url_anterior'] = 'cadastro_palestra.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Palestra Expo FSA</title>
    <?php
    include "links.php";
    ?>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main class="main-padding">
        <section>
            <div class="form">
                <form action="./db/cadastrar_palestra.php" method="POST" enctype="multipart/form-data" class="login-container" id="form_cadastro">
                    <h1>Cadastro de Palestra</h1>
                    <div class="input-box">
                        <input type="text" name="nome_palestrante" id="nome_palestrante" class="item" placeholder="Nome do palestrante" maxlength="50">
                        <div class="error-txt nome_palestrante">Nome do palestrante não pode ficar em branco!</div>
                    </div>
                    <div class="input-box">
                        <textarea name="descricao_palestrante" id="descricao_palestrante" class="item" placeholder="Descrição do palestrante" maxlength="700" rows="5"></textarea>
                        <div class="error-txt descricao_palestrante" style="margin-top: -0.3rem;">Descrição do palestrante não pode ficar em branco!</div>
                    </div>
                    <div class="input-box">
                        <input type="text" name="tema" id="tema" class="item" placeholder="Tema da palestra" maxlength="80">
                        <div class="error-txt tema">Tema da palestra não pode ficar em branco!</div>
                    </div>
                    <div class="input-box" style="align-items: center; flex-direction: column;">
                        <span style="display: flex; margin-left: 0.4rem; text-align: start; width: 100%;" name="foto_palestrante" id="foto_palestrante">Foto do palestrante: </span>
                        <img id="imagePreview" src="" alt="Pré-visualização da imagem">
                        <div class="div_button-palestra">
                            <label for="file" class="button">
                                Escolha uma imagem
                            </label>
                            <button id="removeImage" style="display: none;" class="button">
                                Remover Imagem
                            </button>
                        </div>
                        <input style="margin-left: -1.1rem; display: none" type="file" name="file" id="file" accept="image/png, image/jpeg, image/jpg">
                    </div>
                    <button type="submit">Cadastrar</button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>
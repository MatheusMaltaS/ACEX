<?php
session_start();
$admin = $_SESSION['admin'] ?? 0;

if ($admin == 0) {
    if (isset($_SESSION['url_anterior']) ? header("Location: " . $_SESSION['url_anterior']) : header("Location: ./index.php"));
}

$_SESSION['url_anterior'] = 'altera_palestra.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['id_palestra'] = $id;

    include "./db/config.php";

    $query = "SELECT * FROM palestras WHERE id = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $palestra = $result->fetch_assoc();

    $nome_palestrante = $palestra["nome_palestrante"];
    $descricao_palestrante = $palestra["descricao_palestrante"];
    $tema = $palestra["tema"];
    $foto_palestrante = $palestra["foto_palestrante"];
    $_SESSION["foto_palestrante"] = $foto_palestrante;
} else {
    if (isset($_SESSION['url_anterior'])) {
        header("Location: ./" . $_SESSION['url_anterior']);
    } else {
        header("Location: ../index.php");
    }
}


?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Palestra - Expo FSA</title>
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
                <form action="./db/alterar_palestra.php" method="POST" enctype="multipart/form-data" class="login-container palestra-container" id="form_cadastro">
                    <h1>Alterar Palestra</h1>
                    <div class="input-box">
                        <span>Nome do palestrante:</span>
                        <input type="text" name="nome_palestrante" id="nome_palestrante" class="item" placeholder="Nome do palestrante" maxlength="50" value="<?php echo htmlspecialchars($nome_palestrante); ?>">
                        <div class="error-txt nome_palestrante">Nome do palestrante não pode ficar em branco!</div>
                    </div>
                    <div class="input-box">
                        <span>Descrição do palestrante:</span>
                        <textarea name="descricao_palestrante" id="descricao_palestrante" class="item" placeholder="Descrição do palestrante" maxlength="700" rows="5"><?php echo htmlspecialchars($descricao_palestrante); ?></textarea>
                        <div class="error-txt descricao_palestrante" style="margin-top: -0.3rem;">Descrição do palestrante não pode ficar em branco!</div>
                    </div>
                    <div class="input-box">
                        <span>Tema da palestra:</span>
                        <input type="text" name="tema" id="tema" class="item" placeholder="Tema da palestra" maxlength="80" value="<?php echo htmlspecialchars($tema); ?>">
                        <div class="error-txt tema">Tema da palestra não pode ficar em branco!</div>
                    </div>
                    <div class="input-box" style="align-items: center; flex-direction: column;">
                        <span name="foto_palestrante" id="foto_palestrante">Foto do palestrante: </span>
                        <img id="imagePreview" name="imagePreview" src="./imgs_palestrantes/<?php echo htmlspecialchars($foto_palestrante); ?>" alt="Pré-visualização da imagem" style="display: inline;">
                        <input type="hidden" id="tem_imagem" name="tem_imagem" value="Sim">
                        <div class="div_button-palestra">
                            <label for="file" class="button">
                                Alterar Imagem
                            </label>
                            <button id="removeImage" style="display: inline;" class="button">
                                Remover Imagem
                            </button>
                        </div>
                        <input style="margin-left: -1.1rem; display: none" type="file" name="file" id="file" accept="image/png, image/jpeg, image/jpg" value="<?php echo htmlspecialchars($foto_palestrante); ?>">
                    </div>
                    <button type="submit">Alterar</button>
                    <?php
                    if (isset($_SESSION['aviso_error'])) {
                    ?>
                        <div class="aviso-txt">
                            <?php
                            echo $_SESSION['aviso_error'];
                            unset($_SESSION['aviso_error']);
                            ?>
                        </div>
                    <?php
                    } else if (isset($_SESSION['aviso_sucess'])) {
                    ?>
                        <div class="sucess-txt">
                            <?php
                            echo $_SESSION['aviso_sucess'];
                            unset($_SESSION['aviso_sucess']);
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </form>
            </div>
        </section>

    </main>
</body>

</html>
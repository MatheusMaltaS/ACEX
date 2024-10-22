<?php
session_start();

include "verificar_admin.php";

$_SESSION['url_anterior'] = 'perfil.php';

if (!isset($_SESSION["login"])) {
    header("Location: ./login.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil Expo FSA</title>
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
                <form action="./db/alterar.php" method="POST" class="perfil-container perfil" id="form_cadastro">
                    <h1>Olá
                        <?php
                        if (isset($_SESSION['nome'])) {
                            echo $_SESSION['nome'];
                        } else {
                            echo 'Usuário';
                        }
                        ?>!</h1>
                    <div class="input-box-perfil">
                        <span>Nome:</span>
                        <div>
                            <input type="text" name="nome" id="nome" class="item" placeholder="Nome" value="<?php echo htmlspecialchars($_SESSION['nome']); ?>">
                            <div class="error-txt nome">Nome não pode ficar em branco!</div>
                        </div>
                    </div>
                    <div class="input-box-perfil">
                        <span>E-mail:</span>
                        <div>
                            <input type="email" name="email" id="email" class="item" placeholder="E-mail" value="<?php echo htmlspecialchars($_SESSION['email']); ?>">
                            <div class="error-txt email">Email não pode ficar em branco!</div>
                        </div>
                    </div>
                    <div class="input-box-perfil">
                        <span>Senha:</span>
                        <div>
                            <input type="password" name="senha" id="senha" class="item" placeholder="Senha" value="<?php echo htmlspecialchars($_SESSION['senha']); ?>">
                            <div class="error-txt senha">Senha não pode ficar em branco!</div>
                        </div>
                        <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                    </div>

                    <button type="submit">Alterar</button>
                    <br>
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
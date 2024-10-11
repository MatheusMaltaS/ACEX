<?php
// Inicia a sessão
session_start();

$nome = $_SESSION['nome'] ?? '';
$email = $_SESSION['email'] ?? '';

unset($_SESSION['nome']);
unset($_SESSION['email']);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Expo FSA</title>
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
            <div class="logo">
                <img src="./imagens/imagem1.jpg"></img>
            </div>
            <div class="form">
                <div class="logo2">
                    <img src="./imagens/imagem2.jpg"></img>
                </div>
                <form action="./db/cadastro.php" method="POST" class="login-container" id="form_cadastro">
                    <h1>Cadastro</h1>
                    <div class="input-box">
                        <input type="text" name="nome" id="nome" class="item" placeholder="Nome" value="<?php echo htmlspecialchars($nome); ?>">
                        <div class="error-txt nome">Nome não pode ficar em branco!</div>
                    </div>
                    <div class="input-box">
                        <input type="text" name="email" id="email" class="item" placeholder="E-mail" value="<?php echo htmlspecialchars($email); ?>">
                        <div class="error-txt email">Email não pode ficar em branco!</div>
                        <div class="error-txt email_cadastrado error">
                            <?php
                            if (isset($_SESSION['aviso'])) {
                                echo $_SESSION['aviso'];
                                unset($_SESSION['aviso']);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="input-box-senha">
                        <div>
                            <input type="password" name="senha" id="senha" class="item" placeholder="Senha">
                            <div class="error-txt senha">Senha não pode ficar em branco!</div>
                        </div>
                        <i class="bi bi-eye-fill" id="btn-senha" onclick="mostrarSenha()"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" name="confirm_senha" id="confirm_senha" class="item" placeholder="Confirme a sua senha">
                        <div class="error-txt confirm_senha">Confirmação de senha não pode ficar em branco!</div>
                    </div>
                    <button type="submit">Cadastrar</button>
                    <p>Já tem uma conta? <a class="ai" href="login.php">Entre aqui</a></p>
                </form>
                <div class="logo3">
                    <img src="./imagens/imagem3.jpg"></img>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
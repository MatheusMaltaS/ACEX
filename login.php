<?php
// Inicia a sessão
session_start();

$email = $_SESSION['email'] ?? '';
unset($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EXPO</title>
  <?php
  include "links.php";
  ?>
</head>

<body>
  <?php
  include "header.php";
  ?>
  <main>
    <section class="form">
      <div class="logo">
        <img src="./imagens/imagem1.jpg"></img>
      </div>
      <div class="logo2">
        <img src="./imagens/imagem2.jpg"></img>
      </div>
      <div class="login-container">
        <form action="./db/login.php" method="POST" id="form_cadastro">
          <div class="logo">
          </div>
          <h1>Faça o login</h1>
          <div class="input-box">
            <input type="text" name="email" id="email" class="item" placeholder="E-mail" value="<?php echo htmlspecialchars($email); ?>">
            <div class="error-txt email error">
              <?php
              if (isset($_SESSION['aviso_usuario'])) {
                echo $_SESSION['aviso_usuario'];
                unset($_SESSION['aviso_usuario']);
              }
              ?>
            </div>
          </div>
          <div class="input-box">
            <input type="password" name="senha" id="senha" class="item" placeholder="Senha">
            <div class="error-txt senha error">
              <?php
              if (isset($_SESSION['aviso_senha'])) {
                echo $_SESSION['aviso_senha'];
                unset($_SESSION['aviso_senha']);
              }
              ?>
            </div>
          </div>

          <a href="index.php"><button>Acessar</button></a>
          <p>Ainda não tem uma conta? <a class="ai" href="cadastro.php">Crie uma</a></p>
        </form>
      </div>

      <div class="logo3">
        <img src="./imagens/imagem3.jpg"></img>
      </div>

    </section>

  </main>
</body>

</html>
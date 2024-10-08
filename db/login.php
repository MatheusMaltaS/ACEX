<?php

session_start();

include 'config.php'; // incluindo o arquivo config.php  para conseguir inserir os dados no bd

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o usuário foi encontrado
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        $senha_hash = $usuario['senha'];

        if (password_verify($senha, $senha_hash)) {
            header("Location: ../index.php");
        } else {
            $_SESSION['aviso_senha'] = "Senha incorreta!";
            $_SESSION['email'] = $email;
            header("Location: ../login.php");
        }
    } else {
        $_SESSION['aviso_usuario'] = "Usuário não cadastrado!";
        header("Location: ../login.php");
    }
}

$stmt->close();
$conexao->close();
exit;

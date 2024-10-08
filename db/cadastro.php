<?php

session_start();

include 'config.php'; // incluindo o arquivo config.php  para conseguir inserir os dados no bd

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $senha_codificada = password_hash($senha, PASSWORD_DEFAULT);

    $query = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $senha_codificada);
        $stmt->execute();

        header("Location: ../index.php");
    } else {
        $_SESSION['aviso'] = "Email já cadastrado!";
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['confirm_senha'] = $_POST['confirm_senha'];
        header("Location: ../cadastro.php");
    }
}

$conexao->close();
exit;
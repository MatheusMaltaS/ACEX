<?php

session_start();

include 'config.php'; // incluindo o arquivo config.php  para conseguir inserir os dados no bd

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_palestrante = $_POST['nome_palestrante'];
    $descricao_palestrante = $_POST['descricao_palestrante'];
    $tema = $_POST['tema'];
    $file = $_POST['file'];

    header("Location: ../index.php");

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
        $result = $stmt->get_result();

        $_SESSION['login'] = true;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['id'] = $conexao->insert_id;

        if(isset($_SESSION['url_anterior'])) {
            header("Location: ../" . $_SESSION['url_anterior']);
        } else {
            header("Location: ../index.php");
        }
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
<?php

session_start();

include 'config.php'; // incluindo o arquivo config.php  para conseguir inserir os dados no bd

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $id = $_SESSION['id'];

    $senha_codificada = password_hash($senha, PASSWORD_DEFAULT);

    $query = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if (($email != $_SESSION['email'] && $result->num_rows == 0) || ($email == $_SESSION['email'])) {
        $sql = "UPDATE usuarios SET nome = ?, email = ?, senha = ? WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sssi", $nome, $email, $senha_codificada, $id);

        // Executa a consulta
        if ($stmt->execute()) {
            $_SESSION['aviso_sucess'] = "Dados atualizados com sucesso!";
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
        } else {
            $_SESSION['aviso_error'] = "Erro ao atualizar os dados!";
        }
    } else {
        $_SESSION['aviso_error'] = "Email já cadastrado!";
    }

    header("Location: ../perfil.php");
}   else {
    if (isset($_SESSION['url_anterior'])) {
        header("Location: ../" . $_SESSION['url_anterior']);
    } else {
        header("Location: ../index.php");
    }
}

$conexao->close();
exit;

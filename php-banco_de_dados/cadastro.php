<?php

include('config.php'); // incluindo o arquivo config.php  para conseguir inserir os dados no bd


if($_SERVER["METHOD_REQUEST"] == "POST"){ // verificando se o usuario enviou os dados do formulario

    
    if ($conn->connect_error) { // Verificando a conexão com o banco
        die("Conexão falhou: " . $conn->connect_error);
    }
    

    $nome = isset($_POST['nome']);
    $senha = isset($_POST['senha']);
    $email = isset($_POST['email']);

    $sql = "INSERT INTO usuarios (nome, senha, email) VALUES ('$nome', '$senha', '$email')";


    if($conexao->query($sql) == TRUE){
        echo 'Novo Registrado Criado';
    } else {
        echo 'Erro ao criar registro';
    }


}

?>
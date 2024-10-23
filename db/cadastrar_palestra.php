<?php

session_start();

include 'config.php'; // incluindo o arquivo config.php  para conseguir inserir os dados no bd

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_palestrante = $_POST['nome_palestrante'];
    $descricao_palestrante = $_POST['descricao_palestrante'];
    $tema = $_POST['tema'];
    
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $file = $_FILES['file'];
        $foto_palestrante = time().$_FILES['file']['name'];

        // Defina o diretório de destino
        $uploadDir = '../imgs_palestrantes/';

        // Crie o diretório se ele não existir
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Defina o caminho completo para o arquivo
        $filePath = $uploadDir . basename($foto_palestrante);

        // Mova o arquivo enviado para o diretório de destino
        move_uploaded_file($file['tmp_name'], $filePath);
    } else {
        $foto_palestrante = "foto_padrao.jpg";
    }

    $sql = "INSERT INTO palestras (nome_palestrante, descricao_palestrante, tema, foto_palestrante) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $nome_palestrante, $descricao_palestrante, $tema, $foto_palestrante);
    $stmt->execute();
    $result = $stmt->get_result();

    $id_palestra = $conexao->insert_id;

    header("Location: ../admin.php#palestra$id_palestra");
} else {
    if (isset($_SESSION['url_anterior'])) {
        header("Location: ../" . $_SESSION['url_anterior']);
    } else {
        header("Location: ../index.php");
    }
}

$conexao->close();
exit;

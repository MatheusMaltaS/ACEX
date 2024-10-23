<?php

session_start();

include 'config.php'; // incluindo o arquivo config.php  para conseguir inserir os dados no bd

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_SESSION['id_palestra'];
    $nome_palestrante = $_POST['nome_palestrante'];
    $descricao_palestrante = $_POST['descricao_palestrante'];
    $tema = $_POST['tema'];
    $foto_palestrante = $_SESSION['foto_palestrante'];
    $tem_imagem = $_POST['tem_imagem'];

    if ($tem_imagem == "Sim") {
        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
            $file = $_FILES['file'];
            if ($foto_palestrante != "foto_padrao.jpg") {
                $filePath = "../imgs_palestrantes/$foto_palestrante";
                unlink($filePath);
            }

            $foto_palestrante = time() . $_FILES['file']['name'];

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
        }
    } else {
        if ($foto_palestrante != "foto_padrao.jpg") {
            $filePath = "../imgs_palestrantes/$foto_palestrante";
            unlink($filePath);
        }

        $foto_palestrante = "foto_padrao.jpg";
    }


    $sql = "UPDATE palestras SET nome_palestrante = ?, descricao_palestrante = ?, tema = ?, foto_palestrante = ? WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssssi", $nome_palestrante, $descricao_palestrante, $tema, $foto_palestrante, $id);

    // Executa a consulta
    if ($stmt->execute()) {
        header("Location: ../admin.php#palestra$id");
    } else {
        $_SESSION['aviso_error'] = "Erro ao atualizar os dados!";
        header("Location: ../altera_palestra.php?id=$id");
    }
} else {
    if (isset($_SESSION['url_anterior'])) {
        header("Location: ../" . $_SESSION['url_anterior']);
    } else {
        header("Location: ../index.php");
    }
}

$conexao->close();
exit;

<?php

session_start();

include 'config.php';

if (isset($_GET['id']) && (isset($_SESSION['admin']) && $_SESSION['admin'] == 1)) {
    $id = $_GET['id'];

    $query = "SELECT * FROM palestras WHERE id = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $palestra = $result->fetch_assoc();

    $query = "DELETE FROM palestras WHERE id = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $foto_palestrante = $palestra['foto_palestrante'];
    if ($foto_palestrante != "foto_padrao.jpg") {
        $filePath = "../imgs_palestrantes/$foto_palestrante";
        unlink($filePath);
    }

    header("Location: ../admin.php");
} else {
    if (isset($_SESSION['url_anterior'])) {
        header("Location: ../" . $_SESSION['url_anterior']);
    } else {
        header("Location: ../index.php");
    }
}

$conexao->close();
exit;

<?php

session_start();

include 'config.php';

if (isset($_SESSION['id'])) {
    $id_palestra = $_GET['id'];
    $id_usuario = $_SESSION['id'];

    gerarCodigo($conexao, $id_palestra, $id_usuario);
} else {
    header("Location: ../login.php");
}

function gerarCodigo($conexao, $id_palestra, $id_usuario)
{
    $cod = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 5);

    $query = "SELECT * FROM ingressos WHERE cod = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $cod);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        $query = "SELECT * FROM ingressos WHERE id_usuario = ? AND id_palestra = ?";
        $stmt = $conexao->prepare($query);
        $stmt->bind_param("ii", $id_usuario, $id_palestra);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $sql = "INSERT INTO ingressos (cod, id_usuario, id_palestra) VALUES (?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("sii", $cod, $id_usuario, $id_palestra);
            $stmt->execute();

            $_SESSION["aviso_sucess$id_palestra"] = "Ingresso gerado com sucesso!";
        } else {
            $_SESSION["aviso$id_palestra"] = "Ingresso já foi gerado anteriormente!";
        }

        if (isset($_SESSION['url_anterior'])) {
            header("Location: " . $_SESSION['url_anterior']."#palestra$id_palestra");
        } else {
            header("Location: ../index.php");
        }
    } else {
        gerarCodigo($conexao, $id_palestra, $id_usuario);
    }
}

$conexao->close();
exit;

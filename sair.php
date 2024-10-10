<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['admin']);

// Verifica se a URL da página anterior está disponível
if (isset($_SERVER['HTTP_REFERER'])) {
    // Redireciona de volta para a página anterior
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    // Caso não exista um HTTP_REFERER, redireciona para uma página padrão
    header("Location: index.php");
    exit;
}
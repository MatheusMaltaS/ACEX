<?php
session_start();
unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['nome']);
unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['admin']);

if(isset($_SESSION['url_anterior'])) {
    if($_SESSION['url_anterior'] == "admin.php" || $_SESSION['url_anterior'] == "cadastro_palestra.php" || $_SESSION['url_anterior'] == "altera_palestra.php") {
        header("Location: ./index.php");
    } else {
        header("Location: ./" . $_SESSION['url_anterior']);
    }
} else {
    header("Location: ./index.php");
}
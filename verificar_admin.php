<?php
if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
    if (isset($_SESSION['url_anterior']) && 
        ($_SESSION['url_anterior'] == "admin.php" || 
         $_SESSION['url_anterior'] == "cadastro_palestra.php")) {
        header("Location: ./" . $_SESSION['url_anterior']);
    } else {
        header("Location: ./admin.php");
    }
}

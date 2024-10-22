<?php
$admin = $_SESSION['admin'] ?? 0;
?>
<header>
    <a href="./index.php"><img src="./imagens/logo-fsa-p.png" alt="logo FSA"></a>
    <nav>
        <?php
        if (isset($_SESSION['login'])) {
        ?>
            <ul>
                <li><a href="./sair.php">SAIR</a></li>
            </ul>
        <?php
        } else {
        ?>
            <ul>
                <li><a href="./login.php">ENTRAR</a></li>
            </ul>
        <?php
        }
        ?>
    </nav>
</header>
<section class="barralateral">
    <div class="area-icones">
        <?php
        if ($admin == 0) {
        ?>
            <div class="icone">
                <a href="perfil.php">
                    <img src="./imagens/pessoa.png" alt="Ícone 2">
                </a>
            </div>
            <div class="icone">
                <a href="mapa.php">
                    <img src="./imagens/mapa.png" alt="Ícone 4">
                </a>
            </div>
            <div class="icone">
                <a href="palestra.php">
                    <img src="./imagens/palestra.icon.svg" alt="Ícone 5">
                </a>
            </div>
            <div class="icone">
                <a href="chat.php">
                    <img src="./imagens/chat.png" alt="Ícone 3">

                </a>
            </div>
        <?php
        } else {
        ?>
            <div class="icone">
                <a href="admin.php">
                    ADMIN
            </div>
            </a>
        <?php
        } ?>
    </div>
</section>
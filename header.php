<?php
$admin = $_SESSION['admin'] ?? 0;
?>
<header>
    <img src="./imagens/tresbarras_icon.svg" alt="Menu lateral" class="tres-barras">
    <div class="div_header">
        <a href="./index.php"><img src="./imagens/logo-fsa-p.png" class="logo-fsa" alt="logo FSA"></a>
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
    </div>
</header>
<section class="barralateral">
    <div class="area-icones">
        <?php
        if ($admin == 0) {
        ?>
            <div class="icone">
                <a href="perfil.php">
                    <img src="./imagens/perfil_icon.svg" alt="Ícone 2"> Perfil
                </a>
            </div>
            <div class="icone">
                <a href="mapa.php">
                    <img src="./imagens/mapa_icon.svg" alt="Ícone 4"> Mapa
                </a>
            </div>
            <div class="icone">
                <a href="palestra.php">
                    <img src="./imagens/palestra_icon.svg" alt="Ícone 5"> Palestras
                </a>
            </div>
            <div class="icone">
                <a href="chat.php">
                    <img src="./imagens/suporte_icon.svg" alt="Ícone 3"> Suporte
                </a>
            </div>
        <?php
        } else {
        ?>
            <div class="icone">
                <a href="admin.php">
                    <img src="./imagens/adm_icon.svg" alt="Ícone 3"> ADMIN
            </div>
            </a>
        <?php
        } ?>
    </div>
</section>
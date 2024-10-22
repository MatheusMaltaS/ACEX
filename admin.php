<?php
session_start();
$admin = $_SESSION['admin'] ?? 0;

if ($admin == 0) {
    if (isset($_SESSION['url_anterior']) ? header("Location: " . $_SESSION['url_anterior']) : header("Location: ./index.php"));
}

$_SESSION['url_anterior'] = 'admin.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa Expo FSA</title>
    <?php
    include "links.php";
    ?>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main>
        <section class="palestras">
            <?php
            include "./db/config.php";

            $query = "SELECT * FROM palestras";
            $stmt = $conexao->prepare($query);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $nome = $row["nome_palestrante"];
                $descricao = $row["descricao_palestrante"];
                $tema = $row["tema"];
                $foto = $row["foto_palestrante"];

            ?>
                <div class="palestra" id="palestra<?php echo $id ?>">
                    <div class="palestra-texto">
                        <div id="nome-palestrante">
                            <?php echo $nome ?>
                        </div>
                        <div id="curriculo-palestrante">
                            <?php echo $descricao ?>
                        </div>
                        <div id="titulo-palestra">
                            <?php echo $tema ?>
                        </div>
                    </div>
                    <img src="./imagens/fundo.textopal.svg" style="pointer-events: none;" alt="Fundo de texto para palestrantes">
                    <div class="palestrante">
                        <div id="foto-palestrante">
                            <img src="./imagens/<?php echo $foto ?>" alt="Imagem do palestrante">
                        </div>
                        <img src="./imagens/fundo.palestrante.svg" id="moldura-palestrante" alt="Moldura para palestrante">
                        <img src="./imagens/bolhas.fundo.svg" id="bolhas" alt="Fundo de bolhas">
                        <div class="button-palestra-admin">
                            <a href="altera_palestra.php?<?php echo "id=$id" ?>"><button>Alterar Palestra</button></a>
                            <a href="./db/remover_palestra.php?<?php echo "id=$id" ?>"><button>Remover Palestra</button></a>
                        </div>
                        <a href="cadastro_palestra.php"><button style="margin-left: 2rem; width: 34rem;">Cadastrar Nova Palestra</button></a>
                    </div>
                </div>
            <?php
            }
            ?>
        </section>
    </main>

</body>

</html>
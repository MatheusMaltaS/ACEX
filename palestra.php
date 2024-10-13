<?php
session_start();
$_SESSION['url_anterior'] = '../palestra.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestras Expo FSA</title>
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
                <div class="palestra" id="palestra<?php echo $id?>">
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
                        <div class="button-palestra">
                            <a href="./db/ingressos.php?<?php echo "id=$id" ?>"><button>Gerar ingresso</button></a>
                            <?php
                            if (isset($_SESSION["aviso$id"])) {
                            ?>
                                <div class="aviso-txt">
                                    <?php
                                    echo $_SESSION["aviso$id"];
                                    unset($_SESSION["aviso$id"]);
                                    ?>
                                </div>
                            <?php
                            } else if (isset($_SESSION["aviso_sucess$id"])) {
                            ?>
                                <div class="sucess-txt">
                                    <?php
                                    echo $_SESSION["aviso_sucess$id"];
                                    unset($_SESSION["aviso_sucess$id"]);
                                    ?>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </section>
    </main>
</body>

</html>
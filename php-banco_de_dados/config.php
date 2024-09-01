<?php
$local = 'localhost';
$nome = 'root':
$senha= '';
$bd = 'meu_banco';

$conexao = new mysqli($local, $nome, $senha, $bd) or die ("Erro ao realizar Conexão")

mysqli_set_charset($conexao, "utf8")
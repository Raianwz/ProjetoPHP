<?php

session_start();
require "./repository/JogosRepositoryPDO.php";
require "./model/Jogo.php";

$jogosRepository = new JogosRepositoryPDO;
$jogo = new Jogo;

$jogo->titulo           =($_POST["titulo"]);
$jogo->capa             =($_POST["capa"]);
$jogo->lore             =($_POST["lore"]);
$jogo->nota             =($_POST["nota"]);

if($jogosRepository->salvar($jogo))
    $_SESSION["msg"] = "Jogos cadastrado com Sucesso";
else
    $_SESSION["msg"] = "Erro ao cadatrar Jogo";

header("Location: /");
?>
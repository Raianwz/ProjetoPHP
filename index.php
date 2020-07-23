<?php
$rota = $_SERVER["REQUEST_URI"];
$metodo = $_SERVER["REQUEST_METHOD"];

require "./controller/JogosController.php";

if($rota === "/"){
    require "view/galeria.php";
    exit();
};
if($rota === "/favoritos"){
    require "view/favoritos.php";
    exit();
};

if($rota === "/novo"){
    if($metodo == "GET") require "view/cadastrar.php";
    if($metodo == "POST"){
        $controller = new JogosController();
        $controller->save($_REQUEST);
    };
    exit();
};

if(substr($rota, 0, strlen("/favoritar")) === "/favoritar"){
    $controller = new JogosController();
    $controller->favorite(basename($rota));
    exit();
}
if(substr($rota, 0, strlen("/jogos")) === "/jogos"){
    if($metodo == "GET") require "view/galeria.php";
    if($metodo == "DELETE"){
        $controller = new JogosController();
        $controller->delete(basename($rota));
    }
    exit();
}
require "view/404.php";
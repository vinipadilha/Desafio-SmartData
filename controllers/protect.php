<?php

if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['id'])) {
    die("Você não está logado.<p><a href=\"/desafio-smartdata/public/index.php\">Entrar</a></p>");
}

?>
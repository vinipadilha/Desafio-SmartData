<?php
function connect_db()
{
    $db_name = "sistema_gerenciamento_clientes";
    $user = "root";
    $pass = "";
    $server = "localhost:3310";

    $conexao = new mysqli($server, $user, $pass, $db_name);

    if ($conexao->connect_error) {
        die("Falha na conexão com o banco de dados: " . $conexao->connect_error);
    }
    return $conexao;
}

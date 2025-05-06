<?php
session_start();
include('../config/db.php');
include('protect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $nome = trim($_POST['nome']);
    $documento = trim($_POST['documento']);
    $telefone = trim($_POST['telefone']);
    $email = trim($_POST['email']);
    $endereco = trim($_POST['endereco']);
    $usuario_id = $_SESSION['id'];

    $conexao = connect_db();

    $stmt = $conexao->prepare("UPDATE clientes SET nome = ?, documento = ?, telefone = ?, email = ?, endereco = ? WHERE id = ? AND id_usuario = ?");
    $stmt->bind_param("ssssssi", $nome, $documento, $telefone, $email, $endereco, $id, $usuario_id);

    if ($stmt->execute()) {
        header("Location: ../public/list.php?msg=cliente_editado");
        exit;
    } else {
        echo "Erro ao atualizar cliente.";
    }
} else {
    echo "Requisição inválida.";
}

<?php
session_start();
include('../config/db.php');
include('protect.php'); 

$conexao = connect_db();

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $usuario_id = $_SESSION['id'];

    // Excluir apenas se o cliente pertence ao usuário logado
    $stmt = $conexao->prepare("DELETE FROM clientes WHERE id = ? AND id_usuario = ?");
    $stmt->bind_param("ii", $id, $usuario_id);

    if ($stmt->execute()) {
        header("Location: ../public/list.php?msg=cliente_excluido");
        exit;
    } else {
        echo "Erro ao excluir cliente.";
    }
} else {
    echo "ID inválido.";
}

<?php
session_start();
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nome'], $_POST['documento'], $_POST['telefone'], $_POST['email'], $_POST['endereco'])) {

        $nome = $mysqli->real_escape_string($_POST['nome']);
        $documento = $mysqli->real_escape_string($_POST['documento']);
        $telefone = $mysqli->real_escape_string($_POST['telefone']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $endereco = $mysqli->real_escape_string($_POST['endereco']);

        if (!empty($nome) && !empty($documento) && !empty($telefone) && !empty($email) && !empty($endereco)) {

            
            $id_usuario = $_SESSION['id']; 

            $sql = "INSERT INTO clientes (nome, documento, telefone, email, endereco, id_usuario) 
                    VALUES ('$nome', '$documento', '$telefone', '$email', '$endereco', '$id_usuario')";

            if ($mysqli->query($sql)) {
                $_SESSION['success_message'] = 'Cliente adicionado com sucesso!';
                header('Location: /desafio-smartdata/public/list.php'); 
                exit();

            } else {
                $_SESSION['error_message'] = 'Erro ao adicionar cliente.';
                header('Location: /desafio-smartdata/public/add-people.php'); 
                exit();
            }
        } else {
            $_SESSION['error_message'] = 'Por favor, preencha todos os campos.';
            header('Location: /desafio-smartdata/public/add-people.php');
            exit();
        }
    }
}
?>

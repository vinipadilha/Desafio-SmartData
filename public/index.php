<?php

session_start();
include('../config/db.php');

if (isset($_POST['nome_usuario']) && isset($_POST['senha'])) {
    if (strlen($_POST['nome_usuario']) == 0) {
        echo "<script>alert('Preencha seu nome de usuário');</script>";
    } else if (strlen($_POST['senha']) == 0) {
        echo "<script>alert('Preencha sua senha');</script>";
    } else {
        $nome_usuario = $mysqli->real_escape_string($_POST['nome_usuario']);
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$nome_usuario'";
        $sql_query = $mysqli->query($sql) or die($mysqli->error);

        if ($sql_query->num_rows === 1) {
            $usuario = $sql_query->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['usuario'] = $usuario['usuario'];
                header("Location: /desafio-smartdata/public/dashboard.php");
                exit;
            } else {
                echo "<script>alert('Senha incorreta');</script>";
            }
        } else {
            echo "<script>alert('Usuário não encontrado');</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio - Smart Data</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="bg-gray-100">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Faça Login na sua conta!
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="" method="POST">
                        <div>
                            <label for="nome_usuario" class="block mb-2 text-sm font-medium text-gray-900">Nome de usuário</label>
                            <input type="text" name="nome_usuario" id="nome_usuario" class="bg-gray-50 border-2 border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 outline-none" placeholder="pedro_silva" required>
                        </div>
                        <div>
                            <label for="senha" class="block mb-2 text-sm font-medium text-gray-900">Senha</label>
                            <input type="password" name="senha" id="senha" placeholder="••••••••" class="bg-gray-50 border-2 border-gray-300 text-gray-900 rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 outline-none" required>
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

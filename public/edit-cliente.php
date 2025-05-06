<?php
session_start();
include('../config/db.php');
include('../controllers/protect.php');

$conexao = connect_db();

if (!isset($_GET['id'])) {
    echo "ID do cliente não especificado.";
    exit;
}

$id = intval($_GET['id']);
$usuario_id = $_SESSION['id'];

$stmt = $conexao->prepare("SELECT * FROM clientes WHERE id = ? AND id_usuario = ?");
$stmt->bind_param("ii", $id, $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Cliente não encontrado ou acesso negado.";
    exit;
}

$cliente = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Cliente</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="p-10">
    <div class="mx-20 border-2 border-gray-200">
        <div class="h-10 border-gray-200 border-b-2 flex items-center justify-center">
                <p class="text-md">Editar Cliente</p>
        </div>

        <div>
            <form action="../controllers/update.php" method="POST" class="gap-4 p-4 grid grid-cols-6">
                <input type="hidden" name="id" value="<?= $cliente['id'] ?>">
                <div class="col-span-2">
                    <label class="block font-medium">Nome:</label>
                    <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" class="w-full border-2 p-2 rounded border-gray-200 focus:border-blue-600 outline-none">
                </div>

                <div class="col-span-2">
                    <label class="block font-medium">Documento:</label>
                    <input type="text" name="documento" value="<?= htmlspecialchars($cliente['documento']) ?>" class="w-full border-2 p-2 rounded border-gray-200 focus:border-blue-600 outline-none">
                </div>

                <div class="col-span-2">
                    <label class="block font-medium">Telefone:</label>
                    <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" class="w-full border-2 p-2 rounded border-gray-200 focus:border-blue-600 outline-none">
                </div>

                <div class="col-span-2">
                    <label class="block font-medium">Email:</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" class="w-full border-2 p-2 rounded border-gray-200 focus:border-blue-600 outline-none">
                </div>

                <div class="col-span-2">
                    <label class="block font-medium">Endereço:</label>
                    <input type="text" name="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>" class="w-full border-2 p-2 rounded border-gray-200 focus:border-blue-600 outline-none">
                </div>

                <div class="col-span-2">
                    <button type="submit" class="cursor-pointer bg-blue-600 w-full h-full text-white border rounded hover:bg-blue-700">Salvar</button>
                </div>
            </form>

        </div>

</body>
</html>

<?php

include('../controllers/protect.php');

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

    <div id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0">
        <div class="h-full px-3 py-4 bg-gray-100 flex flex-col justify-between">

            <div>
                

                <ul class="space-y-2 font-medium">

                    <li>
                        <p href="" class="flex items-center p-2 text-gray-900 rounded-lg cursor-default">
                        <svg class="shrink-0 w-6 h-6 text-gray-500 transition duration-75" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                        </svg>


                            <span class="flex-1 ms-3 whitespace-nowrap"><?php echo htmlspecialchars($_SESSION['usuario']); ?></span>
                        </p>
                    </li>

                    

                    <li>
                        <a href="../public/list.php" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-200  group">
                        <svg  class="shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M12 6a3.5 3.5 0 1 0 0 7 3.5 3.5 0 0 0 0-7Zm-1.5 8a4 4 0 0 0-4 4 2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-3Zm6.82-3.096a5.51 5.51 0 0 0-2.797-6.293 3.5 3.5 0 1 1 2.796 6.292ZM19.5 18h.5a2 2 0 0 0 2-2 4 4 0 0 0-4-4h-1.1a5.503 5.503 0 0 1-.471.762A5.998 5.998 0 0 1 19.5 18ZM4 7.5a3.5 3.5 0 0 1 5.477-2.889 5.5 5.5 0 0 0-2.796 6.293A3.501 3.501 0 0 1 4 7.5ZM7.1 12H6a4 4 0 0 0-4 4 2 2 0 0 0 2 2h.5a5.998 5.998 0 0 1 3.071-5.238A5.505 5.505 0 0 1 7.1 12Z" clip-rule="evenodd"/>
                        </svg>


                            <span class="flex-1 ms-3 whitespace-nowrap">Lista de Clientes</span>
                        </a>
                    </li>

                    

                    <li>
                        <a href="../public/add-cliente.php" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-200  group">
                        <svg class="shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd" d="M9 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H7Zm8-1a1 1 0 0 1 1-1h1v-1a1 1 0 1 1 2 0v1h1a1 1 0 1 1 0 2h-1v1a1 1 0 1 1-2 0v-1h-1a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                        </svg>

                            <span class="flex-1 ms-3 whitespace-nowrap">Adicionar Cliente</span>
                        </a>
                    </li>

                </ul>
            </div>

            <a href="/desafio-smartdata/public/logout.php" class="flex items-center p-2 text-gray-900 rounded-lg  hover:bg-gray-200 group">
             <svg class="shrink-0 w-6 h-6 text-gray-500 transition duration-75 group-hover:text-gray-900" data-slot="icon" fill="none" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/>
            </svg>

                <span class="flex-1 ms-3 whitespace-nowrap font-medium">Logout</span>
            </a>
        </div>

    </div>

    <div class=" lg:ml-64 p-10 ">
        <div class="p-8 bg-white border border-gray-200 rounded-lg shadow-sm mx-20">
            <form id="formCliente" method="POST" action="../controllers/create.php">

                <div class="space-y-7">
                    <div class="">
                        <label for="nome-cliente" class="block mb-1 text-sm font-medium text-gray-900 ">Nome</label>
                        <input type="text" id="nome-cliente" name="nome" value="" class=" bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 outline-none"  />
                    </div>

                    <div class="">
                        <label for="documento-cliente" class="block mb-1 text-sm font-medium text-gray-900 ">Documento</label>
                        <input type="text" id="documento-cliente" name="documento" value="" class=" bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 outline-none"  />
                    </div>

                    <div class="">
                        <label for="telefone-cliente" class="block mb-1 text-sm font-medium text-gray-900 ">Número de telefone</label>
                        <input type="text" id="telefone-cliente" name="telefone" value="" class=" bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 outline-none"  />
                    </div>

                    <div class="">
                        <label for="email-cliente" class="block mb-1 text-sm font-medium text-gray-900 ">Email</label>
                        <input type="email" id="email-cliente" name="email" value="" class=" bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 outline-none"  />
                    </div>

                    <div class="">
                        <label for="endereco-" class="block mb-1 text-sm font-medium text-gray-900 ">Endereço</label>
                        <input type="text" id="email-cliente" name="endereco" value="" class=" bg-gray-50 border-2 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 outline-none"  />
                    </div>

                </div>


                <div class=" items-center grid  mt-6">
                    <button id="BtnAdicionarCliente" type="submit" name="salvar_perfil" value="1" class="text-white inline-flex items-center justify-center gap-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center cursor-pointer">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path>
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path>
                        </svg>
                        Adicionar
                    </button>
                </div>
            </form>

        </div>
        
    </div>
</body>
</html>
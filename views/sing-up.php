<?php
  session_start();
  if($_SESSION && $_SESSION['email']){
    header("Location: ./home.php");
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Sign-up</title>
  </head>
  <body>
    <div class="pt-10" >
        <h1 class="text-3xl font-bold text-center uppercase py-5">Registro</h1>
        <form class="bg-blue-950 rounded-lg max-w-sm mx-auto flex flex-col justify-center p-5" method='post'>
        <div class="mb-5">
          <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
          <input type="text" id="nombre" name="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nombre" required />
        </div>
        <div class="mb-5">
          <label for="apellido" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellido</label>
          <input type="text" id="apellido" name="apellido" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
          placeholder="Apellido" required />
        </div>
        <div class="mb-5">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
          <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Email" required />
        </div>
        <div class="mb-5">
          <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña </label>
          <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contraseña" required />
        </div>
        <div class="flex items-start mb-5">
          <div class="flex items-center h-5">
            <input id="admin" type="checkbox" name="admin" value="admin" class="w-4 h-4 border border-gray-300 rounded-sm bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
          </div>
          <label for="admin" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Eres un Admin?</label>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Registrarse</button>
        <p class="py-4 text-md font-norml text-center text-white">Estas registrado? <span><a href="./sing-in.php" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Inicia sesion</a></span></p>
      </form>
    </div>
   
    <?php
      require_once './../controllers/sing-up.controller.php';
    ?>
  </body>
</html>

<?php
  session_start();
  if($_SESSION && $_SESSION['email']){
    header("Location: ./home.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>Sing-in</title>
  </head>
  <body>
    <div class="pt-10" >
          <h1 class="text-3xl font-bold text-center uppercase py-5">Inicio de sesion</h1>
          <form class="bg-blue-950 rounded-lg max-w-sm mx-auto flex flex-col justify-center p-5 " method='post'>
          <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
          </div>
          <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña </label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
          </div>
          <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Ingresar</button>
          <a class="py-4 text-md font-norml text-center text-white hover:underline hover:text-blue-700" href="./forget-password.php" ">Olvidaste tu contraseña?</a>
        </form>
      </div>
    <?php
      require_once './../controllers/sing-in.controller.php';
    ?>
  </body>

</html>
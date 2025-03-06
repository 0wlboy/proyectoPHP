<?php

  session_start();
  if(!$_SESSION && !$_SESSION['email']){
    header("Location: ./sing-in.php");
  }

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
  <title>Profile</title>
</head>
<body>
  <div class="pt-10" >
    <h1 class="text-3xl font-bold text-center uppercase py-5">Perfil</h1>
    <div class="bg-blue-950 rounded-lg max-w-sm mx-auto flex flex-col justify-center p-5">
      <p class="text-center text-red-500 text-2xl">Bienvenido</p>
      <p class="text-center text-red-500 text-2xl"><?php echo $_SESSION['nombre'] ?></p>
      <p class="text-center text-red-500 text-2xl"><?php echo $_SESSION['apellido'] ?></p>
      <p class="text-center text-red-500 text-2xl"><?php echo $_SESSION['email'] ?></p>

      <a class="py-4 text-md font-norml text-center text-white hover:underline hover:text-blue-700" href="edit-profile.php">Editar Perfil</a>
      <a class="py-4 text-md font-norml text-center text-white hover:underline hover:text-blue-700" href="edit-password.php">Editar contraseña</a>
      <a class="py-4 text-md font-norml text-center text-white hover:underline hover:text-blue-700" href="sing-out.php">Cerrar sesion</a>
    </div>
  </div>
</body>
</html>
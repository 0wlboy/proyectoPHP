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
    <title>Sign-up</title>
  </head>
  <body>
    <form action="" method="post">
      <label for='nombre'>Nombre</label>
      <input type="text" name='nombre' placeholder="Nombre">
      <label for='apellido'>Apellido</label>
      <input type="text" name='apellido' placeholder="Apellido">
      <label for='email'>Email</label>
      <input type="text" name='email' placeholder="Email">
      <label for='password'>Contraseña</label>
      <input type="text" name='password' placeholder="Contraseña">
      <button type='submit'>Enviar</button>
    </form>
    <?php
      require_once './../controllers/sing-up.controller.php';
    ?>
  </body>
</html>

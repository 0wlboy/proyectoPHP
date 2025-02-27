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
    <title>Sing-in</title>
  </head>
  <body>
    <form action="" method='post'>
      <label for="email">Email</label>
      <input type="email" name='email' id='email' required>
      <label for="password">Password</label>
      <input type="password" name='password' id='password' required>
      <button type='submit'>Sing-in</button>
    </form>
    <a href="./forget-password.php">Olvidaste tu contraseña?</a>
    <?php
      require_once './../controllers/sing-in.controller.php';
    ?>
  </body>

</html>
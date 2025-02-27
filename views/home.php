<?php
  session_start();
  if(!$_SESSION || !$_SESSION['email']){
    header("Location: ./sing-in.php");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
  </head>
  <body>
    <h1>Welcome Home</h1>
    <a href="./sing-out.php">Sing-out</a>
  </body>
</html>
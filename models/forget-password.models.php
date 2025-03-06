<?php

  require_once "./../connections/database.connections.php";

  $password = $_POST['password'];
  $password = password_hash($password,PASSWORD_DEFAULT);
  $email = $_POST['email'];

  $sql = "UPDATE usuarios SET password = '$password' WHERE email = '$email'";
  $result = $conn->query($sql);

  echo "<p class='text-center text-red-500 text-2xl'>Bienvendio</p>";
  header("Location: ./home.php");
  $conn->close();
?>
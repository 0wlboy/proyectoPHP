<?php

  require_once "./../connections/database.connections.php";
  $sql = "SELECT * FROM usuarios WHERE email = '$email'";
  $result = $conn->query($sql);
  if($result -> num_rows === 0){
    echo "Usuario o contraseña incorrectos";
    return;
  }
  $fila = $result->fetch_assoc();

  $password_hash = $fila['password'];
  $password = $_POST['password'];
  $hash = password_verify($password, $password_hash);
  
 
  
  if(!$hash){
    echo "Usuario o contraseña incorrectos";
    return;
  }
  $_SESSION['email'] = $email;
  $_SESSION['nombre'] = $fila['nombre'];
  $_SESSION['apellido'] = $fila['apellido'];

  echo "<p class='text-center text-red-500 text-2xl'>Bienvendio</p>";
  header("Location: ./home.php");
  $conn->close();
?>
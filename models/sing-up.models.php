<?php
  require_once "./../connections/database.connections.php";

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = password_hash($password,PASSWORD_DEFAULT);
  
  $query = "INSERT INTO usuarios (nombre, apellido, email, password) VALUES ('$nombre', '$apellido', '$email', '$password')";
  if($conn->query($query)){
    echo "<p>Usuario registrado con exito</p>";
  }else{
    echo "<p>Error al registrar el usuario:". $conn->error ."</p>";
  }
  $conn->close();
?>
<?php
  require_once "./../connections/database.connections.php";

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = password_hash($password,PASSWORD_DEFAULT);

  if(isset($_POST['admin'])){
    $rol = $_POST['admin'];
    $query = "INSERT INTO usuarios (nombre, apellido, email, password, rol) VALUES ('$nombre', '$apellido', '$email', '$password','$rol')";
  }else{
    $rol = 'user';
    $query = "INSERT INTO usuarios (nombre, apellido, email, password) VALUES ('$nombre', '$apellido', '$email', '$password')";
  }
  
  
  if($conn->query($query)){
    echo "<p class='text-red-500 font-bold text-xl my-5'>Usuario registrado con exito</p>";

    $_SESSION['email'] = $email;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['apellido'] = $apellido;
    $_SESSION['rol'] = $rol;

    header("Location: ./home.php");
    exit;
  }else{
    echo "<p class='text-red-500 font-bold text-xl my-5'>Error al registrar el usuario:". $conn->error ."</p>";
  }
  $conn->close();
?>
<?php

function validate_regex( $inputs, $regex){
  $errores = [];
  if(count($inputs) !== count($regex)){
    $errores[] = "El numero de campos no coincide con el numero de validaciones";
    return $errores;
  }
  foreach ($inputs as $key => $input){
    if(!isset($regex[$key])){
      $errores[] = "No hay una validacion definada para el campo $key";
    }elseif(!preg_match($regex[$key], $input)){
      $errores[] = "El campo $key no cumple con el formato requerido";
    }
  }
  return $errores;    
}

function validate_email($email){
  require "./../connections/database.connections.php";
  $sql = "SELECT * FROM usuarios WHERE email = ?";
  $stmt = $conn -> prepare($sql);
  $stmt ->bind_param("s",$email);
  $stmt ->execute();
  $result = $stmt -> get_result();
  if($result -> num_rows === 0){
    return true;
  }else{
    return false;
  }
}

$lista_validaciones =[
  'nombre' => '/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/u',
  'apellido' => '/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/u',
  'email' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
  'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/'
];

$lista_valores = [
  'nombre' => '',
  'apellido' => '',
  'email' => '',
  'password' => ''
];

$lista_input = ['nombre','apellido','email','password'];
$errores_generales = [];

foreach($lista_input as $input){
  if($input == 'password' && !isset($_POST[$input])){
    $errores_generales[] = 'El campo contraseña es obligatorio';
  }else{
    $lista_valores[$input] = isset($_POST[$input]) ? $_POST[$input] : $row[$input];
  }
}

if(!validate_email($lista_valores['email'])){
  $errores_generales[] = "El email ya esta en uso";
}

  $errores_regex = validate_regex($lista_valores,$lista_validaciones);
  $errores_generales = array_merge($errores_generales,$errores_regex);

  if(!empty($errores_generales)){
    foreach($errores_generales as $error){
      echo "<p>$error</p>";
    }

  }else{
    
    require "./../connections/database.connections.php";

    $nombre = $lista_valores['nombre'];
    $apellido = $lista_valores['apellido'];
    $email = $lista_valores['email'];
    $password = $lista_valores['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE usuarios SET nombre = ?, apellido = ?, email = ?, password = ? WHERE ID = ?";
    $stmt = $conn->prepare($query);
    $stmt -> bind_param("sssss",$nombre,$apellido,$email,$password,$row['ID']);

    if($stmt->execute()){
      header(header: "Location: ./admin-user.php");
      $_SESSION['id_element'] = null;
      exit;
      
    }else{
      echo "No se pudo dar la conexion";
    }
    $stmt->close();
    $conn->close();


  }
  
?>
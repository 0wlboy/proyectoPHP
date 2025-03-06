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
  'email' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
];

$lista_valores = [
  'nombre' => '',
  'apellido' => '',
  'email' => ''
];

$lista_input = ['nombre','apellido','email'];
$errores_generales = [];

foreach($lista_input as $input){
  $lista_valores[$input] = isset($_POST[$input]) ? $_POST[$input] : (isset($_SESSION[$input]) ? $_SESSION[$input] : '');
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
    $old_email = $_SESSION['email'];

    $nombre = $lista_valores['nombre'];
    $apellido = $lista_valores['apellido'];
    $email = $lista_valores['email'];

    $query = "UPDATE usuarios SET nombre = ?, apellido = ?, email = ? WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt -> bind_param("ssss",$nombre,$apellido,$email,$old_email);

    if($stmt->execute()){
      $_SESSION['email'] = $email;
      $_SESSION['nombre'] = $nombre;
      $_SESSION['apellido'] = $apellido;
      header("Location: ./profile.php");
      exit;
      
    }else{
      echo "No se pudo dar la conexion";
    }
    $stmt->close();
    $conn->close();


  }
  
?>
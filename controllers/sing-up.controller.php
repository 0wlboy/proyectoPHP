<?php
  function validate_empty($input){
    if(!isset($_POST[$input])){
      echo "<p>El campo $input es requerido</p>";
      return false;
    }
    return true;
  }

  function validate_regex( $inputs, $regex){
    $error_count = 0;
    foreach ($inputs as $key => $input){
      if(!isset($regex[$key])){
        echo "<p>No hay una validacion definada para el campo $key</p>";
        $error_count++;
      }
      if(!preg_match($regex[$key],$input)){
        echo "<p>El campo $key no cumple con el formato requerido</p>";
        $error_count++;
      }
    }
    if($error_count > 0){
      return false;
    }
    return true;    
  }
  
  if($_POST){
    $lista_input = ['nombre','apellido','email','password'];
    if($_POST['nombre'] == '' || $_POST['apellido'] == '' || $_POST['email'] == '' || $_POST['password'] == ''  ){
      foreach ($lista_input as $input){
        if (!isset($_POST[$input])){
          if(!validate_empty(($input))){
            break;
          }
        }
      }
    }else{
      $lista_validaciones =[
        'nombre' => '/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/u',
        'apellido' => '/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/u',
        'email' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/'
      ];

      $lista_valores =[
        "nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "email" => $_POST['email'],
        "password" => $_POST['password']
      ];

      if(validate_regex($lista_valores, $lista_validaciones)){
        require_once "./../models/sing-up.models.php";
      }
    }
  }


?>
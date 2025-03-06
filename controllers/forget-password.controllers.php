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
  $lista_input = ['email','password','confirmPassword'];
  var_dump($_POST);
  if($_POST['email'] == '' || $_POST['password'] == '' || $_POST['confirmPassword'] == '' ){
    foreach ($lista_input as $input){
      if (!isset($_POST[$input])){
        if(!validate_empty(($input))){
          break;
        }
      }
    }
  }else{
    $lista_validaciones =[
      'email' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
      'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/',
      'confirmPassword' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-_=+{};:,<.>]).{8,}$/'
    ];

    $lista_valores =[
      "email" => $_POST['email'],
      "password" => $_POST['password'],
      "confirmPassword" => $_POST['confirmPassword']
    ];

    if(validate_regex($lista_valores, $lista_validaciones) && $_POST['password'] == $_POST['confirmPassword']){
      require_once "./../models/forget-password.models.php";
    }
  }
}

?>
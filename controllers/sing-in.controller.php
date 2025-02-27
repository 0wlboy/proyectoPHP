<?php

if($_POST){

  $regexEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
  
  $email = $_POST['email'];
  $password = $_POST['password'];
  if(!preg_match($regexEmail, $email)){
    echo "<p>El email no cumple con el formato requerido</p>";
    return;
  }else{
    
    
    require_once "./../models/sing-in.models.php";
  }


  
}

?>
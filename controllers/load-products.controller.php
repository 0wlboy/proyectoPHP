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

  function validate_img(){
    $uploadOK = 1;
      if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK){
        $check = getimagesize($_FILES['imagen']["tmp_name"]);
        if( $check !== false ){
          $mime = $check['mime'];
          echo "<p>File is an image - $mime.</p>";
        }else{
          echo "<p>File is no a image</p>";
          $uploadOK = 0;
        }
      }else{
        echo "<p>La imagen es requerida</p>";
        $uploadOK = 0;
      }
  
      if($_FILES['imagen']['size'] > 500000){
        echo "<p>Sorry, your file is too large</p>";
        $uploadOK = 0;
      }
      $tipo = $_FILES['imagen']['type'];
      if($tipo != "image/jpg" && $tipo != "image/png" && $tipo != "image/jpeg"){
        echo "<p>Sorry, only JPG, JPEG & PNG files are allowed.</p>";
        $uploadOK = 0;
      }
    

    if($uploadOK == 0){
      echo "<p>Sorry, your file was not uploaded.</p>";
      return false;
    }else{
      echo "<p>File uploaded</p>";
      return true;
    }
  }

  if($_POST){
    $lista_input = ['nombre','precio','stock','descripcion'];
    if($_POST['nombre'] == '' || $_POST['precio'] == '' || $_POST['stock'] == '' || $_POST['descripcion'] == ''  ){
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
        'precio' => '/^[0-9]+$/',
        'stock' => '/^[0-9]+$/',
        'descripcion' => '/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/u',
      ];

      $lista_valores =[
        "nombre" => $_POST['nombre'],
        "precio" => $_POST['precio'],
        "stock" => $_POST['stock'],
        "descripcion" => $_POST['descripcion']
      ];

      if(validate_regex($lista_valores, $lista_validaciones) && validate_img()){
        require_once "./../models/load-producto.models.php";
      }
    }
  }
?>
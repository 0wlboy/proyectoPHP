<?php




function validate_img(){
  $uploadOK = 1;
    if(isset($_FILES['imagen_producto']) && $_FILES['imagen_producto']['error'] === UPLOAD_ERR_OK){
      $check = getimagesize($_FILES['imagen_producto']["tmp_name"]);
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

    if($_FILES['imagen_producto']['size'] > 500000){
      echo "<p>Sorry, your file is too large</p>";
      $uploadOK = 0;
    }
    $tipo = $_FILES['imagen_producto']['type'];
    if($tipo != "imagen_producto/jpg" && $tipo != "imagen_producto/png" && $tipo != "imagen_producto/jpeg"){
      echo "<p>Sorry, only JPG, JPEG & PNG files are allowed.</p>";
      $uploadOK = 0;
    }

    function validate_regex( $inputs, $regex){
      $error_count = 0;
      foreach ($inputs as $key => $input){
        if(!isset($regex[$key])){
          echo "<p>No hay una validacion definada para el campo $key</p>";
          $error_count++;
        }
        if(!$_POST[$key] == ''){
          if(!preg_match($regex[$key],$input)){
            echo "<p>El campo $key no cumple con el formato requerido</p>";
            $error_count++;
          }
        }
        
      }
      if($error_count > 0){
        return false;
      }
      return true;    
    }
  

  if($uploadOK == 0){
    echo "<p>Sorry, your file was not uploaded.</p>";
    return false;
  }else{
    echo "<p>File uploaded</p>";
    return true;
  }
}

$lista_datos = [
  'nombre' => '',
  'imagen_producto' => '',
  'precio' => '',
  'cantidad_stock' => '',
  'descripcion' => ''
];

if($_POST){
  foreach($lista_datos as $key => $value){
    if(!isset($_POST[$key])){
      $lista_datos[$key] = $_POST[$key];
    }
  }
}

$lista_validaciones =[
  'nombre' => '/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/u',
  'precio' => '/^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]+$/u',
  'cantidad_stock' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
];

if(validate_regex($lista_datos,$lista_validaciones) && validate_img()){
  require_once './../models/edit-producto.models.php';

};


?>
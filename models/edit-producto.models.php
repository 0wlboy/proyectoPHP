<?php

require_once './../connections/database.connections.php';

function reemplazarImgane($id_element){
  require_once 'show.models.php';

  $result = viewSingleElement('productos',$id_element);
  $row = mysqli_fetch_assoc($result);


  if(file_exists('./../'.$row['imagen_producto'].'')){
    if(unlink('./../'.$row['imagen_producto'].'')){
      echo 'Archivo eliminado';
    }else{
      echo 'Error al eliminar el archivo';
    }
  }else{
    echo 'El archivo no existe';
  }
  //datos de imagen
    $image_name = $_FILES['imagen_producto']['name'];
    $img_temp_name = $_FILES['imagen_producto']['tmp_name'];
    $target_dir = './../images/';

    // Generar nombre unico 
    $img_extension = pathinfo($image_name, PATHINFO_EXTENSION);
    $img_id = uniqid(). '.' . $img_extension;

    $target_file = $target_dir . $img_id;
    return $target_file;

}

$columnas = '';
$id_element = $_SESSION['id_element'];

//mover imagen a la carpeta images
if(move_uploaded_file($img_temp_name, $target_file)){
  echo "<p class='text-red-500 font-bold text-xl my-5'>The file ". htmlspecialchars( $img_id). " has been uploaded.</p>";
}else{
  echo "<p>Error al subir la imagen ". htmlspecialchars( $image_name). ".</p>";
}

foreach ($lista_datos as $key => $value) {
  if(!$lista_datos[$key] == ''){
    $columnas .= ", $key = '$value'";
  }
}

$query = "UPDATE productos SET $columnas WHERE ID = $id_element";

?>
<?php

require_once "./../connections/database.connections.php";

//datos de imagen
$image_name = $_FILES['imagen']['name'];
$img_temp_name = $_FILES['imagen']['tmp_name'];
$target_dir = './../images/';

// Generar nombre unico 
$img_extension = pathinfo($image_name, PATHINFO_EXTENSION);
$img_id = uniqid(). '.' . $img_extension;

$target_file = $target_dir . $img_id;

//mover imagen a la carpeta images
if(move_uploaded_file($img_temp_name, $target_file)){
  echo "<p class='text-red-500 font-bold text-xl my-5'>The file ". htmlspecialchars( $img_id). " has been uploaded.</p>";
}else{
  echo "<p>Error al subir la imagen ". htmlspecialchars( $image_name). ".</p>";
}

//datos del producto
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$descripcion = $_POST['descripcion'];
$imagedir = 'images/'. $img_id;

//insertar datos en la base de datos
$query = "INSERT INTO productos (nombre, imagen_producto , precio, cantidad_stock, descripcion) VALUES ('$nombre',  '$imagedir', '$precio', '$stock', '$descripcion')";

//verificar si se insertaron los datos
if($conn->query($query)){
  echo "<p class='text-red-500 font-bold text-xl my-5'>Producto registrado registrado con exito</p>";
}else{
  echo "<p class='text-red-500 font-bold text-xl my-5'>Error al registrar el producto:". $conn->error ."</p>";
}
$conn->close();
?>
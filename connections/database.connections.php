<?php
  $host = "localhost";
  $database = "proyecto";
  $user = "root";
  $password = "";

  $conn = new mysqli($host,$user,$password,$database);

  if($conn->connect_error){
    die("Connection faild: ". $conn->connect_error);
  }
  echo "Connect successfully";

?>
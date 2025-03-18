<?php
  $host = "localhost";
  $database = "phpdatabase";
  $user = "root";
  $password = "";

  $conn = new mysqli($host,$user,$password,$database);

  if($conn->connect_error){
    die("Connection faild: ". $conn->connect_error);
  }

?>
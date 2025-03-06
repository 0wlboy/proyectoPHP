<?php
  require_once "./../connections/database.connections.php";
  
  function viewProducts($tabla) {
    global $conn;
    $sql = "SELECT * FROM $tabla";
    $result = $conn->query($sql);
    return $result;
  };
  
  function  deleteElement($tabla, $id){
    global $conn;
    $sql = "DELETE FROM $tabla WHERE ID = $id";
    $result = $conn->query($sql);
    return $result;
  }

  function viewSingleElement ($tabla, $id){
    global $conn;
    $sql = "SELECT * FROM $tabla WHERE ID = $id";
    $result = $conn->query($sql);
    return $result;
  }

?>
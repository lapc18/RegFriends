<?php

require 'Friends.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
  if(isset($_GET['Id'])){
    $id = $_GET['Id'];
    $friend = Friends::getById($id);
    if($friend){
      print json_encode(array("status" => 1, "response" => $friend));
    } else{
      print json_encode(array("status" => 0, "response" => "Ha ocurrido un error en la respuesta getById..."));
    }
  } else{
    print json_encode(array("status" => 0, "response" => "Ha ocurrido un error de peticion en el getById..."));
  }
}

?>

<?php

require 'Friends.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
  $friends = Friends::getAll();
  if($friends){
    print json_encode(array("status" => 1, "response" => $friends));
  } else{
    print json_encode(array("status" => 0, "response" => "No hay datos en getAll..."));
  }
} else{
  print json_encode(array("status" => 0, "response" => "Ha ocurrido un error de peticion en getAll..."));
}

?>

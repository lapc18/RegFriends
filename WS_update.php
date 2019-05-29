<?php

require 'Friends.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

  $friend = json_decode(file_get_contents("php://input", true));

  $data = Friends::update(
    $friend["Id"],
    $friend["Nombre"],
    $friend["SocialNet"],
    $friend["Telefono"],
    $friend["Actividad"],
    $friend["Direccion"],
    $friend["Fecha"],
    $friend["Prioridad"],
    $friend["Comentario"]
  );

  if($data){
    print array("status" => 1, "response" => "Actualizacion exitosa");
  } else{
    print json_encode(array("status" => 0, "response" => "Ha ocurrido un error en la actualizacion..."));
  }
} else{
  print json_encode(array("status" => 0, "response" => "Ha ocurrido un error de peticion en la actualizacion..."));
}
?>

<?php
// WebService for app by lapc18 xD
require 'Database.php';

class Friends{

  function __construct(){
    getById(1);
  }


  public static function getAll(){
    $query = "select * from Friend";
    try{
      $cmd = Database::getInstance()->getDb()->prepare($query); //query prepared to the mambox
      $cmd->execute();
      return $cmd->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
      echo $e;
    }
  }

  public static function getById($id){
    $query = "select * from Friend where Id = ?";
    try{
      $cmd = Database::getInstance()->getDb()->prepare($query); //query prepared to the mambox
      $cmd->execute(array($id));
      return $cmd->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
      return -1;
    }
  }

  public static function update( $id, $nombre, $socialNet, $tel, $actividad, $dir, $fecha, $prioridad, $comentario){
    $query = "update Friend set Nombre = ?, SocialNet = ?, Telefono = ?, Actividad = ?, Direccion = ?, Fecha = ?, Prioridad = ?, Comentario = ? where Id = {$id}";
    try {
      $cmd = Database::getInstance()->getDb()->prepare($query);
      return $cmd->execute(array($nombre, $socialNet, $tel, $actividad, $dir, $fecha, $prioridad, $comentario));
    } catch (PDOException $e) {
      echo $e;
      return -1;
    }
  }

  public static function insert($nombre, $socialNet, $tel, $actividad, $dir, $fecha, $prioridad, $comentario){
    $query = "insert into Friend(Nombre, SocialNet, Telefono, Actividad, Direccion, Fecha, Prioridad, Comentario) values (?,?,?,?,?,?,?,?)";
    try {
      $cmd = Database::getInstance()->getDb()->prepare($query);
      return $cmd->execute(array($nombre, $socialNet, $tel, $actividad, $dir, $fecha, $prioridad, $comentario));
    } catch (PDOException $e) {
      echo $e;
    }
  }

  public static function delete($id){
    $query = "delete from Friend where Id = ?";
    try {
      $cmd = Database::getInstance()->getDb()->prepare($query);
      return $cmd->execute(array($id));
    } catch (PDOException $e) {
      echo $e;
    }

  }

}

?>

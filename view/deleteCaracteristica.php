<?php
  session_start();
  require_once dirname(__FILE__).'/../model/DAO/CaracteristicaDAO.php';



  $func = new CaracteristicaDAO();

  $id = @$_POST['idcarac'];
  echo $id;

  $result = $func->deleteById($id);
  if($result) {
    header("location: caracteristicas.php");
  } else {
    header("location: caracteristicas.php");
  }
 ?>

<?php
  session_start();
  require_once dirname(__FILE__).'/../model/DAO/CaracteristicaDAO.php';



  $func = new CaracteristicaDAO();

  $id = @$_POST['idcarac'];
  echo $id;

  $result = $func->deleteById($id);
  if($result) {
      echo " <br> foi";
      //header("location: caracteristicas.php");
  } else {
    echo "<br> deu merda";
    //header("location: caracteristicas.php");
  }
 ?>

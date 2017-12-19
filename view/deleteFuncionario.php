<?php
  session_start();
  require_once dirname(__FILE__).'/../model/DAO/FuncionarioDAO.php';



  $func = new FuncionarioDAO();

  $id = $_SESSION['idfunc'];

  if($func->deleteById($id)) {
      echo " <br> foi";
      header("location: listaFuncionarios.php");
  } else {
    echo "<br> deu merda";
    header("location: listaFuncionarios.php");
  }
 ?>

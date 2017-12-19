<?php
  session_start();
  require_once dirname(__FILE__).'/../model/DAO/FuncionarioDAO.php';



  $func = new FuncionarioDAO();

  $id = @$_POST['idfunc'];

  if($func->deleteById($id)) {
      header("location: listaFuncionarios.php?Deleted=TRUE");
  } else {
    header("location: listaFuncionarios.php?Error=TRUE");
  }
 ?>

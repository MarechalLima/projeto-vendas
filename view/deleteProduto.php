<?php
  session_start();
  require_once dirname(__FILE__).'/../model/DAO/ProdutoDAO.php';

  $prod = new ProdutoDAO();

  $id = @$_POST['idprod'];

  $result = $prod->deleteById($id);

  if($result) {
      header("location: listaProdutosAdmin.php?Deleted=TRUE");
  } else {
    header("location: listaProdutosAdmin.php");
  }

 ?>

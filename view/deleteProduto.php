<?php
  session_start();
  require_once dirname(__FILE__).'/../model/DAO/ProdutoDAO.php';

  $prod = new ProdutoDAO();

  $id = @$_POST['idprod'];

  $result = $prod->deleteById($id);

  if($result) {
      echo " <br> foi";
      //header("location: listaProdutosAdmin.php");
  } else {
    echo "<br> deu merda";
    //header("location: listaProdutosAdmin.php");
  }

 ?>

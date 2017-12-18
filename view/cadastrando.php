<?php
  session_start();

  require dirname(__FILE__).'/../model/DAO/FuncionarioDAO.php';

    $cargo = $_POST['cargo'];
    $id = $_POST['id'];
    $login = $_POST['login'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $senhac = $_POST['senhaconf'];


    if($senha == $senhac) {
        $funcd = new FuncionarioDAO();

        $funcd->insert($id, $cargo, $login, $nome, $senha);
    } else {
      header("location: cadastro.php");
    }
?>

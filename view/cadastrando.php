<?php
    session_start();

    require dirname(__FILE__).'/../model/DAO/FuncionarioDAO.php';

    $cargo = $_POST['cargo'];
    $id = $_POST['id'];
    $login = $_POST['login'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $senhac = $_POST['senhaconf'];
    echo "AQUIII";

    if($senha == $senhac) {
        
        $func = new Funcionario($id, $cargo, $login, $nome, $senha);

        $funcd = new FuncionarioDAO();

        $funcd->insert($func);
    } else {
      header("location: cadastro.php");
    }
?>

<?php
    session_start();

    require dirname(__FILE__).'/../model/DAO/FuncionarioDAO.php';

    $cargo = $_POST['cargo'];
    $login = $_POST['login'];
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $senhac = $_POST['senhaconf'];
    echo "AQUIII";

    if($senha == $senhac) {
        
        $func = new Funcionario(0, $cargo, $login, $nome, $senha);

        $funcd = new FuncionarioDAO();

        $funcd->insert($func);
    } else {
      header("location: cadastro.php?Error=TRUE");
    }
?>

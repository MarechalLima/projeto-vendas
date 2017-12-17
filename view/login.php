<?php
  session_start();

      if((isset($_POST["login"]) && isset($_POST["senha"])) && (!empty($_POST["login"]) && !empty($_POST["senha"])) ) {
        $usuario = $_POST['login'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

        $conexao = mysqli_connect("127.0.0.1", "root", "", "stoquedb");

        $login = mysqli_prepare($conexao, "select * from funcionario where login = ? and senha = ?");
        mysqli_stmt_bind_param($login, 'ss', $usuario, $senha);
        mysqli_stmt_execute($login);
        mysqli_stmt_get_result($login);

        if(mysqli_affected_rows($conexao)) {
          echo "<script> alert('Bem vindo!'); </script>";
          header("location: ProdutosView.php");
        } else {
          echo "<script> alert('Senha ou usuario incorretos!'); </script>";
          header("location: index.php");
        }
      } else {
        echo "<script> alert('Campos incompletos!'); </script>";
        header('location: index.php');
      }

?>

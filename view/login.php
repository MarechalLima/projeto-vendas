<?php
  session_start();

      if((isset($_POST["login"]) && isset($_POST["senha"])) && (!empty($_POST["login"]) && !empty($_POST["senha"])) ) {
        $usuario = $_POST['login'];

        print_r($_POST['senha']);
        $senha = $_POST['senha'];

        $conexao = mysqli_connect("127.0.0.1", "root", "", "stoquedb");

        $query = mysqli_query($conexao, "select * from funcionario");

        $arrayfunc = mysqli_fetch_all($query, MYSQLI_ASSOC);

        foreach ($arrayfunc as $login) {
          if($usuario == $login['login'] && password_verify($senha, $login['senha'])) {
            $flag = true;
            header("location: ProdutosView.php");
            break;
          } else {
            $flag = false;
          }
        }

        if($flag == false) {
          header("location: index.php");
        }
      }
?>

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
            $_SESSION['usuario'] = $login['id'];
            $_SESSION['logado'] = true;
            $_SESSION['funcionario'] = $login['nome'];
            if($login['cargo'] == "administrador" || $login['cargo'] == "gerente"){
                $_SESSION['admin'] = true;
            }else{
                $_SESSION['admin'] = false;
            }
            $flag = true;
            header("location: ProdutosView.php");
            break;
          } else {
            $flag = false;
          }
        }

        if($flag == false) {
          header("location: index.php?IncorrectData=TRUE");
        }
      }else {
        header("location: index.php?IncompleteData=TRUE");

      }
?>

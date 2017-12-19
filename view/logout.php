<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Autenticação</title>
  </head>
  <body>
    <?php
      session_start();
      if ($_SESSION["logado"] == TRUE) {
        unset($_SESSION["logado"]);
        unset($_SESSION['usuario']);
        unset($_SESSION['admin']);
        unset($_SESSION['funcionario']);
        //unset($_SESSION['idfunc']);
        header('location: index.php?FromLogout=TRUE');//Retorna a variavel FromLogout
        exit();
      }else {
        header('location: index.php?NotLoggedIn=TRUE');//Retorna a variavel NotLoggedIn
        exit();
      }
    ?>
  </body>
</html>

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
        echo "<script>alert('Logout realizado!'); window.location = 'index.php'</script>";
        exit();
      }else {
        echo "<script>alert('Usuário não logado!'); window.location = 'index.php'</script>";
        exit();
      }
    ?>
  </body>
</html>

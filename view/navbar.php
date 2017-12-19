<?php
  session_start();
 ?>


<!DOCTYPE html>
<html>
  <head>
    <link rel="icon" href="images/favicon.png">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
  </head>
  <body>
    <header>
      <?php
        include 'materialize.php';
       ?>

      <div id="logout">
        <?= $_SESSION['funcionario']?>
        <a href="logout.php" class="">Logout</a>
      </div>

      <nav class="cyan darken-4" role="navigation">
        <div class="nav-wrapper container">

          <a id="logo-container" href="#" class="brand-logo">
            <img src="images/topstock-logo.png" alt="">
          </a>

          <ul class="right hide-on-med-and-down">
            <li><a href="ProdutosView.php">Estoque</a></li>
            <li><a href="historico.php">Histórico de vendas</a></li>
            <li><a href="listaProdutosAdmin.php">Painel Administrador</a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="index.php">Página Inicial</a></li>
            <li><a href="corretor.php">Corretor</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>

          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
      </nav>
    </header>
  </body>
</html>

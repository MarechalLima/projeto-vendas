<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <link rel="stylesheet" type="text/css" href="css/master.css">
  </head>
  <body>
    <header>
      <?php
        include 'materialize.php';
       ?>

      <nav class="cyan darken-4" role="navigation">
        <div class="nav-wrapper container">
          <a id="logo-container" href="#" class="brand-logo">
            TopStock
          </a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#">Estoque</a></li>
            <li><a href="#">Histórico de vendas</a></li>
            <li><a href="#">Painel Administrador</a></li>
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
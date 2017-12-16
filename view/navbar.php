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

      <nav class="light-blue orange" role="navigation">
        <div class="nav-wrapper container">

          <a id="logo-container" href="#" class="brand-logo">
            Stoque
            <img src="images/logo-editop-navbar.png" alt="">
          </a>
          <ul class="right hide-on-med-and-down">
            <li><a href="#">Produtos</a></li>
            <li><a href="#">Historico de Vendas</a></li>
            <li><a href="#">Meu Perfil</a></li>
            <li><a href="#">Painel Admin</a></li>
          </ul>

          <ul id="nav-mobile" class="side-nav">
            <li><a href="#">Produtos</a></li>
            <li><a href="#">Historico de Vendas</a></li>
            <li><a href="#">Meu Perfil</a></li>
            <li><a href="#">Painel Admin</a></li>
          </ul>
          <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>

          

        </div>


      </nav>
    </header>
  </body>
</html>

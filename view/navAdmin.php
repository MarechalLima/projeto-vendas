<?php
  //session_start();

  if(!@$_SESSION['admin'] || !isset($_SESSION['admin'])){
    //redirecionar
  }

  include 'navbar.php'
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Painel Administrador</title>
  </head>
  <body>

    <ul id="slide-out" class="side-nav fixed" style="top:65px">
      <li><a class="subheader">Produtos</a></li>
      <li><a href="listaProdutosAdmin.php">Lista de produtos</a></li>
      <li><a href="reporEstoque.php">Repor estoque</a></li>
      <li><a href="caracteristicas.php">Características</a></li>

      <li><div class="divider"></div></li>
      <li><a class="subheader">Funcionários</a></li>
      <li><a href="listaFuncionarios.php">Lista de funcionários</a></li>
      <li><a class="waves-effect" href="cadastro.php">Cadastrar novo funcionário</a></li>
    </ul>



  </body>
</html>

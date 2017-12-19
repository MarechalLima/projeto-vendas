<?php
  //session_start();

  require '../model/DAO/ProdutoDAO.php';
  require '../model/DAO/PedidoDAO.php';
  require '../model/DAO/CaracteristicaDAO.php';
  require '../model/DAO/Produto_caracteristicaDAO.php';
  include 'navbar.php';
  if (!$_SESSION['logado']) {
      header('location: index.php?NotLoggedIn=TRUE');
      exit();
   }

  $prod = new ProdutoDAO();

  if(isset($_POST['id']) && isset($_POST['qtd']) && isset($_SESSION['usuario'])){
    $id = $_POST['id'];
    $qtd = $_POST['qtd'];

    $produto = $prod->getById($id);
    $estoque = $produto->getQTDEstoque();

    if($qtd > $estoque){
      echo "<script>alert('Não temos estoque suficiente para esta compra!')</script>";
    }else{
      $pedido = new Pedido(0, date('Y/m/d'), $_SESSION['usuario'], $_POST['id'], $_POST['qtd']);
      $pedidoDAO = new PedidoDAO();
      $produto->setQTDEstoque($estoque-$qtd);
      $prod->update($id,$produto);
      $pedidoDAO->insert($pedido);
    }

  }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Produtos</title>
  </head>
  <body>
    <br>
    <nav class="container">
      <div class="nav-wrapper orange lighten-2">
        <form action="merda.php">
          <div class="input-field">
            <input id="search" type="search" required>
            <label class="label-icon" for="search"><i class="material-icons">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>
    </nav>

    <div class="container">



      <ul class="collapsible" data-collapsible="accordion">
        <?php

          $allProdutos = $prod->getAll();
          $cProd = new Produto_caracteristicaDAO();
          $caracteristica = new CaracteristicaDAO();

          foreach ($allProdutos as $produto) {
              $idProduto = $produto->getId();
              $nome = $produto->getNome();
              $preco = $produto->getPreco();
              $qtd_estoque = $produto->getQTDEstoque();

              $idProd = $produto->getId();
              $caracteristicaProd = $cProd->getByIdProd($idProd);



        ?>
        <li>
          <div class="collapsible-header" style="display:block">
            <?= $nome ?>
            <div class="secondary-content">
              <?= "R$ ".$preco ?>
            </div>
          </div>
          <div class="collapsible-body">
            <span class="new badge right" data-badge-caption="em estoque"><?= $qtd_estoque ?></span>
            <table class="striped bordered">
              <?php
                foreach ($caracteristicaProd as $c) {
                  $id_caracteristica = $c->getId_caracteristica();
                  $caracter = $caracteristica->getById($id_caracteristica);
                  $titulo = $caracter->getTitulo();
                  $valor = $c->getValor();
              ?>
              <tr>
                <th><?= $titulo ?></th>
                <td><?= $valor ?></td>
              </tr>
            <?php } ?>
            </table>
            <form action="ProdutosView.php" method="post">
              <div class="row">
                <div class="input-field col-s4">
                  <input type="text" style="display:none" name="id" value="<?= $idProduto ?>">
                  <input class="col s2" type="text" name="qtd" id="qtd">
                  <label for="qtd">Quantidade</label>
                </div>
                <div class="input-field col-s4">
                  <button class="btn" type="submit" name="">Comprar</button>
                </div>
              </div>

            </form>
          </div>
        </li>
      <?php } ?>
      </ul>
    </div>


    <script type="text/javascript">
      $(document).ready(function(){
        $('.collapsible').collapsible();
      });

    </script>

  </body>
</html>

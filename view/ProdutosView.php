<?php
  require '../model/DAO/ProdutoDAO.php';
  require '../model/DAO/CaracteristicaDAO.php';
  require '../model/DAO/Produto_caracteristicaDAO.php';
  include 'navbar.php';
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
          $prod = new ProdutoDAO();
          $allProdutos = $prod->getAll();
          $cProd = new Produto_caracteristicaDAO();
          $caracteristica = new CaracteristicaDAO();

          foreach ($allProdutos as $produto) {
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
          </div>
        </li>
      <?php } ?>
      </ul>
    </div>


    <script type="text/javascript">
      $(document).ready(function(){
        $('.collapsible').collapsible();
        console.log("BOSTA");
      });
    </script>

  </body>
</html>

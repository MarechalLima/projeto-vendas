<?php
  include 'navAdmin.php';
  require '../model/DAO/ProdutoDAO.php';

 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col s10 offset-s3">
          <table class="striped col-s8 offset-s3">
            <thead>
              <th>Id</th>
              <th>Nome</th>
              <th>Preco</th>
              <th>Quantidade em Estoque</th>
            </thead>
            <?php
              $p = new ProdutoDAO();
              $produtos = $p->getAll();
              foreach ($produtos as $produto) {
                $idProd = $produto->getId();
                $nomeProd = $produto->getNome();
                $precoProd = $produto->getPreco();
                $quantidadeProd = $produto->getQTDEstoque();
              
            ?>
            <tr>
              <td><?=$idProd ?></td>
              <td><?=$nomeProd ?></td>
              <td><?=$precoProd?></td>
              <td><?= $quantidadeProd ?></td>
              <td>
                <button class="btn" name="button"><i class="material-icons">edit</i></button>
                <button class="btn" name="button"><i class="material-icons">delete</i></button>
              </td>
            </tr>
          <?php }  ?>
          </table>
        </div>

      </div>
      <div class="row">
        <a class="btn-floating btn-large waves-effect waves-light red right modal-trigger" href="#modalAdd"><i class="material-icons">add</i></a>
      </div>

    </div>

    <div id="modalAdd" class="modal">
      <form class="" action="caracteristicas.php" method="post">
        <div class="modal-content">
            <h4>Adicionar produto</h4>

            <div class="input-field">
              <input type="text" id="nome" name="nome" value="">
              <label for="nome">Nome</label>
            </div>

            <div class="input-field">
              <input type="text" id="preco" name="preco" value="">
              <label for="preco">Preco</label>
            </div>

            <div class="input-field">
              <input type="text" id="qtdEstoque" name="qtdEstoque" value="">
              <label for="qtdEstoque">Quantidade em estoque</label>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Confirmar</button>
        </div>
      </form>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
      // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
      });
    </script>
  </body>
</html>

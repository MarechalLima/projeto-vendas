<?php
  include 'navAdmin.php';
  require '../model/DAO/ProdutoDAO.php';


  if(isset($_POST['caracteristicaId'])){
    $caracteristicas = $_POST['caracteristicaId'];

    print_r($_POST);

    foreach ($caracteristicas as $key => $value){
      $valor = $_POST['valor'][$key];
      print_r($valor);

      echo "<script>alert($value)</script>"; // Id do produto
      echo "<script>alert($valor)</script>"; // Id do produto
    }
  }

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
          <table class="highlight col-s8 offset-s3">
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
                $qtdProd = $produto->getQTDEstoque();

              ?>
            <tr>
              <td><?= $idProd ?></td>
              <td><?= $nomeProd ?></td>
              <td><?= $precoProd ?></td>
              <td><?= $qtdProd ?></td>
              <td>
                <button class="btn" name="button"><i class="material-icons">edit</i></button>

                <form method="POST" action="deleteProduto.php">
                    <input type="number" name="idprod" hidden="true" value="<?= $idProd ?>">
                    <button class="btn" name="button"><i class="material-icons">delete</i></button>
                </form>

              </td>
            </tr>
          <?php } ?>
          </table>
        </div>

      </div>
      <div class="row">
        <a class="btn-floating btn-large waves-effect waves-light red right modal-trigger" href="#modalAdd"><i class="material-icons">add</i></a>
      </div>

    </div>

    <div id="modalAdd" class="modal">
      <form id="formulario" action="listaProdutosAdmin.php" method="post">
        <div class="modal-content" id="modal-content">
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
            <div style="margin: 5% 0px"></div>


            <div id="item" class="item">
              <div class="row">
                <div class="input-field col s6">
                  <select name="caracteristicaId[]">
                    <!-- value é o id da caracteristica -->
                    <option value="1">Peso</option>
                    <option value="5">Tensão</option>
                    <option value="9">Potência</option>
                  </select>
                  <label>Característica</label>
                </div>

                <div class="input-field col s6">
                  <input type="text" name="valor[]" id="valor" />
                  <label for="valor">Valor</label>
                </div>
              </div>
            </div>


        </div>
        <div style="margin: 5% 0px"></div>

        <div class="modal-footer">
          <a class="btn orange waves-effect waves-light" type="button" id="novaCaract">Nova característica</a>

          <button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn">Confirmar</button>
        </div>
      </form>
    </div>

    <script type="text/javascript">
      $(document).ready(function(){
      // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
      });
      $(document).ready(function() {
        $('select').material_select();
      });

      $(document).ready(function() {
        $("#novaCaract").click(function() {
          var novoItem = $("#item").clone().removeAttr('id'); // para não ter id duplicado
          novoItem.children('input').val(''); //limpa o campo quantidade
          $("#modal-content").append(novoItem);
          $('select').material_select();
        });
      });

    </script>
  </body>
</html>

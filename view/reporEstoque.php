<?php
  include 'navAdmin.php';
  include '../model/DAO/ProdutoDAO.php';

  $produtoDAO = new ProdutoDAO();

  if(isset($_POST['idProduto'])){
    $id = $_POST['idProduto'];
    $qtd = $_POST['qtd'];

    $produto = $produtoDAO->getById($id);
    $produto->setQTDEstoque($produto->getQTDEstoque() + $qtd);

    $produtoDAO->update($id,$produto);
  }

  if(isset($_REQUEST["Inserted"])){
    echo "<script>Materialize.toast('Reposição de estoque realizada!',2000);</script>";
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Repor estoque</title>
    <script type="text/javascript">
      showToast(message){
        Materialize.toast(message, 2000);
      }
    </script>
  </head>

  <body>

    <div class="container">

      <div class="row">
        <div class="col s10 offset-s3">
          <h5>Cadastro de funcionários</h5>
        </div>
        <div class="col s10 offset-s3">
          <form method="POST" action="reporEstoque.php?Inserted=TRUE">
            <div class="row">
              <div class="input-field col s6">
                <select name="idProduto">
                  <?php




                    $produtos = $produtoDAO->getAll();

                    foreach($produtos as $prod){
                        $idProduto = $prod->getId();
                        $nomeProduto = $prod->getNome();

                   ?>

                   <option value="<?= $idProduto?>">
                     <?=$nomeProduto?>
                   </option>

                 <?php } ?>

                </select>
                <label> Produto </label>
              </div>



              <div class="input-field col s6">
                <input type="number" name = "qtd" id="qtd">
                <label for="qtd">Quantidade</label>
              </div>
            </div>


            <input class="btn" type="submit" name="Enviar">
          </form>
        </div>

      </div>

    </div>
    <script type="text/javascript">
      $(document).ready(function() {
        $('select').material_select();
      });
    </script>
  </body>
</html>

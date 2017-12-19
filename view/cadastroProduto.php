<?php
  include 'navAdmin.php';
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
          <form class="" action="caracteristicas.php" method="post">
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

            <div id="item" class="item">
              <input type="button" id="novaCaract" value="Novo produto" />
              <div class="input-field">
                <select name="caracteristicaId[]">
                  <!-- value é o id da caracteristica -->
                  <option value="1">Peso</option>
                  <option value="5">Tensão</option>
                  <option value="9">Potência</option>
                </select>
                <label>Materialize Select</label>

              </div>
              

              <div class="input-field">
                <input type="number" name="quant[]" id="qtd" />
                <label for="qtd">Quantidade</label>
              </div>

            </div>


          <button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Confirmar</button>
      </form>
        </div>

      </div>

    </div>

    <div id="modalAdd" class="modal">

    </div>

    <script type="text/javascript">
      $(document).ready(function(){
      // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
      });
    </script>
  </body>
</html>

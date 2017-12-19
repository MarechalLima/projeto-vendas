<?php
  include 'navAdmin.php';
  require '../model/DAO/CaracteristicaDAO.php';
  if(isset($_POST['titulo'])){
    $titulo = $_POST['titulo'];
    $carac = new CaracteristicaDAO();
    $caracInsert = new Caracteristica(0,$titulo);
    $carac->insert($caracInsert);
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Características</title>
    <script>
      function showToast(message){
        Materialize.toast(message, 2000);
      }
    </script>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col s10 offset-s3">
          <table class="highlight col-s8 offset-s3">
            <thead>
              <th>Id</th>
              <th>Título</th>
              <th>Ações</th>
            </thead>
            <?php
            if (isset($_REQUEST["Inserted"])){
              echo "<script>showToast('Caracteristica inserida!');</script>";
            }

            if (isset($_REQUEST["Deleted"])){
              echo "<script>showToast('Caracteristica deletada!');</script>";
            }

            $c = new CaracteristicaDAO();
            $caracteristicas = $c->getAll();
            foreach ($caracteristicas as $caracteristica) {
              $idCarac = $caracteristica->getId();
              $tituloCarac = $caracteristica->getTitulo();
            ?>
            <tr>
              <td><?= $idCarac ?></td>
              <td><?= $tituloCarac ?></td>
              <td>
                <form method="POST" action="deleteCaracteristica.php">
                    <input type="number" name="idcarac" hidden="true" value="<?= $idCarac ?>">
                    <button class="btn" name="button"><i class="material-icons">delete</i></button>
                </form>


              </td>
            </tr>

          <?php
            }
          ?>
          </table>
        </div>


      </div>
      <div class="row">
        <a class="btn-floating btn-large waves-effect waves-light red right modal-trigger" href="#modalAdd"><i class="material-icons">add</i></a>
      </div>
    </div>

    <div id="modalAdd" class="modal">
      <form class="" action="caracteristicas.php?Inserted=TRUE" method="post">
        <div class="modal-content">
          <h4>Adicionar caracteristica</h4>

            <div class="input-field">
              <input type="text" id="titulo" name="titulo" value="">
              <label for="titulo">Título</label>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Confirmar</button>
        </div>
      </form>
    </div>

  </body>

  <script type="text/javascript">
    $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
      $('.modal').modal();
    });
  </script>
</html>

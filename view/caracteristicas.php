<?php
  include 'navAdmin.php';
  require '../model/DAO/CaracteristicaDAO.php';
  if(isset($_POST['titulo'])){
    $titulo = $_POST['titulo'];
    echo "<script>alert('tem titulo $titulo')</script>";
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Características</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col s10 offset-s3">
          <table class="striped col-s8 offset-s3">
            <thead>
              <th>Id</th>
              <th>Título</th>
              <th>Ações</th>
            </thead>
            <?php
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
                <button class="btn" name="button"><i class="material-icons">delete</i></button>
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
      <form class="" action="caracteristicas.php" method="post">
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

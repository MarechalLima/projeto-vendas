<?php
  include 'navAdmin.php';
  require '../model/DAO/FuncionarioDAO.php';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
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
              <th>Login</th>
              <th>Nome</th>
              <th>Cargo</th>
            </thead>
            <?php

            //Teste de usuário recém-inserido
            if(isset($_REQUEST["Inserted"])){
              echo "<script>showToast('Usuário inserido!');</script>";
            }
            if(isset($_REQUEST["Deleted"])){
              echo "<script>showToast('Usuário deletado!');</script>";
            }

              $f = new FuncionarioDAO();
              $funcionarios = $f->getAll();
              foreach ($funcionarios as $funcionario) {
                $idFunc = $funcionario->getId();
                $nomeFunc = $funcionario->getNome();
                $cargoFunc = $funcionario->getCargo();
                $loginFunc = $funcionario->getLogin();

            ?>
            <tr>
              <td><?= $idFunc ?></td>
              <td><?= $nomeFunc ?></td>
              <td><?= $cargoFunc ?></td>
              <td><?= $loginFunc ?></td>
              <td>

                <button type="submit" class="btn" name="button"><i class="material-icons">edit</i></button>
                    <form method="POST" action="deleteFuncionario.php">
                        <input type="number" name="idfunc" hidden="true" value="<?= $idFunc ?>">
                        <button type = "submit" class="btn" name="button"><i class="material-icons">delete</i></button>
                    </form>
              </td>
            </tr>
          <?php } ?>
          </table>
        </div>

  </body>
</html>

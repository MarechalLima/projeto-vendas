<?php
  include 'navAdmin.php';
  require '../model/DAO/FuncionarioDAO.php';
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
              <th>Cargo</th>
              <th>Login</th>
            </thead>
            <?php
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
              <td><?=$cargoFunc ?></td>
              <td><? $loginFunc ?></td>
              <td>

              <button type="submit" class="btn" name="button"><i class="material-icons">edit</i></button>

                              <form method="POST" action="deleteFuncionario.php">
                                <button type = "submit" class="btn" name="button"><i class="material-icons">delete</i></button>
                                <?php
                                  $_SESSION['idfunc'] = $idFunc;                                  
                                 ?>
                              </form>
              </td>
            </tr>
          <?php } ?>
          </table>
        </div>

  </body>
</html>

<?php
  include 'navAdmin.php';
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cadastro de Funcionários</title>
    <script>
        function showToast(message){
          Materialize.toast(message, 2000);
        }
    </script>
  </head>

  <body>

  <?php
        //Teste de erro ao inserir usuário 
        if(isset($_REQUEST["Error"])){
          echo "<script>showToast('Erro ao inserir usuário!');</script>";
        }
  ?>
    <div class="container">

      <div class="row">
        <div class="col s10 offset-s3">
          <h5>Cadastro de funcionários</h5>
        </div>
        <div class="col s10 offset-s3">
          <form method="POST" action="cadastrando.php">

            <div class="input-field ">
              <input type="text" name = "nome" id="nome">
              <label for="nome">Nome</label>
            </div>

            <div class="input-field">
              <input type="text" name = "cargo" id="cargo">
              <label for="cargo">Cargo</label>
            </div>

            <div class="input-field">
              <input type="text" name = "login" id="login">
              <label for="login">Login</label>
            </div>



            <div class="input-field">
              <input type="password" name = "senha" id="senha">
              <label for="cargo">Senha</label>
            </div>

            <div class="input-field">
              <input type="password" name = "senhaconf" id="senha-confirm">
              <label for="senha-confirm">Confirmação da senha</label>
            </div>

            <input class="btn" type="submit" name="Enviar">
          </form>
        </div>



      </div>

    </div>

  </body>
</html>

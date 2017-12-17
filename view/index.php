<!DOCTYPE html>
<html>
  <head>
    <title> Editor de Texto </title>
    <meta charset="utf-8">
    <link rel="icon" href="images/send-blue.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/master.css">

    <link rel="stylesheet" type="text/css" href="css/transicao/keyframes.css">
    <link rel="stylesheet" type="text/css" href="css/transicao/animation.scss">

    <script>
      function showToast(message){//Função que exibe o toast
        Materialize.toast(message, 3000);
      }
    </script>

  </head>
  <body>
    <?php
      session_start();

      if (isset($_SESSION["logado"]) && !empty($_SESSION["logado"])) {
          if ($_SESSION['logado']==true) {
              //echo "<script>alert('Usuário já logado!'); window.location = 'historico.php'</script>";
              //exit();
          }
      }

      include 'materialize.php';


      if (isset($_REQUEST['FromLogout'])){//Verifica se o logout foi efetuado
        echo "<script>showToast('Logout realizado!')</script>";
        unset($_REQUEST['FromLogout']);
      }


      if (isset($_REQUEST['NotLoggedIn'])){//Verifica se o usuário não estava logado
        echo "<script>showToast('Usuário não logado!')</script>";
        unset($_REQUEST['NotLoggedIn']);
      }


      if (isset($_REQUEST['IncorrectData'])){//Verifica se o usuário estiver com os dados incorretos
        echo "<script>showToast('Dados incorretos!')</script>";
        unset($_REQUEST['IncorrectData']);
      }

      if (isset($_REQUEST['IncompleteData'])){//Verifica se o usuário não estava logado
        echo "<script>showToast('Dados incompletos!')</script>";
        unset($_REQUEST['IncompleteData']);
      }
      if (isset($_REQUEST['SignUp'])){//Verifica se o usuário não estava logado
        echo "<script>showToast('Usuário cadastrado!')</script>";
        unset($_REQUEST['SignUp']);
      }
      if (isset($_REQUEST['DifferentPasswords'])){//Verifica se o usuário não estava logado
        echo "<script>showToast('Senhas diferentes!')</script>";
        unset($_REQUEST['DifferentPasswords']);
      }
      if (isset($_REQUEST['UserAlreadyRegistered'])){//Verifica se o usuário não estava logado
        echo "<script>showToast('Usuário já existente!')</script>";
        unset($_REQUEST['UserAlreadyRegistered']);
      }

    ?>
    <div class="container">
      <div class="row">
        <div class="col s6 offset-s3">
          <div class="card push-s3 z-depth-2 grey lighten-3">
            <div class="card-content">
              <div class="row">
              <div class="col s12">

                <span class="card-title">
                  <img src="images/logo-editop.png" alt="">
                </span>
                <br><br><br>

                <span style="font-size:1.5em">Login</span> <br>
                Ir para o Editop




                <div class="m-right-panel m-page scene_element scene_element--fadeinright">


                <form method="POST" action="login.php">
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="login" type="text" name="login" class="validate">
                      <label for="login">Login</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s12">
                      <input id="password" type="password" name="senha" class="validate">
                      <label for="password">Senha</label>
                    </div>
                  </div>
                      <div class="row">
                        <div class="col s12">
                          <button class="btn waves-effect waves-light light-blue lighten-1" type="submit" name="action">Entrar
                            <i class="material-icons right">send</i>
                          </button>
                        </div>
                      </div>

                      </div>

                  </form>
              </div>
          </div>
          <div class="row">
            <span class="col s12">Não possui uma conta? <span class="teal-text lighten-2 activator">Cadastre-se agora!</span></span>
          </div>
        </div>
        <div class="card-reveal grey lighten-3">
          <span class="card-title grey-text text-darken-4">Cadastre-se<i class="material-icons right">close</i></span>
          <br>


          <form action="cadastrando.php" method="POST">
            <div class="row">
              <div class="input-field col s12">
                <input id="user" type="text" name="usuario" class="validate">
                <label for="user">Nome de usuário ou email</label>
              </div>
              <div class="input-field col s6">
                <input id="password" type="password" name="senhacad" class="validate">
                <label for="password">Digite a senha</label>
              </div>
              <div class="input-field col s6">
                <input id="password" type="password" name="senhacadconf" class="validate">
                <label for="password">Confirme a senha</label>
              </div>
            </div>
            <div class="row">
              <div class="col s12">
                <button class="btn waves-effect waves-light red lighten-1" type="submit" name="action">Cadastrar
                  <i class="material-icons right">send</i>
                </button>
              </div>
            </div>
          </form>


        </div>
      </div>
    </div>
  </div>
</div>

  </body>
</html>

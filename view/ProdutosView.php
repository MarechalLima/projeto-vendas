<?php
  //require '../model/DAO/ProdutoDAO.php';
//  require '../model/domain/Produto.php';
  include 'navbar.php';
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Produtos</title>
  </head>
  <body>

    <div class="container">


      <ul class="collapsible" data-collapsible="accordion">
        <li>
          <div class="collapsible-header" style="display:block">
            Liquidificador Mallory Flash Black - 2 Velocidades 450W
            <div class="secondary-content">
              R$ 49,90

            </div>
          </div>
          <div class="collapsible-body">
            <span class="new badge right" data-badge-caption="em estoque">250</span>
            <table class="striped bordered">
              <tr>
                <th>Voltagem</th>
                <td>220V</td>
              </tr>
              <tr>
                <th>Potência</th>
                <td>200W</td>
              </tr>
            </table>
          </div>
        </li>
      </ul>
    </div>


    <script type="text/javascript">
      $(document).ready(function(){
        $('.collapsible').collapsible();
        console.log("BOSTA");
      });
    </script>

  </body>
</html>

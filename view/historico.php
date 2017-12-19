<?php


    require dirname(__FILE__).'/../model/DAO/PedidoDAO.php';
    require dirname(__FILE__).'/../model/DAO/ProdutoDAO.php';
    include 'navbar.php';
    
    if (!$_SESSION['logado']) {
    header('location: index.php?NotLoggedIn=TRUE');
    exit();
    }

    $busca_funcionario = new PedidoDAO();
    $p = new ProdutoDAO();
    $historico = $busca_funcionario->getByFuncionario($_SESSION['usuario']);

?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Histórico de Vendas</title>
    </head>
    <body>
        <div class="container">
            <ul class="collapsible" data-collapsible="accordion">
        <?php

            foreach ($historico as $pedido) {
                $idPedido = $pedido->getId();
                $data_compra = $pedido->getData_compra();
                $qtdProd = $pedido->getQuantidade();

                $idProduto = $pedido->getId_produto();
                $produto = $p->getById($idProduto);
                $nomeProd = $produto->getNome();
                $precoProd = $produto->getPreco();



        ?>
        <li>
            <div class="collapsible-header" style="display:block">
                <?= $idPedido ?>
                <div class="secondary-content">
                <?= date('d/m/Y',strtotime($data_compra)) ?>
                </div>
            </div>
            <div class="collapsible-body">
                <table class="striped bordered">
                  <tr>
                    <td><?= $nomeProd ?></td>
                    <td><?= $qtdProd ?></td>
                    <td><?= 'R$ '.$precoProd ?></td>
                  </tr>
                </table>
            </div>
        <?php } ?>
    </body>
</html>

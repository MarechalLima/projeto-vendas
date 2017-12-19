<?php
    require dirname(__FILE__).'/../model/DAO/PedidoDAO.php';
    require dirname(__FILE__).'/../model/DAO/Pedido_ProdutoDAO.php';
    require dirname(__FILE__).'/../model/DAO/ProdutoDAO.php';
    include 'navbar.php';

    session_start();
    $busca_funcionario = new PedidoDAO();
    $historico = $busca_funcionario->getByFuncionario($_SESSION['usuario']);
    print_r($historico);
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
                $busca_produtos = new Pedido_ProdutoDAO();
                $qtdTotal = 0;
                $pedido_has_produto = $busca_produtos->getAll();
                print_r($pedido_has_produto);
        ?>
        <li>
            <div class="collapsible-header" style="display:block">
                <?= $idPedido ?>
                <div class="secondary-content">
                <?= date('d/m/Y',strtotime($data_compra)) ?>
                </div>
            </div>
            <div class="collapsible-body">
                <span class="new badge right" data-badge-caption="<?= $qtdTotal ?>">Valor total: </span>
                <table class="striped bordered">
                <?php 
                    foreach ($pedido_has_produto as $array){
                        echo 'oi';
                        if ($array->getPedido() == $idPedido){
                            echo 'oi';
                        }
                    }
                ?>
                </table>
            </div>
        <?php } ?>
    </body>
</html>
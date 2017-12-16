<?php
    class Pedido_Produto{
        private $pedido_id;
        private $produto_id;
        private $qtd;
        public function __construct($pedido_id, $produto_id, $qtd){
            $this->$pedido_id = $pedido_id;
            $this->$produto_id = $produto_id;
            $this->$qtd = $qtd;
        }
        public function getPedido(){
            return $this->pedido_id;
        }
        public function setPedido($new_pedido_id){
            $this->pedido_id = $new_pedido_id;
        }
        public function getProduto(){
            return $this->$produto_id;
        }
        public function setProduto($new_produto_id){
            $this->$produto_id = $new_produto_id;
        }
        public function getQtd(){
            return $this->$qtd;
        }
        public function setQtd($new_qtd){
            $this->$qtd = $new_qtd;
        }
    }
?>
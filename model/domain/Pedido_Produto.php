<?php
    class Pedido_Produto{
        private $id;
        private $id_pedido;
        private $id_produto;
        private $quantidade;
        function __construct($id, $id_pedido, $id_produto, $quantidade){
            $this->$id = $id;
            $this->$id_pedido = $id_pedido;
            $this->$id_produto = $id_produto;
            $this->$quantidade = $quantidade;
        }
/** ID **/
        public function getId(){
            return $this->id;
        }
        public function setId($new_id){
            $this->id = $new_id;
        }
/** PEDIDO **/
        public function getPedido(){
            return $this->id_pedido;
        }
        public function setPedido($new_id_pedido){
            $this->id_pedido = $new_id_pedido;
        }
/** PRODUTO **/
        public function getProduto(){
            return $this->$id_produto;
        }
        public function setProduto($new_id_produto){
            $this->$id_produto = $new_id_produto;
        }
/** QUANTIDADE **/
        public function getQuantidade(){
            return $this->$quantidade;
        }
        public function setQuantidade($new_quantidade){
            $this->$quantidade = $new_quantidade;
        }
    }
?>
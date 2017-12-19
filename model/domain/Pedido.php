<?php
  class Pedido{
    private $id;
    private $id_produto;
    private $quantidade;
    private $id_funcionario;
    private $data_compra;

    function __construct($id,$data_compra,$id_funcionario,$id_produto,$quantidade){
      $this->id = $id;
      $this->id_funcionario = $id_funcionario;
      $this->data_compra = $data_compra;
      $this->id_produto = $id_produto;
      $this->quantidade = $quantidade;
    }
    public function getId(){
      return $this->id;
    }
    public function getId_funcionario(){
      return $this->id_funcionario;
    }
    public function getData_compra(){
      return $this->data_compra;
    }
    public function getId_produto(){
      return $this->id_produto;
    }
    public function getQuantidade(){
      return $this->quantidade;
    }
    public function setId($new_id){
      $this->id=$new_id;
    }
    public function setId_funcionario($new_id_funcionario){
      $this->id_funcionario=$new_id_funcionario;
    }
    public function setData_compra($new_data_compra){
      $this->data_compra = $new_data_compra;
    }
    public function setId_produto($new_id_produto){
      $this->id_produto = $new_id_produto;
    }
    public function setQuantidade($new_quantidade){
      $this->quantidade = $new_quantidade;
    }

  }

?>

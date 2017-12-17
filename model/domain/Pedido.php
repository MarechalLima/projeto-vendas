<?php
  class Pedido{
    private $id;
    private $id_funcionario;
    private $data_compra;

    function __construct($id,$data_compra,$id_funcionario){
      $this->id = $id;
      $this->id_funcionario = $id_funcionario;
      $this->data_compra = $data_compra;
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
    public function setId($new_id){
      $this->id=$new_id;
    }
    public function setId_funcionario($new_id_funcionario){
      $this->id_funcionario=$new_id_funcionario;
    }
    public function setData_compra($new_data_compra){
      $this->data_compra = $new_data_compra;
    }
  }

?>

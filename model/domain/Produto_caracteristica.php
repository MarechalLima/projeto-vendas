<?php
  class Produto_caracteristica{
    private $id;
    private $id_produto;
    private $id_caracteristica;

    function __construct($id,$id_produto,$id_caracteristica){
      $this->id=$id;
      $this->id_produto = $id_produto;
      $this->id_caracteristica = $id_caracteristica;
    }
    public function getId(){
      return $this->id;
    }
    public function getId_produto(){
      return $this->id_produto;
    }
    public function getId_caracteristica(){
      return $this->id_caracteristica;
    }
    public function setId($new_id){
      $this->id=$new_id;
    }
    public function setId_produto($new_id_produto){
      $this->id_produto=$new_id_produto;
    }
    public function setId_caracteristica($new_id_caracteristica){
      $this->id_caracteristica = $new_id_caracteristica;
    }
  }

?>

<?php
  class Produto{
    private $id;
    private $nome;
    private $preco;
    private $qtd_estoque;

    public function __construct($id, $nome, $preco, $qtd_estoque){
      $this->id = $id;
      $this->nome = $nome;
      $this->preco = $preco;
      $this->qtd_estoque = $qtd_estoque;
    }

    public function getId(){
      return $this->id;
    }
    public function getNome(){
      return $this->nome;
    }
    public function getPreco(){
      return $this->preco;
    }
    public function getQTDEstoque(){
      return $this->qtd_estoque;
    }

    public function setId($new_id){
      $this->id = $new_id;
    }
    public function setNome($new_nome){
      $this->nome = $new_nome;
    }
    public function setPreco($new_preco){
      $this->preco = $new_preco;
    }
    public function setQTDEstoque($new_qtd_estoque){
      $this->qtd_estoque = $new_qtd_estoque;
    }

  }

?>

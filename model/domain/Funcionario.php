<?php
    class Funcionario{
      private $cargo;
      private $id;
      private $login;
      private $nome;
      private $senha;

      public function __construct($id, $cargo, $login, $nome, $senha) {
        $this->id = $id;
        $this->cargo = $cargo;
        $this->login = $login;
        $this->nome = $nome;
        $this->senha = $senha;
      }

      public function getID() {
        return $this->id;
      }

      public function getNome() {
        return $this->nome;
      }

      public function getCargo(){
        return $this->cargo;
      }

      public function getLogin(){
        return $this->login;
      }

      public function getSenha(){
        return $this->senha;
      }

      public function setID($new_id){
        $this->id = $new_id;
      }

      public function setCargo($new_cargo) {
        $this->id = $new_cargo;
      }

      public function setLogin($new_login){
        $this->login = $new_login;
      }

      public function setSenha($new_senha) {
        $this->senha = $new_senha;
      }
    }
?>

<?php
  class Connection{
    private $connection;


    public function __construct(){
      $this->connection = new mysqli("127.0.0.1", "root", "senhaadminbanco", "stoquedb");

      if($this->connection->connect_error){
        die("Conexão falhou: ". $this->connection->connect_error);
      }

      echo "Conexão feita com sucesso!";
    }

    public function query($sql){
      return $this->connection->query($sql);
    }

    public function prepareStatement($sql){
      return $this->connection->prepare($sql);
    }
  }

?>

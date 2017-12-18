<?php
  require dirname(__FILE__).'/../../conexao.php';
  require dirname(__FILE__).'/../domain/Pedido.php';

  class PedidoDAO extends Connection{
    private $table = 'pedido';


    public function insert($pedido){

      $stmt = parent::prepareStatement("INSERT INTO pedido(data_compra,id_funcionario) VALUES(?,?)");
      $stmt->bind_param("si",$pedido->getData_compra(),$pedido->getId_funcionario());
      if($stmt->execute()){
        echo "Pedido inserido com sucesso!";
      }else{
        echo "Erro ao inserir dados!";
      }

      $stmt->close();

    }

    public function getAll(){
      $stmt = parent::prepareStatement("SELECT * FROM $this->table");
      if($stmt->execute()){
        $stmt->bind_result($id,$data_compra,$id_funcionario);


        $pedidos = array();

        while($stmt->fetch()){
          $result = new Pedido($id,$data_compra,$id_funcionario);
          $pedidos[] = $result;
        }
      }else{
        echo "Erro ao consultar o banco de dados!";
      }

      $stmt->close();
      return $pedidos;
    }

    public function getById($id){
      $stmt = parent::prepareStatement("SELECT * FROM $this->table WHERE id=?");
      $stmt->bind_param("i",$id);
      $stmt->execute();

      $stmt->bind_result($id,$data_compra,$id_funcionario);
      $stmt->fetch();

      $pedido = new Pedido($id,$data_compra,$id_funcionario);
      $stmt->close();
      return $pedido;
    }

    public function getByFuncionario($id_funcionario){
      $stmt = parent::prepareStatement("SELECT * FROM $this->table WHERE id_funcionario=?");
      if($stmt->execute()){
        $stmt->bind_result($id,$data_compra,$id_funcionario);


        $historico = array();

        while($stmt->fetch()){
          $result = new Pedido($id,$data_compra,$id_funcionario);
          $historico[] = $result;
        }
      }else{
        echo "Erro ao consultar o banco de dados!";
      }

      $stmt->close();
      return $historico;
    }
  }


 ?>

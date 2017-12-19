<?php
  require_once dirname(__FILE__).'/../../conexao.php';
  require dirname(__FILE__).'/../domain/Pedido.php';

  class PedidoDAO extends Connection{
    private $table = 'pedido';


    public function insert($pedido){

      $stmt = parent::prepareStatement("INSERT INTO pedido(data_compra,id_funcionario,id_produto,quantidade) VALUES(?,?,?,?)");
     $stmt->bind_param("siii",$pedido->getData_compra(),$pedido->getId_funcionario(),$pedido->getId_produto(),$pedido->getQuantidade());
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
        $stmt->bind_result($id,$data_compra,$id_funcionario,$id_produto,$quantidade);


        $pedidos = array();

        while($stmt->fetch()){
          $result = new Pedido($id,$data_compra,$id_funcionario,$id_produto,$quantidade);
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

      $stmt->bind_result($id,$data_compra,$id_funcionario,$id_produto,$quantidade);
      $stmt->fetch();

      $pedido = new Pedido($id,$data_compra,$id_funcionario,$id_produto,$quantidade);
      $stmt->close();
      return $pedido;
    }

    public function getByFuncionario($busca_id_funcionario){
      $stmt = parent::prepareStatement("SELECT * FROM $this->table WHERE id_funcionario=?");
      $stmt->bind_param("i",$busca_id_funcionario);
      if($stmt->execute()){
        $stmt->bind_result($id,$data_compra,$id_funcionario,$id_produto,$quantidade);


        $historico = array();

        while($stmt->fetch()){
          $result = new Pedido($id,$data_compra,$id_funcionario,$id_produto,$quantidade);
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

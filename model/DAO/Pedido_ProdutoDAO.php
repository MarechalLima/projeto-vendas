<?php
    require_once dirname(__FILE__).'/../../conexao.php';
    require dirname(__FILE__).'/../domain/Pedido_Produto.php';

  class Pedido_ProdutoDAO extends Connection{
    private $table = 'pedido_produto';


    public function insert($pedido_produto){
      $stmt = parent::prepareStatement("INSERT INTO $this->table(id_pedido, id_produto, quantidade) VALUES(?,?,?)");
      $stmt->bind_param("iii", $pedido_produto->getPedido(),$pedido_produto->getProduto(), $pedido_produto->getQuantidade());

      if($stmt->execute()){
        echo "Pedido_produto inseridos com sucesso!";
      }else{
        echo "Erro ao inserir dados!";
      }

      $stmt->close();

    }

    public function getAll(){
      $stmt = parent::prepareStatement("SELECT * FROM $this->table");
      if($stmt->execute()){
        $stmt->bind_result($id, $id_pedido, $id_produto, $quantidade);


        $pedido_produto_array = array();

        while($stmt->fetch()){
          $result = new Pedido_Produto($id, $id_pedido, $id_produto, $quantidade);
          $pedido_produto_array[] = $result;
        }
      }else{
        echo "Erro ao consultar o banco de dados!";
      }

      $stmt->close();
      return $pedido_produto_array;
    }

    public function getById($id){
      $stmt = parent::prepareStatement("SELECT * FROM $this->table WHERE id=?");
      $stmt->bind_param("i",$id);
      $stmt->execute();

      $stmt->bind_result($id, $id_pedido, $id_produto, $quantidade);
      $stmt->fetch();

      $pedido_produto = new Pedido_Produto($id, $id_pedido, $id_produto, $quantidade);
      $stmt->close();
      return $pedido_produto;
    }

    public function deleteById($id){
      $stmt = parent::prepareStatement("DELETE FROM $this->table WHERE id=?");
      $stmt->bind_param("i",$id);
      if($stmt->execute()){
        echo "<br> Excluido com sucesso!";
      }else{
        echo "<br> Erro ao excluir!";
      }

      $stmt->close();
    }

    public function update($id, $novoPedido_Produto){
      $stmt = parent::prepareStatement("UPDATE $this->table SET id_pedido=?, id_produto=?, quantidade=? WHERE id=?");
      $stmt->bind_param("iiii",$novoPedido_Produto->getPedido(),$novoPedido_Produto->getProduto(),$novoPedido_Produto->getQuantidade(),$id);
      if($stmt->execute()){
        echo "<br> Update realizado com sucesso!";
      }else{
        echo "<br> Erro ao atualizar registro!";
      }

      $stmt->close();
    }

    public function getByIdPedido($busca_id_pedido){
      $stmt = parent::prepareStatement("SELECT * FROM $this->table WHERE id_pedido=?");
      $stmt->bind_param("i",$busca_id_pedido);
      if($stmt->execute()){
        $stmt->bind_result($id, $id_pedido, $id_produto, $quantidade);


        $pedido_produto_array = array();

        while($stmt->fetch()){
          $result = new Pedido_Produto($id, $id_pedido, $id_produto, $quantidade);
          $pedido_produto_array[] = $result;
        }
      }else{
        echo "Erro ao consultar o banco de dados!";
      }

      $stmt->close();
      return $pedido_produto_array;
    }
  }

?>

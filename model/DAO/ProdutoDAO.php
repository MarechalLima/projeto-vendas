<?php
  require dirname(__FILE__).'/../../conexao.php';
  require dirname(__FILE__).'/../domain/Produto.php';

  class ProdutoDAO extends Connection{
    private $table = 'produto';


    public function insert($produto){
      print_r($produto->getQTDEstoque());

      $stmt = parent::prepareStatement("INSERT INTO produto(nome,preco,qtd_estoque) VALUES(?,?,?)");
      $stmt->bind_param("sdi", $produto->getNome(),$produto->getPreco(), $produto->getQTDEstoque());

      if($stmt->execute()){
        echo "Produto inseridos com sucesso!";
      }else{
        echo "Erro ao inserir dados!";
      }

      $stmt->close();

    }

    public function getAll(){
      $stmt = parent::prepareStatement("SELECT * FROM $this->table");
      if($stmt->execute()){
        $stmt->bind_result($id, $nome, $preco, $qtd_estoque);


        $prudutos = array();

        while($stmt->fetch()){
          $result = new Produto($id,$nome,$preco,$qtd_estoque);
          $produtos[] = $result;
        }
      }else{
        echo "Erro ao consultar o banco de dados!";
      }

      $stmt->close();
      return $produtos;
    }

    public function getById($id){
      $stmt = parent::prepareStatement("SELECT * FROM $this->table WHERE id=?");
      $stmt->bind_param("i",$id);
      $stmt->execute();

      $stmt->bind_result($id, $nome, $preco, $qtd_estoque);
      $stmt->fetch();

      $produto = new Produto($id,$nome,$preco,$qtd_estoque);
      $stmt->close();
      return $produto;
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

    public function update($id, $novoProduto){
      $stmt = parent::prepareStatement("UPDATE $this->table SET nome=?, preco=?, qtd_estoque=? WHERE id=?");
      $stmt->bind_param("sdii",$novoProduto->getNome(),$novoProduto->getPreco(),$novoProduto->getQTDEstoque(),$id);
      if($stmt->execute()){
        echo "<br> Update realizado com sucesso!";
      }else{
        echo "<br> Erro ao atualizar registro!";
      }

      $stmt->close();
    }
  }



 ?>

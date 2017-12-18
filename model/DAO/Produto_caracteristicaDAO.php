<?php
    //  require dirname(__FILE__).'/../../conexao.php';
      require dirname(__FILE__).'/../domain/Produto_caracteristica.php';

      class Produto_caracteristicaDAO extends Connection{

            private $table = "produto_caracteristica";


    public function insert($produto_caracteristica){
      $stmt = parent::prepareStatement("INSERT INTO $this->table(id_produto, id_caracteristica,valor) VALUES(?,?,?)");
      $stmt->bind_param("ii", $produto_caracteristica->getId_produto(),$produto_caracteristica->getId_caracteristica(),$produto_caracteristica->getValor());

      if($stmt->execute()){
        echo "Produto_caracteristica inserido com sucesso!";
      }else{
        echo "Erro ao inserir dados!";
      }

      $stmt->close();

    }

    public function getAll(){
      $stmt = parent::prepareStatement("SELECT * from $this->table");

      if($stmt->execute()) {
        $stmt->bind_result($id, $id_produto, $id_caracteristica,$valor);

        $caracteristica = array();

        while($stmt->fetch()) {
          $result = new Produto_caracteristica($id, $id_produto, $id_caracteristica,$valor);
          $caracteristica[] = $result;
        }

      } else {
        echo "Erro ao consultar o banco de dados!";
      }

      $stmt->close();
      return $caracteristica;
    }

    public function getById($id) {
      $stmt = parent::prepareStatement("SELECT * from $this->table where id = ?");
      $stmt->bind_param("i", $id);
      $stmt->execute();

      $stmt->bind_result($id, $id_produto, $id_caracteristica,$valor);
      $stmt->fetch();

      $caracteristica = new Produto_caracteristica($id, $id_produto, $id_caracteristica,$valor);

      $stmt->close();
      return $caracteristica;
    }

    public function getByIdProd($idProd) {
      $stmt = parent::prepareStatement("SELECT * from $this->table where id_produto = ?");
      $stmt->bind_param("i", $idProd);
      if($stmt->execute()) {
        $stmt->bind_result($id, $id_produto, $id_caracteristica,$valor);

        $caracteristicaProd = array();

        while($stmt->fetch()) {
          $result = new Produto_caracteristica($id, $id_produto, $id_caracteristica,$valor);
          $caracteristicaProd[] = $result;
        }

      } else {
        echo "Erro ao consultar o banco de dados!";
      }

      $stmt->close();
      return $caracteristicaProd;
    }

    public function deleteBYId($id){
      $stmt = parent::prepareStatement("DELETE FROM $this->table where id = ?");
      $stmt->bind_param("i", $id);

      if($stmt->execute()) {
        echo "<br> Excluído com sucesso";
      } else {
        echo "<br> Erro ao excluir!";
      }

      $stmt->close();
    }


}

?>

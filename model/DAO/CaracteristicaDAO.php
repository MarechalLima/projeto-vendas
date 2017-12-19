<?php
    require_once dirname(__FILE__).'/../../conexao.php';
    require dirname(__FILE__).'/../domain/Caracteristica.php';

    class CaracteristicaDAO extends Connection{
      private $table = 'caracteristica';

      public function insert($Caracteristica){
        $stmt = parent::prepareStatement("INSERT INTO caracteristica(id, titulo) values (?, ?)");
        $stmt->bind_param("is", $Caracteristica->getId(), $Caracteristica->getTitulo());

        if($stmt->execute()) {
          echo "Caracteristica inserida com sucesso";
        } else {
          echo "Erro ao inserir dados!";
        }
      }

      public function getAll(){
        $stmt = parent::prepareStatement("SELECT * FROM $this->table");

        if($stmt->execute()) {
          $stmt->bind_result($id, $titulo);

          $caracteriticas = array();

          while($stmt->fetch()) {
            $result = new Caracteristica($id, $titulo);
            $caracteriticas[] = $result;
          }
        } else {
          echo "Erro ao consultar dados!";
        }
        $stmt->close();
        return $caracteriticas;
      }

      public function getById($id) {
        $stmt = parent::prepareStatement("SELECT * FROM caracteristica where id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->bind_result($id, $titulo);
        $stmt->fetch();

        $caracteristica = new Caracteristica($id, $titulo);

        $stmt->close();

        return $caracteristica;
      }

      public function deleteById($id){
        $stmt = parent::prepareStatement("delete from $this->table where id = ?");
        $stmt->bind_param("i", $id);

        if($stmt->execute()) {
          echo "Excluído com sucesso!";
        } else {
          echo "Erro ao excluir!";
        }

        $stmt->close();
      }

      public function update($id, $novaCaracteristica) {
        $stmt = parent::prepareStatement("update $this->table set titulo = ? where id = ?");
        $stmt->bind_param("si", $novaCaracteristica->getTitulo(), $id);

        if($stmt->execute()) {
          echo "Update realizado com sucesso!";
        } else {
          echo "Erro ao realizar update!";
        }

        $stmt->close();
      }
    }
 ?>

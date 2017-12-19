<?php
  require_once dirname(__FILE__).'/../../conexao.php';
  require dirname(__FILE__).'/../domain/Funcionario.php';

  class FuncionarioDAO extends Connection{
    private $table = 'funcionario';

    public function  insert($Funcionario) {
      $stmt = parent::prepareStatement("INSERT INTO funcionario(cargo, login, nome, senha) values (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $Funcionario->getCargo(), $Funcionario->getLogin(), $Funcionario->getNome(), password_hash($Funcionario->getSenha(), PASSWORD_DEFAULT));

      if($stmt->execute()) {
        header('location: listaFuncionarios.php?Inserted=TRUE');
      } else {
        header('location: cadastro.php?Error=TRUE');
      }
  }

  public function getAll(){
    $stmt = parent::prepareStatement("SELECT * from $this->table");

    if($stmt->execute()) {
      $stmt->bind_result($id, $cargo, $login, $nome, $senha);

      $funcionarios = array();

      while($stmt->fetch()) {
        $result = new Funcionario($id, $cargo, $login, $nome, $senha);
        $funcionarios[] = $result;
      }

    } else {
      //echo "Erro ao consultar o banco de dados!";
    }

    $stmt->close();
    return $funcionarios;
  }

  public function getById($id) {
    $stmt = parent::prepareStatement("SELECT * from $this->table where id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $stmt->bind_result($id, $cargo, $login, $nome, $senha);
    $stmt->fetch();

    $funcionario = new Funcionario($id, $cargo, $login, $nome, $senha);

    $stmt->close();
    return $funcionario;
  }

  public function deleteBYId($id){
    $stmt = parent::prepareStatement("DELETE FROM $this->table where id = ?");
    $stmt->bind_param("i", $id);

    if($stmt->execute()) {
      return  true;
    } else {
      return false;
      }

    $stmt->close();
  }

  public function update($id, $novoFuncionario) {
    $stmt = parent::prepareStatement("update $this->table set cargo = ?, login = ?, nome = ?, senha = ? where id = ?");
    $stmt->bind_param("ssssi",  $novoFuncionario->getCargo(), $novoFuncionario->getLogin(), $novoFuncionario->getNome(), $novoFuncionario->getSenha(), $id);

    if($stmt->execute()) {
      //echo "Update realizado com sucesso!";
    } else {
      //echo "Erro ao realizar update";
    }

    $stmt->close();
  }
}
?>

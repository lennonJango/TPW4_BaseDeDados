<?PHP
require_once"/Connection/connect.php";

class controlador
{
    private $tabela="conta";
    //Inserir dados na base de dados 
    function inserir($nome, $apelido, $palavra_passe)
    {

      $sql="insert into $this->tabela(nome,apelido,palavra_passe) values (:nome,:apelido,:palavra_passe) ";

    $statement = ConnectarBase::prepare($sql);
    $statement->bindParam(":nome", $nome);
    $statement->bindParam(":apelido", $apelido);
    $statement->bindParam(":palavra_passe", $palavra_passe);
  

    return $statement->execute();

    }

    //Metodo que selecionar todos os users

     function selecionaTodosUser(){
      $sql = "select * from $this->tabela";
      $statement = ConnectarBase::prepare($sql);
       $statement->execute();
       return  $statement->fetchAll();

     }

     //Metodo que seleciona um user 
      function selecionarUmUsuario ($nome){
     $sql = "Select * from $this->tabela where nome=:$nome ";
     $statement = ConnectarBase::prepare($sql);
     $statement->execute();
     return $statement->fetch();

      }

      //Metodo para atualizar dados 
       function updateDados ($id,$nome,$apelido){
    $sql = "Update $this->tabela set nome=$nome , apelido=$apelido where id= $id";
    $statement = ConnectarBase::prepare($sql);
    $statement->bindParam(":id", $id);
    $statement->bindParam(":nome", $nome);
    $statement->bindParam(":apelido", $apelido);

      return $statement->execute();
       }
//Metodo que apaga todos os users
       function apagarTodosUsers(){
    $sql = "Delete from $this->tabela";
    $statement = ConnectarBase::prepare($sql);
    return $statement->execute();
       }
//Metodo que apaga um user 
  function apagarUmUser($id){
    $sql = "Delete from $this->tabela where id=:id";
    $statement = ConnectarBase::prepare($sql);
    return $statement->execute();
      
  }


}
?>
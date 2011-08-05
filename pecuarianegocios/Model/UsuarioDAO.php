<?
/*
 * Classe DAO para a tabela cliente.
 * Data Access Object que irá fazer operações na tabela Cliente (básica: Insert, Update, Delete e Lista)
 */

include_once("../PDOConnectionFactory.class.php");

class UsuarioDAO extends PDOConnectionFactory {
// irá receber uma conexão
    public $conex = null;

    // constructor
    public function __construct() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    // realiza uma inserção
    public function Insere( $user ) {
        try {

            $stmt = $this->conex->prepare("INSERT INTO tb_usuario (emailUsuario, senhaUsuario, codEmpresa) VALUES (?,?,?)");
            $stmt->bindValue(1, $user->getEmailUsuario());
            $stmt->bindValue(2, $user->getSenhaUsuario() );
            $stmt->bindValue(3, $user->getCodEmpresa() );


            // executo a query preparada
            $stmt->execute();

            // fecho a conexão
            $this->conex = null;
        // caso ocorra um erro, retorna o erro;
        }
        catch ( PDOException $ex  ) {
            echo "Erro: ".$ex->getMessage(); }
    }

    // realiza um Update
    public function Update( $user ) {
        try {
		   $this->conex = PDOConnectionFactory::getConnection();
        // preparo a query de update - Prepare Statement
            $stmt = $this->conex->prepare("UPDATE tb_usuario SET emailUsuario=?, senhaUsuario=?, codEmpresa=? WHERE codUsuario=?");
            $stmt->bindValue(1, $user->getEmailUsuario());
            $stmt->bindValue(2, $user->getSenhaUsuario() );
            $stmt->bindValue(3, $user->getCodEmpresa() );
		  $stmt->bindValue(4, $user->getCodUsuario() );

            // executo a query preparada
            $stmt->execute();

            //$this->conex->commit();

            // fecho a conexão
            $this->conex = null;
        // caso ocorra um erro, retorna o erro;
        }catch ( PDOException $ex  ) { echo "Erro: ".$ex->getMessage(); }
    }

    // remove um registro
    public function Deleta( $id ) {
        try {
		  $this->conex = PDOConnectionFactory::getConnection();  
            // executo a query
	   	  $query = "DELETE FROM usuario WHERE codigo in ($id) ";
		  $num = $this->conex->exec($query);
            // caso seja execuado ele retorna o número de rows que foram afetadas.
		  // desconecta
            $this->conex = null;
            if( $num >= 1 ) { return $num; } else { return 0; }
        // caso ocorra um erro, retorna o erro;
        }catch ( PDOException $ex  ) { echo "Erro: ".$ex->getMessage(); }
    }

    public function Lista($codigo = null) {
        try {
		   
		  $this->conex = PDOConnectionFactory::getConnection();  
            if( $codigo <> null)
                $param = " and codUsuario = $codigo ";

           	$query = " select codUsuario, emailUsuario, senhaUsuario, codEmpresa
                                                     from tb_usuario
                                                     where 1=1 $param";
              
                $stmt = $this->conex->query($query);

            // desconecta
            $this->conex = null;
            // retorna o resultado da query
            return $stmt;
        }catch( PDOException $ex ) {
            echo "Erro: ".$ex->getMessage();
        }
    }

    
    
}
      ?>
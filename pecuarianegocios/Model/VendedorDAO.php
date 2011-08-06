<?
/*
 * Classe DAO para a tabela cliente.
 * Data Access Object que irá fazer operações na tabela Cliente (básica: Insert, Update, Delete e Lista)
 */

include_once("../PDOConnectionFactory.class.php");

class VendedorDAO extends PDOConnectionFactory {
// irá receber uma conexão
    public $conex = null;

    // constructor
    public function __construct() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    // realiza uma inserção
    public function Insere( $vendedor ) {
        try {

            $stmt = $this->conex->prepare("INSERT INTO tb_vendedor (nomeVendedor, emailVendedor, telefoneVendedor, codEmpresa) VALUES (?,?,?,?)");
            $stmt->bindValue(1, $vendedor->getNomeVendedor());
            $stmt->bindValue(2, $vendedor->getEmailVendedor());
            $stmt->bindValue(3, $vendedor->getTelefoneVendedor());
            $stmt->bindValue(4, $vendedor->getCodEmpresa());


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
    public function Update( $vendedor ) {
        try {
		   $this->conex = PDOConnectionFactory::getConnection();
        // preparo a query de update - Prepare Statement
            $stmt = $this->conex->prepare("UPDATE tb_vendedor SET nomeVendedor=?, emailVendedor=?, telefoneVendedor=? WHERE codVendedor=? and codEmpresa = ?");
            $stmt->bindValue(1, $vendedor->getNomeVendedor());
            $stmt->bindValue(2, $vendedor->getEmailVendedor() );
            $stmt->bindValue(3, $vendedor->getTelefoneVendedor() );
            $stmt->bindValue(4, $vendedor->getCodVendedor() );
            $stmt->bindValue(5, $vendedor->getCodEmpresa() );

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
	   	  $query = "DELETE FROM tb_vendedor WHERE codVendedor in ($id) ";
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
                $param = " and codVendedor = $codigo ";

           	$query = " select codVendedor, nomeVendedor, emailVendedor, telefoneVendedor, codEmpresa
                                                     from tb_vendedor
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
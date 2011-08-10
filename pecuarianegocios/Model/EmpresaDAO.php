<?
/*
 * Classe DAO para a tabela cliente.
 * Data Access Object que irá fazer operações na tabela Cliente (básica: Insert, Update, Delete e Lista)
 */

include_once("../PDOConnectionFactory.class.php");

class EmpresaDAO extends PDOConnectionFactory {
// irá receber uma conexão
    public $conex = null;

    // constructor
    public function __construct() {
        $this->conex = PDOConnectionFactory::getConnection();
    }

    // realiza uma inserção
    public function Insere( $empresa ) {
        try {
echo $empresa->getDataCriacao(), $empresa->getDataVencimento(), $empresa->getAtiva();
            $stmt = $this->conex->prepare("INSERT INTO tb_empresa (dataCriacao, dataVenctoAssinatura, ativa) VALUES (?,?,?)");
            $stmt->bindValue(1, $empresa->getDataCriacao());
            $stmt->bindValue(2, $empresa->getDataVencimento() );
            $stmt->bindValue(3, $empresa->getAtiva() );
            $stmt->execute();

           $stmt2 = $this->conex->query(" SELECT LAST_INSERT_ID() AS ID;");

            $codEmpresa = 0;
            //sabemos que vai retornar só um registro, mas...
            foreach ($stmt2 as $rows) {
                $codEmpresa = $rows["ID"];
            }

            // fecho a conexão
            $this->conex = null;

            //se retornar zero certamente indica erro
            return $codEmpresa;
        }
        catch ( PDOException $ex  ) {
            echo "Erro: ".$ex->getMessage(); }
    }

    // realiza um Update
    public function UpdatePacote( $empresa ) {
        try {
		   $this->conex = PDOConnectionFactory::getConnection();
        // preparo a query de update - Prepare Statement
            $stmt = $this->conex->prepare("UPDATE tb_empresa SET valorPacote=?  WHERE codEmpresa = ?");
            $stmt->bindValue(1, $empresa->getValorPacote());
            $stmt->bindValue(2, $empresa->getCodEmpresa() );

            // executo a query preparada
            $stmt->execute();

            //$this->conex->commit();

            // fecho a conexão
            $this->conex = null;
        // caso ocorra um erro, retorna o erro;
        }catch ( PDOException $ex  ) { echo "Erro: ".$ex->getMessage(); }
    }

    
    
}
?>
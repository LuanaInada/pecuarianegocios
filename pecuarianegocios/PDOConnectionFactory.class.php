<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class PDOConnectionFactory {
// recebe a conexão
    public $con = null;
    // qual o banco de dados?
    public $dbType = "mysql";

    // parâmetros de conexão
    // quando não for necessário deixe em branco apenas com as aspas duplas ""
    public $host = "localhost";
    public $user = "root";
    public $senha = "vendasweb";
    public $db = "pecuarianegocios";

    // seta a persistência da conexão
    public $persistent = false;

    // new PDOConnectionFactory( true ) <--- conexão persistente
    // new PDOConnectionFactory() <--- conexao não persistente
    public function PDOConnectionFactory( $persistent=false ) {
    // verifico a persistência da conexao
        if( $persistent != false) { $this->persistent = true; }
    }

    public function getConnection() {
        try {
        // realiza a conexão
            $this->con = new PDO($this->dbType.":host=".$this->host.";dbname=".$this->db, $this->user, $this->senha,
                array( PDO::ATTR_PERSISTENT => $this->persistent ) );
             $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // realizado com sucesso, retorna conectado
            return $this->con;
        // caso ocorra um erro, retorna o erro;
        }catch ( PDOException $ex  ){ echo "Erro: ".$ex->getMessage(); }

    }

    // desconecta
    public function Close() {
        if( $this->con != null )
            $this->con = null;
    }

}

?>

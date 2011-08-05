<?php

/**
 * Description of Usuario.class
 *     
 * @author Igor Fonseca
 * Classe de estrutura da tabela agenda.
 * Contém a mesma estrutura da tabela, os campos da tabela com os seus Get's e Set's
 */


class Usuario {

    public $codUsuario;
    public $emailUsuario;
    public $senhaUsuario;
    public $codEmpresa;

   public function getCodUsuario() {
        return $this->codUsuario;
    }

    public function setCodUsuario($codUsuario) {
        $this->codUsuario = $codUsuario;
    }

    public function getEmailUsuario() {
        return $this->emailUsuario;
    }

    public function setEmailUsuario($emailUsuario) {
        $this->emailUsuario = $emailUsuario;
    }

    public function getSenhaUsuario() {
        return $this->senhaUsuario;
    }

    public function setSenhaUsuario($senhaUsuario) {
        $this->senhaUsuario = $senhaUsuario;
    }

    public function getCodEmpresa() {
        return $this->codEmpresa;
    }

    public function setCodEmpresa($codEmpresa) {
        $this->codEmpresa = $codEmpresa;
    }


}

?>

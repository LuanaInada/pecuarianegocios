<?php

/**
 * Description of Usuario.class
 *     
 * @author Igor Fonseca
 * Classe de estrutura da tabela agenda.
 * Contém a mesma estrutura da tabela, os campos da tabela com os seus Get's e Set's
 */


class Vendedor {

    public $codVendedor;
    public $nomeVendedor;
    public $emailVendedor;
    public $telefoneVendedor;
    public $codEmpresa;

   public function getCodVendedor() {
        return $this->codVendedor;
    }

    public function setCodVendedor($codVendedor) {
        $this->codVendedor = $codVendedor;
    }

    public function getNomeVendedor() {
        return $this->nomeVendedor;
    }

    public function setNomeVendedor($nomeVendedor) {
        $this->nomeVendedor = $nomeVendedor;
    }

    public function getEmailVendedor() {
        return $this->emailVendedor;
    }

    public function setEmailVendedor($emailVendedor) {
        $this->emailVendedor = $emailVendedor;
    }

    public function getTelefoneVendedor() {
        return $this->telefoneVendedor;
    }

    public function setTelefoneVendedor($telefoneVendedor) {
        $this->telefoneVendedor = $telefoneVendedor;
    }

    public function getCodEmpresa() {
        return $this->codEmpresa;
    }

    public function setCodEmpresa($codEmpresa) {
        $this->codEmpresa = $codEmpresa;
    }
}

?>

<?php

/**
 * Description of Usuario.class
 *     
 * @author Igor Fonseca
 * Classe de estrutura da tabela agenda.
 * Contém a mesma estrutura da tabela, os campos da tabela com os seus Get's e Set's
 */


class Empresa {

    public $codEmpresa;
    public $valorPacote;
    public $dataCriacao;
    public $dataVencimento;
    public $ativa;

   public function getCodEmpresa() {
        return $this->codEmpresa;
    }

    public function setCodEmpresa($codEmpresa) {
        $this->codEmpresa = $codEmpresa;
    }

    public function getValorPacote() {
        return $this->valorPacote;
    }

    public function setValorPacote($valorPacote) {
        $this->valorPacote = $valorPacote;
    }

    public function getDataCriacao() {
        return $this->dataCriacao;
    }

    public function setDataCriacao($dataCriacao) {
        $this->dataCriacao = $dataCriacao;
    }

    public function getDataVencimento() {
        return $this->dataVencimento;
    }

    public function setDataVencimento($dataVencimento) {
        $this->dataVencimento = $dataVencimento;
    }

    public function getAtiva() {
        return $this->ativa;
    }

    public function setAtiva($ativa) {
        $this->ativa = $ativa;
    }


}

?>

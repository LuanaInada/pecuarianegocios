<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once "../Model/Empresa.php";
include_once "../Model/EmpresaDAO.php";
include_once "../Model/Vendedor.php";
include_once "../Model/VendedorDAO.php";

$acao = $_POST["acao"];
$codEmpresaNew = $_POST["codEmpresa"];
echo $acao;
if($acao ==  "identificacao"){

        $empresa = new Empresa();
        $empresa->setDataCriacao(Date("Y-m-d"));
        $empresa->setAtiva(1);
        $empresa->setDataVencimento( Date("Y-m-d"));

        $empresaDAO = new EmpresaDAO();
        $codEmpresa = $empresaDAO->Insere($empresa);

        if($codEmpresa > 0 ){
            $vendedor = new Vendedor();
            $vendedor->setCodEmpresa($codEmpresa);
            $vendedor->setEmailVendedor($_POST["email"]);
            $vendedor->setNomeVendedor($_POST["nome"]);
            $vendedor->setTelefoneVendedor($_POST["telefone"]);

            $vendedorDAO = new VendedorDAO();
            $vendedorDAO->Insere($vendedor);
        }
    echo "<script>window.location='../Cadastrar.php?acao=plano&new=$codEmpresa'</script>";
}
else if($acao == "plano"){
    $plano = $_POST["ckplano1"];
    $empresaDAO = new EmpresaDAO();
    $empresa = new Empresa();
    $empresa->setCodEmpresa($codEmpresaNew);
    $empresa->setValorPacote($plano);

    $empresaDAO->UpdatePacote($empresa);

    
}
?>

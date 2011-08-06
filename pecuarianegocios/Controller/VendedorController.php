<?
session_start();

include "../Model/Vendedor.php";
include "../Model/VendedorDAO.php";


$acao =         $_POST['acao']          ? $_POST['acao']         : $_GET["acao"];
$codigo=        $_POST['Codigo']       ? $_POST['Codigo']      : $_GET["codigo"];

$vendedorDAO = new VendedorDAO();

$nomeVendedor =  $_POST['Nome']  ? $_POST['Nome']   : $row['nomeVendedor'] ;
$emailVendedor =  $_POST['Email']  ? $_POST['Email']   : $row['emailVendedor'] ;
$telefoneVendedor =  $_POST['Telefone']  ? $_POST['Telefone']   : $row['telefoneVendedor'] ;
$codEmpresa =  $_SESSION["codEmpresa"]  ? $_SESSION["codEmpresa"]   : $row['codEmpresa'];


if(isset($_POST['acao'])) {

    $vendedor = new Vendedor();
    $vendedor-> setNomeVendedor($nomeVendedor);
    $vendedor-> setEmailVendedor($emailVendedor);
    $vendedor-> setTelefoneVendedor($telefoneVendedor);
    $vendedor-> setCodEmpresa($codEmpresa);


    if ($acao == 'inserir') {
        $vendedorDAO->Insere($vendedor);
    }
    else if ($acao == 'salvar') {
           $vendedor->setCodVendedor($codigo);
           $vendedorDAO->Update($vendedor);
    }
    else if ($acao == 'excluir'){
	 $vendedorDAO->Deleta($codigo);
    }
}

function listaVendedor(){
    $dao = new VendedorDAO;
    return $dao->Lista();
}
?>

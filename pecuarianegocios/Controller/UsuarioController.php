<?
session_start();

include "../Model/Usuario.php";
include "../Model/UsuarioDAO.php";


$acao =         $_POST['acao']          ? $_POST['acao']         : $_GET["acao"];
$codigo=        $_POST['Codigo']       ? $_POST['Codigo']      : $_GET["codigo"];

$userDAO = new UsuarioDAO();

$usu_logon =  $_POST['Login']  ? $_POST['Login']   : $row['emailUsuario'] ;
$usu_senha =  $_POST['Senha']  ? $_POST['Senha']   : $row['senhaUsuario'];
$codEmpresa =  $_POST['CodEmpresa']  ? $_POST['CodEmpresa']   : $row['codEmpresa'];


if(isset($_POST['acao'])) {

    $user = new Usuario();
    $user->setEmailUsuario($usu_logon);
    $user->setSenhaUsuario($usu_senha);
    $user->setCodEmpresa($codEmpresa);


    if ($acao == 'inserir') {
        $userDAO->Insere($user);
    }
    else if ($acao == 'salvar') {
           $user->setCodUsuario($codigo);
           $userDAO->Update($user);
    }
    else if ($acao == 'excluir'){
	 $userDAO->Deleta($codigo);
    }
}
?>

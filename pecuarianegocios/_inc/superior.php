<?
session_start();
$path = "..";
//$_SESSION["pathSistema"] = $path;

/*include "$path/_util/valida.php";

$mensagem = $_GET['mensagem'];
if ($mensagem == "fechar"){
	session_destroy();
	header("Location:../index.html");
	exit;
}
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
                <title>Sistema de Gerencimento de An&uacute; 1.0 - Pecu&aacute;ria Neg&oacute;cios </title>
		<link type="text/css" rel="stylesheet" href="../_css/conteudo.css" />
		<script language="javascript" type="text/javascript">
			function foca() {
				var g = document.login;
				if (g.username.value.length == 0) {
					g.username.focus();
					return false;
				}
			}
			
			function validarForm(){
				document.form.submit();
			}
			
			function validaBusca() {
				var termo_busca;
				termo_busca = document.getElementById("termo_busca").value;

				if (termo_busca == "Buscar projeto �") {
					alert("Digite um termo para buscar");
				} else {
					document.formBuscar.submit();
				}
			}
			
			function confirma(form) {
				if(confirm('Deseja excluir este projeto?')) {
					form.submit();
				}
			}
		</script>
	</head>
	<body>
		<div id="conteudo">
			<div id="topo">
				<div class="titulo">
					Pecu&aacute;ria Neg&oacute;cios 1.0
                                        <p class="subtitulo">Sistema de Gerencimento de An&uacute;cios</p>
				</div>
				<div class="logo"> LOGO </div>
			</div>

<?
	
//1 passo - conectar ao servidor MySql

/* INFORMA��ES DO BANCO DE DADOS"*/

	$servidor_db = "localhost";
	$usuario_db = "root";
	$senha_db = "";
	$nome_db = "pecuarianegocios";

// criar uma var�vel valida para chama-la no arquivo main.php

//$valida = "valida.php";


if (!($con = mysql_pconnect($servidor_db,$usuario_db,$senha_db))) {
	echo "<P align='center'><big><strong>Nao foi poss�vel estabelecer
		uma conexao com o gerenciador MySql. Favor contactar o Administrador.
		</strong></big></p>";
		
	exit;
}
// 2 passo - Seleciona o Banco de Dados

if (!($db=mysql_select_db($nome_db,$con))) {
	echo "<p align='center'><big><strong>Nao foi poss�vel estabelecer
		uma conexao com o gerenciador MySql. Favor contactar o Administrador.
		</strong></big></p>";
	exit;
	
}

?>
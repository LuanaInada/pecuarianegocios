<?
session_start();

$tipo = "l"; //variavel de controle no acesso: � l(�le) e n�o 1(um)

//abreviar as variaveis. pegar os valores das textfields...

$username = $_POST["username"];
$senha = $_POST["senha"];

//elimina os espaços em branco � esquerda das variaveis.

$username = trim($username);
$senha = trim($senha);

//testar se os valores sao diferentes de vazio.

if (empty($username) || empty($senha)) {
    $situacao = 0;
   // $redireciona = "mensagem.php?tipo=$tipo&situacao=$situacao";
    //header("Location:$redireciona");
    echo "<script> alert('Usuario ou senha incorreta. Informe novamente!')</script>";
    echo "<script>window.location='index.html'</script>";
    exit;

}

require("conecta.php");

$sql = "select codUsuario, codEmpresa, emailUsuario, senhaUsuario
                    from tb_usuario where emailUsuario ='$username'and senhaUsuario ='$senha' ";
$query = mysql_query($sql);
$result = mysql_num_rows($query);
$linha = mysql_fetch_array($query);	

//echo $sql;

if ($result == 0) {
    $situacao = 1;
    echo "<script> alert('Usuario nao existe. Favor informar usuario e senha corretamente!')</script>";
    echo "<script>window.location='index.html'</script>";
    exit;

}
else {
//$linha = mysql_fetch_array($query);

    $sqlAtiva = "select ativa
                    from tb_empresa where codEmpresa = " . $linha[0];
    $query = mysql_query($sqlAtiva);
    $result = mysql_num_rows($query);
    $linhaAtiva = mysql_fetch_array($query);

    if($linhaAtiva[0] == 0){

        echo "<script> alert('Sua licença ainda não está ativa.')</script>";
        echo "<script>window.location='index.html'</script>";
        exit;

    }
   
    $_SESSION["codUsuario"] = $linha[0];
    $_SESSION["codEmpresa"] = $linha[1];
    $_SESSION["emailUsuario"] = $linha[2];
    $_SESSION["senhaUsuario"] = $linha[3];
    $_SESSION["empresaAtiva"] = $linhaAtiva[0];
    
    echo "<script>window.location='View/index.php'</script>";
}

mysql_close();
// session_destroy();

?>
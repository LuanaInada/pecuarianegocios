<?
session_start();

if(isset($_SESSION["login"]))
    $username = $_SESSION["login"];

if(isset($_SESSION["senha"]))
    $senha = $_SESSION["senha"];

if(!(empty($username) || empty($senha))) {


    require("conecta.php");

    $sql = "select usu_logon, usu_senha from tb_usuarios where usu_logon='$username'and usu_senha='$senha'";
    $query = mysql_query($sql);
    $result = mysql_num_rows($query);

    if ($result == 1) {
        $linha = mysql_fetch_array($query);


        if($senha != $linha[1]) {
            session_destroy();
            echo "<script> alert('Usuário ou senha incorreta. Informe novamente!')</script>";
            echo "<script>window.location='index.html'</script>";
            exit;

        }

    } else {
        session_destroy();
        echo "<script> alert('Voce nao efetuou Login!')</script>";
        //echo "<br><a href=\"index.html\">Voltar</a>";
        echo "<script>window.location='index.html'</script>";
        exit;
    }
} else {
   // echo "<script> alert('Voce nao efetuou Login!')</script>";
    //echo "<br><a href=\"index.html\">Voltar</a>";
    echo "<script>window.location='index.html'</script>";
    exit;
}
mysql_close();
?>
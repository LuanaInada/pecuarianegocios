<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$acao = $_GET["acao"];
$codEmpresa = $_GET["new"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Gerencimento de Anúncios 1.0 - Pecuária Negócios</title>
<link type="text/css" rel="stylesheet" href="_css/conteudo.css" />

</head>
<body>
<div id="conteudo">
<fieldset>
    <legend>Cadastre-se e anuncie seus produtos no Pecu&aacute;ria Neg&oacute;cios.</legend>
    <? if($acao == "" || $acao == "identificacao") {?>
		<form action="Controller/CadastrarController.php" method="post" name="formCadastro" id="formCadastro">
                    <input type="hidden" name="acao" value="identificacao"/>
                            </br>

                            <p class="subtitulo">Passo 1 - Identifica&ccedil;&atilde;o:</p>
                        </br>
                        <table>

                            <tr>
                                <td>Nome ou Raz&atilde;o Social:</td>
                                <td><input name="nome" type="text" id="nome" size="30" maxlength="30" /></td>
                            </tr>

                             <tr>
                                <td>CPF ou CNPJ:</td>
                                <td><input name="cpf_cnpj" type="text" id="cpf_cnpj" style="width: 167px;float: left" /></td>
                            </tr>

                            <tr>
                                <td>E-mail:</td>
                                <td><input name="email" type="text" id="email" style="width: 167px;float: left" /></td>
                            </tr>

                            <tr>
                                <td>Endere&ccedil;o:</td>
                                <td><input name="endereco" type="text" id="endereco" style="width: 167px;float: left" /></td>
                            </tr>

                            <tr>
                                <td>CEP:</td>
                                <td><input name="cep" type="text" id="cep" style="width: 167px;float: left" /></td>
                            </tr>

                            <tr>
                                <td>Telefone:</td>
                                <td><input name="telefone" type="text" id="tlefone"/></td>
                            </tr>

                            <tr>
                                <td>Senha:</td>
                                <td><input name="senha" type="password" id="senha"/></td>
                            </tr>

                            <tr>
                                <td>Confirme sua senha:</td>
                                <td><input name="senhaConfirmacao" type="password" id="senhaConfirmacao" /></td>
                            </tr>
                        </table>
                          
                        <input type="submit" name="Submit" value="Próximo passo " />
		</form>
    <?}else if($acao == "plano"){
        ?>
            <form action="Controller/CadastrarController.php" method="post" name="formCadastro" id="formCadastro">
                    <input type="hidden" name="acao" value="plano">
                    <input type="hidden" name="codEmpresa" value="<?=$codEmpresa;?>">
                            </br>

                            <p class="subtitulo">Passo 2 - Plano de An&uacute;ncios:</p>
                        </br>
                        <table>

                            <tr>
                                <td><input type="checkbox" name="ckplano1" id="ckplano1" value="50"></td>
                                <td>6 meses</td>
                                <td>R$ 50,00</td>
                            </tr>
                             <tr>
                                <td><input type="checkbox" name="ckplano1" id="ckplano1" value="90"></td>
                                <td>12 meses</td>
                                <td>R$ 90,00</td>
                            </tr>
                        </table>

                    <input type="submit" name="Submit" value="Enviar " style="float: right" />
           </form>
    <?}?>
  </fieldset>
</div>
</body>
</html>
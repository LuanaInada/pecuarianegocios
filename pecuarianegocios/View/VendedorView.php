<?
include "../Controller/VendedorController.php";
include "../_inc/superior.php"; 
?>


	<div id="breadcrumb">
		<a href="index.php">Home</a> -> Gerenciador de Vendedores
		<? if ($_POST["editar"]) { ?> -> Editar <? } ?>
		<? if ($_POST["acao"] == "cadastrar") { ?> -> Cadastrar <? } ?>
		<a href="index.php?mensagem=fechar" class="sair">Sair</a>
	</div>

	
	<div class="formulario_2">
		<? if ($_POST["acao"] <> "cadastrar") { ?>
		<div class="botoes_2">
			<form name="formNovoVendedor" method="post" class="floatLeft">
				<input type="hidden" value="cadastrar" name="acao" id="acao" />
				<input type="submit" id="btnCad" name="btnCad" value="Novo vendedor" class="inputButton"/>
			</form>
		</div>
		<? } ?>
		<? if ($_POST["acao"] == "cadastrar") { ?>
	
		<h1>Cadastrar Vendedor</h1>
		<form name="formCad" method="post" class="floatLeft">
		<input type="hidden" value="inserir" name="acao" id="acao" /> 
		
			<table class="tabela" cellpadding="0" cellspacing="0">
				<tr class="titulo">
					<td width="237px">Nome</td>
					<td width="237px">E-mail</td>
                                        <td width="237px">Telefone</td>
					<td align="center" width="65px">A&ccedil;&otilde;es</td>
				</tr>
				<tr>
					<td> <input type="text" id="Nome" name="Nome" class="inputText"  /> </td>
					<td> <input type="text" id="Email" name="Email" class="inputText"  /> </td>
                                        <td> <input type="text" id="Telefone" name="Telefone" class="inputText"  /> </td>
					<td align="center">
						<img src="../_img/icon_cancel.jpg" style="cursor:pointer" alt="Cancelar" onClick="location.href='UsuarioCad.php'" />
						<input type="image" src="../_img/icon_save.jpg" id="btnSalvar" name="btnSalvar" />
					</td>
				</tr>
			</table>
		<? } else { ?>
		
		<h1>Gerenciador de Vendedores</h1>
		<table class="tabela" cellpadding="0" cellspacing="0">
			<tr class="titulo">
				
				<td width="237px">Nome</td>
				<td width="237px">E-mail</td>
                                <td width="237px">Telefone</td>
				<td align="center" width="65px">A&ccedil;&otilde;es</td>
			</tr>
			<? 
			foreach (listaVendedor() as $row){
				$item =  "editar" . $row["codVendedor"];
				if ($_POST["editar"] == $item) {
					echo "<script>document.formUpdate.Nome.focus();</script>";		
			?>
			<form name="formUpdate" id="formUpdate" method="post" class="floatLeft">
				<input type="hidden" value="salvar" name="acao" id="acao" />
				<input type="hidden" value="<?=$row["codVendedor"]?>" name="Codigo" id="Codigo" />
				
				<tr>
					
					<td> <input type="text" id="Nome" name="Nome" value="<?=$row["nomeVendedor"]?>" class="inputText"  /> </td>
					<td> <input type="text" id="Email" name="Email" value="<?=$row["emailVendedor"]?>" class="inputText"  /> </td>
                                        <td> <input type="text" id="Telefone" name="Telefone" value="<?=$row["telefoneVendedor"]?>" class="inputText"  /> </td>
					<td align="center">
						<img src="../_img/icon_cancel.jpg" onClick="location.href='TelefoneController.php'" />
						<input type="image" src="../_img/icon_save.jpg" id="btnSalvar" name="btnSalvar" value="Salvar" />
					</td>
				</tr>
				
			</form>
			
				<? } else { ?>
				<tr>
					
					<td><?=$row["nomeVendedor"]?></td>
                                        <td><?=$row["emailVendedor"]?></td>
					<td><?=$row["telefoneVendedor"]?></td>
					<td align="center">
						<form name="formEditar" method="post" class="floatLeft" style="margin-left: 10px">
							<input type="hidden" value="editar<?=$row["codVendedor"]?>" name="editar" id="editar" />
							<input type="image" src="../_img/icon_edit.png" id="btnEdit" name="btnEdit" />
						</form>
						<form name="formExcluir" method="post" class="floatLeft" style="margin-left: 5px;">
							<input type="hidden" value="excluir" name="acao" id="acao" />
							<input type="hidden" value="<?=$row["codVendedor"]?>" name="Codigo" id="Codigo" />
							<input type="image" src="../_img/icon_delete.jpg" id="excluir" name="excluir" />
						</form>
					</td>
				</tr>
				<? }
			} ?>
			</table> <?
			}
			?>
		<div class="botoes">
			<input type="button" value="Voltar" onClick="location.href='index.php'" class="inputButton" />
		</div>
	</div>

<? include "../_inc/inferior.php"; ?>

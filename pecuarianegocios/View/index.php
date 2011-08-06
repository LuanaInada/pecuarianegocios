<? include("../_inc/superior.php") ?>
	<div id="breadcrumb">
		Olá <?=$_SESSION["nome"]?>, seja bem-vindo(a).
		<a href="index.php?mensagem=fechar" class="sair">Sair</a>
	</div>

	<div id="navi">

		<ul class="menu">
			<li class="title">Meus Cadastros</li>
                        <li><a href="AnunciosController.php">Gerenciador de An&uacute;ncios</a></li>
                        <li><a href="UsuarioView.php">Gerenciador de Usu&aacute;rios</a></li>
                        <li><a href="VendedorView.php">Gerenciador de Vendedores</a></li>
		</ul>

		<ul class="menu">
                    <li class="title">Minhas Configura&ccedil;&otilde;es</li>
			<li><a href="GeraisController.php">Configura&ccedil;&otilde;es Gerais</a></li>
                        <li><a href="ConfigImagens.php">Configurações de Imagens</a></li>
                        <li><a href="TopicosAjuda.php">T&oacute;picos de Ajuda</a></li>
		</ul>

	</div>
<? include("../_inc/inferior.php") ?>
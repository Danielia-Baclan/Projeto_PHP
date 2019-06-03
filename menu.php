<?php   if (session_status() == PHP_SESSION_NONE)
{
	session_start();
}

if (empty($_SESSION)) // se não houver sessão registrada, se estiver vazia
{ // usuário não está logado
	// menu A;
	$itens = '<li class="nav-item">
		<a href="cadastro.php" class="nav-link">Cadastre-se</a>
	</li>
	<li class="nav-item">
		<a href="login.php" class="nav-link">Entrar</a>
	</li>
	<li class="nav-item">
		<a href="loginadm.php" class="nav-link">Sou administrador</a>
	</li>';
}
else // senão
{ // usuário está logado
	//menu B;

	if (!empty($_SESSION['tipo']))
	{
		$itens = '<li class="nav-item">
		<a href="listaradm.php" class="nav-link">Minha Lista</a>
	</li>
	
	<li class="nav-item">
		<a href="logoutadm.php" class="nav-link">Sair</a>
	</li>

	&nbsp&nbsp&nbsp&nbsp&nbsp<form method="post" action="pesqadm.php">
			<label><b>Pesquise um produto pelo nome aqui:</b></label>
			<input type="text" name="pesquisar" placeholder="Pesquisar">
			<input type="submit" value="=>">
		</form>';
	}
	else
	{
	$itens = '<li class="nav-item">
		<a href="listar.php" class="nav-link">Minha Lista</a>
	</li>
	
	<li class="nav-item">
		<a href="logout.php" class="nav-link">Sair</a>
	</li>

	&nbsp&nbsp&nbsp&nbsp&nbsp<form method="post" action="pesq.php">
			<label><b>Pesquise um produto pelo nome aqui:</b></label>
			<input type="text" name="pesquisar" placeholder="Pesquisar">
			<input type="submit" value="=>">
		</form>';

	}
	
} 
	

?>

<br>
<ul class="nav nav-tabs">
	<li class="nav-item">
		<a href="index.php"  class="nav-link">Home</a>
	</li>
	<?php echo $itens; ?>
</ul>
<br>
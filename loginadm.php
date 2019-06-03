<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Login</title>
</head>
<body class="container">

	<?php 
	include 'menu.php'; 
	include 'func.php';
	verificar_msg();
	?>

	<h3 class="text-primary">Login para administradores</h3>
	<br>

	<form name="login" action="validaradm.php" method="post">
		
		<p>
			<label>Nome de <b>administrador</b> ou E-mail:</label><br>
			<input type="text" name="nome">
		</p>

		<p>
			<label>Senha:</label><br>
			<input type="password" name="senha">
		</p>

		<p>
			<button type="submit" class="btn btn-primary">
			Entrar
			</button>
		</p>

	</form>


</body>
</html>
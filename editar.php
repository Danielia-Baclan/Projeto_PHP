<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<title>Editar produto</title>
</head>
<body class="container">

	<?php 

	include 'menu.php';

	if (!empty($_GET['id_produto']))
	{
		$id_produto = $_GET['id_produto'];
		
		include 'conn.php';

		$sql = "SELECT id_produto, produto, cor, preco, validade, id_usuario FROM tb_produto WHERE id_produto =" . $id_produto;

		$resultado = mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn) > 0)
		{
			$produto = mysqli_fetch_assoc($resultado);
		?>

		<h2 class="text-info">Editar Produto</h2>
		<form name="form_editar" action="editado.php" method="post">
		
		<p>
			<label>Produto:</label><br>
			<input type="text" name="prod" class="campo" value="<?php echo $produto['produto']; ?>">
		</p>

		<p>
			<label>Cor:</label><br>
			<input type="text" name="cor" class="campo" value="<?php echo $produto['cor']; ?>">
		</p>
		<p>
			<label>Preço:</label><br>
			<input type="number" name="preco" class="campo" step="0.01" value="<?php echo $produto['preco']; ?>">
		</p>

		<p>
			<label>Data de validade:</label><br>
			<input type="date" name="data" value="<?php echo $produto['validade']; ?>"><br>
			<label>*Caso o produto não tenha validade deixar no formato atual</label>
		</p>

		<input type="hidden" name="id_produto" value="<?php echo $produto['id_produto'];  ?>">
		<input type="hidden" name="id_usuario" value="<?php echo $produto['id_usuario'];  ?>">

		<p>
			<button name="btn_editar" type="submit" class="btn btn-warning">Editar</button>
		</p>
	

		</form>

		<?php
		}
		else
		{
			session_start();
			if (!empty($_SESSION['tipo']))
			{
				header('location:listaradm.php?msg=edtError2');
			}
			else
			{
			header('location:listar.php?msg=edtError2');
			}
		}
	}
	else
	{
		session_start();
			if (!empty($_SESSION['tipo']))
			{
				header('location:listaradm.php?msg=edtError1');
			}
			else
			{
			header('location:listar.php?msg=edtError1');
			}
	}

 	?>

</body>
</html>
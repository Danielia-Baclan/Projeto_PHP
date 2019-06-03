<?php include 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Pesquisa</title>
</head>
<body class="container">

<?php include 'conn.php';

if(empty($_POST['pesquisar']))
{
	header('location:listar.php?msg=sempesq');
}
else
{

	$pesquisa = $_POST['pesquisar'];

	$id_usuario = $_SESSION['id_usuario'];

	$sql = "SELECT id_produto, produto, cor, preco, validade FROM tb_produto INNER JOIN tb_usuario ON tb_produto.id_usuario = tb_usuario.id_usuario
	WHERE tb_produto.id_usuario = $id_usuario AND produto like '%$pesquisa%' limit 4";

	$resultado = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		$produtos = array();

			echo '<table class="table table-hover">';
			echo '<tr>';
			echo '<th>#</th>';
			echo '<th>Produto</th>';
			echo '<th>Cor</th>';
			echo '<th>Preço R$</th>';
			echo '<th>Valido até</th>';
			echo '<th colspan="2" class="text-center">Ações</th>';
			echo '</tr>';

		while ($produtos = mysqli_fetch_assoc($resultado))
		{
			echo '<tr>';
			foreach ($produtos as $coluna_atual => $valor_atual)
			{
				
				if($coluna_atual =='id_produto')
				{
					$id_produto = $valor_atual;
				}
				else if ($coluna_atual == 'validade')
				{
					if ($valor_atual == '0000-00-00')
					{
						$valor_atual = 'Indeterminado';
					}
					else
					{
					$valor_atual =  date("d/m/Y", strtotime($valor_atual)); 
					}
				}

				echo '<td>' . $valor_atual . '</td>';
			}
			echo '<td class="text-center"><a href="editar.php?id_produto='.$id_produto.'"class="btn btn-warning">Editar</a></td>';

			echo '<td class="text-center"><a href="deletar.php?id_produto='.$id_produto.'"class="btn btn-danger" onClick="return confirm(\'Deseja deletar o produto?\')">Deletar</a>';

			echo '</tr>';
		}

		echo '</table>';

		echo '<a href="listar.php">Voltar</a>';

	}
	else
	{
		echo '<h3 class="alert alert-info">Não há produtos para listar nesta pesquisa.</h3>';
		echo '<a href="listar.php">Voltar</a>';
	}
}


?>

</body>
</html>
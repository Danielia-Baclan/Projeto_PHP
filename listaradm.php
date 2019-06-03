<?php include 'lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Minha Lista</title>
</head>
<body class="container">

	<?php 

	// inclui dependências
	include 'menu.php';
	include 'func.php';
	include 'conn.php';

	// chama função que verifica se há parâmetro 'msg' recebido nesta página

	verificar_msg();

	?>
		<h3 class="text-info">&nbsp Bem vindo(a) administrador(a) !!</h3>
		<h3 class="text-primary">&nbsp <?php echo "Lista completa de todos os produtos <b>"; ?></b> 
		</h3>


	<?php

	$id_adm = $_SESSION['id_usuario'];

	// cria comando sql:
	$sql = "SELECT * FROM tb_produto";

	// executa comando sql
	$resultado = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		$produtos = array();

			//encapsulando a tabela em um formulário para poder excluir vários eventos juntos:
			echo '<form action="deletar.php" method="post">';
			//montando estrutura da tabela
			echo '<table class="table table-hover">';
			echo '<tr>';
			echo '<th>#</th>';
			echo '<th>Produto</th>';
			echo '<th>Cor</th>';
			echo '<th>Preço R$</th>';
			echo '<th>Valido até</th>';
			echo '<th>ID do criador</th>';
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

			echo ' <input type="checkbox" name="selecionado[]" value="'.$id_produto.'"></td>';

			echo '</tr>';
		}

		echo '</table>';
		
		echo '<p class="text-right"><button type="submit" class="btn btn-outline-danger" onClick="return confirm(\'Deseja deletar selecionados?\')">Deletar selecionados</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</p>';
		echo '</form>';

	}
	else
	{
		echo '<h3 class="alert alert-info">Não há produtos para listar.</h3>';
	}


	?>

	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	
</body>
</html>
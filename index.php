<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>Home</title>
</head>
<body class="container">

	<?php include 'menu.php';
	include 'conn.php'; ?>

	<h3 class="text-primary">Bem vindo(a) ao</h3>
	<h3 class="text-success">Minha lista de produtos personalizada!!</h3>


<?php include 'carousel.php'; ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	

	<?php  
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}

if (empty($_SESSION)) 
{ 
	echo '<h3>Bem vindo(a) Faça login ou cadastre-se</h3>';
}
else
{ 
	if (!empty($_SESSION['tipo']))
	{
				$id_usuario = $_SESSION['id_usuario'];

				$sql = "SELECT * FROM tb_produto order by id_produto DESC limit 10";

				$resultado = mysqli_query($conn, $sql);

				if(mysqli_affected_rows($conn) > 0)
				{
					$produtos = array();

				?>

					<br>
					<h3 class="text-primary"><?php echo "Últimos produtos cadastrados pelos usuários<b>"; ?></b></h3>

				<?php

					echo '<table class="table table-hover">';
						echo '<tr>';
						echo '<th>#</th>';
						echo '<th>Produto</th>';
						echo '<th>Cor</th>';
						echo '<th>Preco</th>';
						echo '<th>Validade</th>';
						echo '<th>ID do criador</th>';
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
				    }
				}
	}
	else if (empty($_SESSION['tipo']))
	{
				$id_usuario = $_SESSION['id_usuario'];

				$sql="SELECT id_produto, produto, cor, preco, validade FROM tb_produto INNER JOIN tb_usuario ON tb_produto.id_usuario = tb_usuario.id_usuario
				WHERE tb_produto.id_usuario = $id_usuario order by id_produto DESC limit 10";

				$resultado = mysqli_query($conn, $sql);

				if(mysqli_affected_rows($conn) > 0)
				{
					$produtos = array();

					?>

					<br>
					<h3 class="text-primary"><?php echo "Últimos produtos cadastrados<b>"; ?></b></h3>

					<?php

						echo '<table class="table table-hover">';
						echo '<tr>';
						echo '<th>#</th>';
						echo '<th>Produto</th>';
						echo '<th>Cor</th>';
						echo '<th>Preço</th>';
						echo '<th>Validade</th>';
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
				    }
				}
			}
		
	}

?>

</body>
</html>
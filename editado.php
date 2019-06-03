<?php 

	if(!empty($_POST['prod']) && !empty($_POST['cor']) && !empty($_POST['preco']) && !empty($_POST['id_produto']) && !empty($_POST['id_usuario']) )
	{
		$produto = $_POST['prod'];
		$cor = $_POST['cor'];
		$preco = $_POST['preco'];
		$data = $_POST['data'];
		$id_produto = $_POST['id_produto'];
		$id_usuario = $_POST['id_usuario'];

		$sql = "UPDATE tb_produto SET produto = '$produto', cor = '$cor', preco = '$preco', validade = '$data' WHERE id_produto = $id_produto";

		include 'conn.php';

		$resultado = mysqli_query($conn, $sql);

		if($resultado)
		{
			session_start();
			if (!empty($_SESSION['tipo']))
			{
				header('location:listaradm.php?msg=edtSuccess');
			}
			else
			{
				header('location:listar.php?msg=edtSuccess');
			}
			
		}
		else
		{
			session_start();
			if (!empty($_SESSION['tipo']))
			{
				header('location:listaradm.php?msg=edtErrorB');
			}
			else
			{
				header('location:listar.php?msg=edtErrorB');
			}
			
		}
	}
	else
	{
		session_start();
			if (!empty($_SESSION['tipo']))
			{
				header('location:listaradm.php?msg=edtErrorA');
			}
			else
			{
				header('location:listar.php?msg=edtErrorA');
			}
		
	}



 ?>
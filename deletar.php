<?php include 'lock.php';

include 'conn.php';

	if(!empty($_POST['selecionado']))
	{
		$selecionados = $_POST['selecionado'];

		$ids = implode(",", $selecionados);

		$sql = "DELETE FROM tb_produto WHERE id_produto IN ($ids)";

		$resultado = mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn) > 0)
		{
			session_start();
			if (!empty($_SESSION['tipo']))
			{
				header('location:listaradm.php?msg=delSuccess');
			}
			else 
			{
				header('location:listar.php?msg=delSuccess');
			}
		}
		else
		{
			session_start();
			if (!empty($_SESSION['tipo']))
			{
				header('location:listaradm.php?msg=delError1');
			}
			else 
			{
				header('location:listar.php?msg=delError1');
			}	
		}
	}
	else if(empty($_GET['id_produto']))
	{
		if (!empty($_SESSION['tipo']))
			{
				header('location:listaradm.php?msg=emptyValue');
			}
			else 
			{
				header('location:listar.php?msg=emptyValue');
			}
	}
	else
	{
		$id_produto = $_GET['id_produto'];

		$sql = "DELETE FROM tb_produto WHERE id_produto = $id_produto";

		$resultado = mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn) > 0)
		{
			if (!empty($_SESSION['tipo']))
			{
				header('location:listaradm.php?msg=delSuccess');
			}
			else 
			{
				header('location:listar.php?msg=delSuccess');
			}
		}
		else
		{
			if (!empty($_SESSION['tipo']))
			{
				header('location:listaradm.php?msg=delError2');
			}
			else 
			{
				header('location:listar.php?msg=delError2');
			}
		}
	}

 ?>
<?php 
	if(empty($_POST['nome']) || empty($_POST['senha']))
	{
		header('location:login.php?msg=emptyFields');
	}
	else
	{
		$usuario = $_POST['nome'];
		$senha   = $_POST['senha'];

		include 'conn.php';

		$sql = "SELECT id_usuario, nome, email, senha FROM tb_usuario 
		WHERE (nome LIKE '$usuario' OR 
		email LIKE '$usuario') AND senha LIKE '$senha' ";

		$resultado = mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn) > 0)
		{
			$login = mysqli_fetch_assoc($resultado);

			session_start();
			$_SESSION['id_usuario'] = $login['id_usuario'];
			$_SESSION['nome'] 	    = $login['nome'];
			$_SESSION['senha'] 		= $login['senha'];
			$_SESSION['email'] 		= $login['email'];

			header('location:listar.php');
		}
		else
		{
			header('location:login.php?msg=loginError');
		}
	}
?>
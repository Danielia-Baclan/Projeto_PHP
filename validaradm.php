<?php 
	if(empty($_POST['nome']) || empty($_POST['senha']))
	{
		header('location:loginadm.php?msg=emptyF');
	}
	else
	{
		$usuario = $_POST['nome'];
		$senha   = $_POST['senha'];

		include 'conn.php';

		$sql = "SELECT id_adm, nome, email, senha, tipo FROM tb_adms 
		WHERE (nome LIKE '$usuario' OR 
		email LIKE '$usuario') AND senha LIKE '$senha' ";

		$resultado = mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn) > 0)
		{
			$login = mysqli_fetch_assoc($resultado);

			session_start();
			$_SESSION['id_usuario'] = $login['id_adm'];
			$_SESSION['nome'] 	    = $login['nome'];
			$_SESSION['senha'] 		= $login['senha'];
			$_SESSION['email'] 		= $login['email'];
			$_SESSION['tipo'] = $login['tipo'];

			header('location:listaradm.php');
		}
		else
		{
			header('location:loginadm.php?msg=loginError');
		}
	}
?>
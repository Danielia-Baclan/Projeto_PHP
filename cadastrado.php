<?php 

	include 'func.php';

	validar_form_cad();

	$nome = $_POST['nome'];
	$senha   = $_POST['senha'];
	$email   = $_POST['email'];

	include 'conn.php';

	$sql = "INSERT INTO tb_usuario (nome, email, senha) 
	VALUES ('$nome', '$email', '$senha') ";

	$resultado = mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) > 0)
	{
		header('location:login.php?msg=cadSuccess');
	}
	else
	{
		header('location:cadastro.php?msg=cadError');
	}

?>
<?php include 'lock.php';
	include 'func.php';
	include 'conn.php';

	validar_form_prod();

	$produto      = $_POST['prod'];
	$cor          = $_POST['cor'];
	$preco        = $_POST['preco'];
	$data         = $_POST['val'];
	$id_usuario   = $_SESSION['id_usuario'];

	$sql = "INSERT INTO tb_produto (produto, cor, preco, validade, id_usuario) VALUES ('$produto', '$cor', '$preco', '$data', $id_usuario)";

	$resultado = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0)
	{
		header ('location:listar.php?msg=prodCad');
	}
	else
	{
		header ('location:listar.php?msg=prodError');
	}

 ?>
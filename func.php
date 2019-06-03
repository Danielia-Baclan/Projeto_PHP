<?php  

function validar_form_cad()
{

	if( empty($_POST['nome']) || 
		empty($_POST['senha'])   || 
		empty($_POST['email']) ) 
	{
		header('location:cadastro.php?msg=emptyFields');
		exit;
	}
}

function validar_form_prod()
{
	if (empty($_POST['prod']) ||
		empty($_POST['preco']) ||
		empty($_POST['cor']) )
	{
		header('location:listar.php?msg=emptyFields');
		exit;
	}
}

function verificar_msg()
{
	if(!empty($_GET['msg']))
	{
		$msg = $_GET['msg'];

		if($msg == 'emptyFields')
		{
			echo '<h3 class="alert alert-warning">ATENÇÃO: Preencha todos os campos do formulário.</h3>';
		}
		else if($msg == 'emptyF')
		{
			echo '<h3 class="alert alert-warning">ATENÇÃO: Preencha todos os campos do formulário.</h3>';
		}
		else if($msg == 'cadSuccess')
		{
			echo '<h3 class="alert alert-success">Cadastro efetuado com sucesso!<br><p>Utilize o formulário abaixo para entrar no sistema:</p></h3>';
		}
		else if($msg == 'cadError')
		{
			echo '<h3 class="alert alert-danger">ATENÇÃO: usuário ou e-mail já cadastrados!<br><p>Tente novamente informando outros dados</p></h3>';
		}
		else if($msg == 'loginError')
		{
			echo '<h3 class="alert alert-warning">ATENÇÃO: usuário, e-mail ou senha inválidos!<br><p>Tente novamente</p></h3>';
		}
		else if ($msg == 'prodCad')
		{
			echo '<h3 class="alert alert-success">Produto cadastrado com sucesso!<br></h3>';
		}
		else if ($msg == 'prodError')
		{
			echo '<h3 class="alert alert-danger">ATENÇÃO: Não foi possível cadasrtar o produto.<br><p>Tente novamente.</p></h3>';
		}
		else if ($msg == 'delSuccess')
		{
			echo '<div class="alert alert-success">';
			echo '<h4 class="alert-heading">Sucesso!</h4><hr>';
			echo '<p>O produto foi excluido da sua lista.</p></div>';
		}
		else if ($msg == 'delError1')
		{
			echo '<div class="alert alert-danger">';
			echo '<h4 class="alert-heading">ERRO!</h4><hr>';
			echo '<p>Nenhum dado recebido para exclusão.</p></div>';
		}
		else if ($msg == 'delError2')
		{
			echo '<div class="alert alert-danger">';
			echo '<h4 class="alert-heading">ERRO!</h4><hr>';
			echo '<p>Não foi possível excluir o produto.</p></div>';
		}
		else if($msg == 'edtError1')
		{
			echo '<div class="alert alert-danger">';
			echo '<h4 class="alert-heading">ERRO!</h4><hr>';
			echo '<p>ERRO: Nenhum valor recebido.</p></div>';
		}
		else if($msg == 'edtError2')
		{
			echo '<div class="alert alert-danger">';
			echo '<h4 class="alert-heading">ERRO!</h4><hr>';
			echo '<p>ERRO: Não foi possível carregar o formulário de edição.</p></div>';
		}
		else if ($msg == 'edtSuccess')
		{
			echo '<div class="alert alert-success">';
			echo '<h4 class="alert-heading">Sucesso!</h4><hr>';
			echo '<p>O produto foi editado.</p></div>';
		}
		else if($msg == 'edtErrorB')
		{
			echo '<div class="alert alert-danger">';
			echo '<h4 class="alert-heading">ERRO!</h4><hr>';
			echo '<p>ERRO: Não foi possível alterar dados, entre em contato com a assistencia do servidor.</p></div>';
		}
		else if($msg == 'edtErrorA')
		{
			echo '<div class="alert alert-warning">';
			echo '<h4 class="alert-heading">ATENÇÃO!</h4><hr>';
			echo '<p>Todos os campos devem estar completos e corretos.</p></div>';
		}
		else if ($msg == 'sempesq')
		{
			echo '<div class="alert alert-warning">';
			echo '<h4 class="alert-heading">ATENÇÃO!</h4><hr>';
			echo '<p>Pesquisa inválida, digite novamente.</p></div>';
		}
	}
}

?>
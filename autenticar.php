<?php 

require_once("conexao.php");
@session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$query = $pdo->prepare("SELECT * FROM usuarios where email = :email and senha = :senha");
	$query->bindValue(":email", $email);
	$query->bindValue(":senha", $senha);
	$query->execute();

	$res = $query->fetchAll(PDO::FETCH_ASSOC);
	$total_reg = @count($res);

	

	if($total_reg > 0){

		//CRIAR AS VARIAVEIS DE SESSÃO
		$_SESSION['nome_usuario'] = $res[0]['nome'];
		$_SESSION['nivel_usuario'] = $res[0]['nivel'];

		$nivel = $res[0]['nivel'];

		if($nivel == 'Administrador'){
			echo "<script language='javascript'>window.location='painel-adm'</script>";
		}else if($nivel == 'Cliente'){
			echo "<script language='javascript'>window.location='painel-cliente'</script>";
		}else{
			echo "<script language='javascript'>window.alert('Usuário Sem Permissão para Acesso')</script>";
		    echo "<script language='javascript'>window.location='index.php'</script>";
		}
		
	}else{
		echo "<script language='javascript'>window.alert('Dados Incorretos')</script>";
		echo "<script language='javascript'>window.location='index.php'</script>";
	}
	
 ?>
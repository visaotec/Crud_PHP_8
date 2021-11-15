<?php 

require_once("../conexao.php");
@session_start();

//VERIFICAR SE O USUÁRIO LOGADO É UM ADMINISTRADOR
if(@$_SESSION['nivel_usuario'] != 'Administrador'){
	echo "<script language='javascript'>window.location='../index.php'</script>";
}

/*
echo 'Painel Administrativo <p>';
echo 'Nome do Usuário : ' . $_SESSION['nome_usuario'] .' e o nível do usuário é ' . $_SESSION['nivel_usuario'];

*/

?>

<!DOCTYPE html>
<html>
<head>
	<title>Painel Administrativo</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-primary">
		<div class="container-fluid text-white">
			<a class="navbar-brand text-white" href="index.php">Visaotec Sistemas</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active text-white" href="../form/index.php">Enviar e-mail</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link active dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Sair
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdown">

							<li><a class="dropdown-item" href="#"><?php echo $_SESSION['nome_usuario'] ?></a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="../logout.php">Sair</a></li>
						</ul>
					</li>

				</ul>
				<?php echo $_SESSION['nome_usuario'] ?>&nbsp;&nbsp;&nbsp;
				<form method="GET" class="d-flex">
				
				    
					<input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="txtBuscar">
					<button class="btn btn-outline-primary text-white" type="submit">Buscar</button>
				</form>
			</div>
		</div>
	</nav>

	<div class="container">
		<a href="index.php?funcao=novo" class="btn btn-primary mt-4" type="button">Novo Usuário</a>

		<?php
		$txtBuscar = '%' .@$_GET['txtBuscar']. '%';
		$query = $pdo->prepare("SELECT * FROM usuarios where nome LIKE :nome or email LIKE :email ");
		$query->bindValue(":email", $txtBuscar);
		$query->bindValue(":nome", $txtBuscar);
		$query->execute();
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);

		if($total_reg > 0){

			?>
			
			<table class="table table-striped mt-4">
				<thead>
					<tr>
						<th scope="col">Nome</th>
						<th scope="col">Email</th>
						<th scope="col">Senha</th>
						<th scope="col">Nível</th>
						<th scope="col">Ações</th>
					</tr>
				</thead>
				<tbody>

					<?php

					for($i=0; $i < $total_reg; $i++){
						foreach ($res[$i] as $key => $value){

						}
						$nome = $res[$i]['nome'];
						$email = $res[$i]['email'];
						$senha = $res[$i]['senha'];
						$nivel = $res[$i]['nivel'];
						$id = $res[$i]['id'];

						?>

						<tr>
							<td><?php echo $nome ?></td>
							<td><?php echo $email ?></td>
							<td><?php echo $senha ?></td>
							<td><?php echo $nivel ?></td>
							<td>
								<a href="index.php?funcao=editar&id=<?php echo $id ?>" title="Editar Registro" class="mr-1" style="text-decoration: none">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-primary" viewBox="0 0 16 16">
										<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
										<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
									</svg>
								</a>

								<a href="index.php?funcao=deletar&id=<?php echo $id ?>" title="Deletar Registro" class="mr-1" style="text-decoration: none">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive text-danger" viewBox="0 0 16 16">
										<path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
									</svg>
								</a>
							</td>
						</tr>

						<?php 
					}
				}else{
					echo '<p class="mt-4">Não existem dados para serem exibidos</p>';
				}

				?>



			</tbody>
		</table>

	</div>

</body>
</html>




<div class="modal fade" id="modalCadastrar" tabindex="-1" data-bs-backdrop="static">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<?php 
				if(@$_GET['funcao'] == 'editar'){ 

					$titulo_modal = "Editar Registro";
					$botao_modal = "btn-editar";

					$query = $pdo->query("SELECT * FROM usuarios where id = '$_GET[id]'");
					$res = $query->fetchAll(PDO::FETCH_ASSOC);
					$nome_ed = $res[0]['nome'];
					$email_ed = $res[0]['email'];
					$senha_ed = $res[0]['senha'];
					$nivel_ed = $res[0]['nivel'];

				}else{
					$titulo_modal = "Inserir Registro";
					$botao_modal = "btn-cadastrar";
				}
				?>
				<h5 class="modal-title"><?php echo $titulo_modal ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form method="POST">
				<div class="modal-body">

					<div class="form-group mb-2">
						<label for="exampleInputEmail1">Nome</label>
						<input type="text" class="form-control mt-1" id="exampleInputEmail1" name="nomeCad" aria-describedby="emailHelp" required value="<?php echo @$nome_ed ?>">

					</div>

					<div class="form-group mb-2">
						<label for="exampleInputEmail1">Email </label>
						<input type="email" class="form-control mt-1" id="exampleInputEmail1" name="emailCad" aria-describedby="emailHelp" required value="<?php echo @$email_ed ?>">

					</div>

					<div class="form-group mb-2">
						<label for="exampleInputPassword1">Senha</label>
						<input type="password" class="form-control mt-1" name="senhaCad" id="exampleInputPassword1" required value="<?php echo @$senha_ed ?>">
					</div>

					<div class="form-group mb-2">
						<label for="exampleInputPassword1">Nivel</label>
						<select class="form-select mt-1" aria-label="Default select example" name="nivelCad">
							
							<option <?php if(@$nivel_ed == 'Cliente'){ ?> selected <?php } ?>  value="Cliente">Cliente</option>

							<option <?php if(@$nivel_ed == 'Administrador'){ ?> selected <?php } ?>  value="Administrador">Administrador</option>
							
							<option <?php if(@$nivel_ed == 'Vendedor'){ ?> selected <?php } ?>  value="Vendedor">Vendedor</option>

							<option <?php if(@$nivel_ed == 'Tesoureiro'){ ?> selected <?php } ?>  value="Tesoureiro">Tesoureiro</option>
						</select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
					<button name="<?php echo $botao_modal ?>" type="submit" class="btn btn-primary">Salvar</button>

					<input type="hidden" value="<?php echo @$email_ed ?>" name="antigo">
				</div>
			</form>
		</div>
	</div>
</div>





<div class="modal" tabindex="-1" id="modalDeletar">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Excluir Registro</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p>Deseja Realmente Excluir este registro?</p>
			</div>
			<div class="modal-footer">
				<form method="POST">
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
				<button name="btn-deletar" type="submit" class="btn btn-danger">Excluir</button>
				</form>
			</div>
		</div>
	</div>
</div>




<?php 
if(isset($_POST['btn-cadastrar'])){

	$query_v = $pdo->prepare("SELECT * FROM usuarios where email = :email ");
	$query_v->bindValue(":email", $_POST['emailCad']);
	$query_v->execute();

	$res_v = $query_v->fetchAll(PDO::FETCH_ASSOC);
	$total_reg_v = @count($res_v);
	
	if($total_reg_v > 0){
		echo "<script language='javascript'>window.alert('O Usuário já está cadastrado!!')</script>";
		exit();
	}

	$query = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, nivel) VALUES (:nome, :email, :senha, :nivel)");
	$query->bindValue(":nome", $_POST['nomeCad']);
	$query->bindValue(":email", $_POST['emailCad']);
	$query->bindValue(":senha", md5($_POST['senhaCad']));
	$query->bindValue(":nivel", $_POST['nivelCad']);
	$query->execute();

	echo "<script language='javascript'>window.alert('Cadastrado com Sucesso')</script>";
	echo "<script language='javascript'>window.location='index.php'</script>";

}
?>





<?php 
if(isset($_POST['btn-editar'])){

	if($_POST['antigo'] != $_POST['emailCad']){
		$query_v = $pdo->prepare("SELECT * FROM usuarios where email = :email ");
		$query_v->bindValue(":email", $_POST['emailCad']);
		$query_v->execute();

		$res_v = $query_v->fetchAll(PDO::FETCH_ASSOC);
		$total_reg_v = @count($res_v);

		if($total_reg_v > 0){
			echo "<script language='javascript'>window.alert('O Usuário já está cadastrado!!')</script>";
			exit();
		}
	}

	$query = $pdo->prepare("UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, nivel = :nivel WHERE id = :id");
	$query->bindValue(":nome", $_POST['nomeCad']);
	$query->bindValue(":email", $_POST['emailCad']);
	$query->bindValue(":senha", md5($_POST['senhaCad']));
	$query->bindValue(":nivel", $_POST['nivelCad']);
	$query->bindValue(":id", $_GET['id']);
	$query->execute();

	echo "<script language='javascript'>window.alert('Editado com Sucesso')</script>";
	echo "<script language='javascript'>window.location='index.php'</script>";

}
?>





<?php 
if(isset($_POST['btn-deletar'])){

	
	$query = $pdo->query("DELETE from usuarios WHERE id = '$_GET[id]'");
	
	echo "<script language='javascript'>window.location='index.php'</script>";

}
?>



<?php 
if(@$_GET['funcao'] == 'novo'){ ?>
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('modalCadastrar'), {  keyboard: false });
		myModal.show();

	</script>
<?php } ?>



<?php 
if(@$_GET['funcao'] == 'editar'){ ?>
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('modalCadastrar'), {  keyboard: false });
		myModal.show();

	</script>
<?php } ?>



<?php 
if(@$_GET['funcao'] == 'deletar'){ ?>
	<script>
		var myModal = new bootstrap.Modal(document.getElementById('modalDeletar'), {  keyboard: false });
		myModal.show();

	</script>
<?php } ?>

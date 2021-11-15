<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

	<title>Contatos</title>
</head>
<body>

	<div class="container mt-5">
		<form method="POST" action="enviar.php">
		<div class="row">
		<div class="col-md-6">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">Nome</label>
				<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Insira seu nome" name="nome" required="true">
			</div>
		</div>
		<div class="col-md-6">
			<div class="mb-3">
				<label for="exampleFormControlInput1" class="form-label">E-mail</label>
				<input type="email" class="form-control" id="exampleFormControlInput1" placeholder="nome@example.com" name="email" required="true">
			</div>
			</div>
		</div>
			
			<div class="mb-3">
				<label for="exampleFormControlTextarea1" class="form-label">Mensagem</label>
				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mensagem" required="true"></textarea>
			</div>

			<input type="submit" class="btn btn-primary" id="exampleFormControlInput1" value="Enviar">

		</form>
	</div>

</body>
</html>
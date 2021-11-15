<?php 
require_once("conexao.php");
 ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="login.css" rel="stylesheet">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


<body>
    <div id="login">

        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="autenticar.php" method="post">
                            <div class="fadeIn first"style="text-align: center">
                            <img src="esse.png"width="179" height="102"> 
     
                             </div>
                            <div class="form-group">
                                <label for="username" class="text-info">Usuário:</label><br>
                                <input type="text" name="email" id="username" class="form-control" placeholder="Insira seu Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Senha:</label><br>
                                <input type="password" name="senha" id="password" class="form-control" placeholder="Insira sua Senha" required>
                            </div>
                            <div class="form-group"style="text-align: center">

                                <input type="submit" name="submit" class="btn btn-primary" value="Acessar">
								 <a href="" data-toggle="modal" data-target="#modal-cadastrar" class="btn btn-primary">Cadastre-se</a>
								 <p class="text-align: center mt-2"><?= date('Y'); ?> &copy; Todos os Direitos Reservados</p>
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>




<div class="modal" id="modal-cadastrar" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Cadastre-se</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form method="POST">
        <div class="modal-body">

            <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name="nomeCad" aria-describedby="emailHelp" required="">

            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="emailCad" aria-describedby="emailHelp" required="">

            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Senha</label>
                <input type="text" class="form-control" name="senhaCad" id="exampleInputPassword1" required="">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

            <button type="submit" class="btn btn-primary" name="btn-cadastrar">Salvar</button>
        </div>
    </form>
</div>
</div>
</div>


<?php 
if(isset($_POST['btn-cadastrar'])){
        
    $query = $pdo->prepare("INSERT INTO usuarios (nome, email, senha, nivel) VALUES (:nome, :email, :senha, :nivel)");
    $query->bindValue(":nome", $_POST['nomeCad']);
    $query->bindValue(":email", $_POST['emailCad']);
    $query->bindValue(":senha", $_POST['senhaCad']);
    $query->bindValue(":nivel", 'Cliente');
    $query->execute();

    echo "<script language='javascript'>window.alert('Cadastrado com Sucesso')</script>";



    }
 ?>

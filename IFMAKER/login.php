<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-12">
   <div class="d-flex justify-content-center align-items-center">
    <div class="col-md-5">

	<?php
	$nome = '';
	$email = '';
	$senha = '';

	if  (isset($_GET['id'])) {
	  $id = $_GET['id'];
	  $query = "SELECT * FROM usuario WHERE id=$id";
	  $result = mysqli_query($conn, $query);
	  if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$nome = $row['nome'];
		$email = $row['email'];
		$senha = $row['senha'];
	  }
	}

	if (isset($_POST['logar'])) {
	  $id = $_GET['id'];
	  $nome = $_POST['nome'];
	  $email = $_POST['email'];
	  $senha = $_POST['senha'];
	  
	  $query = "SELECT id, nome, login, senha FROM usuario WHERE email = '$email'";
	  $result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
	  $total = @mysql_num_rows($result_id);

	  if($total){
		$dados = @mysql_fetch_array($result_id);
		if(!strcmp($senha, $dados["senha"])){
			$_SESSION["id_usuario"]= $dados["id"];
			$_SESSION["nome_usuario"] = stripslashes($dados["nome"]);
			exit;
		}else{
		 "Senha Inválida!";
		exit;
		}
	  }else{
		echo "Cadastro Inexistente!";
		exit;
	  }
	  header('Location: index.php');
	}
	?>
  
      <br>
      <h1 class="d-flex justify-content-center align-items-center">Login</h1>
      <br>

      <div class="card card-body">
        <form action="login.php?id=<?php echo $_GET['id']; ?>"method="POST">
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="E-Mail" required autofocus>
          </div>
		  <div class="form-group">
            <input type="password" name="senha" class="form-control" placeholder="Senha" required autofocus>
          </div>
		  <button class="btn-success" name="logar">
          OK
		  </button>
        </form>
			<a class="link" href="cadastroUsuario.php">Clique aqui para cadastrar-se</a> 
      </div> 
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

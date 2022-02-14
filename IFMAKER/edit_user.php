<?php
include("db.php");
$nome = '';
$matricula = '';
$email = '';
$senha = '';

if  (isset($_GET['matricula'])) {
  $matricula = $_GET['matricula'];
  $query = "SELECT * FROM usuario WHERE matricula=$matricula";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nome = $row['nome'];
    $matricula = $row['matricula'];
    $email = $row['email'];
    $senha = $row['senha'];
  }
}

if (isset($_POST['update_user'])) {
  $matricula = $_GET['matricula'];
  $nome = $_POST['nome'];
  $matricula = $_POST['matricula'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  
  $query = "UPDATE usuario set nome = '$nome', matricula = '$matricula', email = '$email', senha = '$senha' WHERE matricula=$matricula";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Usuario Atualizado!';
  $_SESSION['message_type'] = 'warning';
  header('Location: listagemUsuarios.php');
}
?>

<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_user.php?id=<?php echo $_GET['matricula']; ?>" method="POST">
        <div class="form-group">
          <input name="nome" type="text" class="form-control" placeholder="Nome" value="<?php echo $nome; ?>">
        </div>
        <div class="form-group">
          <input name="matricula" type="text" class="form-control" placeholder="Matricula" value="<?php echo $matricula; ?>">
        </div>
        <div class="form-group">
          <input name="email" type="email" class="form-control" placeholder="E-Mail" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
          <input name="senha" type="password" class="form-control" placeholder="Senha" value="<?php echo $senha; ?>">
        </div>

        <button class="btn-success" name="update_user">
          Atualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

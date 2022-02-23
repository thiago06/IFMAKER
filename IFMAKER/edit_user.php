<?php
include("db.php");
$nome = '';
$email = '';
$senha = '';
$nivel = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM usuario WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nome = $row['nome'];
    $email = $row['email'];
    $senha = $row['senha'];
    $nivel = $row['nivel'];
  }
}

if (isset($_POST['update_user'])) {
  $id = $_GET['id'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $nivel = $_POST['nivel'];
  
  $query = "UPDATE usuario set nome = '$nome', email = '$email', senha = '$senha', nivel = '$nivel' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Usuario Atualizado!';
  $_SESSION['message_type'] = 'warning';
  header('Location: listagemUsuarios.php');
}
if (isset($_POST['cancel'])) {
  header('Location: homeAdm.php');
}
?>

<?php include('includes/header.php'); ?>

<br>
<h1 class="d-flex justify-content-center align-items-center">Edição de Usuários</h1>
<br>

<div class="container p-4">
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card card-body">
      <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nome" type="text" class="form-control" placeholder="Nome" value="<?php echo $nome; ?>">
        </div>
        <div class="form-group">
          <input name="email" type="email" class="form-control" placeholder="E-Mail" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
          <input name="senha" type="text" class="form-control" placeholder="Senha" value="<?php echo $senha; ?>">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="nivel" value="1">
            <label class="form-check-label">ADM</label>
        </div>
        <br>
        <button class="btn-success" name="update_user">
          Atualizar
        </button>
        <button class="btn-danger" name="cancel" href="listagemProjetos.php">
          Cancelar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

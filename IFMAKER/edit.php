<?php
include("db.php");
$titulo = '';
$responsavel = '';
$equipamento = '';
$resumo = '';
$anexo = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM projeto WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $titulo = $row['titulo'];
    $responsavel = $row['responsavel'];
    $equipamento = $row['equipamento'];
    $resumo = $row['resumo'];
    $anexo = $row['anexo'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $titulo = $_POST['titulo'];
  $responsavel = $_POST['responsavel'];
  $equipamento = $_POST['equipamento'];
  $resumo = $_POST['resumo'];

  $query = "UPDATE projeto set titulo = '$titulo', responsavel = '$responsavel', equipamento = '$equipamento', resumo = '$resumo' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Projeto Atualizado!';
  $_SESSION['message_type'] = 'warning';
  header('Location: listagem.php');
}
?>

<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="titulo" type="text" class="form-control" value="<?php echo $titulo; ?>">
        </div>
        <div class="form-group">
          <input name="responsavel" type="text" class="form-control" value="<?php echo $responsavel; ?>">
        </div>
        <div class="form-group">
          <input name="equipamento" type="text" class="form-control" value="<?php echo $equipamento; ?>">
        </div>
        <div class="form-group">
        <textarea name="resumo" class="form-control" cols="30" rows="10"><?php echo $resumo;?></textarea>
        </div>

        <button class="btn-success" name="update">
          Atualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

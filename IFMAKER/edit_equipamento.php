<?php
include("db.php");
$nome = '';
$modelo = '';
$serie = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM equipamento WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nome = $row['nome'];
    $modelo = $row['modelo'];
    $serie = $row['serie'];
  }
}

if (isset($_POST['update_equipamento'])) {
  $id = $_GET['id'];
  $nome = $_POST['nome'];
  $modelo = $_POST['modelo'];
  $serie = $_POST['serie'];
  
  $query = "UPDATE equipamento set nome = '$nome', modelo = '$modelo', serie = '$serie' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Equipamento Atualizado!';
  $_SESSION['message_type'] = 'warning';
  header('Location: listagemEquipamentos.php');
}
if (isset($_POST['cancel'])) {
  header('Location: listagemEquipamentos.php');
}
?>

<?php include('includes/header.php'); ?>

<br>
<h1 class="d-flex justify-content-center align-items-center">Edição de Equipamentos</h1>
<br>

<div class="container p-4">
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card card-body">
      <form action="edit_equipamento.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nome" type="text" class="form-control" placeholder="Nome" value="<?php echo $nome; ?>">
        </div>
        <div class="form-group">
          <input name="modelo" type="text" class="form-control" placeholder="Modelo" value="<?php echo $modelo; ?>">
        </div>
        <div class="form-group">
          <input name="serie" type="text" class="form-control" placeholder="Série" value="<?php echo $serie; ?>">
        </div>
        <br>
        <button class="btn-success" name="update_equipamento">
          Atualizar
        </button>
        <button class="btn-danger" name="cancel">
          Cancelar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

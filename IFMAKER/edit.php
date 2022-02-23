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
  $path = $_FILES['arquivo']['name'];
 
 /*
  $extensao = pathinfo($path, PATHINFO_EXTENSION);
  $novo_nome = md5(time()) . "." . $extensao;
  $diretorio = "upload/";  
  move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
  */
  $query = "UPDATE projeto set titulo = '$titulo', responsavel = '$responsavel', equipamento = '$equipamento', resumo = '$resumo', anexo = '$anexo' WHERE id=$id";
  
 
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Projeto Atualizado!';
  $_SESSION['message_type'] = 'success';
  header('Location: listagemProjetos.php');
}
if (isset($_POST['cancel'])) {
  header('Location: listagemProjetos.php');
}

?>

<?php include('includes/header.php'); ?>

<br>
<h1 class="d-flex justify-content-center align-items-center">Edição de Projetos</h1>
<br>

<div class="container p-4">
  <div class="row">
    <div class="col-md-5 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="titulo" type="text" class="form-control" value="<?php echo $titulo; ?>">
        </div>
        <div class="form-group">
          <input name="responsavel" type="text" class="form-control" value="<?php echo $responsavel; ?>">
        </div>
        <div class="form-group">
            <select class="form-select form-control" name="equipamento" id="inputGroupSelect01" value="<?php echo $equipamento; ?>">
              <option selected><?php echo $equipamento; ?></option>
              <option value="Impressora 3D">Impressora 3D</option>
              <option value="Impressora 4D">Impressora 4D</option>
              <option value="Impressora 5D">Impressora 5D</option>
            </select>
        </div>
        <div class="form-group">
        <textarea name="resumo" class="form-control" cols="30" rows="5"><?php echo $resumo;?></textarea>
        </div>
          Anexo Atual:
        <?php echo "<a href=upload/".$row["anexo"].">" . $row["anexo"] . "</a><br />"; ?>
        </div>
        <br>
        <button class="btn-success" name="update">
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

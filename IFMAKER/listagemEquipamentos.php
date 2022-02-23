<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

      <?php
      
      if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php unset(
        $_SESSION['message'],
      ); } ?>
    
      <?php
      if (isset($_SESSION['usuarioNiveisAcessoId']) == 0) {
        return header('location: login.php');
      }
      ?>

      <br>
      <h1 class="d-flex justify-content-center align-items-center">Listagem de Equipamentos</h1>
      <br>

    <div class="col-md-12">
      <form method="GET" class="d-flex justify-content-center align-items-center">
        <input class="form-control" placeholder="Pesquisar" type="text" name="pesquisa" value=""/>
        <input type="submit" value="OK" class="btn btn-success">
      </form> 
      <br>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Modelo</th>
            <th>Série</th>
            <th>Data</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $pesquisa = "";
          if(isset($_GET['pesquisa'])){
            $pesquisa = $_GET['pesquisa'];
          }  
          $query = "SELECT * FROM equipamento";
          //$result_tasks = mysqli_query($conn, $query);  
          $result_tasks = mysqli_query($conn,"select * from equipamento where `nome` like '%$pesquisa%'");  
          
          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['modelo']; ?></td>
            <td><?php echo $row['serie']; ?></td>
            <td><?php echo $row['data']; ?></td>
            <td>
              <a href="edit_equipamento.php?id=<?php echo $row['id']?>" class="btn upload/n-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_equipamento.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

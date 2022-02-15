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
      <?php session_unset(); } ?>
    
      <br>
      <h1 class="d-flex justify-content-center align-items-center">Listagem de Usuarios</h1>
      <br>

    <div class="col-md-12">
      <div class="form-outline">
        <input type="search" name="pesquisa" placeholder="Pesquisar" class="form-control" />
      </div>
      <br>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nome</th>
            <th>E-Mail</th>
            <th>Senha</th>
            <th>Nivel e Acesso</th>
            <th>Data</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM usuario";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nome']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['senha']; ?></td>
            <td><?php echo $row['nivel']; ?></td>
            <td><?php echo $row['data']; ?></td>
            <td>
              <a href="edit_user.php?id=<?php echo $row['id']?>" class="btn upload/n-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete_user.php?id=<?php echo $row['id']?>" class="btn btn-danger">
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

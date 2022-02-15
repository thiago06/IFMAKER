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
      <h1 class="d-flex justify-content-center align-items-center">Listagem de Projetos</h1>
      <br>

    <div class="col-md-12">
      <div class="form-outline">
        <input type="search" name="pesquisa" placeholder="Pesquisar" class="form-control" />
      </div>
      <br>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>Responsável</th>
            <th>Equipamento</th>
            <th>Resumo</th>
            <th>Anexo</th>
            <th>Data</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM projeto";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['responsavel']; ?></td>
            <td><?php echo $row['equipamento']; ?></td>
            <td><?php echo $row['resumo']; ?></td>
            <td><?php echo "<a href=upload/".$row["anexo"].">" . $row["anexo"] . "</a><br />"; ?></td>
            <td><?php echo $row['data']; ?></td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

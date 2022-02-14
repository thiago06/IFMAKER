<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-12">
   <div class="d-flex justify-content-center align-items-center">
    <div class="col-md-8">

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
      <h1 class="d-flex justify-content-center align-items-center">Cadastro de Projetos</h1>
      <br>

      <div class="card card-body">
        <form action="save_task.php" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Título" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="responsavel" class="form-control" placeholder="Responsável" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="equipamento" class="form-control" placeholder="Equipamento" required autofocus>
          </div>
          <div class="form-group">
            <textarea name="resumo" rows="5" class="form-control" placeholder="Resumo" required></textarea>
          </div>
          <div class="form-group">
            Arquivo: <input type="file" required name="arquivo">
          </div>
          <input type="submit" name="save_task" class="btn btn-success btn-block" value="OK">
        </form>
      </div>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

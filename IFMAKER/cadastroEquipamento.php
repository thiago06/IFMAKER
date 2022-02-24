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
      <h1 class="d-flex justify-content-center align-items-center">Cadastro de Equipamento</h1>
      <br>

      <div class="card card-body" style="justify-content-center">
        <form action="save_equipamento.php" method="POST">
          <div class="form-group">
            <input type="text" name="nome" class="form-control" placeholder="Nome" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="modelo" class="form-control" placeholder="Modelo" required autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="serie" class="form-control" placeholder="Série">
          </div>
          <br>
          <input type="submit" name="save_equipamento" class="btn btn-success btn-block" value="OK">
        </form>
      </div>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

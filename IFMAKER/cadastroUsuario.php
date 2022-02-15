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
      <h1 class="d-flex justify-content-center align-items-center">Cadastro de Usuario</h1>
      <br>

      <div class="card card-body" style="justify-content-center">
        <form action="save_user.php" method="POST">
          <div class="form-group">
            <input type="text" name="nome" class="form-control" placeholder="Nome" required autofocus>
          </div>
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="E-Mail" required autofocus>
          </div>
		      <div class="form-group">
            <input type="password" name="senha" class="form-control" placeholder="Senha" required autofocus>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="nivel" value="1">
            <label class="form-check-label">ADM</label>
          </div>
          <br>
          <input type="submit" name="save_user" class="btn btn-success btn-block" value="OK">
        </form>
      </div>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

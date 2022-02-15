<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-12">
   <div class="d-flex justify-content-center align-items-center">
    <div class="col-md-5">
		
    <?php
      
      if (isset($_SESSION['loginErro'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['loginErro']?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset(); } ?>

      <br>
      <h1 class="d-flex justify-content-center align-items-center">Login</h1>
      <br>

      <div class="card card-body">
        <form action="validacao.php" method="POST">
          <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="E-Mail" required autofocus>
          </div>
		  <div class="form-group">
            <input type="password" name="senha" class="form-control" placeholder="Senha" required autofocus>
          </div>
		  <button class="btn-success" name="logar">
          OK
		  </button>
        </form>
      </div> 
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>

<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <title>IF MAKER</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- BOOTSTRAP 4 -->
    <link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">
    <!-- FONT AWESOEM -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  </head>
  <body>

  
 <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">
            <img src="https://www.ifpb.edu.br/prpipg/pesquisa/imagens-pesquisa/ifpb.png/@@images/0609b1d7-4a7d-41be-bd18-081ecb35eb9e.png" width="60" height="30" class="d-inline-block align-top" alt="">
            IF MAKER
        </a>
        <a class="navbar-brand" href="index.php"> </a>	
  </nav>

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


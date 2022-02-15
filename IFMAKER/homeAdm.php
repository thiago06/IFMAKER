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
  <div class="d-flex justify-content-center align-items-center">
    <a class="link" href="cadastroProjeto.php">CADASTRO DE PROJETOS</a>   
  </div>
  <br>
  <div class="d-flex justify-content-center align-items-center">
    <a class="link" href="cadastroUsuario.php">CADASTRO DE USUÁRIOS</a> 
  </div>
  <br>
  <div class="d-flex justify-content-center align-items-center">
    <a class="link" href="listagemProjetos.php">CONSULTA DE PROJETOS</a> 
  </div>
  <br>
  <div class="d-flex justify-content-center align-items-center">
    <a class="link" href="listagemUsuarios.php">CONSULTA DE USUARIOS</a> 
  </div>
  <br>

<?php include('includes/footer.php'); ?>


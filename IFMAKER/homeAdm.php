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

    
  <div class="d-flex justify-content-center align-items-center">
    <div class="col-md-7">
      <br>
      <div onclick="location.href='cadastroProjeto.php'" class="card card-body d-flex justify-content-center align-items-center" 
      style="cursor: pointer; border-radius: 25px; background-color:#27AE60; font-size:200%; font-family: Arial Black; color:black;">
        <a style="font-size:100%; color:black;">CADASTRO DE PROJETOS</a>   
      </div>
      <br>
      <div onclick="location.href='cadastroUsuario.php'" class="card card-body d-flex justify-content-center align-items-center" 
      style="cursor: pointer; border-radius: 25px; background-color:#27AE60; font-size:200%; font-family: Arial Black; color:black;">
        <a style="font-size:100%; color:black;">CADASTRO DE USUÁRIOS</a>   
      </div>
      <br>
      <div onclick="location.href='listagemProjetos.php'" class="card card-body d-flex justify-content-center align-items-center" 
      style="cursor: pointer; border-radius: 25px; background-color:#27AE60; font-size:200%; font-family: Arial Black; color:black;">
        <a style="font-size:100%; color:black;">CONSULTA DE PROJETOS</a>   
      </div>
      <br>
      <div onclick="location.href='listagemUsuarios.php'" class="card card-body d-flex justify-content-center align-items-center" 
      style="cursor: pointer; border-radius: 25px; background-color:#27AE60; font-size:200%; font-family: Arial Black; color:black;">
        <a style="font-size:100%; color:black;">CONSULTA DE USUÁRIOS</a>   
      </div>
      <br>
    </div>   
  </div> 


<?php include('includes/footer.php'); ?>


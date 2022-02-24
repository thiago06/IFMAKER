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
    ); } 
    ?>
    
    <?php
      if (isset($_SESSION['usuarioNiveisAcessoId']) == 0) {
        return header('location: login.php');
    }
    ?>
      
  <div class="d-flex justify-content-center align-items-center">
    <div class="col-md-7">
      <br>
      <div onclick="location.href='cadastroProjeto.php'" class="card card-body d-flex justify-content-center align-items-center" 
      id="optionsHome">
        <a id="aHome">CADASTRO DE PROJETOS</a>   
      </div>
      <br>
      <div onclick="location.href='cadastroUsuario.php'" class="card card-body d-flex justify-content-center align-items-center"
      id="optionsHome">
        <a id="aHome">CADASTRO DE USUÁRIOS</a>   
      </div>
      <br>
      <div onclick="location.href='cadastroEquipamento.php'" class="card card-body d-flex justify-content-center align-items-center" 
      id="optionsHome">
        <a id="aHome">CADASTRO DE EQUIPAMENTOS</a>   
      </div>
      <br>
      <div onclick="location.href='listagemProjetos.php'" class="card card-body d-flex justify-content-center align-items-center" 
      id="optionsHome">
        <a id="aHome">CONSULTA DE PROJETOS</a>   
      </div>
      <br>
      <div onclick="location.href='listagemUsuarios.php'" class="card card-body d-flex justify-content-center align-items-center" 
      id="optionsHome">
        <a id="aHome">CONSULTA DE USUÁRIOS</a>   
      </div>
      <br>
      <div onclick="location.href='listagemEquipamentos.php'" class="card card-body d-flex justify-content-center align-items-center" 
      id="optionsHome">
        <a id="aHome">CONSULTA DE EQUIPAMENTOS</a>   
      </div>
      <br>
    </div>   
  </div> 

<?php include('includes/footer.php'); ?>


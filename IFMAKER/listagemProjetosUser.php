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
        <a class="navbar-brand" href="index.php">
        <a class="navbar-brand" href="index.php">
            <img src="https://iconarchive.com/download/i89546/alecive/flatwoken/Apps-Dialog-Logout.ico" width="30" height="30" class="d-inline-block align-top" alt="">
            SAIR
        </a> 
        </a>	
    </nav>

<?php include("db.php"); ?>
      
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
      <form method="GET" class="d-flex justify-content-center align-items-center">
        <input class="form-control" placeholder="Pesquisar" type="text" name="pesquisa" value=""/>
        <input type="submit" value="OK" class="btn btn-success">
      </form>
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
          $pesquisa = "";
          if(isset($_GET['pesquisa'])){
            $pesquisa = $_GET['pesquisa'];
          }  
          $query = "SELECT * FROM projeto";
          //$result_tasks = mysqli_query($conn, $query);  
          $result_tasks = mysqli_query($conn,"select * from projeto where `titulo` like '%$pesquisa%'");  

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

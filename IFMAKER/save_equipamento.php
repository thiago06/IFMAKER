<?php

include('db.php');

if (isset($_POST['save_equipamento'])) {
  $nome = $_POST['nome'];
  $modelo = $_POST['modelo'];
  $serie = $_POST['serie'];
  $query = "INSERT INTO equipamento(nome, modelo, serie, id) VALUES ('$nome', '$modelo', '$serie', null)";
  
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Cadastrado!';
  $_SESSION['message_type'] = 'success';
  header('Location: homeAdm.php');

}

?>

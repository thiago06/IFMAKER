<?php

include("db.php");

if(isset($_GET['matricula'])) {
  $id = $_GET['matricula'];
  $query = "DELETE FROM usuario WHERE matricula = $matricula";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Usaurio Deletado!';
  $_SESSION['message_type'] = 'danger';
  header('Location: listagemUsuarios.php');
}

?>

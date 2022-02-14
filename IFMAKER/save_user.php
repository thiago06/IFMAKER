<?php

include('db.php');

if (isset($_POST['save_user'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $query = "INSERT INTO usuario(nome, email, senha) VALUES ('$nome', '$email', '$senha')";
 
  $result = mysqli_query($conn, $query);
  if(!$result) {
	die("Query Failed.");
  }

  $_SESSION['message'] = 'Cadastrado!';
  $_SESSION['message_type'] = 'success';
  header('Location: listagemUsuarios.php');

}

?>

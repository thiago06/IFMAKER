<?php

include('db.php');

if (isset($_POST['save_user'])) {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $nivel = $_POST['nivel'];
  $query = "INSERT INTO usuario(nome, email, senha, nivel) VALUES ('$nome', '$email', '$senha', '$nivel')";
 
  $result = mysqli_query($conn, $query);
  if(!$result) {
	die("Query Failed.");
  }

  $_SESSION['message'] = 'Cadastrado!';
  $_SESSION['message_type'] = 'success';
  header('Location: homeAdm.php');

}

?>

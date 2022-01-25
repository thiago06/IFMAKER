<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $titulo = $_POST['titulo'];
  $responsavel = $_POST['responsavel'];
  $equipamento = $_POST['equipamento'];
  $resumo = $_POST['resumo'];
  $extensao = strtolower(substr($_FILES['arquivo']['name'], -4));
  $novo_nome = md5(time()) . $extensao;
  $diretorio = "upload/";
  $query = "INSERT INTO projeto(titulo, responsavel, equipamento, resumo, anexo, id) VALUES ('$titulo', '$responsavel', '$equipamento', '$resumo', '$novo_nome', null)";
 // $query = "INSERT INTO arquivo(codigo, arquivo, data) VALUES(null, '$novo_nome', NOW())";
  move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
  
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Cadastrado!';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>

<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'ifmaker_db'
) or die(mysqli_erro($mysqli));

?>

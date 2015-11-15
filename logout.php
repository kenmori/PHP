<?php
  session_start();
  session_unset();
  header('Location: lecture.php');
  exit();

 ?>

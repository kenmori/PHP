<?php
  session_start();
  $_SESSION['user_name'] = $_POST['user'];
  print 'セッション情報を保存しました';
 ?>

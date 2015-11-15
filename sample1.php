<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <?php
    session_start();
    if(isset($_POST['myId'])){
      $_SESSION['myId'] = $_POST['myId'];
    }
   ?>
   <p>
     ようこそ
     <?php
     echo htmlspecialchars($_SESSION['myId']);
      ?>さん
   </p>
   <p>
     <a href="./sample2.php">次のページへ</a>
   </p>

  </body>
</html>

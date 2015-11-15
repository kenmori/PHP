<?php
require_once 'Escape.php';

session_start();
$val = (isset($_SESSION['user_name'])) ? $_SESSION['user_name'] : "";

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title></title>
   </head>
   <body>
     <form action="session3.php" method="POST">
       ユーザー名:
       <input type="text" name="user" size="30" value="<?php es($val); ?>" />
       <input type="submit" value="送信">
     </form>
   </body>
 </html>

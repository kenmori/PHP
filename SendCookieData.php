<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    require_once 'Escape.php';
    $val = (isset($_COOKIE["user_name"])) ? $_COOKIE["user_name"] : "";
     ?>
     <form action="SetCookie.php" method="POST">
       ユーザー名:
       <input type="text" name="user_name" size="30" value="<?php es($val);?>" />
       <input type="submit" value="送信" />
     </form>
  </body>
</html>

<?php
setcookie('user_name', $_POST["user_name"], time() + (60 * 60 * 24 * 90));

print 'cookie保存しました';
 ?>

<?php
  session_start();

 ?>


<p>
  <?php echo $_SESSION['myId']; ?>さんの情報はまだ残っています
</p>
<p>
  <a href="./logout.php">ログアウトする</a>
</p>

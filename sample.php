
<html>
<head>
</head>
<body>
<?php

$date = sprintf('%04d年 %02d月 %02d日', 2010,1, 23);
?>
<?php
print($date);

?>
<form action="sample23.php" method="post" enctype="multipart/form-data">
<dl>
<dt>写真</dt>
<dd>
<input name="my_img" type="file" id="my_img" size="50">
</dd>
<input type="submit" value="送信する" />
</dl>
</form>
</body>


</html>

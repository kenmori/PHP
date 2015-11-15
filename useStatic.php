<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>useStatic</title>
  </head>
  <body>
    <h2>static method call</h2>
    <p>
      <?php
        require_once 'StaticCls.php';
        $staticClas = StaticCls1::getCircleArea(2);
        print $staticClas;
      ?>
    </p>
    <h2>static property</h2>
    <p>
      <?php
        require_once 'StaticCls2.php';
        $result = StaticCls2::getCircleArea(3);
        print $result;
      ?>
    </p>
  </body>
</html>

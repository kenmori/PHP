<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>price</title>
  </head>
  <body>
    <?php
      require_once 'Calculate.php';
      $price = new Calculate(0.08);
      print "税込み金額は {$price->taxCalculate(1000)}円です";

    ?>
  </body>
</html>

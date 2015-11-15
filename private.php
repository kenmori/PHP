<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>privateAccesser</title>
  </head>
  <body>
    <h2>PrivateAccesser</h2>
    <p>
      <?php
        require_once 'Cone1.php';
        $obj = new Cone1();
        $obj->setRadius(10);
        $obj->setHeight(50);
        print "底面の半径: {$obj->getRadius()}" . '<br>';
        print "円錐の高さ: {$obj->getHeight()}" . '<br>';

        print "円錐の体積: {$obj->getVolume()}";
       ?>
    </p>
  </body>
</html>

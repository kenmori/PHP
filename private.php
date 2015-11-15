<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>The volume of the cone</title>
  </head>
  <body>
    <h2>use OOP of PrivateAccesser</h2>
    <p>
      <?php
        require_once 'Cone1.php';
        $obj = new Cone1();
        $obj->setRadius(10);
        $obj->setHeight(50);
        print "The bottom surface of the radius: {$obj->getRadius()}" . '<br>';
        print "The height of the cone: {$obj->getHeight()}" . '<br>';

        print "The volume of the cone: {$obj->getVolume()}";
       ?>
    </p>
  </body>
</html>

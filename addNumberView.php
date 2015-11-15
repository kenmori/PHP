<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>addNumber using extend Class of OOP</title>
  </head>
  <body>
      <?php
        require_once 'addNumberSub.php';
        $obj = new AddNumberSub();
        $obj->addProperty(30);
        $obj->recorder();
        print "result : {$obj->getNumber()}";
        $obj->getRecord();
        $obj->addProperty(100);
        print 'num = ' . $obj->getNum() . '<br>';
        print 'recorder =' . $obj->getRecord();
      ?>
  </body>
</html>

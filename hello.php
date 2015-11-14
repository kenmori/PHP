<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $arr = array("one", "two", "three");
    foreach($arr as $value) {
      print "Value: $value <br />\n";
    }
    ?>
    <?php
      $arr = array('id:10' => 'モリタ', 'id:11' => '高木');
      foreach($arr as $value){
        print "Value: $value<br>";
      }
    ?>
    <?php
    function testScope(){
      require_once 'func.php';
      $area = getArea(20, 14);;
      print $scope;
      print '四角形の面積' . $area;
      return $scope;
      }
      print testScope();
      print $scope; //Notice: Undefined variable: scope in /Users/No51/Desktop/Git/php/hello.php on line 29
    ?>

    <?php
      require_once 'test.php';
      $obj = new Test();
      $obj -> calculate(5, 2);
      print "プロパティの値は{$obj->number}です";
    ?>


    <!-- $$a = 'word!';
      ?>
    <?php
    print "$a $$a";
    ?> -->
  </body>
</html>

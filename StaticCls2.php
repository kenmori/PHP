<?php
  Class StaticCls2 {
    const pr = 3.14;
    public static $ENSHU = 3.14;
    public static function getCircleArea($radius){
     return pow($radius, 2) * self::$ENSHU;
     //or return pow($radius, 2) * self::pr;
    }
  }
?>

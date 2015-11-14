<?php
  class Calculate{
      public $tax;
      public function __construct($tax){
        $this->tax = $tax;
      }
      public function taxCalculate($price){
        return $price * (1 + $this->tax);
      }
  }
 ?>

<?php
  require_once 'addNumber.php';
  class AddNumberSub extends AddNUmber{
      private $record;
      public function recorder(){
        $this->record = $this.num;
      }
      public function getRecord(){
        return $this->record;
      }
  }
?>

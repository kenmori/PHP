<?php
  class Cone1{
  const PI = 3.14;
  private $radius;
  private $height;

  public function setRadius($base){
    $this->radius = $base;
  }
  public function setHeight($height){
    $this->height = $height;
  }
  public function getRadius(){
    return $this->radius;
  }
  public function getHeight(){
    return $this->height;
  }
  ///
  public function getVolume(){
    $area = pow($this->radius,2) * self::PI;
    return $area * $this->height / 3;
  }
}

?>

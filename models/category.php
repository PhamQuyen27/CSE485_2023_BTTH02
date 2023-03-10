<?php

class Category {
    // Thuộc tính
    private $ma_tloai;
    private $ten_tloai;
    public function __construct($ma_tloai=NULL,$ten_tloai=Null ) {
        $this->ma_tloai = $ma_tloai;
        $this->ten_tloai = $ten_tloai;
}
  //Setter và Getter
  public function getMaTloai(){
    return $this->ma_tloai;
  }
  public function setMaTloai($ma_tloai) {
    $this->ma_tloai = $ma_tloai;
}
 public function getTentloai(){
   return $this->ten_tloai; 
 }
 public function setTentloai($ten_tloai) {
    $this->ten_tloai = $ten_tloai;
 }
}
?>
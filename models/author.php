<?php
class Author{

    private $ma_tgia;
    private $ten_tgia;

    public function __construct($ma_tgia=NULL, $ten_tgia=NULL){
        $this->ma_tgia = $ma_tgia;
        $this->ten_tgia = $ten_tgia;
    }

    public function getMatgia(){
        return $this->ma_tgia;
    }

    public function setMatgia($ma_tgia){
        $this->ma_tgia = $ma_tgia;
    }

    public function getTentgia(){
        return $this->ten_tgia;
    }

    public function setTentgia($ten_tgia){
        $this->ten_tgia = $ten_tgia;
    }
}
?>
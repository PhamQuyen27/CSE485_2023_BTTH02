<?php
// require_once '../config/DBConnection.php';
class Article{
    private $conn = null;
    private $result = null;
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'btth01_cse485';


    public function connect() {
        $this->conn = new mysqli( $this->hostname, $this->username, $this->pass, $this->dbname );
        if ( !$this->conn ) {
            echo 'Kết nối thất bại';
            exit();
        } else {
            mysqli_set_charset( $this->conn, 'utf8' );
        }
        return $this->conn;

    }

    public function execute( $sql ) {
        $this->result = $this->conn->query( $sql );
        return $this->result;
    }

    //phương thức lấy dữ liệu

    public function getData() {
        // $sql = "SELECT * FROM $table";
        // $this->execute($sql)

        if ( $this->result ) {
            $data = mysqli_fetch_array( $this->result );
        } else {
            $data = 0;
        }
        return $data;
    }

    //phương thức lấy toàn bộ dữ liệu

    public function getAllData() {
        if ( !$this->result ) {
            $data = 0;
        } else {
            while( $data = $this->getData() ) {
                $data[] = $data;
            }
        }
        return $data;
    }


    public function InsertData($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $hinhanh){
        $sql = "INSERT INTO baiviet (ma_bviet,tieude, ten_bhat,ma_tloai,tomtat,noidung, ma_tgia,hinhanh) VALUES(null,'$tieude','$ten_bhat','$ma_tloai','$tomtat','$noidung','$ma_tgia','$hinhanh')";
        return $this->execute($sql);
    }

    public function UpdateData($ma_bviet, $tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $hinhanh){
        $sql ="UPDATE baiviet SET tieude = '$tieude', ten_bhat ='$ten_bhat', ma_tloai = '$ma_tloai', tomtat ='$tomtat', noidung = '$noidung',ma_tgia = '$ma_tgia',hinhanh = '$hinhanh' 
        WHERE ma_bviet ='$ma_bviet'" ;
        return $this->execute($sql);
    }

    public function DeteleData($ma_bviet){
        $sql = "DELETA FROM baiviet WHERE ma_bviet = '$ma_bviet'";
        return $this->execute($sql);
    }

}
<?php

class Database {
    private $hostname = 'localhost';
    private $username = 'root';
    private $password = '';
    private $dbname = 'btth02_cse485';

    private $conn = NULL;
    private $result = NULL;

    public function connect() {
        $this->conn = new mysqli( $this->hostname, $this->username, $this->password, $this->dbname );
        if ( !$this->conn ) {
            echo 'Kết nối thất bại';
            exit();
        } else {
            mysqli_set_charset( $this->conn, 'utf8' );
        }
        return $this->conn;
    }

    //Thực thi câu lệnh truy vấn

    public function execute() {
        $this->result = $this->conn->query( $sql );
        return $this->result;
    }

    //Phương thức lấy dữ liệu

    public function getData() {
        if ( $this->result ) {
            $data = myspli_fetch_array( $this->result );
        } else {
            $data = 0;
        }
        return $data;
    }

    //Phương thức lấy toàn bộ dữ liệu

    public function getAllData() {
        if ( !$this->result ) {
            $data = 0;
        } else {
            while( $data = $this->getData() ) {
                $data[] = $datas;

            }
        }
        return $data;
    }

    //Phương thức đếm số bản ghi

    //Phương thức thêm dữ liệu

    public function insertData( $ma_tgia, $ten_tgia, $hinh_tgia ) {
        $sql = "INSERT INTO tacgia(matgia, ten_tgia, hinh_tgia)VALUES(NULL,'$ten_tgia','$hinh_tgia')";
        return $this->execute( $sql );
    }

    //Phương thức sửa dữ liệu

    public function updateData( $ma_tgia, $ten_tgia, $hinh_tgia ) {
        $sql = "UPDATE tacgia SET ten_tgia='$ten_tgia', hinh_tgia='$hinh_tgia' WHERE ma_tgia='$ma_tgia'";
        return $this->execute( $sql );
    }

    //Phương thức xóa dữ liệu

    public function deleteData( $ma_tgia ) {
        $sql = "DELETE FORM tacgia WHERE ma_tgia='$ma_tgia'";
        return $this->execute( $sql );
    }

}
?>
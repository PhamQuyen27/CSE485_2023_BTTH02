<?php

class Database1{
    private $host="localhost";
    private $username="root";
    private $password="";
    private $database="btth01_cse485";

    private $conn = NULL;
    private $result = NULL;
    public function connect(){
        $this->conn= new mysqli($this->host, $this->username, $this->password, $this->database);
        if(!$this->conn){
            echo "ket noi that bai";
            exit();
        }
        else{
            mysqli_set_charset($this->conn,'utf8');
        }
        return $this->conn;
    }
    // thuc thi cau lech truy van
    public function execute($sql){
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    // phuong thuc lay du lieu
    public function getData(){
        if($this->result){
            $data = mysqli_fetch_array($this->result);
        }else{
            $data = 0;
        }
        return $data;
    }
    // phuong thuc lay toan bo dulieu
    public function getAllData($table){
        $sql = "SELECT * FROM $table ";
        $this->execute($sql);
        $data = array();
        if($this->num_rows()== 0){
            $data =0;
        }else{
            while($datas = $this->getData()){
                $data[] = $datas;
            }
        }
        return $data;
    }
    // dem so luong ban ghi
    public function num_rows(){
        if($this->result){
            $num = mysqli_num_rows($this->result);
        }
        else{
            $num = 0;
        }
        return $num;
    }

    public function getCount(string $table)
    {
        $sql = "SELECT COUNT(*) AS so_luong FROM  $table ";
        $this->execute($sql);
        $row =  $this->getData();
        return $row['so_luong'];
    }
 


}
?>
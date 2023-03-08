<?php
require_once("configs/DBConnection.php");
include("models/Category.php");
class CategoryService{
    public function getAllCategory(){
    $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();
       $sql = "SELECT * FROM theloai";
       $stmt = $conn->query($sql);   
      
       $categories = [];
       while($row = $stmt->fetch()){
           $category = new Category( $row['ma_tloai'], $row['ten_tloai']);
           array_push($categories,$category);
       }
       return $categories;
    }
    public function getCategory($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM theloai where ma_tloai ='" . $id . "'";
        $stmt = $conn->query($sql);

        $categories = [];
        while($row = $stmt->fetch()){
            $category = new Category( $row['ma_tloai'], $row['ten_tloai']);
            array_push($categories,$category);
        }
        return $categories;

    }
    public function updateCategory($id,$name)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql_update = "UPDATE `theloai` SET `ten_tloai`='" . $name . "' WHERE `ma_tloai` = '" . $id . "'";
        $stmt_update = $conn->query($sql_update);

        $sql_select = "SELECT * FROM theloai";
        $stmt_select = $conn->query($sql_select);

        $categories=[];

        while($row = $stmt_select->fetch()){
            $category = new Category( $row['ma_tloai'], $row['ten_tloai']);
            array_push($categories,$category);
        }


        return $categories;
    }
    public function addCategory($name)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
         $sql_store = "INSERT INTO `theloai`(`ten_tloai`) VALUES ('" . $name . "')";
         $stmt_store = $conn->query($sql_store);
 
         $sql_select = "SELECT * FROM theloai";
         $stmt_select = $conn->query($sql_select);
 
         $categorys = [];
         while($row = $stmt_select->fetch()){
             $category = new Category( $row['ma_tloai'], $row['ten_tloai']);
             array_push($categorys,$category);
         }
 
         return $categorys;
    }
    public function deleteCategory($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
         // B2. Truy vấn
         $sql_delete = "DELETE FROM `theloai` WHERE `ma_tloai` = '" . $id . "'";
         $stmt_delete = $conn->query($sql_delete);
 
         $sql_select = "SELECT * FROM theloai";
         $stmt_select = $conn->query($sql_select);
 
         // B3. Xử lý kết quả
         $categorys = [];
         while($row = $stmt_select->fetch()){
             $category = new Category( $row['ma_tloai'], $row['ten_tloai']);
             array_push($categorys,$category);
         }
 
         // Mảng (danh sách) các đối tượng Category Model
 
         return $categorys;
    }
}
?>
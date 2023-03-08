<?php
require_once("configs/DBConnection.php");
include("models/Author.php");
class AuthorService{
    public function getAllAuthor(){
        $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();
       $sql = "SELECT * FROM tacgia";
       $stmt = $conn->query($sql);   
      
       $authors = [];
       while($row = $stmt->fetch()){
           $author = new Author( $row['ma_tgia'], $row['ten_tgia']);
           array_push($authors,$author);
       }
       return $authors;
    }

    public function getAuthor($id)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT * FROM tacgia where ma_tgia ='" . $id . "'";
        $stmt = $conn->query($sql);

        $authors = [];
        while($row = $stmt->fetch()){
            $author = new Author( $row['ma_tgia'], $row['ten_tgia']);
            array_push($authors,$author);
        }
        return $authors;

    }

    public function updateAuthor($id,$name)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();

        $sql_update = "UPDATE `tacgia` SET `ten_tgia`='" . $name . "' WHERE `ma_tgia` = '" . $id . "'";
        $stmt_update = $conn->query($sql_update);

        $sql_select = "SELECT * FROM tacgia";
        $stmt_select = $conn->query($sql_select);

        $authors=[];

        while($row = $stmt_select->fetch()){
            $author = new Author( $row['ma_tgia'], $row['ten_tgia']);
            array_push($authors,$author);
        }


        return $authors;
    }
  
    public function addAuthor($name)
    {
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
         $sql_store = "INSERT INTO `tacgia`(`ten_tgia`) VALUES ('" . $name . "')";
         $stmt_store = $conn->query($sql_store);
 
         $sql_select = "SELECT * FROM tacgia";
         $stmt_select = $conn->query($sql_select);
 
         $authors = [];
         while($row = $stmt_select->fetch()){
             $author = new Author( $row['ma_tgia'], $row['ten_tgia']);
             array_push($authors,$author);
         }
 
         return $authors;
    }

    public function deleteAuthor($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
         $sql_delete = "DELETE FROM `tacgia` WHERE `ma_tgia` = '" . $id . "'";
         $stmt_delete = $conn->query($sql_delete);
 
         $sql_select = "SELECT * FROM tacgia";
         $stmt_select = $conn->query($sql_select);
 
         $authors = [];
         while($row = $stmt_select->fetch()){
             $author = new Author( $row['ma_tgia'], $row['ten_tgia']);
             array_push($authors,$author);
         }
 
         return $authors;
    }
}
?>
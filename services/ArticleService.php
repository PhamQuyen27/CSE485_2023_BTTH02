<?php
require_once ('configs/DBConnection.php');
include ('models/Article.php');
class ArticleService{
    public function getAllArticles(){
        // 4 bước thực hiện
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        // B2. Truy vấn
        // $sql = "SELECT * FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai=theloai.ma_tloai INNER JOHN tacgia ON baiviet.ma_tgia=tacgia.ma_tgia WHERE ma_bviet = '$mabviet' ";
        // $sql = "SELECT baiviet.*,theloai.ten_tloai, tacgia.ten_tgia FROM baiviet, theloai, tacgia WHERE baiviet.ma_tgia = tacgia.ma_tgia AND baiviet.ma_tloai = theloai.ma_tloai";
        // $sql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat,baiviet.tomtat, tacgia.ten_tgia, theloai.ten_tloai, baiviet.ngayviet, baiviet.hinhanh FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE baiviet.ma_bviet = '" . $id . "'";


        $sql = "SELECT * FROM baiviet
                INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
                INNER JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai";
        $stmt = $conn->query($sql);

        // B3. Xử lý kết quả
        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($articles,$article);
        }

        // Mảng (danh sách) các đối tượng Article Model

        return $articles;
    }

    public function getDetailArticle($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
        $sql = "SELECT *
        FROM baiviet
        INNER JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
        INNER JOIN theloai ON theloai.ma_tloai = baiviet.ma_tloai
        WHERE ma_bviet = '".$id."'";
         $stmt = $conn->query($sql);

        $articles = [];
        while($row = $stmt->fetch()){
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($articles,$article);
        }


        return $articles;
    }

    public function get_id_Article($id)
    {
        $dbConn = new DbConnection();
        $conn = $dbConn->getConnection();

        $sql = "SELECT baiviet.*,theloai.ten_tloai, tacgia.ten_tgia 
                FROM baiviet, theloai, tacgia 
                WHERE baiviet.ma_tgia = tacgia.ma_tgia AND baiviet.ma_tloai = theloai.ma_tloai AND baiviet.ma_bviet = $id;";
        $stmt = $conn->query($sql);

        $articles = [];
        while ($row = $stmt->fetch()) {
            $article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ten_tloai'], $row['tomtat'], $row['noidung'], $row['ten_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($articles, $article);
        }
        return $articles;
    }

    public function getUpdateArticles($tieude,$tenbhat,$matloai,$tomtat,$noidung,$matgia,$ngayviet,$hinhanh,$mabviet){
       $dbConn = new DBConnection();
       $conn = $dbConn->getConnection();

        $sql = "UPDATE baiviet SET tieude = '$tieude', ten_bhat = '$tenbhat', ma_tloai = '$matloai' , tomtat = '$tomtat',
        noidung = '$noidung' , ma_tgia = '$matgia' , ngayviet = '$ngayviet' , hinhanh = '$hinhanh' WHERE ma_bviet = '$mabviet' ";
        $stmt = $conn->query($sql);

        $update_articles = [];
        while($row = $stmt->fetch()){
            $update_article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($update_articles,$update_article);
        }

        return $update_articles;
    }

    public function getAddArticles( ){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tieuDe = $_POST['txttieude'];
            $baiHat = $_POST['txttenbaihat'];
            $maTloai = $_POST['txttloai'];
            $tomTat = $_POST['txttomtat'];
            $noiDung = $_POST['txtnoidung'];
            $maTgia = $_POST['txttgia'];
            $link =  $_POST['path'].$_FILES['file-upload']['name'];
            $hinhAnh = $_FILES['file-upload']['name'];

            $sql_add = "INSERT INTO `baiviet`(`tieude`, `ten_bhat`, `ma_tloai`, `tomtat`, `noidung`, `ma_tgia`, `ngayviet`, `hinhanh`) 
            VALUES ('$tieuDe','$baiHat','$maTloai','$tomTat','$noiDung','$maTgia',CURDATE(),'$hinhAnh')";
            $stmt = $conn->query($sql_add);
            move_uploaded_file($_FILES['file-upload']['tmp_name'], $link);//mac ko can dung`
            if ($stmt) {
                return true;
            } else { 
                return false;
            }
        }
    }

    public function deleteArticle($id){
        $dbConn = new DBConnection();
        $conn = $dbConn->getConnection();
 
        $sql_delete = "DELETE FROM `baiviet` WHERE `ma_bviet` = '" . $id . "'";
        $stmt_delete = $conn->query($sql_delete);
 
        $sql_select = "SELECT * FROM baiviet";
        $stmt_select = $conn->query($sql_select);
 
        $delete_articles = [];
        while($row = $stmt_select->fetch()){
            $delete_article = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
            array_push($delete_articles,$delete_article);
        }
  
        return $delete_articles;
    }
}
?>
<?php
require_once ('services/ArticleService.php');
require_once ('services/CategoryService.php');
require_once ('services/AuthorService.php');
class ArticleController{
    // // Hàm xử lý hành động index
     public function index(){
        $articleService = new ArticleService();
        $articles = $articleService->getAllArticles();
        include('views/article/list_article.php');
     }

     public function edit($id){
        $authorService = new AuthorService($id);
        $id_authors = $authorService->getAuthor($id);
        $categoryService = new CategoryService($id);
        $id_categories = $categoryService->getCategory($id);
        $articleService = new ArticleService($id);
        $id_articles = $articleService->get_id_Article($id);
        $authorService = new AuthorService();
        $authors = $authorService->getAllAuthor();
        $categoryService = new CategoryService();
        $categories = $categoryService->getAllCategory();
        include("views/article/edit_article.php");
    }

     public function create(){
      $authorService = new AuthorService();
      $authors = $authorService->getAllAuthor();
      $categoryService = new CategoryService();
      $categories = $categoryService->getAllCategory();
        include('views/article/add_article.php');
     }
     
     public function update($id){
        $articleService = new ArticleService($id);
        $article = $articleService->getUpdateArticles($_POST['txttieude'],$_POST['txttenbaihat'],$_POST['txttloai'],$_POST['txttomtat'],$_POST['txtnoidung'],$_POST['txttgia'],$_POST['txtmabaiviet']);
        include('views/article/edit_article.php');
     }

     public function add(){
          $articleService = new ArticleService();
        //   $articleService->getAddArticles();
          if ($articleService->getAddArticles()) {
            self::index();
        }
        
      }

     public function delete(){
           $articleService = new ArticleService();
           $articles = $articleService->deleteArticle($_GET['id']);

            include("views/article/list_article.php");
     }

    // public function add(){
    //     // Nhiệm vụ 1: Tương tác với Services/Models
    //     // echo "Tương tác với Services/Models from Article";
    //     // Nhiệm vụ 2: Tương tác với View
    //     include("views/article/add_article.php");
    // }

    // public function list(){
    //     // Nhiệm vụ 1: Tương tác với Services/Models
    //     // echo "Tương tác với Services/Models from Article";
    //     // Nhiệm vụ 2: Tương tác với View
    //     include("views/article/list_article.php");
    // }
}
    // include "models/Article.php";
    // $db_article = new Article();
    // $db_article->connect();
    // if(isset($_GET['action'])){
    //     $action = $_GET['action'];
    // }else{
    //     $action ='';
    // }

    // $success = array();
    // switch($action){
    //     case 'list_article':
    //         $tblTable = "baiviet";
    //         $db_article->getData($tblTable);
    //         $data = $db_article->getAllData($tblTable);
    //         require_once('views/article/list_article.php');
    //         break;
    //     case 'add_article':
    //         if(isset($_POST['add_arrticle'])){
    //             $tieude = $_POST['tieude'];
    //             $tenbhat = $_POST['tenbhat'];
    //             $matloai = $_POST['matloai'];
    //             $tomtat = $_POST['tomtat'];
    //             $noidung = $_POST['noidung'];
    //             $matgia = $_POST['matgia'];
    //             $hinhanh = $_FILE['hinhanh']['name'];
    //             $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    //             move_uploaded_file($hinhanh_tmp,'assets/images/songs/'.$hinhanh);
    //             if($db_article->InsertData($tieude, $tenbhat, $matgia, $tomtat, $noidung, $matgia,$hinhanh)){
    //                 $success[] = 'add_success';
    //             };                
    //         }
    //         require_once('views/article/add_article.php');
    //         break;
    //     case 'edit':
    //         require_once('views/article/edit_article.php');
    //         break;
    //     case 'delete':
    //         require_once('views/article/del_article.php');
    //         break;
    //     default:{
    //         require_once('views/article/list_article.php');
    //         break;
    //     }
    // }
?>
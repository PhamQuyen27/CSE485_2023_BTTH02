
<!-- Routing là gì? Định tuyến/Điều hướng -->
<!-- Phân tích xem: URL của người dùng > Muốn gì -->
<!-- Ví dụ: Trang chủ, Quản lý bài viết hay Thêm bài viết -->
<!-- Chuyển quyền cho Controller tương ứng điều khiển tiếp -->
<!-- URL của tôi thiết kế luôn có dạng: -->

<!-- http://localhost/btth02v2/index.php?controller=A&action=B -->
<!-- http://localhost/btth02v2/index.php -->
<!-- http://localhost/btth02v2/index.php?controller=home&action=index -->

<!-- Controller là tên của FILE controller mà chúng ta sẽ gọi -->
<!-- Action là tên cả HÀM trong FILE controller mà chúng ta gọi -->

<!-- 
// B1: Bắt giá trị controller và action
$controller = isset($_GET['controller'])?   $_GET['controller']:'home';
$action     = isset($_GET['action'])?       $_GET['action']:'index';

// B2: Chuẩn hóa tên trước khi gọi
$controller = ucfirst($controller);
$controller .= 'Controller';
$controllerPath = 'controllers/'.$controller.'.php';

// B3. Để gọi nó Controller
if(!file_exists($controllerPath)){
    die('Lỗi! Controller này không tồn tại');
}
require_once($controllerPath);
// B4. Tạo đối tượng và gọi hàm của Controller
$myObj = new $controller();  //controller=home > new HomeController()
$myObj->$action(); //action=index > index() -->

<?php
    include "models/Article.php";
    include "models/Member.php";
    $db = (new DBConnection())->getConnection();

    if(isset ($_GET['controller'])){
        $controller = $_GET['controller'];
    }
    else{
       $controller = '';
    }
    switch($controller){
        case 'home':{
            require_once('controllers/HomeController.php');
        }
        case 'article':{
            require_once('controllers/ArticleController.php');
        }
    }
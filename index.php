<?php

$controller = isset($_GET['controller'])?   $_GET['controller']:'home';
$action     = isset($_GET['action'])?       $_GET['action']:'index';
$id         = isset($_GET['id'])?       $_GET['id'] : null;

// if ( isset( $_GET[ 'controller' ] ) ) {
//     $controller = $_GET[ 'controller' ];
// } else {
//     $controller = '';
// }
// switch( $controller ) {
//     case 'home':{
//         require_once('controllers/HomeController.php');
//         break;
//     }
//     case 'member':{
//         require_once('controllers/MemberController.php');
//     }
//     case 'article':{
//         require_once('controllers/ArticleController.php');
//     }
// }

//
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
$myObj->$action($id); //action=index > index()
?>

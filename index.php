<?php


include "models/Home.php";
$db = new Database1;
$db-> connect();

// $con = new DB;
// $con->connect();



if ( isset( $_GET[ 'controller' ] ) ) {
    $controller = $_GET[ 'controller' ];
} else {
    $controller = '';
}
switch( $controller ) {
    case 'home':{
        require_once('controllers/HomeController.php');
        break;
    }
    case 'member':{
        require_once('controllers/MemberController.php');
    }
}

?>
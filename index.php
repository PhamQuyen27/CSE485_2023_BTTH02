<?php

// include 'configs/DBConnection.php';

include "models/Article.php";
$db = new Article;
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

}

?>
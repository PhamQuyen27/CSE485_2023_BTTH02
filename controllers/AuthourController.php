<?php
// include "models/DBConnection.php";


if ( isset( $_GET[ 'action' ] ) ) {
    $action = $_GET[ 'action' ];
} else {
    $action = '';
}

$thanhcong = array();

switch( $action ) {
    case 'add': {
        if(isset($_POST['insert'])){
            $tentgia = $_POST['txtName'];
            $hinhtgia = $_POST['txtLink'];

            if($con->insertData($tentgia,$hinhtgia)){
                $thanhcong[] = 'add_success';
            }
        }
        require_once( 'views/author/add_author.php' );
        break;
    }
    case 'edit': {
        $id = $_GET['id'];
        $tblTable = "tacgia WHERE ma_tgia= '$id'";
        $data = $con->getAllData($tblTable);

        if(isset($_POST['update'])){
            $tentgia = $_POST['txtName'];
            $hinhtgia = $_POST['txtLink'];

            if($con->updateData($id,$tentgia,$hinhtgia)){
                $thanhcong[] = 'update_success';
                
                $tblTable = "tacgia WHERE ma_tgia= '$id'";
                $data = $con->getAllData($tblTable);
            }
        }
        require_once( 'views/author/edit_author.php' );
        break;
    }
    case 'del': {
        if(isset($_POST['delete'])){
            $matgia = $_GET['id'];
            if($con->deleteData($matgia)){
                $thanhcong[] = 'del_success';
            }
        }
        require_once( 'views/author/del_author.php' );
        break;
    }
    case 'home':{
        $tblTable = "tacgia";
        $data = $con->getAllData($tblTable);
        require_once( 'views/author/author.php' );
        break;
 
    }
    default: {
        require_once( 'views/author/author.php' );
        break;
    }

}
?>
<?php

if(isset($_GET['action'])){
     $action = $_GET['action'];
 }
 else{
     $action = '';
 }

// $thatbai = array();

 switch($action){
     case 'login':{   
        if ($_POST) {
            $user_name = $_POST['txtUser'];
            $password = $_POST['txtPass'];
            $tbltenbang = "users where username = '$user_name' and password = '$password'";
              $data = $db->getAllData($tbltenbang); 
              if($data){
                header("Location: index.php?controller=member&action=admin");
  
              }else{
                  $thatbai = "thatbai";
              }
        }
         require_once('views/home/login.php');
         break;
     }
     case 'admin':{
        $tblusers = "users";
        $count_users = $db->getCount($tblusers); 

        $tbltheloai = "theloai";
        $count_theloai = $db->getCount($tbltheloai); 

        $tbltacgia = "tacgia";
        $count_tacgia = $db->getCount($tbltacgia);
        
        $tblbaiviet = "baiviet";
        $count_baiviet = $db->getCount($tblbaiviet); 

        require_once('views/admin/index.php');
        break;
    }
    
 }
?>
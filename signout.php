<?php
 session_start();
    require_once("includes/DAO.php");

    $d = new DAO();

    if(isset($_SESSION['islogin'])){

        $value = array(
            "is_login"=>0
        );
        $u = $_SESSION['uid'];
        $res = $d->update("users",$value,"uid='$u'");

        if($res['status']=="SUCCESS"){
            session_destroy();
            header('location:index.php');
        }

    }
?>
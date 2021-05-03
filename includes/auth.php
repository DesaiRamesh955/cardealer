<?php
 session_start();
 require_once("DAO.php");

 $d = new DAO();
 

 if(isset($_POST['signup_form'])){
    $data = sanitize($_POST);
    extract($data);

    $value = array(
       "first_name"=>$fname,
       "last_name"=>$lname,
       "email"=>$email,
       "password"=>password_hash($password,PASSWORD_BCRYPT,["cost" => 10]),
       "number"=>$mobile,
       "role"=>$role
   );
    
    $emailExist =  $d->countRow("users","email","email='$email'");
    $mobileExist =  $d->countRow("users","number","number=$mobile");
   
    if(!$emailExist){
       if(!$mobileExist){
            $res = $d->insert("users",$value);

            if($res['status']=="SUCCESS"){
                echo json_encode(['res'=>'USER_CREATED_SUCCESSFULLY']);//JSON response when success
            }else{
            echo json_encode(['res'=>'USER_CREATED_FAILED']);//JSON response when failed
            }
       }else{
            echo json_encode(['res'=>'MOBILE_EXIST']);//JSON response when success
       }
    }else{
        echo json_encode(['res'=>'EMAIL_EXIST']);//JSON response when success
    }
    
 }


 if(isset($_POST['signin_form'])){
     extract($_POST);
   

   $user = $d->select("users","email='$user'");
   if(!$user){
    echo json_encode(['res'=>"INVALID_CREDENTIALS"]);
    exit;
   }
   $user = $user[0];
   if(password_verify($password,$user['password'])){
    
       if($user['active']==1){
            $_SESSION['islogin'] = true;
            $_SESSION['uid'] = $user['uid'];
            $_SESSION['username'] = $user['first_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = $user['verified'];
            $_SESSION['role'] = $user['role'];
            
            
            $value = array(
                "is_login"=>1
            );
            $u = $user['uid'];
            $res = $d->update("users",$value,"uid='$u'");
            
            echo json_encode(['res'=>"SUCCESS","role"=>$user['role']]);
       }else{
           echo json_encode(['res'=>"USER_BLOCKED"]);
       }


   }else{
    echo json_encode(['res'=>"INVALID_CREDENTIALS"]);
   }
 }


?>
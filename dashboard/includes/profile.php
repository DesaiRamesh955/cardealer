<?php
 session_start();
 require_once("../../includes/DAO.php");

 $d = new DAO();


 if( isset($_POST['profile_form'])){
    $data = sanitize($_POST);
    extract($data);
    $map = $_POST['map'];
    $values = [
        'first_name'=>$fname,
        'last_name'=>$lname,
        'number'=>$number,
        'second_number'=>$alt_number,
        'email'=>$email,
        'map'=>$map
    ];

    $uid = $_SESSION['uid'];
    $emailExist =  $d->countRow("users","email","email='$email' AND uid!=$uid");
    $mobileExist =  $d->countRow("users","number","number=$number AND uid!=$uid");
    $altMobileExist =  $d->countRow("users","second_number","second_number=$alt_number AND uid!=$uid");

    if(!$emailExist){
        if(!$mobileExist){
            if(!$altMobileExist){
                $get_data = $d->update('users',$values,"uid=$uid");
                if($get_data['status']=="SUCCESS"){
                    echo json_encode(["status"=>"SUCCESS"]);//JSON response when success
                }else{
                    echo json_encode(['status'=>'FAILED']);//JSON response when failed

                }
            }else{
                echo json_encode(['status'=>'ALT_MOBILE_EXIST']);//JSON response when success
            }
        }else{
            echo json_encode(['status'=>'MOBILE_EXIST']);//JSON response when success
        }
    }else{
        echo json_encode(['status'=>'EMAIL_EXIST']);//JSON response when success
    }

    
 }

 //get profile data

 if(isset($_POST['getProfileData'])){
    $uid = $_SESSION['uid'];
     $data = $d->select('users',"uid=$uid")[0];
     $new_data = [
         'first_name'=>$data['first_name'],
         'last_name'=>$data['last_name'],
         'email'=>$data['email'],
         'number'=>$data['number'],
         'second_number'=>$data['second_number'],
         'map'=>$data['map']
     ];
     if($new_data){
        echo json_encode(['status'=>'SUCCESS','data'=>$new_data]);//JSON response when success
     }
 }
 ?>
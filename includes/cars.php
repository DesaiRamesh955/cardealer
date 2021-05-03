<?php
 
 require_once("DAO.php");

 $d = new DAO();
 


 if(isset($_POST['getCars'])){
    extract($_POST);    
    $record_per_page = 6;
    $total_rows = $d->countRow('vehicles');
    $start = ($page-1)*$record_per_page;
    $total_page = ceil($total_rows/$record_per_page);
   
    $data = $d->select("vehicles",'',"LIMIT $start,$record_per_page");
    
    if($data){
        echo json_encode(['res'=>"SUCCESS","data"=>$data,"totalPage"=>$total_page]);
    }else{
        echo json_encode(['res'=>"FAILED"]);

    }
 }

 if(isset($_POST['getFeatureCar'])){
    
   
    $data = $d->select("vehicles",'',"ORDER BY RAND() LIMIT 12");
    
    if($data){
        echo json_encode(['res'=>"SUCCESS","data"=>$data]);
    }else{
        echo json_encode(['res'=>"FAILED"]);

    }
 }

 //get single car

 if(isset($_POST['getSingleCar'])){
    extract($_POST);
  
    $data = $d->select("vehicles","vid=$getSingleCar");
   

    if($data){
        $data = $data[0];
        $id =  $data['user'];
        $_contact = $d->select("users","uid=$id")[0];
        
    $contact = [
        'first_name'=>$_contact['first_name'],
        'last_name'=>$_contact['last_name'],
        'email'=>$_contact['email'],
        'number'=>$_contact['number'],
        'second_number'=>$_contact['second_number'],
        'map'=>$_contact['map'],
    ];
    if($data){
        echo json_encode(['res'=>"SUCCESS","data"=>$data,"contact"=>$contact]);
    }else{
        echo json_encode(['res'=>"FAILED"]);

    }
    }else{
        echo json_encode(['res'=>"FAILED"]);
    }

 }


 //inqury for vehicle


 if(isset($_POST['inqury_form'])){
    $data = sanitize($_POST);
    extract($data);

    $value = array(
        'name'=>$name,
        'email'=>$email,
        'number'=>$number,
        'description'=>$description,
        'vid'=>$carid,
        'uid'=>$uid,
    );

    $data = $d->insert('inquiry',$value);

    if($data['status']=="SUCCESS"){
        echo json_encode(['status'=>"SUCCESS"]);
    }else{
        echo json_encode(['status'=>"FAILED"]);

    }
 }


 ?>
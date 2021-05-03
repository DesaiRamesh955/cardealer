<?php
 session_start();
 require_once("../../includes/DAO.php");

 $d = new DAO();
// add vehicle detail
if( isset($_POST['addvehicle_form']) && $_FILES['feature_image'] && $_FILES['all_images']){
    extract($_POST);
    $feature_image = $_FILES['feature_image'];
    $images = $_FILES['all_images'];
   
   $data = [];
   foreach($images as $index=>$file_info){
       
       foreach($file_info as $inner_index=>$value){
          $data[$inner_index][$index] = $value;
       }
   }

 $feature_image_upload_name = changeImageName($feature_image);
 $feature_image_upload =  move_uploaded_file($feature_image['tmp_name'],'../images/'.$feature_image_upload_name);
 
 $all_images_name  = [];
 $is_all_file_uploded = false;
 if($feature_image_upload){
     foreach($data as $file){
        $name = changeImageName($file);
        $upload = move_uploaded_file($file['tmp_name'],'../images/'.$name);
        array_push($all_images_name,$name); 
        if(!$upload){
            $is_all_file_uploded = false;
            foreach($all_images_name as $image){
                unlink('../images/'.$name);
            }
            break;
         }else{
             $is_all_file_uploded = true;
         }
     }
 }
  
 if(!$is_all_file_uploded){
    echo json_encode(['res'=>'Image upload failed']);
    exit;
 }

   date_default_timezone_set("Asia/Kolkata");
   $values = [
       "title"=>$title,
       "type"=>$type,
       "make"=>$make,
       "model_name"=>$model,
       "price"=>$price,
       "fuel"=>$fuel,
       "first_reg"=>$first_reg,
       "km"=>$km,
       "engine_size"=>$eng_size,
       "power"=>$power,
       "gearbox"=>$gearbox,
       "num_of_seats"=>$no_of_seats,
       "doors"=>$doors,
       "color"=>$colour,
       "description"=>$description,
       "extra"=>$extra,
       "insert_at"=>date('d/m/y h:i:s'),
       "active"=>$visibility,
       "feature_image"=>$feature_image_upload_name,
       "all_images"=>implode(",",$all_images_name),
       "slug"=>$d->slug($title),
       "user"=> $_SESSION['uid'],
   ];
 
   $data = $d->insert('vehicles',$values);
    if($data['status']=="SUCCESS"){
        echo json_encode(["res"=>"SUCCESS","last_id"=>$data['lastID']]);
    }else{
        echo json_encode(["res"=>"FAILED"]);
    }
 }


//update vehicle

if(isset($_POST['update_vehicle'])){
    extract($_POST);

    $feature_image = $_FILES['feature_image'];
    $images = $_FILES['all_images'];

    $data_images = [];
    foreach($images as $index=>$file_info){
        
        foreach($file_info as $inner_index=>$value){
            $data_images[$inner_index][$index] = $value;
        }
    }

   
   $data = $d->select('vehicles',"vid=$update_vehicle LIMIT 1")[0];
   $images_from_db = $data["all_images"];
   $image_feature = $data["feature_image"];
   $images_arr =[];
   if(!empty($images_from_db)){

       $images_arr = explode(",",$images_from_db);
   }
    

    $feature_image_upload_name = "";
    
   if(!empty($feature_image["name"])){
        $feature_image_upload_name = changeImageName($feature_image);
    
        $feature_image_upload =  move_uploaded_file($feature_image['tmp_name'],'../images/'.$feature_image_upload_name);
    }else{
        $feature_image_upload_name = $image_feature;
   }

    

   
   if(!empty($data_images[0]['name'])){
    $is_all_file_uploded = false;
        foreach($data_images as $file){
                    
            $name = changeImageName($file);
             $upload = move_uploaded_file($file['tmp_name'],'../images/'.$name);
            array_push($images_arr,$name); 
             if(!$upload){
                 $is_all_file_uploded = false;
                     unlink('../images/'.$name);
                 
                 break;
             }else{
                 $is_all_file_uploded = true;
             }
                    
        }

        

    if(!$is_all_file_uploded){
        echo json_encode(['res'=>'Image upload failed']);
        exit;
    }
}

    date_default_timezone_set("Asia/Kolkata");
    $values = [
        "title"=>$title,
        "type"=>$type,
        "make"=>$make,
        "model_name"=>$model,
        "price"=>$price,
        "fuel"=>$fuel,
        "first_reg"=>$first_reg,
        "km"=>$km,
        "engine_size"=>$eng_size,
        "power"=>$power,
        "gearbox"=>$gearbox,
        "num_of_seats"=>$no_of_seats,
        "doors"=>$doors,
        "color"=>$colour,
        "description"=>$description,
        "extra"=>$extra,
        "update_at"=>date('d/m/y h:i:s'),
        "active"=>$visibility,
        "feature_image"=>$feature_image_upload_name,
        "all_images"=>implode("," , $images_arr),
        "slug"=>$d->slug($title),
        "user"=> $_SESSION['uid'],
    ];
    $data = $d->update('vehicles',$values,"vid=$update_vehicle");
    if($data["status"]=="SUCCESS"){
        echo json_encode(["res"=>"SUCCESS","type"=>"UPDATED"]);
     }else{
        echo json_encode(["res"=>"FAILED","type"=>"UPDATED"]);
     }
}



 //get vehicle detail

if(isset($_POST['getvehicle'])){
    
    $vehicle = $d->select('vehicles');

    if($vehicle){
        echo json_encode(["status"=>"SUCCESS","data"=>$vehicle]);
    }else{
        echo json_encode(["msg"=>"NO_DATA_FOUND"]);
    }
}


//delete vehicle

if(isset($_POST['DeleteVehicle']) && !empty($_POST['DeleteVehicle'])){
    $vid = $_POST['DeleteVehicle'];

    $data = $d->delete('vehicles',"vid=$vid");

    
    if($data['status']=="SUCCESS"){
        echo json_encode(["status"=>"SUCCESS"]);
    }else{
        echo json_encode(["status"=>"FAILED"]);
    }
}

if(isset($_POST['updatevehicle']) && !empty($_POST['updatevehicle'])){
    $vid = $_POST['updatevehicle'];
    $user = $_SESSION['uid'];
    $data = $d->select('vehicles',"vid=$vid AND user=$user LIMIT 1");


    if($data){
        echo json_encode(["status"=>"SUCCESS","data"=>$data[0]]);
    }else{
        echo json_encode(["status"=>"FAILED"]);
    }
}

if(isset($_POST['signleImageDelete']) && !empty($_POST['signleImageDelete'])){

    extract($_POST);
    $user = $_SESSION['uid'];
    $new_images = [];
    $data = $d->select('vehicles',"vid=$vid LIMIT 1")[0];

     $images = $data["all_images"];
     $images_arr = explode(",",$images);

     foreach($images_arr as $image_new){
        if($image!=$image_new){
            array_push($new_images,$image_new);
        }
     }

     $value = [
         'all_images'=>implode(",",$new_images),
     ];

     $data = $d->update('vehicles',$value,"vid=$vid AND user=$user");
     

     if($data["status"]=="SUCCESS"){
        echo json_encode(["status"=>"SUCCESS"]);
     }else{
        echo json_encode(["status"=>"FAILED"]);
     }

  
}
 ?>
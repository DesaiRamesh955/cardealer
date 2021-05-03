<?php
 session_start();
 require_once("../../includes/DAO.php");

 $d = new DAO();

//get inquiry
if(isset($_POST['getInquiry'])){
    extract($_POST);
    $user = $_SESSION['uid'];
    $total_page = 0;
    $order = "ORDER BY id desc";
    if(!empty($filter)){
        if( $filter=="asc" ){
            $order = "ORDER BY id ASC";
        }else if($filter=="desc"){
            $order = "ORDER BY id desc";
        }
    }

        $date_filter = "";
        $sql = "";
        if(!empty($start_date) && !empty($end_date)){
            $start_date = date("Y-m-d", strtotime($start_date));
            $end_date = date("Y-m-d", strtotime($end_date));
            $date_filter = "WHERE insert_date BETWEEN '$start_date' AND '$end_date'";
            $sql = "SELECT i.*,v.title,v.vid,v.feature_image FROM inquiry i join vehicles v on v.vid=i.vid and i.uid=$user $date_filter $order";

        }else if(!empty($search)){
            $sql = "SELECT i.*,v.title,v.vid,v.feature_image FROM inquiry i join vehicles v on v.vid=i.vid and i.uid=$user WHERE i.name LIKE '%$search%' OR i.number LIKE '$search%'";

        }else{
            $record_per_page = 10;
            $total_rows = $d->countRow('inquiry');
            $start = ($page-1)*$record_per_page;
            $total_page = ceil($total_rows/$record_per_page);
            $sql = "SELECT i.*,v.title,v.vid,v.feature_image FROM inquiry i join vehicles v on v.vid=i.vid and i.uid=$user $date_filter $order LIMIT $start,$record_per_page";

        }
       
   
    $inquiry = $d->select_manual($sql);
    
    if($inquiry){
        echo json_encode(["status"=>"SUCCESS","data"=>$inquiry,"totalPage"=>$total_page]);
    }else{
        echo json_encode(["msg"=>"NO_DATA_FOUND"]);
    }
}

//delete inquiry

if(isset($_POST['deleteInquiry'])){
    extract($_POST);

    $data = $d->delete('inquiry',"id=$deleteInquiry");

    
    if($data['status']=="SUCCESS"){
        echo json_encode(["status"=>"SUCCESS"]);
    }else{
        echo json_encode(["status"=>"FAILED"]);
    }
}

 ?>
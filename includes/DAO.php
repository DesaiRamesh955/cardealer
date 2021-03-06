<?php

class DAO{

        private $con;//connection variable
        function __construct() 
        {
            include_once 'db.php'; // Give path to your database config
        
            $db = new DB(); // Create database class object
            $this->con = $db->connect(); // call database connection function
            
        }
        
        // function for insert data
        public function insert($table,$value){
            $field="";
            $val="";
            $para=[];
            $i=0;
            
            foreach ($value as $k => $v) {
                if($i == 0){
                    $field.=$k;
                    $val.="'".$v."'";
                    array_push($para,$v);
                }else {
                    $field.=",".$k;
                    $val.=",'".$v."'";
                    array_push($para,$v);
                }
                $i++;
            }
          
        
            $parameter = "";

            $num = count($value);
            for($i=0;$i<$num;$i++){
                if($i==$num-1){
                    $parameter.="?";
                }else{
                    $parameter.="?,";
                }
        
             }

            
            
            $stmt = $this->con->prepare("insert into $table($field) values($parameter)");
           
        
            if($stmt->execute($para)){
                $id = $this->con->lastInsertId();//get insert id
                return ['status'=>'SUCCESS','lastID' => $id];//JSON response when success
            }else{
                return ["status"=>"FAILED"];
            }
        }

        // function for select data
        function select($table, $where='', $other='')
        {
            if($where != '')
            {
                $where = 'where ' .$where;
            }
              
            
            $stmt = $this->con->prepare("SELECT * FROM $table $where $other");
           
            
            $data = [];
            if($stmt->execute()){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    array_push($data,$row);
                }
                return $data;
            }else{
                echo "no_data_found";
            }
           }


             // function for select data
        function select_manual($query)
        {
           
            $stmt = $this->con->prepare("$query");
           
            
            $data=[];
            if($stmt->execute()){
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    //array_push($data,$row);
                    $data[] = $row;
                }
                return $data;
            }else{
                echo "no_data_found";
            }
           }

            // function for select data
        function countRow($table,$column='', $where='', $other='')
        {
            if($where != '')
            {
                $where = 'where ' .$where;
            }
              
            if($column==''){
                $column = '*';
            }
            $stmt = $this->con->prepare("SELECT count($column) as c FROM $table $where $other");
            $stmt->execute();

                $row =  $stmt->fetch(PDO::FETCH_ASSOC);
                return $row['c'];
           

            
        }

        //function for delete data

        function delete($table,$where=''){
            if($where != '')
            {
                $where = 'where ' .$where;
            }
            $stmt = $this->con->prepare("DELETE FROM $table $where");
            
            if($stmt->execute()){
                return ['status'=>'SUCCESS'];//JSON response when success
            }else{
                return ["status"=>"FAILED"];
            }

        }

        //function for update data

        function update($table,$value,$where=''){

            $field="";
            $val="";
            $para=[];
            $i=0;
            
            foreach ($value as $k => $v) {
                if($i == 0){
                    $field.="$k=?";
                    array_push($para,$v);
                }else {
                    $field.=",$k=?";
                    array_push($para,$v);
                }
                $i++;
            }


          
            

            if($where != '')
            {
                $where = 'where ' .$where;
            }
               
            $stmt = $this->con->prepare("UPDATE $table SET $field $where");
            
            if($stmt->execute($para)){
                $id = $this->con->lastInsertId();//get insert id
                return ['status'=>'SUCCESS'];//JSON response when success
            }else{
                return ["status"=>"FAILED"];
            }

        }
    
       public function slug($str){
             return str_replace(" ","-",preg_replace("/[^A-Za-z0-9-]+/"," ",strtolower(trim($str))));
        }
}



function p($text){
    echo "<pre>";
     print_r($text);
    echo "</pre>";
}

function changeImageName($image){
        
    if(!empty($image)){
        $image_extract = explode('/',$image['type']);
        $image_ext = $image_extract[1];
        

        return rand().date("dmyhis").rand().".".$image_ext;
    }
    return false;
}

function sanitize($data){
    $post = [];
    foreach($data as $key => $value){
        $post[$key] = htmlentities(trim($value));
    }

    return $post;
}
?>
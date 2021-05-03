<?php

   class DB{
    public $con;

    public function connect(){
        try{
            $this->con = new PDO("mysql:host=localhost;dbname=car_dealer","root","");
            
            if($this->con){
               return $this->con;
            }
        }catch(Exception $e){
            die("Failed to connect db");
        }
    }
}

// $db = new DB;
// $db->connect();
?>
<?php
include './config.php';
class CheckMarks{
    private $db;

    function _CheckMarks(){
        $db=new PDO("mysql:host=".db_host.";dbname=".db_name,db_user,db_password);
    }
    public function getmarks($usn,$array){
        $sql="SELECT * from response WHERE usn=:usn";
        

    }
}

?>
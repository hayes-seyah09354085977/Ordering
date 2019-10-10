<?php
include('admin/stockin/php/Credentials/dbcon.php');
$cmd = $_POST['e'];
$user =  $_POST['user_email'];

switch($cmd){
    case "var":
            $stmt = $conn->prepare("SELECT Customer_Password FROM tblcustomer WHERE Email LIKE '".$user."' OR Customer_Username LIKE '".$user."'"); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            $size = sizeof($result);

            if($size == 0){
                echo 'NoRecord';
            }
            else{
              echo 
              
            }
            // print_r(json_encode($result,true));
            
           
        break;
   
}




?>
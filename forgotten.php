<?php
include('admin/stockin/php/Credentials/dbcon.php');
$cmd = $_POST['e'];
$user =  $_POST['user_email'];

switch($cmd){
    case "var":
            $stmt = $conn->prepare("SELECT Email,Customer_Password FROM tblcustomer WHERE Email LIKE '".$user."' OR Customer_Username LIKE '".$user."'"); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            $size = sizeof($result);

            if($size == 0){
                echo 'NoRecord';
            }
            else{

            //   echo  $result[0]['Customer_Password'].' '.$result[0]['Email'] ;
              $email =$result[0]['Email'];
              $msg = 'Your Password is '. $result[0]['Customer_Password'];
              $msg = wordwrap($msg,250);
              mail($email,"WatchUToyo Forgot Password",$msg);
              echo 'ok';
            }
            // print_r(json_encode($result,true));
            
           
        break;
   
}




?>
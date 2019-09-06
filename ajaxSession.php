<?php
require_once("include/initialize.php"); 
$e = $_POST['e'];
switch($e){
    case 'payment':
        $_SESSION['tp'] = $_POST['tp'];
        $_SESSION['mtp'] = $_POST['mtp'];
        $_SESSION['mp'] = $_POST['mp'];
        $_SESSION['pi'] = $_POST['pi'];
        $_SESSION['inp'] = $_POST['inp'];
        echo 'success';
    break;
    case 'orders':
        $_SESSION['reason'] = $_POST['reason'];
        echo 'success';
    break;
    case 'getMessage':
        global $mydb;
        $id = $_POST['id'];

        $sql="SELECT Remarks FROM `tblstockout` WHERE `StockoutID`='{$id}'"; 
            $mydb->setQuery($sql);
            $cur = $mydb->executeQuery();
            $res = mysqli_fetch_assoc($cur);
        print_r(json_encode($res));
    break;
}


?>
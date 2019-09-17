<?php
include("Credentials/dbcon.php");
$cmd = $_POST['e'];

switch($cmd){
    case "var":
            $stmt = $conn->prepare("SELECT * FROM tblvariation WHERE varcatid = '".$_POST['id']."'"); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            print_r(json_encode($result,true));
        break;
    case "manageuserpick":
            $stmt = $conn->prepare(""); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            print_r(json_encode($result,true));
        break;
}

?>

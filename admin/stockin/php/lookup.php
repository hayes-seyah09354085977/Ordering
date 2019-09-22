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
    case "value":
            $stmt = $conn->prepare("SELECT VariationBracket FROM tblstockin WHERE StockinID = ".$_POST['stockid']." "); 
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $stmt->fetchAll();
            print_r(json_encode($result,true));
        break;
}

?>

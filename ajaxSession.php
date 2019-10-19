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
        $_SESSION['total_payment']=$_POST['total_payment'];
        echo 'success';
    break;
    case 'orders':
        $_SESSION['reason'] = $_POST['reason'];
        echo 'success';
    break;
    case 'return_order':
    $_SESSION['reason'] = $_POST['reason'];
    $_SESSION['ret_pic'] = $_POST['ret_pic'];
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
    case 'getvariation':
        global $mydb;
        $_SESSION['productQTY'] = 1;
        $pid = $_POST['pid'];


        // $sql="SELECT * FROM `tblvarcat` vc  left join `tblvariation` vation on vc.varcatid = vation.varcatid"; 
            $sql = "SELECT * FROM `tblstockin` st
            left join tblvarcat vc on vc.varcatid = st.VariationCategory
            left join tblvariation vation on vation.varcatid = vc.varcatid
            where st.ProductID=$pid and st.VariationCategory is not null";
            
            $mydb->setQuery($sql);
            $cur = $mydb->executeQuery();
            $res = $cur->fetch_all(MYSQLI_ASSOC);
            $_SESSION['VariationBracket']=$res[0]['VariationBracket'];
            $_SESSION['StockinID'] = $res[0]['StockinID'];
            $_SESSION['ProductID'] = $res[0]['ProductID'];
            print_r(json_encode($res));
    break;
    case 'productWithVariation':
        $_SESSION['varieties'] = $_POST['vr'];
        $_SESSION['optIndex']=$_POST['optIndex'];
        echo $_SESSION['optIndex'];
    break;
    case 'productQTY':
        $_SESSION['productQTY'] = $_POST['qty'];
        echo $_SESSION['productQTY'];
    break;
    case 'getCart':
    $count_cart = count($_SESSION['gcCart']); 
    $products = array();
    for ($i=0; $i < $count_cart  ; $i++) { 
        array_push($products,$_SESSION['gcCart'][$i]);
    } 
        print_r(json_encode($products));
    break;
    case 'check_for_installment':
        global $mydb;
        $stmt = $_POST['stmt'];
            // $sql = "SELECT distinct ProductID,Installment,Percentage FROM `tblstockin` st where Installment='on' Group by ProductID" ;
            $sql = "SELECT I.pid,I.planname,I.months,P.percentage FROM `tblinstallment` I join percentage P on P.id = I.percentageid where $stmt";
            $mydb->setQuery($sql);
            $cur = $mydb->executeQuery();
            $res = $cur->fetch_all(MYSQLI_ASSOC);
            print_r(json_encode($res));
    break;
    case 'getReceipts':
    global $mydb;
    $stockoutID = $_POST['sID'];
    $sql = "SELECT pay_receipt FROM `tblinstallments` where StockoutID=$stockoutID" ;
    $mydb->setQuery($sql);
    $cur = $mydb->executeQuery();
    $res = $cur->fetch_all(MYSQLI_ASSOC);
    print_r(json_encode($res));
    break;
}


?>
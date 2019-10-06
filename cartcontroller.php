<?php 
require_once ("include/initialize.php"); 
$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	addProduct();
	break;
	
	case 'edit' :
	doEdit();
	break; 
	
	case 'delete' :
	doDelete();
	break;

	case 'submitorder' :
	doSubmitOrder();
	break;
  
} 

function addProduct(){
	$varieties ='';
    if(isset($_GET['vr'])){
         $varieties = $_GET['vr'];
    }
	global $mydb;
    $productID = $_POST['ProductID'];
	$sql ="SELECT * FROM tblproduct p, tblcategory c WHERE p.CategoryID=c.CategoryID AND ProductID = '{$productID}'";
	$mydb->setQuery($sql);
	$cur = $mydb->executeQuery();
	$maxrow = $mydb->num_rows($cur);

	if ($maxrow>0) {
		# code...
		$res = $mydb->loadSingleResult(); 

		$pid = $res->ProductID;
		$product = $res->ProductName . ' | ' . $res->Description . ' | '.$res->Categories.'|'.$varieties;
		$price = $res->Price;
		$q = $_POST['QTY'.$pid];
		$stocks = $_POST['REMQTY'.$pid];
		$subtotal = $price * $q;
		 addtocart($pid,$product,$price,$q,$subtotal,$stocks);
	}

	   redirect("index.php?q=cart");
	
}
function doSubmitOrder(){
	global $mydb;

		$autonum = New Autonumber();
		$res = $autonum->set_autonumber('ORDERNO');
		$orderno = $res->AUTO;

			$totalamount = 0;
			if (!empty($_SESSION['gcCart'])){   
			$count_cart = count($_SESSION['gcCart']); 
			for ($i=0; $i < $count_cart  ; $i++) { 

			$customerID = $_SESSION['CustomerID'];
			$productID = $_SESSION['gcCart'][$i]['productID'];
			$qty = $_SESSION['gcCart'][$i]['qty']; 
			$orderType = $_SESSION['orderType'];

			$sql="SELECT * FROM `tblinventory` WHERE `ProductID`='{$productID}'";
				$mydb->setQuery($sql);
				$row = $mydb->loadSingleResult();

				$remaining = $row->Remaining - $qty;
				$sold = $row->Sold + $qty; 

				$sqlupdate = "UPDATE `tblinventory` SET `Remaining` = $remaining WHERE `ProductID`='{$productID}'";
				$mydb->setQuery($sqlupdate);
				$mydb->executeQuery(); 
				
				if($orderType=='Installment'){
					$subtotal=$_SESSION['inp'];
					$total_payment=$_SESSION['total_payment'];
					$monthly_payment = $_SESSION['mp'];
					$sql = "INSERT INTO `tblstockout`  (`CustomerID`, `ProductID`, `Quantity`, `DateSold`,OrderNO,HView,order_type,subtotal,balance,total_price,monthly_payment) VALUES('{$customerID}','{$productID}','{$qty}',Now(),'{$orderno}',1,'{$orderType}','{$subtotal}','{$total_payment}','{$total_payment}','{$monthly_payment}')";
				}else{
					$sql = "INSERT INTO `tblstockout`  (`CustomerID`, `ProductID`, `Quantity`, `DateSold`,OrderNO,HView,order_type) VALUES('{$customerID}','{$productID}','{$qty}',Now(),'{$orderno}',1,'{$orderType}')";
				}
				$mydb->setQuery($sql);
				$mydb->executeQuery(); 

				$totalamount += $_SESSION['gcCart'][$i]['subtotal'];

				$sql2 = "INSERT INTO tblhistory (`orderid`,`productorder`,`quantity`,`orderstatus`) VALUES('{$orderno}','{$productID}','{$qty}','Pending')";
				$mydb->setQuery($sql2);
				$mydb->executeQuery(); 

			}

				$sql = "INSERT INTO `tblsummary` (`OrderNo`, `TotalAmount`, `TransDate`) VALUES ('{$orderno}','{$totalamount}',NOW())";
				$mydb->setQuery($sql);
				$mydb->executeQuery(); 

			$autonum = New Autonumber(); 
			$autonum->auto_update('ORDERNO');

			unset($_SESSION['gcCart']);

			message("Orders created successfully!", "success");

			redirect("customer/index.php");

		}
}
 

// if (isset($_POST['updateCart'])) {
// 	# code...  
// 	$productID=$_POST['ProductID']; 
// 	$qty=intval(isset($_POST['QTY']) ? $_POST['QTY'] : "");  
// 	editproduct($productID,$qty); 
      
// }

// if (isset($_POST['deleteCart'])) {
// 	# code...  
// 	$productID=$_POST['ProductID'];  
// 	removetocart($productID); 
      
// }
?>
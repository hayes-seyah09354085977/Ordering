<?php
require_once ("../../include/initialize.php");
if(!isset($_SESSION['ADMIN_USERID'])){
  redirect(web_root."admin/index.php");
 }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'confirm' :
	doConfirm();
	break; 
	
	case 'cancel' :
	doCancel();
	break;
	
	case 'status':
	doUpdateOrder();
	break;

	case 'installment':
	doInstallments();
	break;

	case 'return':
	doReturn();
	break;

	case 'v_money':
	doReturnMoney();
	break;

	}
   
	function doInsert(){
		global $mydb;
		if(isset($_POST['CartSubmit'])){
		$autonum = New Autonumber();
		$res = $autonum->set_autonumber('ORDERNO');
		$orderno = $res->AUTO;

			$stocks = 0;
			$sold = 0;
			$remaining = 0;
			  if (!empty($_SESSION['admin_gcCart'])){   
                $count_cart = count($_SESSION['admin_gcCart']); 
                    for ($i=0; $i < $count_cart  ; $i++) { 

                    	$customerID = $_POST['CustomerID'];
                    	$productID = $_SESSION['admin_gcCart'][$i]['productID'];
                    	$qty = $_SESSION['admin_gcCart'][$i]['qty']; 

                    	$sql="SELECT * FROM `tblinventory` WHERE `ProductID`='{$productID}'";
                     	$mydb->setQuery($sql);
                     	$row = $mydb->loadSingleResult();

                     	$remaining = $row->Remaining - $qty;
                     	$sold = $row->Sold + $qty; 


                    	$sql = "INSERT INTO `tblstockout`  (`CustomerID`, `ProductID`, `Quantity`, `DateSold`,Status,OrderNo) VALUES('{$customerID}','{$productID}','{$qty}',Now(),'Confirmed','{$orderno}')";
                    	$mydb->setQuery($sql);
                    	$mydb->executeQuery();

                    	$sql ="UPDATE `tblinventory` SET  `Sold`='{$sold}', `Remaining`='{$remaining}'  WHERE `ProductID`='{$productID}'";
                    	$mydb->setQuery($sql);
                    	$mydb->executeQuery();


                    }
                    unset($_SESSION['admin_gcCart']);

					$autonum = New Autonumber(); 
					$autonum->auto_update('ORDERNO');

                    message("Orders created successfully!", "success");
				// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
		    	   redirect("index.php");
                }else{
                	message("Transaction is Invalid.", "success");
				// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
		    	   redirect("index.php?view=add");

                }

		}

	} 

	function doConfirm(){
		global $mydb;

			$stockoutID = $_GET['id'];
			$productID = $_GET['ProductID'];
			$qty = $_GET['qty'];


			$sql="SELECT * FROM `tblinventory` WHERE `ProductID`='{$productID}'"; 
			$mydb->setQuery($sql);
			$row = $mydb->loadSingleResult();

			$remaining = $row->Remaining - $qty;
			$sold = $row->Sold + $qty; 

			$sql2="SELECT * FROM `tblstockout` WHERE `StockoutID`='{$stockoutID}'"; 
			$mydb->setQuery($sql2);
			$row2 = $mydb->loadSingleResult();

			$orderno=$row2->OrderNo;
			$productID=$row2->ProductID;
			$qty=$row2->Quantity;
			$balance = $row2->total_price - $row2->subtotal;


			$sql = "UPDATE `tblstockout`  SET Status  = 'Confirmed',balance = '$balance' WHERE StockoutID='{$stockoutID}'";
			$mydb->setQuery($sql);
			$mydb->executeQuery();

			$sql ="UPDATE `tblinventory` SET  `Sold`='{$sold}'  WHERE `ProductID`='{$productID}'";
			$mydb->setQuery($sql);
			$mydb->executeQuery();

			$sql3 = "INSERT INTO tblhistory (`orderid`,`productorder`,`quantity`,`orderstatus`) VALUES('{$orderno}','{$productID}','{$qty}','Confirmed')";
			$mydb->setQuery($sql3);
			$mydb->executeQuery(); 

			message("Orders has been confirmed!", "success");
			// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
			redirect("index.php");

	}

	function doUpdateOrder(){
		global $mydb;

			$stockoutID = $_GET['id'];
			$status = $_GET['OrderStatus'];
			$OrderMessage = '';
			$message = '';
			switch($status){
				case 2:
					$OrderMessage = 'For Delivery';
					$message = 'Ordered Product is Ready For Delivery!';
				break;
				case 3:
					$OrderMessage = 'Delivered';
					$message = 'Ordered has been Delivered to the Customer!';
				break;
			}

			$sql = "UPDATE `tblstockout`  SET Status  = '$OrderMessage' WHERE StockoutID='{$stockoutID}'";
			$mydb->setQuery($sql);
			$mydb->executeQuery();

			$sql2 = $sql2="SELECT * FROM `tblstockout` WHERE `StockoutID`='{$stockoutID}'"; 
			$mydb->setQuery($sql2);
			$row2 = $mydb->loadSingleResult();
			$orderno=$row2->OrderNo;
			$productID=$row2->ProductID;
			$qty=$row2->Quantity;

			$sql3 = "INSERT INTO tblhistory (`orderid`,`productorder`,`quantity`,`orderstatus`) VALUES('{$orderno}','{$productID}','{$qty}','$OrderMessage')";
			$mydb->setQuery($sql3);
			$mydb->executeQuery(); 

			message($message, "success");
			// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
			redirect("index.php");

	}

	function doCancel(){
			global $mydb;

			$stockoutID = $_GET['id'];
			$productID = $_GET['ProductID'];
			$qty = $_GET['qty'];

			$sql="SELECT * FROM `tblinventory` WHERE `ProductID`='{$productID}'"; 
			$mydb->setQuery($sql);
			$row = $mydb->loadSingleResult();

			$remaining = $row->Remaining + $qty;

			$sql ="UPDATE `tblinventory` SET  `Remaining`='{$remaining}'  WHERE `ProductID`='{$productID}'";
			$mydb->setQuery($sql);
			$mydb->executeQuery();

			$sql = "UPDATE `tblstockout`  SET Status  = 'Cancelled' WHERE StockoutID='{$stockoutID}'";
			$mydb->setQuery($sql);
			$mydb->executeQuery(); 

			message("Orders has been cancelled!", "success");
			// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
			redirect("index.php");

	}
	function doInstallments(){
		global $mydb;

			$stockoutID = $_GET['id'];


			$sql2="SELECT * FROM `tblstockout` WHERE `StockoutID`='{$stockoutID}'"; 
			$mydb->setQuery($sql2);
			$row2 = $mydb->loadSingleResult();

			$balance = ($row2->balance - $row2->monthly_payment);


			$sql = "UPDATE `tblstockout`  SET balance = '$balance' WHERE StockoutID='{$stockoutID}'";
			$mydb->setQuery($sql);
			$mydb->executeQuery();

			message("Orders has been confirmed!", "success");
			// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
			redirect("index.php");

	}

	function doReturn(){
		global $mydb;
		$stockoutID = $_GET['id'];
		echo $stockoutID;
		$sql = "UPDATE `tblstockout`  SET `Status` = 'Return Accepted' WHERE StockoutID=$stockoutID";
		$mydb->setQuery($sql);
		$mydb->executeQuery();
		message("Return Has Been Accepted!", "success");
			// redirect("index.php?view=view&id=".$_POST['EMPLOYEEID']);
			redirect("index.php");
	}
	function doReturnMoney(){
		global $mydb;
		$stockoutID = $_GET['id'];
			//validID1
			$errofile = $_FILES['ret_image']['error'];
			$type = $_FILES['ret_image']['type'];
			$temp = $_FILES['ret_image']['tmp_name'];
			$myfile =$_FILES['ret_image']['name'];
			$location="photos/ret_pics/".$myfile;
	
			if ( $errofile > 0 ) {
					message("No Image Selected!", "error");
					redirect("index.php");
			}else{
		
					@$file=$_FILES['ret_image']['tmp_name'];
					@$image= addslashes(file_get_contents($_FILES['ret_image']['tmp_name']));
					@$image_name= addslashes($_FILES['ret_image']['name']); 
					@$image_size= getimagesize($_FILES['ret_image']['tmp_name']);
	
				if ($image_size==FALSE ) {
					message("Uploaded file is not an image!", "error");
					redirect("index.php");
				}else{
						move_uploaded_file($temp,"../../customer/photos/ret_pics/" . $myfile);
				
						$sql = "UPDATE `tblstockout`  SET Status = 'Money Returned',Ret_pic='".$location."' WHERE StockoutID='{$stockoutID}'";
						$mydb->setQuery($sql);
						$mydb->executeQuery(); 

							message("Success To Money Return Order!", "success");
							redirect("index.php");
								
						}
				}
	}


?>

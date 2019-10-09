
<?php
error_reporting(0);
require_once ("../../include/initialize.php");
 	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

 
	}
   
	function doInsert(){
		global $mydb; 
		$fromdb;
		$newstock;
		$todb;
		$array = array();
		$product_quantity=0;
		$total_quanity=0;

		if(isset($_POST['btnSubmit'])){ 
		if ( $_POST['Quantity'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php');
		}else{	
			$ProductID = $_POST['ProductID'];
			$Quantity = $_POST['Quantity'];
			$Bracket = $_POST['Variationbracket'];
			$VarSwitch;
			$Installment = $_POST['Installment'];
			$ReserveID = $_POST['Reservationbracket'];
			$VariationCategory = $_POST['VariationCategory'];
			if($VariationCategory != 0 ){
				$VarSwitch = 'on';
			}else{
				$VarSwitch = 'off';
			}
			
			if($VarSwitch == "" ){
				$VarSwitch = 'off';
				$Bracket = 'empty';
			}
			if($Installment == ""){
				$Installment = 'off';
				$ReserveID = 'empty';
			}
			// echo $Installment.' '.$ReserveID;
			
			// echo $Bracket.' '. $VarSwitch.' '.$Quantity.' '.$ProductID.'<br>';
			// echo $product_quantity.' '.$total_quanity.' '.$ProductID;
		 	
			$sql = "SELECT  * FROM `tblinventory` WHERE `ProductID`='{$ProductID}'";
			$mydb->setQuery($sql);

			 $cur = $mydb->executeQuery(); 
			// print_r($cur);
		 	$maxrow = $mydb->num_rows($cur);
				if ($maxrow > 0) {
					
					$row  = $mydb->loadSingleResult();
					$total_quanity = $row->Stocks + $Quantity;
					$product_quantity = $row->Remaining + $Quantity;
					$varr = $row->Variation;
					$fromdb =  explode(',',$varr);
					$newstock = explode(',',$Bracket);
					$size = sizeof($fromdb);
					for($x=0;$x!=$size;$x++){
						$array[] = $fromdb[$x] + $newstock[$x];
					}
					$todb = implode(',',$array);
					// echo $todb;

					//  echo $row->Remaining.'  quantity ='. $Quantity.'       total_quanity = '. $total_quanity;
					# code...
					$sql = "UPDATE `tblinventory` SET `Remaining`= '{$product_quantity}',  Stocks=  '{$total_quanity}',Variation = '{$todb}' WHERE `ProductID`='{$ProductID}'";
					$mydb->setQuery($sql);
					$mydb->executeQuery();
					$sql = "SELECT  * FROM `tblstockin` WHERE `ProductID`='{$ProductID}'";
					$mydb->setQuery($sql);
					$cur2 = $mydb->executeQuery(); 
					// print_r($cur2);
					$maxrow2 = $mydb->num_rows($cur2);	
					if($maxrow2 > 0){
						// echo '      Updating     '.$VariationCategory;
						$sql = "UPDATE `tblstockin` SET `Quantity` ='{$product_quantity}',VariationCategory = '{$VariationCategory}',Installment ='".$Installment."', Variation ='{$VarSwitch}',Variationbracket ='{$todb}', `Percentage`='".$ReserveID."' WHERE `ProductID`='{$ProductID}'";
						$mydb->setQuery($sql);
						$mydb->executeQuery();
						// echo $sql;
						message("New transaction created successfully!", "success");
						redirect("index.php");
					}
					else{
						// echo 'Inserting';
						$sql = "INSERT INTO `tblstockin` (`ProductID`, `Quantity`, `DateReceive`,`VariationCategory`,`VariationBracket`,`Variation`,`Installment`,`Percentage`) 
						VALUES ($ProductID,$Quantity,Now(),'".$VariationCategory."','".$Bracket."','".$VarSwitch."','".$Installment."','".$ReserveID."')";
						$mydb->setQuery($sql);
						$mydb->executeQuery();
						message("New transaction created successfully!", "success");
						redirect("index.php");
					}
		 		}else{
				 echo '<br> else';
				
			 	}
			
			}
		}

	}

	function doEdit(){
		global $mydb;
		$product_quantity=0;
		$total_quanity=0;
		if(isset($_POST['btnSubmit'])){ 
 
		if ( $_POST['Quantity'] == "" || $_POST['Quantity'] == 0) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php');
		}else{	
			$ProductID = $_POST['ProductID'];
			$StockinID = $_POST['StockinID'];
			$Trans_Quantity = $_POST['TransQuantity'];
			$Quantity = $_POST['Quantity'];
			$Variationcat = $_POST['VariationCategory'];
			$Variationbracket = $_POST['Variationbracket'];
			$VarSwitch = $_POST['Variationbox'];
			$Installment = $_POST['Installment'];
			$ReserveID = $_POST['Reservationbracket'];
			if($VarSwitch == "" ){
				$VarSwitch = 'off';
				$Bracket = 'empty';
			}
			if($Installment == ""){
				$Installment = 'off';
				$ReserveID = 'empty';
			}

			$sql = "SELECT * FROM `tblinventory` WHERE `ProductID`='{$ProductID}'";
		 	$mydb->setQuery($sql);
		 	$cur = $mydb->executeQuery(); 
		 	$maxrow = $mydb->num_rows($cur);
		 	if ($maxrow > 0) {
		 		$row  = $mydb->loadSingleResult();

		 		 $total_quanity = $row->Remaining - $Trans_Quantity;
		 		 $total_quanity = $total_quanity + $Quantity;

		 		 $product_quantity = $row->Stocks - $Trans_Quantity;
		 		 $product_quantity = $product_quantity + $Quantity;
		 		# code...
				$sql = "UPDATE `tblinventory` SET `Stocks`= '{$product_quantity}',Remaining='{$total_quanity}' WHERE `ProductID`='{$ProductID}'";
				$mydb->setQuery($sql);
				$mydb->executeQuery(); 

				$sql = "UPDATE `tblstockin` SET `Quantity` ='{$Quantity}',VariationCategory = '{$VariationCategory}',Installment ='{$Installment}', Variation ='{$VarSwitch}',Variationbracket ='{$Variationbracket}', `Percentage`='{$ReserveID}' WHERE `StockinID`='{$StockinID}'";
				$mydb->setQuery($sql);
				$mydb->executeQuery();

				message("Transaction has been updated!", "success");
				redirect("index.php");
		 	}

			
			
		}
		}


	}


	function doDelete(){
		global $mydb;
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

		 

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$category = New Category();
		// 	$category->delete($id[$i]);

		// 	message("Category already Deleted!","info");
		// 	redirect('index.php');
		// }
		// }
		$ProductID = $_GET['ProductID'];
		$StockinID = $_GET['id'];
		$Trans_Quantity = $_GET['TransQuantity']; 

		$sql = "SELECT * FROM `tblinventory` WHERE `ProductID`='{$ProductID}'";
		$mydb->setQuery($sql);
		$cur = $mydb->executeQuery(); 
		$maxrow = $mydb->num_rows($cur);
		if ($maxrow > 0) {
			$row  = $mydb->loadSingleResult();

			 $total_quanity = $row->Remaining - $Trans_Quantity;    

			 $product_quantity = $row->Stocks - $Trans_Quantity; 
			# code...
		$sql = "UPDATE `tblinventory` SET `Stocks`= '{$product_quantity}',Remaining='{$total_quanity}' WHERE `ProductID`='{$ProductID}'";
		$mydb->setQuery($sql);
		$mydb->executeQuery(); 

		$sql = "DELETE FROM `tblstockin`  WHERE `StockinID`='{$StockinID}'";
		$mydb->setQuery($sql);
		$mydb->executeQuery();

		message("Transaction has been deleted!", "success");
		redirect("index.php");
		}

		
	}
?>
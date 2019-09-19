<?php
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
	
	case 'disapproved' :
	doUpdate(0);
	break;

	case 'approved' :
	doUpdate(1);
	break;

 
	}
   

	function doUpdate($a){
		$user = New Customer(); 
		$user->Approved = $a;
		$user->update($_GET['id']);
		
		message("Customer Status has been updated!", "success");
		redirect("index.php");
	}

 
?>
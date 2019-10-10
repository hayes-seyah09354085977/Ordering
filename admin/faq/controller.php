
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
	
	case 'delete' :
	doDelete();
	break;

 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){


			if ( $_POST['question'] == "" ) {
				$messageStats = false;
				message("All field is required!","error");
				redirect('index.php?view=add');
			}else{	
				$category = New FAQ();
				$category->Question	= $_POST['question'];
				$category->Answer	= $_POST['answer'];
				$category->create();
				
				message("New Question created successfully!", "success");
				redirect("index.php");
			}
		}

	}
	function checkExistingCategory($categoryName){
		global $mydb;
		$mydb->setQuery("SELECT count(*)as cnt FROM `tblfaq` WHERE `Question`='".$categoryName."'");
		$cur = $mydb->executeQuery();
		if($cur==false){
			die(mysql_error());
		}
	
		$res = mysqli_fetch_assoc($cur);
		if ($res['cnt'] == 1){
			return '1';
		}else{
			return '0';
		}
		 
	 }

	function doEdit(){
		if(isset($_POST['save'])){

			$category = New FAQ();
			$category->Question	= $_POST['question'];
			$category->Answer	= $_POST['answer'];
			$category->update($_POST['CATEGORYID']);

			message("FAQ has been updated!", "success");
			redirect("index.php");
		}

	}


	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$category = New FAQ();
			$category->delete($id);

			message("FAQ has been Deleted!","info");
			redirect('index.php');

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$category = New Category();
		// 	$category->delete($id[$i]);

		// 	message("Category already Deleted!","info");
		// 	redirect('index.php');
		// }
		// }
		
	}
?>
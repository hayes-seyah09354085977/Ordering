
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


		if ( $_POST['variationcat'] == "" ) {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$category = New VarCat();
			$category->variationcat	= $_POST['variationcat'];
			// $category->StoreID	= $_SESSION['ADMIN_USERID'];

			$checkCategoryName = checkExistingCategory($_POST['variationcat']);
			switch($checkCategoryName){
				case '0':
						$category->create();
						message("New [". $_POST['variationcat'] ."] created successfully!", "success");
						redirect("index.php");
				break;
				case '1':
					message("Category Name Exist! Please Use Other Category Names.", "error");
					redirect("index.php?view=add");
				break;

			}
			
			
		}
		}

	}
	function checkExistingCategory($categoryName){
		global $mydb;
		$mydb->setQuery("SELECT count(*)as cnt FROM `tblvarcat` WHERE `variationcat`='".$categoryName."'");
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

			$category = New VarCat();
			$category->variationcat	= $_POST['CATEGORY'];
			$category->update($_POST['CATEGORYID']);

			message("[". $_POST['CATEGORY'] ."] has been updated!", "success");
			redirect("index.php");
		}

	}


	function doDelete(){
		// if (isset($_POST['selector'])==''){
		// message("Select a records first before you delete!","error");
		// redirect('index.php');
		// }else{

			$id = $_GET['id'];

			$category = New VarCat();
			$category->delete($id);

			message("Category has been Deleted!","info");
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
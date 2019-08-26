<?php
require_once("../../include/initialize.php");
//checkAdmin();
if (!isset($_SESSION['ADMIN_USERID'])){
	redirect(web_root."admin/index.php");
}
$storeID = $_SESSION['ADMIN_USERID'];
$productID = $_POST['ProductID'];
$sql ="SELECT * FROM tblproduct p, tblcategory c WHERE p.CategoryID=c.CategoryID AND ProductID = '{$productID}' AND p.StoreID='$storeID'";
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
$maxrow = $mydb->num_rows($cur);
$res = $mydb->loadSingleResult(); 
?> 
<style type="text/css"> 
	.column-label {
		float: left;
		width: 15%;
		padding: 5px;
		font-weight: bold;

	}
	.column-value {
		font-weight: bold;
		float: left;
		width: 35%;
		padding: 5px;
		color: blue;
	}
	.column-value > input {
		height: 50px;
		font-size:   30px;
	}
	.row:after{
		content: "";
		display: table;
		clear: both;
	}
</style>
<?php  if ($maxrow > 0) {  ?> 
<form action="controller.php?action=add" method="POST" >
<div class="row">
	<input type="hidden" name="ProductID" value="<?php echo $res->ProductID; ?>">
	<div class="column-label">Product</div>
	<div class="column-value">: <?php echo $res->ProductName; ?></div>
	<div class="column-label">Description</div>
	<div class="column-value">: <?php echo $res->Description; ?></div>
	<div class="column-label">Category</div>
	<div class="column-value">: <?php echo $res->Categories; ?></div>
	<div class="column-label">Price</div>
	<div class="column-value">: <?php echo $res->Price; ?></div>
	<div class="column-label">Quantity</div>
	<div class="column-value"><input type="number" name="Quantity" class="form-control"></div>
</div> 
<div class="row">
	<input type="submit" name="btnSubmit" value="Save" class="btn-primary btn btn-md">
</div>
</form>
<?php }else{ ?>
	<div class="column-label">Product</div>
	<div class="column-value">: None</div>
	<div class="column-label">Description</div>
	<div class="column-value">: None</div>
	<div class="column-label">Category</div>
	<div class="column-value">: None</div>
	<div class="column-label">Price</div>
	<div class="column-value">: None</div>
	<div class="column-label">Quantity</div>
	<div class="column-value">: None</div>
<?php } ?>

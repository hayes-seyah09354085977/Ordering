<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">List of Orders  <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Add New Orders</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
		<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
			  <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>

				  	<th>Customer</th>
					<th>Product</th>
					<th>Description</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Expired Date</th> 
					<th>Categories</th>
					<th>Status</th>
					<th width="14%" >Action</th> 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  	 // `COMPANYID`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`
				  		$mydb->setQuery("SELECT *,s.ProductID as pid FROM `tblproduct` p,`tblcategory` c,`tblstockout` s,tblcustomer cs WHERE p.`CategoryID`=c.`CategoryID` AND p.`ProductID`=s.`ProductID` AND s.CustomerID=cs.CustomerID AND p.StoreID=".$_SESSION['ADMIN_USERID']);
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		  echo '<tr>';
			              // echo '<td width="5%" align="center"></td>';
			              // echo '<td>
			              //      <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->CATEGORYID. '"/>
						//    ' . $result->CATEGORIES.'</a></td>';
						echo '<td>'. $result->CustomerName.'</td>';
						echo '<td>'. $result->ProductName.'</td>';
						echo '<td>' . $result->Description.'</a></td>';
						echo '<td>' . $result->Price.'</a></td>'; 
						echo '<td>'. $result->Quantity.'</td>'; 
						echo '<td>'. $result->DateExpire.'</td>';
						echo '<td>'. $result->Categories.'</td>';  
						echo '<td>'. $result->Status.'</td>'; 
						if ($result->Status=='Confirmed' || $result->Status=='Cancelled') {
							# code...
							echo '<td>None</td>';
						}else{
							echo '<td align="center"><a title="Confirm" href="controller.php?action=confirm&id='.$result->StockoutID.'&ProductID='.$result->pid.'&qty='.$result->Quantity.'" class="btn btn-primary btn-xs  ">  <span class="fa fa-check fw-fa">Confirm</a>
							<a title="Delete" href="controller.php?action=cancel&id='.$result->StockoutID.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-times fw-fa ">Cancel</a></td>'; 
						}
						echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table> 
			</div>
 
							 
							</form>
       
                 
 
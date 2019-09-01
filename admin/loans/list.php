<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">Loan Type   <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Register New Loan</a> </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
							<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<!-- <th>Store Name</th> -->
									<th>Loan Name</th>
									<th>Loan Percent</th>
									<th>Loan Month</th>
									<th>Loan Description</th> 
									<th width="14%" >Action</th> 
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
							  		// $mydb->setQuery("SELECT * 
											// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
							  	// `ProductID`, `ProductName`, `Description`, `Price`, `DateExpire`,Categories,StoreName
							  	// if ($_SESSION['ADMIN_ROLE']=='Administrator') {
							  	// 	# code...
							  	// 	$sql ="SELECT * FROM `tblproduct` p,`tblinventory` i, `tblcategory` c,`tblstore` s WHERE p.`ProductID`=i.`ProductID` AND p.`CategoryID`=c.`CategoryID` AND p.`StoreID`=s.`StoreID`";
							  	// }else{
							  		$sql ="SELECT * FROM `tblloan`";
							  	// }
							  		$mydb->setQuery($sql);
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
							  		// echo '<td>'. $result->StoreName.'</td>';
							  		echo '<td>'. $result->loanname.'</td>';
							  		echo '<td>' . $result->loanpercent.'</a></td>';
							  		echo '<td>' . $result->loanMonth.'</a></td>'; 
							  		echo '<td>'. $result->loandescription.'</td>'; 

								
					  				echo '<td align="center" >     
					  		              <a title="Edit" href="index.php?view=edit&id='.$result->loanid.'"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-edit fw-fa"></span> Edit</a>  
					  		             <a title="Remove" href="controller.php?action=delete&id='.$result->loanid.'"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span> Remove</a> 
					  					 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
 
							 
							</form>
       
                 
 
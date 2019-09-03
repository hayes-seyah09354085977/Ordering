<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">List of Products   <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Register New Product</a> </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
							<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<!-- <th>Store Name</th> -->
									<th>Product</th>
									<th>Description</th>
									<th>Price</th>
									<th>Quantity</th>
									<!-- <th>Expired Date</th>  -->
									<th>Categories</th>
									<th>Status</th>
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
							  		$sql ="SELECT * FROM `tblproduct` p,`tblinventory` i, `tblcategory` c,`tblstore` s WHERE p.`ProductID`=i.`ProductID` AND p.`CategoryID`=c.`CategoryID` AND p.`StoreID`=s.`StoreID` AND p.`StoreID`=".$_SESSION['ADMIN_USERID'];
							  	// }
							  		$mydb->setQuery($sql);
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
							  		// echo '<td>'. $result->StoreName.'</td>';
							  		echo '<td>'. $result->ProductName.'</td>';
							  		echo '<td>' . $result->Description.'</a></td>';
							  		echo '<td>' . $result->Price.'</a></td>'; 
							  		echo '<td>'. $result->Remaining.'</td>'; 
							  		// echo '<td>'. $result->DateExpire.'</td>';
							  		echo '<td>'. $result->Categories.'</td>';  

									$expiry_date = $result->DateExpire;
									$today = date('d-m-Y',time()); 
									$exp = date('d-m-Y',strtotime($expiry_date));
									$expDate =  date_create($exp);
									$todayDate = date_create($today);
									$diff =  date_diff($todayDate, $expDate);
									if($diff->format("%R%a")>0){

										$expStatus =  "active";
									}else{
										$expStatus =  "Expired";
									}
									// echo "Remaining Days ".$diff->format("%R%a days");

									echo '<td>'.$expStatus.'</td>';



					  				// echo '<td align="center" >    
					  		  //            <a title="View" href="index.php?view=view&id='.$result->ProductID.'"  class="btn btn-info btn-xs  ">
					  		  //            <span class="fa fa-info fw-fa"></span> View</a>
					  		  //             <a title="Edit" href="index.php?view=edit&id='.$result->ProductID.'"  class="btn btn-info btn-xs  ">
					  		  //            <span class="fa fa-edit fw-fa"></span> Edit</a>  
					  		  //            <a title="Remove" href="controller.php?action=delete&id='.$result->ProductID.'"  class="btn btn-danger btn-xs  ">
					  		  //            <span class="fa fa-trash-o fw-fa"></span> Remove</a> 
					  				// 	 </td>';
					  				echo '<td align="center" >     
					  		              <a title="Edit" href="index.php?view=edit&id='.$result->ProductID.'"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-edit fw-fa"></span> Edit</a>  
					  		             <a title="Remove" href="controller.php?action=delete&id='.$result->ProductID.'"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span> Remove</a> 
					  					 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
 
							 
							</form>
       
                 
 
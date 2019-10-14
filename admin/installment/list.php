<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">List of Installment <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Add Installment</a>  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
							<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<!-- <th>Store Name</th> -->
									<th>Plan Name</th>
									<th>Product</th>
									<th>Months</th>
									<th>Interest</th>
									
									<th width="14%" >Action</th> 
							  	</tr>		
							  </thead> 
							  <tbody>
							  <?php   
							  		// $mydb->setQuery("SELECT * 
											// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
							  	// `ProductID`, `ProductName`, `Description`, `Price`, `DateExpire`,Categories,StoreName
							  		$mydb->setQuery("SELECT i.`id`,
									  i.`planname`,
									  i.`months`,
									 d.`ProductName`,
									 p.`percentage`
									 FROM tblinstallment i 
									 LEFT JOIN percentage p ON i.`percentageid` = p.`id`
									 LEFT JOIN tblproduct d ON i.`pid` = d.`ProductID`
									 ");
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
							  		// echo '<td>'. $result->StoreName.'</td>';
									  echo '<td>'. $result->planname.'</td>';
									  echo '<td>' . $result->ProductName.'</a></td>';
									  echo '<td>'. $result->months.'</td>';
									  echo '<td>'. $result->percentage.'</td>';
								
									echo '<td align="center" >     
									<a title="Edit" href="index.php?view=edit&id='.$result->id.'"  class="btn btn-info btn-xs  ">
								   <span class="fa fa-edit fw-fa"></span> Edit</a>  
								   
								   </td>';
					  				// echo '<td align="center" >    
					  		  //            <a title="View" href="index.php?view=view&id='.$result->ProductID.'"  class="btn btn-info btn-xs  ">
					  		  //            <span class="fa fa-info fw-fa"></span> View</a>
					  		  //             <a title="Edit" href="index.php?view=edit&id='.$result->ProductID.'"  class="btn btn-info btn-xs  ">
					  		  //            <span class="fa fa-edit fw-fa"></span> Edit</a>  
					  		  //            <a title="Remove" href="controller.php?action=delete&id='.$result->ProductID.'"  class="btn btn-danger btn-xs  ">
					  		  //            <span class="fa fa-trash-o fw-fa"></span> Remove</a> 
					  				// // 	 </td>';
					  				// echo '<td align="center" >     
					  		  //             <a title="Edit" href="index.php?view=edit&id='.$result->ProductID.'"  class="btn btn-info btn-xs  ">
					  		  //            <span class="fa fa-edit fw-fa"></span> Edit</a>  
					  		  //            <a title="Remove" href="controller.php?action=delete&id='.$result->ProductID.'"  class="btn btn-danger btn-xs  ">
					  		  //            <span class="fa fa-trash-o fw-fa"></span> Remove</a> 
					  				// 	 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
 
							 
							</form>
       
                 
 
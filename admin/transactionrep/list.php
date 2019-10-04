<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?>   
	<div class="row" >
	
   		<div class="col-lg-12">
            <h1 class="page-header">Transaction Report  </h1>
			
       	</div>
        	<!-- /.col-lg-12 -->
			
   		 </div>
            
	 	<div id="datatable">
		 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
							<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<!-- <th>Store Name</th> -->
									<th>Order Id</th>
									<th>Product Name</th>
									<th>Quantity</th>
									<th>Status</th>
									<th>Status</th>
									<th>Date</th>
									<!-- <th>Remaining</th>  -->
									<!-- <th width="14%" >Action</th>  -->
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
							  		// $mydb->setQuery("SELECT * 
											// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
							  	// `ProductID`, `ProductName`, `Description`, `Price`, `DateExpire`,Categories,StoreName
							  		$mydb->setQuery("SELECT h.`historyID`,h.`orderid`,p.`ProductName`,h.`quantity`,p.`Price`,h.`orderstatus`,h.`datetime` FROM tblhistory h LEFT JOIN tblproduct p ON h.`productorder` = p.`ProductID` ");
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		// echo '<td width="5%" align="center"></td>';
							  		echo '<td>'. $result->orderid.'</td>';
							  		echo '<td>'. $result->ProductName.'</td>';
							  		echo '<td>' . $result->quantity.'</a></td>';
							  		echo '<td>'. $result->Price.'</td>';  
							  		echo '<td>' . $result->orderstatus.'</a></td>'; 
							  		echo '<td>' . $result->datetime.'</a></td>'; 
							  		
					  				// echo '<td align="center" >    
					  		        //      <a title="View" href="index.php?view=view&id='.$result->ProductID.'"  class="btn btn-info btn-xs  ">
					  		        //      <span class="fa fa-info fw-fa"></span> View</a>
					  		        //       <a title="Edit" href="index.php?view=edit&id='.$result->ProductID.'"  class="btn btn-info btn-xs  ">
					  		        //      <span class="fa fa-edit fw-fa"></span> Edit</a>  
					  		        //      <a title="Remove" href="controller.php?action=delete&id='.$result->ProductID.'"  class="btn btn-danger btn-xs  ">
					  		        //      <span class="fa fa-trash-o fw-fa"></span> Remove</a> 
					  				// 	 </td>';
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
							</div>
							<button onclick="printDiv()">Print</button>  
							
<script>
	function printDiv() {
	var divName= "datatable";

	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;

	window.print();

	document.body.innerHTML = originalContents;
	}
</script>
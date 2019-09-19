<?php
	 if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Users </h1>
       		</div>
        	<!-- /.col-lg-12 --> 
   		 	<div class="col-lg-12"> 
				<table id="dash-table" class="table  table-bordered table-hover table-responsive" style="font-size:12px;" cellspacing="0"> 
				  <thead>
				  	<tr>
				  		<th>Customer ID</th>
				  		<th> Customer Name</th>
				  		<th>Customer Contact</th>
				  		<th>Customer Address</th>
						<th>Customer Valid ID 1</th>
						<th>Customer Valid ID 2</th>
				  		<th width="10%" >Action</th>
				 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		// $mydb->setQuery("SELECT * 
								// 			FROM  `tblusers` WHERE TYPE != 'Customer'");
				  		$mydb->setQuery("SELECT * 
											FROM  `tblcustomer`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->CustomerID.'</a></td>';
				  		echo '<td>' . $result->CustomerName.'</a></td>';
				  		echo '<td>'. $result->CustomerContact.'</td>';
						echo '<td>'. $result->CustomerAddress.'</td>';
						echo '<td><a title="validID 1" href="../../customer/'. $result->valid1.'">View Valid ID 1</a></td>';
						echo '<td><a title="validID 1" href="../../customer/'. $result->valid2.'">View Valid ID 2</a></td>';
				  		If($result->Approved==1) {
							// echo '<td align="center" > <a title="Approved" href="index.php?view=edit&id='.$result->CustomerID.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-check fw-fa"></span></a>
							  // 		 </td>';
							  echo '<td>Approved</td>';
				  		}else{
							echo '<td align="center" > <a title="Approved" href="controller.php?action=approved&id='.$result->CustomerID.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-check fw-fa"></span></a>
							<a title="Disapprove" href="controller.php?action=disapproved&id='.$result->CustomerID.'" class="btn btn-danger btn-xs"><span class="fa fa-times fw-fa"></span> </a>
							</td>';
				  		}
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>  
			</div> 
 
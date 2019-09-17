<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 
	<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">List of Reservation Fee   <a href="index.php?view=add" class="btn btn-primary btn-xs  ">  <i class="fa fa-plus-circle fw-fa"></i> Register New Fee</a> </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
                
 
						<form class="wow fadeInDownaction" action="controller.php?action=delete" Method="POST">   		
							<table id="dash-table" class="table table-striped  table-hover table-responsive" style="font-size:12px" cellspacing="0">

							  <thead>
							  	<tr>
									<!-- <th>Store Name</th> -->
									<th>Name</th>
									<th>Reservation Percentage</th>
									<th width="14%" >Action</th> 
							  	</tr>	
							  </thead> 
							  <tbody>
							  	<?php   
							  		$sql ="SELECT * FROM tblreservation r LEFT JOIN percentage p ON r.`reservevalue` = p.`id` ";
							 
							  		$mydb->setQuery($sql);
							  		$cur = $mydb->loadResultList();

									foreach ($cur as $result) { 
							  		echo '<tr>';
							  		echo '<td>'. $result->reservename.'</td>';
							  		echo '<td>' . $result->percentage.'</a></td>';
							  	  
					  				echo '<td align="center" >     
					  		              <a title="Edit" href="index.php?view=edit&id='.$result->reserveid.'"  class="btn btn-info btn-xs  ">
					  		             <span class="fa fa-edit fw-fa"></span> Edit</a>  
					  		             <a title="Remove" href="controller.php?action=delete&id='.$result->reserveid.'"  class="btn btn-danger btn-xs  ">
					  		             <span class="fa fa-trash-o fw-fa"></span> Remove</a> 
					  					 </td>';
							  		echo '</tr>';
							  	} 
							  	?>
							  </tbody>
								
							</table>
 
							 
							</form>
       
                 
 
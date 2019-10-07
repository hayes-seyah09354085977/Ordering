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
						if($result->valid1 != ""){
							echo '<td><a title="validID 1" href="#" class="viewimage" data-pic="../../customer/'. $result->valid1.'">View Valid ID 1</a></td>';
						}else{
							echo "<td>No Image</td>";
						}

						if($result->valid2 !=""){
							echo '<td><a title="validID 1" href="#" class="viewimage" data-pic="../../customer/'. $result->valid2.'">View Valid ID 2</a></td>';
						}else{
							echo "<td>No Image</td>";
						}
						
						if($result->valid2 !="" && $result->valid1 !=""){
							if($result->Approved==1) {
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
						else{
							echo '<td></td>';
						}
						
				  		
				  	} 
				  	?>
				  </tbody>
					
				</table>  
			</div> 
<div class="modal fade varmodal" id="myModal20" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Valid Id</h4>
			</div>
			<div class="modal-body">
		
					
			</div>
			<div class="modal-footer">
				<!-- <button type="button" class="btn btn-default reserveclose" >Close</button> -->
			</div>
     	</div>
      
    </div>
</div>
<script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script>
$(document).ready(function(){

	$('.viewimage').click(function(){
		$('#myModal20').modal('show');
		let pic = $(this).data('pic')
		console.log(pic)
		$('.modal-body').html('');
		$('.modal-body').append(`<img src="`+pic+`" alt="">`)
		// console.log('test')
	})
})
</script>
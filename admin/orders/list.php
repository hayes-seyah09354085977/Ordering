<style>
.modal-dialog {
    margin-top: 315px;
}
.modal-header {
    background: #3c8dbc;
}
.modal-title {
	color:#fff;
    line-height: 2;
	font-size: 24px;
    text-indent: 13px;
}
</style>
<?php
	 if(!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }

?> 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Pending For Cancellation</b></h5>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-md-6 editor1">
              <!-- <textarea name="editor1" id="editor1" rows="10" cols="50"></textarea> -->

            </div>
          </div>
        </div>

        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="proceed" href="#"><button type="button" class="btn btn-primary">Approve</button></a>
      </div>
      <!-- End Container -->
      </div>
    </div>
</div>
<!-- end modal -->
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
					<th>Order Type</th> 
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
						echo '<td>'. $result->order_type.'</td>';
						echo '<td>'. $result->Categories.'</td>';  
						echo '<td>'. $result->Status.'</td>'; 
						if ($result->Status=='Delivered' ||$result->Status=='Cancelled') {
							# code...
							echo '<td>None</td>';
						}else if($result->Status=='Pending for Cancellation'){
							echo '<td align="center"><a onclick="getMessage('.$result->StockoutID.','.$result->pid.','.$result->Quantity.')" title="Confirm" data-toggle="modal" data-target="#exampleModal">  <span class="fa fa-check fw-fa">View Reason</a>'; 
						}else if($result->Status=='Confirmed'){
							echo '<td align="center"><a title="Confirm" href="controller.php?action=status&id='.$result->StockoutID.'&OrderStatus=2" class="btn btn-primary btn-xs  ">  <span class="fa fa-check fw-fa">For Delivery</a></td>'; 
						}else if($result->Status=='For Delivery'){
							echo '<td align="center"><a title="Confirm" href="controller.php?action=status&id='.$result->StockoutID.'&OrderStatus=3" class="btn btn-primary btn-xs  ">  <span class="fa fa-check fw-fa">Delivered</a></td>'; 
						}else{
							echo '<td align="center"><a title="Confirm" href="controller.php?action=confirm&id='.$result->StockoutID.'&ProductID='.$result->pid.'&qty='.$result->Quantity.'" class="btn btn-primary btn-xs  ">  <span class="fa fa-check fw-fa">Confirm</a>
							<a title="Delete" href="controller.php?action=cancel&id='.$result->StockoutID.'&ProductID='.$result->pid.'&qty='.$result->Quantity.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-times fw-fa ">Cancel</a></td>'; 
						}
						echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table> 
			</div>
	 
							</form>
							
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script>
<script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.min.js"></script>

<script>

function getMessage(id,pid,qty){
	$('.editor1').children().remove()
	$.ajax({
           type: "POST",
           url: "../../ajaxSession.php",
           data: {e:'getMessage',id:id},
           success: function(data){
			   var message = data.match(/w+|"[^"]+"/g)[1].replace(/"/g, ' ').replace(/\\n/,'').replace(/\\/,'')
				// CKEDITOR.instances.editor1.setData(message)
				$('.editor1').append(message.toUpperCase())
           }
		 });

	$('.proceed').attr('href','controller.php?action=cancel&id='+id+'&ProductID='+pid+'&qty='+qty);

}
</script>
       
                 
 
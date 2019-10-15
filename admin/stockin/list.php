<?php 
	  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
<style type="text/css"> 
	.column {
		float: left;
		width: 25%;
		padding: 5px;
	}
	.row:after{
		content: "";
		display: table;
		clear: both;
	}
</style>
	<div class="row">
		<div class="col-lg-12">
		<h1 class="page-header">Stock In </h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
		<div class="col-lg-12">
			<label class="col-lg-2">Find Product</label>
			<div class="col-lg-4">
				<select class="form-control select2" id="findProduct" name="ProductID">
					<option>Select</option>
					<?php
						$sql="Select * FROM tblproduct WHERE StoreID=".$_SESSION['ADMIN_USERID'];
						$mydb->setQuery($sql);
						$cur  = $mydb->loadResultList();
						foreach ($cur as $row) {
							# code...
							echo '<option value='.$row->ProductID.'>'.$row->ProductName.'</option>';
						}
					?>
				</select>
			</div>
			
		</div>
		<div style="font-size: 14px" class="page-header">Product Details</div>
		<div class="col-lg-12">
			<div id="loaddata" style="min-height:130px" > 
			</div>
		</div> 

<hr/>

	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">History  </h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>

				  		<!-- <th>No.</th> -->
					<th>Product</th>
					<th>Description</th>
					<th>Price</th>
					<th>Variation Category</th>
					<th>Variation</th>
					<th>Variation Quantity</th>
					<th>Remaining Quantity</th>
					<th>Categories</th>
					<th width="14%" >Action</th> 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  	 // `COMPANYID`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`
						  // $mydb->setQuery("SELECT *,s.ProductID as pid FROM `tblproduct` p,`tblcategory` c,`tblstockin` s WHERE p.`CategoryID`=c.`CategoryID` AND p.`ProductID`=s.`ProductID` AND p.StoreID=".$_SESSION['ADMIN_USERID']);
						  $mydb->setQuery("SELECT S.`StockinID`,S.ProductID AS pid,P.`ProductName`,
						  P.`Description`,
						  P.`Price`, 
						  C.`Categories`,
						  I.`Variation`,
						  VC.`variationcat`,
						  VR.`variation` as full,
						  I.`Remaining` AS Quantity
						  FROM tblstockin S LEFT JOIN tblproduct P ON S.`ProductID` = P.`ProductID`
						  LEFT JOIN `tblcategory` C ON C.`CategoryID` = P.`CategoryID`
						  LEFT JOIN tblinventory I ON I.`ProductID` = P.`ProductID`
						  LEFT JOIN tblvarcat VC ON VC.`varcatid` = P.`VarcatID`
						  LEFT JOIN tblvariation VR ON VR.`varcatid` = VC.`varcatid`");
				  		$cur = $mydb->loadResultList(); 
						foreach ($cur as $result) {
				  		  echo '<tr>';
			              // echo '<td width="5%" align="center"></td>';
			              // echo '<td>
			              //      <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->CATEGORYID. '"/>
			              //    ' . $result->CATEGORIES.'</a></td>';
			              echo '<td>'. $result->ProductName.'</td>';
			              echo '<td>' . $result->Description.'</a></td>';
						  echo '<td>' . $result->Price.'</a></td>'; 
						  echo '<td>' ; if($result->variationcat != ""){echo $result->variationcat; }else{ echo 'No Variation';}  echo '</a></td>';
						  echo '<td>' ; if( $result->full != ""){echo  $result->full; }else{ echo 'No Variation';} echo '</a></td>';
						  echo '<td>'; if( $result->Variation != ""){echo $result->Variation; }else{ echo 'No Variation';} echo '</a></td>'; 
			              echo '<td>'. $result->Quantity.'</td>'; 
			            //   echo '<td>'. $result->DateExpire.'</td>';
			              echo '<td>'. $result->Categories.'</td>';  
			              echo '<td align="center">
			              <a title="Delete" href="controller.php?action=delete&id='.$result->StockinID.'&ProductID='.$result->pid.'&TransQuantity='.$result->Quantity.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
			              echo '</tr>';
				  	} //<a title="Edit" href="index.php?view=edit&id='.$result->StockinID.'" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
				  	?>
				  </tbody>
					
				</table> 
			</div>
				</form> 
<?php
require_once("../../include/initialize.php");
//checkAdmin();
$varcatt;
$check;
if (!isset($_SESSION['ADMIN_USERID'])){
	redirect(web_root."admin/index.php");
}
$storeID = $_SESSION['ADMIN_USERID'];
$productID = $_POST['ProductID'];
// echo $productID.'asdasdsad';
$sql ="SELECT *
FROM tblproduct p 
LEFT JOIN tblcategory c ON c.CategoryID = p.`CategoryID`
LEFT JOIN tblvarcat v ON v.VarcatID = p.`VarcatID`
LEFT JOIN tblinventory i ON i.`ProductID` = p.`ProductID`

WHERE p.ProductID = '{$productID}'";
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
$maxrow = $mydb->num_rows($cur);
$res = $mydb->loadSingleResult(); 

?> 
<style type="text/css"> 
	.column-label {
		float: left;
		width: 15%;
		padding: 5px;
		font-weight: bold;

	}
	.column-value {
		font-weight: bold;
		float: left;
		width: 35%;
		padding: 5px;
		color: #3c8dbc;
	}
	.column-value > input {
		/* height: 50px; */
		font-size:   30px;
	}
	.row:after{
		content: "";
		display: table;
		clear: both;
	}
	.swal-wide{
		height:350px !important;
    	width:850px !important;
	}
	.pointer {cursor: pointer;}
	.pointer2 {cursor: pointer;}

	/* variation CSS */
	.row.w-25 {
		margin-top: 15px;
	}

</style>
<?php  if ($maxrow > 0) { 
	$array = array();
	
	$normal =  $res->Variation;
	$normal = explode(',',$normal);
	$normal = sizeof($normal);
	for($x = 0; $x<$normal; $x++){
		$array[] = '0,';
	}

	$sql3 ="SELECT * FROM tblstockin WHERE ProductID = '{$productID}'";
    $mydb->setQuery($sql3);
	$cur3 = $mydb->executeQuery();
	$res2 = $mydb->loadSingleResult(); 
	// echo $res2->Installment;
	if($res2->Installment =="off"){
		$check="";
	}else{
		$check="CHECKED";
	}
				
?> 
<form action="controller.php?action=add" method="POST" >
<div class="row">
    <input type="hidden" name="VariationCategory"  class="VariationCategory" value="<?php echo $res->varcatid; ?>">
	<input type="hidden" name="Variationbracket"  class="Variationbracket" value="<?php echo substr(implode($array),0,-1); ?>">
	<input type="hidden" name="Reservationbracket"  class="Reservationbracket" >
	<input type="hidden" name="ProductID" value="<?php echo $res->ProductID; ?>">
	<div class="column-label">Product</div>
	<div class="column-value">: <?php echo $res->ProductName; ?></div>
	<div class="column-label">Description</div>
	<div class="column-value">: <?php echo $res->Description; ?></div>
	<div class="column-label">Category</div>
	<div class="column-value">: <?php echo $res->Categories; ?></div>
	<div class="column-label">Price</div>
	<div class="column-value">: <?php echo $res->Price; ?></div>
	<div class="column-label pointer">Variation</div>
	<div class="column-value">: <a href="#"  class="Variation" data-id='<?php echo $res->varcatid; ?>' data-name=' <?php echo $res->variationcat; ?>'>  <?php echo $res->variationcat; ?></a></div>
	<!-- <div class="column-value"><input type="checkbox" name="Variationbox"  class="Variation" > </div> -->
	<div class="column-label pointer2">Installment</div>
	<div class="column-value "><input type="checkbox" name="Installment" class="Installment"  class="Installment" <?php echo $check; ?> ></div>
	<div class="column-label">Quantity</div>
	<div class="column-value"><input type="number" name="Quantity" id="Quantity" class="form-control" min="0" ></div>
</div> 
<div class="row">
	<input type="submit" name="btnSubmit" value="Save" class="btn-primary btn btn-md">
</div>
</form>
<?php }else{ ?>
	<div class="column-label">Product</div>
	<div class="column-value">: None</div>
	<div class="column-label">Description</div>
	<div class="column-value">: None</div>
	<div class="column-label">Category</div>
	<div class="column-value">: None</div>
	<div class="column-label">Price</div>
	<div class="column-value">: None</div>
	<div class="column-label">Variation</div>
	<div class="column-value">: None</div>
	<div class="column-label">Installment</div>
	<div class="column-value">: None</div>
	<div class="column-label">Quantity</div>
	<div class="column-value">: None</div>
<?php } ?>

<div class="modal fade varmodal" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Variation</h4>
        </div>
        <div class="modal-body">
		<div class="form-group">
                        
					  </div> 
		<Br class="breakline">
				<div class='container _varation'>
				
				</div>
				
				  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default varclose" >Close</button>
        </div>
      </div>
      
    </div>
</div>

<div class="modal fade varmodal" id="myModal2" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Installment</h4>
        </div>
        <div class="modal-body">
		<div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "Categories">Interest :</label>

                          <div class="col-md-8">
                            <select class="form-control input-sm Reeserve" id="Percentage" name="Percentage">
                              <option value="None">Select</option>
                              <?php 
                                $sql ="SELECT * FROM percentage ";
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                                  echo '<option value='.$row->id.' data-name="'.$row->percentage.'">'.$row->percentage.'</option>';
                                }
                              ?>
                            </select>
						  </div>
						  <Br class="breakline2">
						</div>
						
					  </div> 
	
				  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default reserveclose" >Close</button>
        </div>
      </div>
      
    </div>
</div>
  
<script>
$(document).ready(function(){
let catval = [];
let cattotal;
let tis =$('.Variation').data('id')

if(tis == 0 ){
	
}else{
	$('#Quantity').focus(function(e) {
    $(this).blur();
});
$('#Quantity').val('0')
}

$(".varriate").prop('disabled', true);
$(".Reeserve").prop('disabled', true);
	$('.Variation').click(()=>{
			$('#myModal').modal('show'); 
			$("#Quantity").val(0)
			// $("input#Quantity").prop('disabled', true);
			$(".varriate").prop('disabled', false);
			let $option = $('.Variation').data('id'),
			variationText=$('.Variation').data('name');
		
		$.post('php/lookup.php',{e:'var',id:$option},function(data){
			$('.VariationCategory').val($option);
			data = $.parseJSON(data)
			console.log(data)
			data2 = data[0].variation
			data2 = data2.split(',')
			$('.w-25').remove()
			console.log(data[0].varcatid)
			data2.forEach(function(elem){
				$('.container._varation').append(`<div class="row  w-25">
					<div class='col-sm-2'>`+variationText+`: `+elem+`</div>
					<div class='col-sm-3'><input type="number" class="form-control `+data[0].varcatid+`-cat category22 varriate"  min=0 value="0"></div>
				</div>`)
			})			
			
		})
	})

	$('#Variationcat').change(()=>{
		var $option = $('#Variationcat').val(),
		variationText=$('#Variationcat option:selected').text();
		
		$.post('php/lookup.php',{e:'var',id:$option},function(data){
			$('.VariationCategory').val($option);
			data = $.parseJSON(data)
			data2 = data[0].variation
			data2 = data2.split(',')
			$('.w-25').remove()
			console.log(data[0].varcatid)
			data2.forEach(function(elem){
				$('.container._varation').append(`<div class="row  w-25">
					<div class='col-sm-2'>`+variationText+`: `+elem+`</div>
					<div class='col-sm-3'><input type="number" class="form-control `+data[0].varcatid+`-cat category22 varriate"  min=0 value="0"></div>
				</div>`)
			})			
			
		})
	})
	$('.varclose').click(function(){
		catval= [];
		$('.category22').each(function(elem){
			catval.push(parseInt($(this).val()))
		})
		$('.Variationbracket').val("");
		$('.Variationbracket').val(catval.toString())
		$("#Quantity").val("")
		$("#Quantity").val(catval.reduce((a, b) => a + b, 0))
		
		$('#myModal').modal('hide'); 
	})

	$('.pointer').click(function(){
		$('#myModal').modal('show'); 
		if ($('.Variation').is(":checked"))
		{
			
		}
		else{
			console.log('not ok')
			$(".varriate").prop('disabled', true);
			
		}
	})

	$('.pointer2').click(function(){
		$('#myModal2').modal('show'); 
		if ($('.Installment').is(":checked"))
		{
			alert('asd')
		}
		else{
			console.log('not ok')
			$(".Reeserve").prop('disabled', true);
			
		}
	})
	// Reeserve
	$('.Installment').change(()=>{
		if ($('.Installment').is(":checked"))
		{
			$('#myModal2').modal('show'); 		
			$(".Reeserve").prop('disabled', false);	
		}
		else{
			console.log('not ok')
			$(".Reeserve").prop('disabled', true);
		}
	})
	$('#Percentage').change(function(){
		
		var $option = $('#Percentage').val();
		let dataname = $('#Percentage option:selected').attr('data-name');
		// alert($option)
		console.log($option,dataname)
		$('.yey').remove();
		$('.breakline2').after(`<label class='yey'>Selected Percentag : `+dataname+`</label>`)
		$('.Reservationbracket').val($option)
		
	})
         
	$('.reserveclose').click(function(){
		$('#myModal2').modal('hide'); 
	})
})
</script>
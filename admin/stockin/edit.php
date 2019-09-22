<?php 
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     } 

$id = $_GET['id'];
$sql ="SELECT * FROM tblproduct p, tblcategory c,tblstockin s 
       WHERE p.CategoryID=c.CategoryID AND p.ProductID=s.ProductID  AND StockinID = '{$id}'";
$mydb->setQuery($sql);
$cur = $mydb->executeQuery();
$maxrow = $mydb->num_rows($cur);
$res = $mydb->loadSingleResult(); 
$switch = $res->Installment;
$switch2 = $res->Variation;
$varswitch;
$variationID = $res->VariationCategory;

$onoff;
if($switch !="off"){
  $onoff = 'checked';
}
else{
  $onoff = "";
}

if($switch2 !='off'){
  $varswitch = 'checked';
}else{
  $varswitch = '';
}

?> 

<style type="text/css"> 
.pointer {cursor: pointer;}
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
    color: blue;
  }
  .column-value > input {
    height: 50px;
    font-size:   30px;
  }
  .row:after{
    content: "";
    display: table;
    clear: both;
  }
</style> 
  <div class="row">
    <div class="col-lg-12">
    <h1 class="page-header">Update Transaction</h1>
    </div>
    <!-- /.col-lg-12 -->
  </div> 
    <div style="font-size: 14px" class="page-header">Product Details</div>
    <div class="col-lg-12">
<?php  if ($maxrow > 0) {  ?> 
<form action="controller.php?action=edit" method="POST" >
<div class="row">
<input type="text" name="VariationCategory"  class="VariationCategory" value="<?php echo $res->VariationCategory; ?>">
	<input type="text" name="Variationbracket"  class="Variationbracket" >
  <input type="hidden" name="ProductID" value="<?php echo $res->ProductID; ?>">
  <input type="hidden" name="TransQuantity" value="<?php echo $res->Quantity; ?>">
  <input type="hidden" name="StockinID" value="<?php echo $res->StockinID; ?>">
  <div class="column-label">Product</div>
  <div class="column-value">: <?php echo $res->ProductName; ?></div>
  <div class="column-label">Description</div>
  <div class="column-value">: <?php echo $res->Description; ?></div>
  <div class="column-label">Category</div>
  <div class="column-value">: <?php echo $res->Categories; ?></div>
  <div class="column-label">Price</div>
  <div class="column-value">: <?php echo $res->Price; ?></div>
  <div class="column-label pointer">Variation</div>
	<div class="column-value"><input type="checkbox" name="Variationbox"  class="Variation" <?php echo $varswitch;?>> </div>
	<div class="column-label pointer2">Installment</div>
	<div class="column-value "><input type="checkbox" name="Installment" class="Installment" <?php echo $onoff;?>></div>
  <div class="column-label">Quantity</div>
  <div class="column-value"><input type="number" name="Quantity" class="form-control" id="Quantity" value="<?php echo $res->Quantity; ?>" min="1"></div>
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
          <th>Quantity</th>
          <th>Expired Date</th> 
          <th>Categories</th>
          <th width="14%" >Action</th> 
            </tr> 
          </thead> 
          <tbody>
            <?php 
             // `COMPANYID`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`
              $mydb->setQuery("SELECT *,s.ProductID as pid FROM `tblproduct` p,`tblcategory` c,`tblstockin` s WHERE p.`CategoryID`=c.`CategoryID` AND p.`ProductID`=s.`ProductID`");
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
              echo '<td>'. $result->Quantity.'</td>'; 
              echo '<td>'. $result->DateExpire.'</td>';
              echo '<td>'. $result->Categories.'</td>';  
              echo '<td align="center"><a title="Edit" href="index.php?view=edit&id='.$result->StockinID.'" class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></a>
              <a title="Delete" href="controller.php?action=delete&id='.$result->StockinID.'&ProductID='.$result->pid.'&TransQuantity='.$result->Quantity.'" class="btn btn-danger btn-xs  ">  <span class="fa  fa-trash-o fw-fa "></a></td>';
              echo '</tr>';
            } 
            ?>
          </tbody>
          
        </table>
            <div class="btn-group">
         <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
          <?php
          if($_SESSION['ADMIN_ROLE']=='Administrator'){
          // echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
          ; }?>
        </div>
      
      
        </form>

 <div class="table-responsive">  


 
<div class="modal fade varmodal" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Variation</h4>
        </div>
        <div class="modal-body">
		<div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "Categories">Variation:</label>
                          
                          <div class="col-md-8">
                            <select class="form-control input-sm varriate" id="Variationcat" name="Variationcat">
                              <option value="None">Select</option>
                              <?php 
                                $sql ="Select * From tblvarcat";
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                                  if ($variationID == $row->varcatid) {
                                    # code...
                                     echo '<option SELECTED value='.$row->varcatid.'>'.$row->variationcat.'</option>';
                                  }else{
                                    echo '<option value='.$row->varcatid.' >'.$row->variationcat.'</option>';

                                  }
                                  // echo '<option value='.$row->varcatid.' >'.$row->variationcat.'</option>';
                                }
                              ?>
                            </select>
                          </div>
                        </div>
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
<script type="text/javascript" src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"> </script>
<script>
$(document).ready(function(){
  let variation = '<?php echo $switch2;?>';
  let varcatid = '<?php echo $variationID;?>'
  let catval = [];
let cattotal;
  $('.Variation').change(()=>{
		if ($('.Variation').is(":checked"))
		{
			$('#myModal').modal('show'); 
			$(".varriate").prop('disabled', false);
			
		}
		else{
			console.log('not ok')
			$('.Variationbracket').val("")
			$("#Quantity").val("")
			$("input#Quantity").prop('disabled', false);
			
		}
  })
  console.log(variation)
  if(variation=="on"){
    
		var $option = $('#Variationcat').val(),
  variationText=$('#Variationcat option:selected').text();
    console.log('asdasdasd')
    $.ajax({
        url:"php/lookup.php",
        type:"POST",
        async:false,
        data:{e:'var',id:varcatid},
        success:function(result){
          data = $.parseJSON(result);
          
          data2 = data[0].variation
        data2 = data2.split(',')
        $('.w-25').remove()
        // console.log(data[0].varcatid)
        data2.forEach(function(elem){
          
        // $('.breakline').after(`<div class="form-group w-25">
        // 	<span for="example1">`+elem+`</span>
        // 	<input type="number" class="form-control `+data[0].varcatid+`-cat category22 varriate"  placeholder="pcs" style="width: 55px;" min=1> pcs
        // 	</div>`)
        // })	

          $('.container._varation').append(`<div class="row  w-25">
            <div class='col-sm-2'>`+variationText+`: `+elem+`</div>
            <div class='col-sm-3'><input type="number" class="form-control `+data[0].varcatid+`-cat category22 varriate  `+elem+`-color"  min=1 value="1"></div>
          </div>`)
        })
        $.post('php/lookup.php',{e:'value',stockid:<?php echo $id;?>},function(data00){
          data6 = $.parseJSON(data00);
          data3 = data6[0].VariationBracket
          $('.Variationbracket').val(data3)
          data3 = data3.split(',')
          console.log(data3,data2)
          console.log(data3.length)
          for(let m =0; m != data3.length; m++){
            $('.'+data2[m]+'-color').val(data3[m])
          }
        })
        
      }
    })
  }
  else{
    console.log('off')
  }

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
  $('.varclose').click(function(){
    catval= [];
    $('VariationCategory').val("")
		$('.category22').each(function(elem){
			catval.push(parseInt($(this).val()))
		})
		console.log(catval)
		$('.Variationbracket').val("");
		$('.Variationbracket').val(catval.toString())
		$("#Quantity").val("")
		$("#Quantity").val(catval.reduce((a, b) => a + b, 0))
		$('VariationCategory').val($('#Variationcat').val())
		$('#myModal').modal('hide'); 
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
				
			// $('.breakline').after(`<div class="form-group w-25">
			// 	<span for="example1">`+elem+`</span>
			// 	<input type="number" class="form-control `+data[0].varcatid+`-cat category22 varriate"  placeholder="pcs" style="width: 55px;" min=1> pcs
			// 	</div>`)
			// })	

				$('.container._varation').append(`<div class="row  w-25">
					<div class='col-sm-2'>`+variationText+`: `+elem+`</div>
					<div class='col-sm-3'><input type="number" class="form-control `+data[0].varcatid+`-cat category22 varriate"  min=1 value="1"></div>
				</div>`)
			})			
			
		})
	})
})
</script>
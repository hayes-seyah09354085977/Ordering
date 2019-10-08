
<style type="text/css">
  .content-header {
    min-height: 50px;
    border-bottom: 1px solid #ddd;
    font-size: 20px;
    font-weight: bold;
    margin-top: 30px;
  }
  .panel {
      width: 100%;
      max-width: 455px;
  }
  .content-body {
    min-height: 350px;
    /*border-bottom: 1px solid #ddd;*/
  }
  .content-body >p {
    padding:10px;
    font-size: 12px;
    font-weight: bold;
    border-bottom: 1px solid #ddd;
  }
  .content-footer {
    min-height: 100px;
    border-top: 1px solid #ddd;

  }
  .content-footer > p {
    padding:5px;
    font-size: 15px;
    font-weight: bold; 
  }
  
  .content-footer textarea {
    width: 100%;
    height: 200px;
  }
  .content-footer  .submitbutton{  
    margin-top: 20px;
    /*padding: 0;*/

  }

  /* tracker design */
  .step{
    padding   : 0;
    margin    : 15px 0px 0px 0px;
    width     : 100%;
    color     : #CCC;
  }

  .step ul{
    list-style   : none;
    padding      : 0;
    text-align   : center;
    counter-reset: step;
    display      : flex;
  }

  .step ul li{
    box-sizing : border-box;
    width      : 25%;
    text-align : center;
    position   : relative;
    padding-top: 40px;
  }
  
  .step ul li.done{
    color:#03b1c7;
  }

  .step ul li:before{
    text-align        : center;
    content           : counter( step);
    counter-increment : step;
    display           : block;
    width             : 30px;
    height            : 30px;
    border            : 3px solid #f9fbfd;
    border-radius     : 50%;
    position          : absolute;
    left              : 50%;
    top               : 0;
    transform         : translateX(-50%);
    background-color  : #CCC;
    color             : #FFF;
  }

  .step ul li.done:before{
    background-color  : #03b1c7;
  }

  .step ul li:after{
    content         : "";
    display         : block;
    width           : 100%;
    height          : 5px;
    background-color: #CCC;
    top             : 15px;
    position        : absolute;
    z-index         : -1;
    margin-left     : -50%;
  }

  .step ul li.done + li:after{
    background-color  : #03b1c7;
  }

  .step ul li:first-child:after{
    content:none;
  }
  /* product details */
  .product-image {
    padding: 10px 10px 0 10px;
  }

    .product-image img {
      width: 100%;
      height: 100%;
      object-fit: contain;
      height: 295px;
    }
    .product-title {
    font-size: 30px;
    font-weight: 600;
  }
  .product-price {
    color: #f5782d;
    font-size: 25px;
    font-weight: 600;
    letter-spacing: 1px;
  }
  .product-description {
      margin: 14px 14px 14px 0px;
      border-style: solid;
      border-left: 0px;
      border-right: 0px;
      border-top: 0px;
      border-color:#f5782d;
  }
  .product-description,.product-quantity,.product-price {
    padding: 15px 15px 15px 0px;
  }
  .product-checkout {
    padding: 0px 0px 15px 0px;
  }
  td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 12px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
/* attachements */
.inputfile {
    width: 0.1px;
    height: 0.1px;
    opacity: 0;
    overflow: hidden;
    position: absolute;
    z-index: -1;
}

.inputfile + label {
    max-width: 80%;
    font-size: 1.25rem;
    /* 20px */
    font-weight: 700;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
    padding: 0.625rem 1.25rem;
    /* 10px 20px */
}

.inputfile:focus + label,
.inputfile.has-focus + label {
    outline: 1px dotted #000;
    outline: -webkit-focus-ring-color auto 5px;
}

.inputfile + label i,
.inputfile + label svg {
    width: 1em;
    height: 1em;
    vertical-align: middle;
    fill: currentColor;
    margin-top: -0.25em;
    /* 4px */
    margin-right: 0.25em;
    /* 4px */
}

.inputfile + label {
    color: #004ca8;
    border: 2px solid currentColor;
}

.inputfile:focus + label,
.inputfile.has-focus + label,
.inputfile + label:hover {
    color: #599EFF;
}

/* modal */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

</style>

<?php 
global $mydb;
	$stockoutID = isset($_GET['id']) ? $_GET['id'] : '';

	// $sql = "UPDATE tblstockout SET HView=0 WHERE StockoutID='{$stockoutID}'";
	// $mydb->setQuery($sql);
	// $mydb->executeQuery();
	
 	$totalamount = 0;
  //  SELECT * FROM tblcategory c inner JOIN
  //  tblproduct p on c.CategoryID=p.CategoryID
  //  inner join tblstore st on st.StoreID=p.StoreID
  //  inner JOIN `tblstockout` s on p.ProductID=s.ProductID 
  //  inner join tblcustomer cmer on cmer.CustomerID=s.CustomerID
  //  where s.StockoutID = '33'
  
	// $sql = "SELECT * FROM tblcategory c,tblStore st,`tblproduct` p , `tblstockout` s,tblcustomer cmer WHERE c.CategoryID=p.CategoryID AND st.StoreID=p.StoreID AND p.`ProductID`=s.`ProductID` AND cmer.`CustomerID`=s.`CustomerID`  and `StockoutID`=" .$stockoutID;
	$sql = "SELECT * FROM tblcategory c inner JOIN
  tblproduct p on c.CategoryID=p.CategoryID
  inner join tblstore st on st.StoreID=p.StoreID
  inner JOIN `tblstockout` s on p.ProductID=s.ProductID 
  inner join tblcustomer cmer on cmer.CustomerID=s.CustomerID
  where s.StockoutID =".$stockoutID;
  
  $mydb->setQuery($sql);
	$res = $mydb->loadSingleResult();

  $totalamount = $res->Price * $res->Quantity;


?> 
<div class="step">
<?php if($res->Status == 'Pending for Cancellation' || $res->Status == 'Cancelled'){?>
  <ul>
    <li class="Processing done">Pending For Cancellation</li>
    <li class="Cancelled">Cancelled</li>
</ul>
<?php }else{?>
  <ul>
    <li class="Processing done">Pending</li>
    <li class="Confirmed">Confirmed</li>
	<li class="ForDelivery">For Delivery</li>
	<li class="Delivered">Delivered</li>
</ul>
<?php }?>
</div>


<div class="container">
<div class="row"><div class="col-sm-12 content-header" style="">Product Details</div></div>
  <div class="row">
  <div class="col-sm-4">
      <div class="product-image">
        <img src="<?php echo web_root.'admin/products/'. $res->Image1 ?>" />
      </div>
    </div>
    <div class="col-sm-5">
    <div class="product-right">
      <div class="product-info">
          <div class="product-manufacturer"><?php echo $res->StoreName ; ?></div>
          <div class="product-title"><?php echo $res->ProductName; ?></div>
      </div>
      <div class="product-description"><?php echo $res->Description; ?></div> 
      <div class="product-qty">Quantity: &nbsp; <?php echo $res->Quantity; ?></div>
      <div class="product-price"> ₱<?php echo number_format($totalamount,2);?></div>
    </div>
    <div class="row">
      <div class="col-sm-12">
          <div class="product-checkout">Delivery Address: &nbsp; <?php echo $res->CustomerAddress; ?></div>
          <div class="product-checkout-total">Order Type: &nbsp; <?php echo $res->order_type; ?></div>
          <div class="product-checkout-total-amount">Order Status: &nbsp;<b> <?php echo $res->Status; ?></b></div>
        </div>
      </div>
    </div>
  </div>
</div>
<div>
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <img class="magnifiedImg" src="#"/>
  </div>
</div>
<!-- installment -->
<?php if($res->order_type == 'Installment'){ 
  	$sql2 = "SELECT * FROM tblInstallments c 
    where c.StockoutID =".$stockoutID;
    
    $mydb->setQuery($sql2);
    $cur = $mydb->executeQuery();
    $res2 = $cur->fetch_all(MYSQLI_ASSOC);
  ?>
<form  method="POST" action="controller.php?action=update_payment&id=<?php echo $stockoutID; ?>" enctype="multipart/form-data"> 
<div class="box">
  <input type="file" name="pay_rec" id="pay_rec" class="inputfile inputfile-2">
  <label for="pay_rec"><i class="fa fa-paperclip"></i><span>Upload Payment Receipt</span></label>
</div>
<button class="btn btn-primary btn-sm" name="submit" type="submit">Submit</button>
</form>

<table>
  <tr>
    <th>Payment Receipts</th>
  </tr>
  <?php 
  foreach($res2 as $data){
    $pay_rec = $data['pay_receipt'];
    //  echo '<tr><td><img class="magnifiedImg" src="'.$pay_rec.'"/></td></tr>';
    echo '<tr><td class="pay_img" data="'.$pay_rec.'">View Image</td></tr>';
  }
  ?>
  
</table>
<?php } ?>
</div>

<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script>
<script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.min.js"></script>

<script>
  var status = '<?php echo $res->Status; ?>'
  switch(status){
    case 'Confirmed':
    $('.Confirmed').addClass('done')
    break;
    case 'For Delivery':
    $('.Confirmed').addClass('done')
    $('.ForDelivery').addClass('done')
    break;
    case 'Delivered':
    $('.Confirmed').addClass('done')
    $('.ForDelivery').addClass('done')
    $('.Delivered').addClass('done')
    break
    case 'Cancelled':
    $('.Cancelled').addClass('done')
    break
  }

  $(function() { 
    $('.pay_img').click(function(){
      var pay_data=$(this).attr('data')
      $('.magnifiedImg').attr('src',pay_data)
      modal.style.display = "block";

    })

    // Get the modal
    var modal = document.getElementById("myModal");
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
      
     
    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
   });

  'use strict';

  ;( function ( document, window, index )
  {
    var inputs = document.querySelectorAll( '.inputfile' );
    Array.prototype.forEach.call( inputs, function( input )
    {
      var label	 = input.nextElementSibling,
        labelVal = label.innerHTML;

      input.addEventListener( 'change', function( e )
      {
        var fileName = '';
        if( this.files && this.files.length > 1 )
          fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
        else
          fileName = e.target.value.split( '\\' ).pop();

        if( fileName )
          label.querySelector( 'span' ).innerHTML = fileName;
        else
          label.innerHTML = labelVal;
      });

      // Firefox bug fix
      input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
      input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
    });
  }( document, window, 0 ));

</script>

<!-- 
<div class="col-sm-12 content-header" style="">Product Details</div>
<div class="col-sm-12 content-body" >  
	<h3><?php echo $res->ProductName; ?></h3>

	<div class="col-sm-6">
		<ul>
            <li><i class="fp-ht-bed"></i>Description : <?php echo $res->Description; ?></li>
            <li><i class="fp-ht-food"></i>Price :&nbsp; &#8369; <?php echo number_format($res->Price,2);  ?></li>
            <li><i class="fa fa-sun-"></i>Quantity : <?php echo $res->Quantity; ?></li>
        </ul>
	</div> 
	<div class="col-sm-6">
		<ul> 
            <li><i class="fp-ht-tv"></i>Address : <?php echo $res->CustomerAddress; ?></li>
            <li><i class="fp-ht-computer"></i>Category : <?php echo $res->Categories; ?></li>
            <li><i class="fp-ht-computer"></i>Status :<b> <?php echo $res->Status; ?></b></li>
        </ul>
	</div>
	<div class="col-sm-12">
		<p>Total Amount :&nbsp; &#8369; <?php echo number_format($totalamount,2);?> </p>   
		<p style="margin-left: 15px;"> 	</p>
	</div> 
	<div class="col-sm-12"> 
		<p>Store : </p>
		<p style="margin-left: 15px;"><?php echo $res->StoreName ; ?></p> 
		<p style="margin-left: 15px;">@ <a href="<?php echo web_root;?>index.php?q=map"><?php echo $res->StoreAddress ; ?></a></p>
		<p style="margin-left: 15px;"><i class="fa fa-phone"></i> <?php echo $res->ContactNo ; ?></p>
	</div>
</div>
   -->




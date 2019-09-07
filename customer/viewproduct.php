<style type="text/css">
.content-header {
	min-height: 50px;
	border-bottom: 1px solid #ddd;
	font-size: 20px;
	font-weight: bold;
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

</style>
<?php 
global $mydb;
	$stockoutID = isset($_GET['id']) ? $_GET['id'] : '';

	$sql = "UPDATE tblstockout SET HView=0 WHERE StockoutID='{$stockoutID}'";
	$mydb->setQuery($sql);
	$mydb->executeQuery();
	
 	$totalamount = 0;

	$sql = "SELECT * FROM tblcategory c,tblStore st,`tblproduct` p , `tblstockout` s,tblcustomer cmer WHERE c.CategoryID=p.CategoryID AND st.StoreID=p.StoreID AND p.`ProductID`=s.`ProductID` AND cmer.`CustomerID`=s.`CustomerID`  and `StockoutID`=" .$stockoutID;
	$mydb->setQuery($sql);
	$res = $mydb->loadSingleResult();

	$totalamount = $res->Price * $res->Quantity;


?> 
<div class="step">
  <ul>
    <li class="Processing done">Pending</li>
    <li class="Confirmed">Confirmed</li>
    <li class="Toship">To Ship</li>
	<li class="Shipped">Shipped</li>
	<li class="Todeliver">To Deliver</li>
	<li class="Delivered">Delivered</li>
</ul>
</div>


<div class="container">
<div class="col-sm-12 content-header" style="">Product Details</div>
</div>

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




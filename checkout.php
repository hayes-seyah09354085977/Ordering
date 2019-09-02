<style>
section#inner-headline {
    background: #37393c !important;
}
</style>

<section id="content"> 
<div class="container"> 
<div class="row">
	<div class="col-md-6">
		<table>
			<tr>
				<td>Tracking No.  </td><td><b> : TR#201123</b></td>
			</tr>
			<tr>
				<td>Order Type  </td><td><b> : Installment</b></td>
			</tr>
			<tr>
				<td>Fullname  </td><td> : <?php echo $_SESSION['CustomerName'] ?></td>

			</tr>
			<tr>
				<td>Contact Number  </td><td> : <?php echo $_SESSION['CustomerContact'] ?></td>
			</tr>
			<tr>
				<td>Address  </td><td> : <?php echo $_SESSION['CustomerAddress'] ?></td>
			</tr>
			
		</table>
	</div>
 </div>
 <div class="row">
 	<div class="col-md-12">
 		  <table id="table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
        
          <thead>
            <tr> 
              <th>Product</th> 
              <th>Price</th>
              <th>Quantity</th> 
              <th>Subtotal</th>  
            </tr> 
          </thead> 
          <tbody>
            <?php 
              $cart = 0;
			  $subtotal = 0;
			  $count_cart=0;


              if (!empty($_SESSION['gcCart'])){   
                $count_cart = count($_SESSION['gcCart']); 
                    for ($i=0; $i < $count_cart  ; $i++) { 

                        	echo'<tr> 
                    				<td>'.$_SESSION['gcCart'][$i]['product'].'</td>
                    				<td>'.$_SESSION['gcCart'][$i]['price'].'</td>
                    				<td>'.$_SESSION['gcCart'][$i]['qty'].' </td>
                    				<td> '.$_SESSION['gcCart'][$i]['subtotal'].'</td> 
                        		</tr>';   
                    			$cart += $_SESSION['gcCart'][$i]['qty'];
                    			$subtotal += $_SESSION['gcCart'][$i]['subtotal'];
                   } 


                  }  
          
            ?>
          </tbody> 
        </table>  
        <div class="pull-right" style="font-size: 30px;"> &#8369 <?php echo $subtotal;?></div>

 	</div>
 </div>
 <div class="row">
 	<div class="col-md-12">
	     <div><a href="cartcontroller.php?action=submitorder" class="btn btn-primary pull-right">Place Order <i class="fa fa-arrow-right"></i></a></div></div>
 </div>
 </form> 
</div>
</section> 
 
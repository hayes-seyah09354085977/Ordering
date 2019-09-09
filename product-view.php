
<style type="text/css">
#myCarousel {
  margin-top: 5px;
}
.stretch img{ 
 width: 100%;
 height: 50%;
}
section#inner-headline {
    background: #37393c !important;
}
p.currency {
    font-size: 20px !important;
    font-weight: bold;
}
.magnify{
  border-radius: 50%;
  border: 2px solid black;
  position: absolute;
  z-index: 20;
  background-repeat: no-repeat;
  background-color: white;
  box-shadow: inset 0 0 20px rgba(0,0,0,.5);
  display: none;
  cursor: none;
}
.product-image {
  padding: 10px 10px 0 10px;
}

.product-image img {
  width: 100%;
    height: 100%;
    object-fit: contain;
    height: 295px;
}
.product-checkout{left:10px; font-size: 12px; text-transform: uppercase; margin-top: 10px!important;}
.product-checkout-actions{ right:0; margin-top: 10px!important;}
.product-checkout-total, .product-checkout-total-amount{font-size: 20px; color: #C17A41;}
.product-checkout-total * {display:inline-block;}
.product-checkout-actions{}

/* 6. Components - buttons, menus, images, etc. */
.product-quantity-label{text-transform:uppercase;}
.product-quantity *{display:inline-block;}

#product-quantity-input{background-color: #eee;border: none; width:2.5em; text-align: center;}
.product-quantity-subtract, .product-quantity-add{cursor: pointer; margin-left: 20px; padding-left:5px; padding-right: 5px;}
.product-quantity-subtract{margin-right:20px;}

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
#slider {
    position: relative;
    overflow: hidden;
    margin: 20px auto 0 auto;
    border-radius: 4px;
}
#slider ul {
    position: relative;
    margin: 0;
    padding: 0;
    height: 150px;
    list-style: none;
    border-top: solid;
    border-color: #f5782d;  
}
#slider ul li {
    position: relative;
    display: block;
    float: left;
    margin: 10px;
    padding: 0;
    width: 80px;
    height: 80px;
    background: #ccc;
    text-align: center;
    border: solid;
    border-color: #37393c;
}
.imgmini{
  width:100%;
  max-width:100px;
  height: 100%;
}
input.remqty {
    border: none;
}
.variation {
    padding-top: 15px;
}
.col-sm-2.title {
    margin: 10px 0px 0px 0px;
}
.options {
    border: 1px solid;
    border-color:#b1b1b1;
    width: 98px;
    max-width: 100%;
    font-size: 12px;
    text-align: center;
    cursor:pointer;
    margin: 5px;
    padding: 5px;
}
.options:hover {
    background: #f5782d;
    color: white;
}
.activeOpts{
  background:#f5782d;
  color:#fff;
}
</style>

<section id="content">
<div class="container">
  <?php
 if (isset($_GET['search'])&&isset($_GET['pid'])) {
     # code...
    $category = $_GET['search'];
    $pid = $_GET['pid'];
 }else{
     $category = '';

 }

    $sql = "SELECT * FROM tblinventory i,`tblstore` s,`tblproduct` p ,`tblcategory` c
            WHERE i.ProductID=p.ProductID 
              AND s.StoreID=p.StoreID 
              AND p.CategoryID=c.CategoryID 
              AND Remaining > 0 AND c.CategoryID=$category
              AND p.ProductID = $pid";
    $mydb->setQuery($sql);
    $cur = $mydb->loadResultList();
    $cnt=0;
    $productPrice = 0;
    foreach ($cur as $result) { 
      if($result->Image1 =='photos/'){
        $result->Image1 = 'photos/No-Photo-Available.jpg';
      }
      if($result->Image2 =='photos/'){
        $result->Image2 = 'photos/No-Photo-Available.jpg';
      }
      if($result->Image3 =='photos/'){
        $result->Image3 = 'photos/No-Photo-Available.jpg';
      }
     if(($cnt%2)==1){
       echo '<div class="row">';
     }
     $productPrice=$result->Price;
     
  ?>  
    <div class="col-sm-4">
              <div class="product-image">
                <img class="magnifiedImg" src="<?php echo web_root.'admin/products/'. $result->Image1 ?>" />
              </div>
              
              <div id="slider">
                  <ul>
                      <li><img class="imgmini" src="<?php echo web_root.'admin/products/'. $result->Image1 ?>" /></li>
                      <li><img class="imgmini" src="<?php echo web_root.'admin/products/'. $result->Image2 ?>" /></li>
                      <li><img class="imgmini" src="<?php echo web_root.'admin/products/'. $result->Image3 ?>" /></li>
                  </ul>
              </div>
    </div>
    <div class="col-sm-2"> </div>
    <div class="col-sm-6">
    <div class="product-right">
      <form action="cartcontroller.php?action=add" method="POST">
              <div class="product-info">
                  <div class="product-manufacturer"><?php echo $result->StoreName ;?></div>
                  <div class="product-title"><?php echo strtoupper($result->ProductName) ;?></div>
              </div>
              <div class="product-description"><?php echo $result->Description ;?></div>
              <div class="product-price"> ₱<?php echo $result->Price ;?></div>
              <div>In-Stocks: &nbsp;<input type="text" class="remqty" name="REMQTY<?php echo $result->ProductID ;?>" value="<?php echo $result->Remaining ;?>" readonly></div>
              <div class='variation'>

              </div>

              <div class="product-quantity">
                <label for="product-quantity-input" class="product-quantity-label">Quantity</label>
                <div class="product-quantity-subtract">
                  <i class="fa fa-chevron-left"></i>
                </div>
                <div>
                  <input type="hidden" name="ProductID" value="<?php echo  $result->ProductID ?>">
                  <input id="product-quantity-input" type="text" min="1" max="<?php echo $result->Remaining ;?>" name="QTY<?php echo $result->ProductID ;?>" value=1 readonly />
                </div>
                <div class="product-quantity-add">
                  <i class="fa fa-chevron-right"></i>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-6">
                  <div class="product-checkout">
                    Total Price
                    <div class="product-checkout-total">
                      <div class="product-checkout-total-amount">
                        ₱<?php echo $productPrice;?>
                      </div>
                    </div>
                  </div>
              </div>
                <div class="col-sm-6">
                <div class="product-checkout-actions">
                <button type="submit"  class="btn btn-main btn-next-tab"><i class="fa fa-shopping-cart"></i> Order Now !</button>
                </div>
                </div>
            </form>
          </div>
    </div>

  <?php 
if(($cnt%2)==1){
  echo '</div>';
}
$cnt+=1;
} ?> 
</div>
</section>

<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script>
<script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.min.js"></script>
<script src="<?php echo web_root; ?>plugins/Image-Magnify/Image-Magnify.js"></script>
<script>
$('.product-quantity-add, .product-quantity-subtract').click(function(){
  var qty = $('#product-quantity-input'),
    qtyMax=parseInt(qty.attr('max')),qtyVal = parseInt(qty.val()),
    newVal;
  var ProductPrice = "<?php echo $productPrice;?>";
    switch(this.className){
      case 'product-quantity-add':
          newVal=qtyVal+1
          if(newVal <= qtyMax){
            qty.val(newVal)
            $('.product-checkout-total-amount').text('₱'+ProductPrice*newVal)
          }
        break;
      case 'product-quantity-subtract':
          newVal=qtyVal-1
          if(newVal >= 1){
            qty.val(newVal)
            $('.product-checkout-total-amount').text('₱'+ProductPrice*newVal)
          }
        break;
    }
})
$('.imgmini').click(function(){
  var frontsrc = $(this).attr('src')
  $('.magnifiedImg').attr('src',frontsrc)
})
    
$.ajax({
      type: "POST",
      url: "ajaxSession.php",
      dataType:'json',
      data: {e:'getvariation'},
      success: function(data){
          for(var x =0; x < data.length; x++){
            var y = data[x]['variation'].split(','),
            z='',
            varname='<div class="col-sm-2 title"> '+data[x]['variationcat']+'</div>'

              for(var yy = 0; yy < y.length; yy++){
                if(yy==0 ||(yy%4) > 0){
                  z+= '<div class="col-md-2 options '+data[x]["variationcat"].replace(/\s/g, '')+'">'+y[yy]+' </div>'
                }else if (yy!= 0 &&(yy%4) == 0){
                  z+= ' </div><div class="row"><div class="col-md-2 "></div><div class="col-md-2 options '+data[x]["variationcat"].replace(/\s/g, '')+'">'+y[yy]+' </div>'
                }
              }
                $('.variation').append(`
                <div class="row">
                `+varname+`
                `+z+`
                </div>
            `)
          }

          $(".options").click(function() {
            var opts = $(this),
            vcat = opts.attr('class').split(' ')[2],a
            $("."+vcat).removeClass('activeOpts')
            opts.addClass('activeOpts')
            a=$('.activeOpts').text()
            console.log(a)
              $.ajax({
                type: "POST",
                url: "ajaxSession.php",
                dataType:'json',
                data: {e:'productWithVariation',vr:a},
                success: function(data){
                  console.log(data)
                }
              })
          });
      }
  });




      
</script>



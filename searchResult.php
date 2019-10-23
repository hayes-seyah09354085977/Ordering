<style type="text/css"> 
#myCarousel {
  margin-top: 5px;
}
.stretch img{ 
 width: 100%;
 height: 100% !important;
 max-height: 250px;
}
.info-blocks .info-blocks-in {
    padding: 20px 0px;
}
section#inner-headline {
    background: #37393c !important;
}
p.currency {
    font-size: 20px !important;
    font-weight: bold;
}
.info-blocks{
  margin-top: 15px;
}
._catproducts,a{
  color: black;
  text-decoration: none !important;
}
._catproducts:hover{
  color:#6694de !important;
}


</style>
  <?php
    if (isset($_GET['product'])) {
        # code...
        $category = $_GET['product'];
    }else{
        $category = '';

    }
 ?>
  <section id="content">
    <div class="categories">
          <div class="container">
              <div class="row">
    <?php 
            // $sql = "SELECT * FROM tblinventory i,`tblstore` s,`tblproduct` p ,`tblcategory` c
            //  WHERE i.ProductID=p.ProductID 
            //    AND s.StoreID=p.StoreID 
            //    AND p.CategoryID=c.CategoryID 
            //    AND Remaining > 0 AND c.CategoryID=$category
            //  Order By p.ProductID Limit 12";


            $sql = "SELECT * FROM tblinventory i,`tblstore` s,`tblproduct` p ,`tblcategory` c
            WHERE i.ProductID=p.ProductID 
            AND s.StoreID=p.StoreID 
            AND p.CategoryID=c.CategoryID 
            AND Remaining > 0 AND p.ProductName like '%$category%'
            Order By p.ProductID Limit 12";

            $mydb->setQuery($sql);
            $res = $mydb->loadResultList();
            if(count($res)==0){
              echo '<h2 style="text-align: center; padding-bottom:15px;">NO PRODUCTS FOUND IN THIS CATEGORY</h2>';
            }else{
             
            foreach ($res as $row) {
                // echo '<h2 style="text-align: center; padding-bottom:15px;">'.$row->Categories.'</h2>';

    ?>
            
              <div class="col-sm-3 info-blocks">
                <div class="stretch">
                    <a href="index.php?q=product-view&search=<?php echo $category;?>&pid=<?php echo $row->ProductID;?>">
                     <img src="<?php echo web_root.'admin/products/'.$row->Image1;?>">
                    </a>
                  </div>
                  <div class="info-blocks-in">
                    <a  href="index.php?q=product-view&search=<?php echo $category;?>&pid=<?php echo $row->ProductID;?>">
                      <h3 class='_catproducts'><?php echo $row->ProductName;?></h3>
                    </a>
                      <p class='currency'>₱<?php echo $row->Price;?></p>
                  </div>
              </div>

    <?php
            }
          }
    ?>
              </div>
        </div>
      </div>
  </section>
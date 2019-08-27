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
.info-blocks{
  margin-top: 15px;
}
</style>
  <?php
    if (isset($_GET['search'])) {
        # code...
        $category = $_GET['search'];
    }else{
        $category = '';

    }
 ?>
  <section id="content">
    <div class="categories">
          <div class="container">
    
              
              <div class="row">
    <?php 
            $sql = "SELECT * FROM tblinventory i,`tblstore` s,`tblproduct` p ,`tblcategory` c
             WHERE i.ProductID=p.ProductID 
               AND s.StoreID=p.StoreID 
               AND p.CategoryID=c.CategoryID 
               AND Remaining > 0 AND c.CategoryID=$category
             Order By p.ProductID Limit 12";

            $mydb->setQuery($sql);
            $res = $mydb->loadResultList();
            if(count($res)==0){
              echo '<h2 style="text-align: center; padding-bottom:15px;">NO PRODUCTS FOUND IN THIS CATEGORY</h2>';
            }else{
              echo '<h2 style="text-align: center; padding-bottom:15px;">'.$res[0]->Categories.'</h2>';
            foreach ($res as $row) {

    ?>
              <div class="col-sm-3 info-blocks">
                <div class="stretch">
                    <img src="<?php echo web_root.'admin/products/'.$row->Image1;?>">
                  </div>
                  <div class="info-blocks-in">
                      <h3><?php echo $row->ProductName;?></h3>
                      <!-- <p>Description :&nbsp; <?php echo $row->Description;?></p> -->
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
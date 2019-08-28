<style type="text/css">
  .stretch img{
    width: 100%;
    height: 200px;
  }
  .slides > li > img {
    width: 100%;
    height: 480px;
  }
  .item > img{
    width: 100%;
    height: 4%;
  }
  /* .carousel-inner {
    width: 50% !important;
    left: 25%;
} */
.pcategories {
  text-align: center;
  padding: 25px 20px;
  font-weight: bold;
}
.pcat{
  background: linear-gradient(90deg, rgba(119,128,135,1) 0%, rgba(49,55,60,1) 48%, rgba(119,128,135,1) 100%);
  border-radius: 25px;
  margin-right: 15px;
  margin-top: 10px;
}
.pcatcolor{
  color:#f6f6f6 !important;
}
p.currency {
    font-size: 25px !important;
    font-weight: bold;
}
</style>
  <section id="banner">
   
  <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/cover3.jpg" alt="" />
                <div class="flex-caption">
            <!--         <h3>innovation</h3> 
          <p>We create the opportunities</p>  -->
           
                </div>
              </li>
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/cover2.jpg" alt="" />
                <div class="flex-caption">
            <!--         <h3>innovation</h3> 
          <p>We create the opportunities</p>  -->
           
                </div>
              </li>
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/cover1.jpg" alt="" />
                <!-- <div class="flex-caption">
                    <h3 class="pcatcolor">Specialize</h3> 
          <p class="pcatcolor">Toyo Knows Gshock</p> 
           
                </div> -->
              </li>
            </ul>
        </div>
  <!-- end slider -->
 
  </section> 
  <section id="call-to-action-2" style="background: #37393c">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-9">
          <h3>Partner with Business Leaders</h3>
          <p>Development of successful, long term, strategic relationships between customers and suppliers, based on achieving best practice and sustainable competitive advantage. In the business partner model, HR professionals work closely with business leaders and line managers to achieve shared organisational objectives.</p>
        </div>
       <!--  <div class="col-md-2 col-sm-3">
          <a href="#" class="btn btn-primary">Read More</a>
        </div> -->
      </div>
    </div>
  </section>
  
  <section id="content">
    <div class="about home-about">
          <div class="container">
            <h2 style="text-align: center;">Newly Added Products</h2>
              
              <div class="row">
    <?php 
            // $sql ="SELECT * FROM tblproduct Order by ProductID DESC Limit 6";
            $sql = "SELECT * FROM tblinventory i,`tblstore` s,`tblproduct` p ,`tblcategory` c
            WHERE i.ProductID=p.ProductID 
              AND s.StoreID=p.StoreID 
              AND p.CategoryID=c.CategoryID 
              AND Remaining > 0 
            Order By p.ProductID DESC Limit 8";
            $mydb->setQuery($sql);
            $res = $mydb->loadResultList();

            foreach ($res as $row) {

    ?>
              <div class="col-sm-3 info-blocks">
                <div class="stretch">
                    <a href="index.php?q=product-view&search=<?php echo $row->CategoryID;?>&pid=<?php echo $row->ProductID;?>">
                     <img src="<?php echo web_root.'admin/products/'.$row->Image1;?>">
                    </a>
                  </div>
                  <div class="info-blocks-in">
                    <a href="index.php?q=product-view&search=<?php echo $row->CategoryID;?>&pid=<?php echo $row->ProductID;?>">
                      <h3><?php echo $row->ProductName;?></h3>
                    </a>
                      <!-- <p>Description :&nbsp; <?php echo $row->Description;?></p> -->
                      <p class='currency'>₱<?php echo $row->Price;?></p>
                  </div>
              </div>
    <?php
            }
    ?>
              </div>
        </div>
      </div>
  </section>
  

  <section class="section-padding gray-bg">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-title text-center">
            <h2 >Product Categories</h2>  
          </div>
        </div>
      </div>
      <div class="row pcategories">
        <div class="col-md-12">
          <?php 
            $sql = "SELECT * FROM `tblcategory`";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<div class="col-md-2 pcat" style="font-size:15px;padding:10px"> <a class="pcatcolor" href="'.web_root.'index.php?q=category&search='.$result->CategoryID.'">'.strtoupper($result->Categories).'</a></div>';
            }

          ?>
        </div>
      </div>
 
    </div>
  </section>    
  <section id="content-3-10" class="content-block data-section nopad content-3-10">
    
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  
    <div class="carousel-inner">
      <div class="item active"> 
        <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/caro1.jpg" alt="Products" style="height: 350px;" >
      </div>
      <div class="item"> 
        <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/caro2.jpg" alt="Products" style="height: 350px;" >
      </div>
      <div class="item"> 
        <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/caro-necklace.jpg" alt="Products" style="height: 350px;" >
      </div>

     <?php 
          // $sql ="SELECT * FROM tblproduct";
          // $mydb->setQuery($sql);
          // $res = $mydb->loadResultList();

          // foreach ($res as $row) {
          // echo '<div class="item">
          //       <img src="admin/products/'.$row->Image1.'" alt="'.$row->ProductName.'" style="height: 350px;"  >
          //     </div>';
            
          // }
      ?>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>
  

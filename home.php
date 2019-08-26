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
</style>
  <section id="banner">
   
  <!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/Small-Rime.jpg" alt="" />
                <div class="flex-caption">
            <!--         <h3>innovation</h3> 
          <p>We create the opportunities</p>  -->
           
                </div>
              </li>
              <li>
                <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/maxresdefault.jpg" alt="" />
                <div class="flex-caption">
                    <h3>Specialize</h3> 
          <p>Success depends on work</p> 
           
                </div>
              </li>
            </ul>
        </div>
  <!-- end slider -->
 
  </section> 
  <section id="call-to-action-2" style="background: #cf7d7d">
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
  
  
  <div class="container">
        <div class="row">
      <div class="col-md-12">
        <div class="aligncenter"><h2 class="aligncenter">Store</h2><!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores quae porro consequatur aliquam, incidunt eius magni provident, doloribus omnis minus ovident, doloribus omnis minus temporibus perferendis nesciunt.. --></div>
        <br/>
      </div>
    </div>

    <?php 
     $sql = "SELECT * FROM `tblstore` s, `tblusers` u WHERE StoreID=UserID";
      $mydb->setQuery($sql);
      $comp = $mydb->loadResultList();


      foreach ($comp as $company ) {
        # code...
    
    ?>
            <div class="col-sm-4 info-blocks">
              <!--   <i class="icon-info-blocks fa fa-building-o"></i> -->
              <div class="stretch">
                   <img src="<?php echo web_root.'admin/user/'.$company->PicLoc;?>">
                 </div>
                <div class="info-blocks-in">
                    <h3><?php echo $company->StoreName;?></h3>
                    <!-- <p><?php echo $company->COMPANYMISSION;?></p> -->
                    <p>Address :<?php echo $company->StoreAddress;?></p>
                    <p>Contact No. :<?php echo $company->ContactNo;?></p>
                </div>
            </div>

    <?php } ?> 
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
      <div class="row">
        <div class="col-md-12 ">
          <?php 
            $sql = "SELECT * FROM `tblcategory`";
            $mydb->setQuery($sql);
            $cur = $mydb->loadResultList();

            foreach ($cur as $result) {
              echo '<div class="col-md-3" style="font-size:15px;padding:5px">* <a href="'.web_root.'index.php?q=category&search='.$result->CategoryID.'">'.$result->Categories.'</a></div>';
            }

          ?>
        </div>
      </div>
 
    </div>
  </section>    
  <section id="content-3-10" class="content-block data-section nopad content-3-10">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
   <!--  <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
 -->
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active"> 
        <img src="<?php echo web_root; ?>plugins/home-plugins/img/slides/drug.png" alt="Los Angeles" style="height: 350px;" >
      </div>

    
    
     <?php 
          $sql ="SELECT * FROM tblproduct";
          $mydb->setQuery($sql);
          $res = $mydb->loadResultList();

          foreach ($res as $row) {
          echo '<div class="item">
                <img src="admin/products/'.$row->Image1.'" alt="'.$row->ProductName.'" style="height: 350px;"  >
              </div>';
            
          }
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
  
  <div class="about home-about">
        <div class="container">
          <h2 style="text-align: center;">Products</h2>
            
            <div class="row">
  <?php 
          $sql ="SELECT * FROM tblproduct";
          $mydb->setQuery($sql);
          $res = $mydb->loadResultList();

          foreach ($res as $row) {

  ?>
        
         <div class="col-md-4">
                <!-- Heading and para -->
                <div class="block-heading-two">
                  <h3><span><a href="index.php?q=products&id=<?php echo $row->ProductID;?>"><?php echo $row->ProductName;?></a></span></h3>
                </div>
                <p><?php echo $row->Description;?></p>
              </div>       
  <?php
          }
  ?>
 
              
            </div>
             
      </div>
      
    </div>
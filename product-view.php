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
</style>

<section id="content">
        <div class="container content">  
          <!-- <div class="row">
          <div class="col-md-6"></div>  
          <div class="col-md-6"> -->
          
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
     
  ?>  
     <div class="col-md-6">
      <form class="" action="cartcontroller.php?action=add" method="POST">
          <div class="panel panel-primary">
                <div class="panel-header">
                   <div style="border-bottom: 1px solid #ddd;padding: 10px;font-size: 20px;font-weight: bold;color: #000;margin-bottom: 5px;"><a href="<?php echo web_root.'index.php?q=viewjob&search='.$result->JOBID;?>"><?php echo $result->ProductName ;?></a> 
                </div> 
              </div>
              <div class="panel-body contentbody">
                    <div class="col-sm-8"> 
                      <div class="col-sm-12">
                            <p>Category : &nbsp; <?php echo $result->Categories ;?></p>
                        </div>
                        <div class="col-sm-12">
                            <p>Store : &nbsp; <?php echo $result->StoreName ;?></p>
                        </div>
                        <div class="col-sm-12"> 
                            <p>Product</p>
                            <ul style="list-style: none;"> 
                                 <li>Name : <?php echo $result->ProductName ;?></li> 
                                 <li>Description : <?php echo $result->Description ;?></li> 
                                 <!-- <li>Expired Date : <?php echo date_format(date_create($result->DateExpire),'M d, Y'); ?></li>   -->
                                 <li>Remaining Stocks :<?php echo $result->Remaining ;?></li> 
                            </ul> 
                         </div>
                         <div class="col-sm-12"> 
                            <ul style="list-style: none;"> 
                                 <li><p class="currency">Price :₱<?php echo $result->Price ;?></p></li> 
                            </ul> 
                         </div>
                        <div class="col-sm-12">
                            <p>Location :  <?php echo  $result->StoreAddress ?></p>
                            <p>Contact No :  <?php echo  $result->ContactNo ?></p>  
                        </div>
                    </div>
                    <div class="col-sm-4"> 
                     <input type="hidden" name="ProductID" value="<?php echo  $result->ProductID ?>">
                                    <input type="number" min="1" placeholder="Quantity" name="QTY<?php echo $result->ProductID ;?>" value="1" class="form-control" style="margin-bottom: 5px;">

                                    <button type="submit"  class="btn btn-main btn-next-tab"><i class="fa fa-shopping-cart"></i> Order Now !</button>
                             <div class="row stretch">
                                      <!-- <img src=" <?php echo web_root.'admin/products/'. $result->Image1 ?>"> -->
                                       <div id="myCarousel<?php echo $result->ProductID ?>" class="carousel slide" data-ride="carousel">
                                  <!-- Indicators -->
                                  <ol class="carousel-indicators">
                                    <li data-target="#myCarousel<?php echo $result->ProductID ?>" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel<?php echo $result->ProductID ?>" data-slide-to="1"></li>
                                    <li data-target="#myCarousel<?php echo $result->ProductID ?>" data-slide-to="2"></li>
                                  </ol>

                                  <!-- Wrapper for slides -->
                                  <div class="carousel-inner">
                                    <div class="item active">
                                    <img src=" <?php echo web_root.'admin/products/'. $result->Image1 ?>" style="height: 150px;" >
                                    </div>

                                    <div class="item">
                                    <img src=" <?php echo web_root.'admin/products/'. $result->Image2 ?>" style="height: 150px;" >
                                    </div>
                                  
                                    <div class="item">
                                    <img src=" <?php echo web_root.'admin/products/'. $result->Image3 ?>" style="height: 150px;" >
                                    </div>
                                  </div>

                                  <!-- Left and right controls -->
                                  <a class="left carousel-control" href="#myCarousel<?php echo $result->ProductID ?>" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="right carousel-control" href="#myCarousel<?php echo $result->ProductID ?>" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </div>

                             </div>
                      </div>
                </div> 
              <div class="panel-footer"> 
              </div>
          </div> 
        </form>
      </div>
<?php 
if(($cnt%2)==1){
  echo '</div>';
}
$cnt+=1;
} ?>   
        <!-- </div>   -->

      </div>
     </div>
    </section>  

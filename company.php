<style type="text/css">
  .stretch img{
    width: 100%;
    height: 200px;
  }
</style>
    <section id="content">
        <div class="container content">     
        <!-- Service Blcoks -->  
        <div class="row">
            <?php 
                  $sql = "SELECT * FROM `tblstore` s, `tblusers` u WHERE StoreID=UserID";
                  $mydb->setQuery($sql);
                  $stor = $mydb->loadResultList(); 

                  foreach ($stor as $store ) { 
            ?>
                    <div class="col-sm-4 info-blocks">
                       <!--  <i class="icon-info-blocks fa fa-building-o"></i> -->
                       <div class="stretch">
                         <img src="<?php echo web_root.'admin/user/'.$store->PicLoc;?>">
                       </div>
                        <div class="info-blocks-in">
                            <h3><?php echo '<a href="'.web_root.'index.php?q=map&search='.$store->StoreID.'">'.$store->StoreName.'</a>';?></h3> 
                            <p>Address :<?php echo $store->StoreAddress;?></p>
                            <p>Contact No. :<?php echo $store->ContactNo;?></p>
                        </div>
                    </div>

            <?php } ?>

 
 
         </div> 
        </div>
    </section>
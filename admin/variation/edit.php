<?php  
  if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }
  
// $autonum = New Autonumber();
// $res = $autonum->single_autonumber(2);
 @$id = $_GET['id'];
    if($id==''){
  redirect("index.php");
}
 

  $product = New Variation();
  $res = $product->single_variation($id);

  $CategoryID = $res->varcatid;
?>
     
 
       <div class="center wow fadeInDown">
             <h2 class="page-header">Update Product</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>
 

  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">  
  <input  id="ProductID" name="ProductID" type="hidden" value="<?php echo $res->varid;?>"  >

                     
    <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for=
          "Categories">Category:</label>

          <div class="col-md-8">
            <select class="form-control input-sm" id="CategoryID" name="CategoryID">
              <option value="None">Select</option>
              <?php 
                $sql ="Select * From tblvarcat ";
                $mydb->setQuery($sql);
                $res2  = $mydb->loadResultList();
                foreach ($res2 as $row) {
                  # code...
                 
                  if ($CategoryID == $row->varcatid) {
                    # code...
                      echo '<option SELECTED value='.$row->varcatid.'>'.$row->variationcat.'</option>';
                  }else{
                    echo '<option  value='.$row->varcatid.'>'.$row->variationcat.'</option>';

                  }
                }

              ?>
            </select>
          </div>
        </div>
    </div>  

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Description">Description:</label>
                        <div class="col-md-8"> 
                          <textarea  class="form-control input-sm" id="Variation" name="Variation" placeholder=
                              "Description"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->variation; ?></textarea> 
                          </div>
                      </div>
                    </div>

                          

                        <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 


  </form>


             
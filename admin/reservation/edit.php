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
 

  $product = New Reservationfee();
  $res = $product->single_reserve($id);
  $reservevalue = $res->reservevalue;
?>
     
 
       <div class="center wow fadeInDown">
             <h2 class="page-header">Update Reservation Fee</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>
 

  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">  
  <input  id="ProductID" name="ProductID" type="hidden" value="<?php echo $res->reserveid;?>"  >

                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "ProductName">Reservation For:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="Reservationname" name="Reservationname" placeholder=
                              "Product Name" type="text"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $res->reservename; ?>">
                        </div>
                      </div>
                    </div>

                   

          
        

                     <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "Categories">Percentage:</label>
                        
                          <div class="col-md-8">
                            <select class="form-control input-sm" id="Percentage" name="Percentage">
                              <option value="None">Select</option>
                              <?php 
                              
                                $sql ="Select * From percentage ";
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                                  if ($reservevalue == $row->id) {
                                    # code...
                                     echo '<option SELECTED value='.$row->id.'>'.$row->percentage.'</option>';
                                  }else{
                                    echo '<option  value='.$row->id.'>'.$row->percentage.'</option>';

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
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 


  </form>


             
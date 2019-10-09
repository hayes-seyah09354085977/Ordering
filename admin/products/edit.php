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
 

  $product = New Product();
  $res = $product->single_product($id);

  $DateExpire = date_format(date_create($res->DateExpire),'m/d/Y'); 
  $CategoryID = $res->CategoryID;
  $Supplier = $res->Supplier;
  $Variation = $res->VarcatID;
?>
     
 
       <div class="center wow fadeInDown">
             <h2 class="page-header">Update Product</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>
 

  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">  
  <input  id="ProductID" name="ProductID" type="hidden" value="<?php echo $res->ProductID;?>"  >

                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "ProductName">Product:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="ProductName" name="ProductName" placeholder=
                              "Product Name" type="text"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $res->ProductName; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Description">Description:</label>

                        <div class="col-md-8"> 
                          <textarea  class="form-control input-sm" id="Description" name="Description" placeholder=
                              "Description"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->Description; ?></textarea> 
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Price">P.O. :</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input  class="form-control input-sm" id="PO" name="PO" placeholder=
                              "P.O."    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $res->PO ?>"> 
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Price">Price:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input  class="form-control input-sm" id="Price" name="Price" placeholder=
                              "Price"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $res->Price ?>"> 
                        </div>
                      </div>
                    </div> 


                   <!-- <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DateExpire">Expired Date:</label> 
                      <div class="col-md-8">
                          <div class="input-group date  " data-provide="datepicker" data-date="2012-12-21T15:25:00Z">
                         <input type="input" class="form-control input-sm date_picker" id="HIREDDATE" name="DateExpire" placeholder="mm/dd/yyyy" value="<?php echo $DateExpire ?>"   autocomplete="off"/> 
                           <span class="input-group-addon"><i class="fa fa-th"></i></span>
                       </div>
                      </div>
                    </div>
                  </div>   -->

          
        

                     <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "Categories">Category:</label>

                          <div class="col-md-8">
                            <select class="form-control input-sm" id="CategoryID" name="CategoryID">
                              <option value="None">Select</option>
                              <?php 
                                $sql ="Select * From tblcategory WHERE StoreID=".$_SESSION['ADMIN_USERID'];
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                                  if ($CategoryID == $row->CategoryID) {
                                    # code...
                                     echo '<option SELECTED value='.$row->CategoryID.'>'.$row->Categories.'</option>';
                                  }else{
                                    echo '<option  value='.$row->CategoryID.'>'.$row->Categories.'</option>';

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
                          "Categories">Supplier :</label>

                          <div class="col-md-8">
                            <select class="form-control input-sm" id="Supplier" name="Supplier">
                              <option value="None">Select</option>
                              <?php 
                                $sql ="Select * from tblsupplier";
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                               
                                  if ($Supplier == $row->sup_id) {
                                    # code...
                                    echo '<option SELECTED value='.$row->sup_id.'>'.$row->Supplier.'</option>';
                                  }else{
                                    
                                    echo '<option  value='.$row->sup_id.'>'.$row->Supplier.'</option>';
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
                          "Categories">Variation :</label>

                          <div class="col-md-8">
                            <select class="form-control input-sm" id="Variation" name="Variation">
                              <option value="0">Select</option>
                              <?php 
                                 $sql ="Select * From tblvarcat";
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                               
                                  if ($Variation == $row->varcatid) {
                                    # code...
                                    echo '<option SELECTED value='.$row->varcatid.'>'.$row->variationcat.'</option>';
                                    
                                  }else{
                                    echo '<option value='.$row->varcatid.'>'.$row->variationcat.'</option>';
                                   

                                  }
                                }

                              ?>
                            </select>
                          </div>
                        </div>
                      </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" style="text-align: right;" >Attachment 1:</label>
                      <div class="col-md-8">
                      <input type="file" name="Image1"  />
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" style="text-align: right;" >Attachment 2:</label>
                      <div class="col-md-8">
                      <input type="file" name="Image2"  />
                      </div>
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4" style="text-align: right;" >Attachment 3:</label>
                      <div class="col-md-8">
                      <input type="file" name="Image3"  />
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


             
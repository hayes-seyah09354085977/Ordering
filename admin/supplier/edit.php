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
 

  $product = New Supplier();
  $res = $product->supplier($id);

  // $DateExpire = date_format(date_create($res->DateExpire),'m/d/Y'); 
  // $CategoryID = $res->CategoryID;
?>
     
 
       <div class="center wow fadeInDown">
             <h2 class="page-header">Update Supplier</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>
 

  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">  
  <input  id="ProductID" name="ProductID" type="hidden" value="<?php echo $res->sup_id;?>"  >

                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "ProductName">Supplier:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="Supplier" name="Supplier" placeholder=
                              "Supplier" type="text"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $res->Supplier; ?>">
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Description">Address:</label>

                        <div class="col-md-8"> 
                          <textarea  class="form-control input-sm" id="address" name="address" placeholder=
                              "Address"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->sup_address; ?></textarea> 
                          </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Price">Contact:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input  class="form-control input-sm" id="Contact" name="Contact" placeholder=
                              "Contact"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $res->sup_contacts ?>"> 
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
                      "idno"></label>  

                      <div class="col-md-8">
                         <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      <!-- <a href="index.php" class="btn btn-info"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                     
                     </div>
                    </div>
                  </div> 


  </form>


             
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
 

  $loanss = New Loan();
  $res = $loanss->single_loan($id);

  $loanid = $res->loanid;
?>
     
 
       <div class="center wow fadeInDown">
             <h2 class="page-header">Update Product</h2>
            <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
        </div>
 

  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=edit" method="POST" enctype="multipart/form-data">  
  <input  id="loanid" name="loanid" type="hidden" value="<?php echo $res->loanid;?>"  >

                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "ProductName">Loan Name:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="loanname" name="loanname" placeholder=
                              "Product Name" type="text"  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $res->loanname; ?>">
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Price">Loan Percent:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input  class="form-control input-sm" id="loanpercent" name="loanpercent" placeholder=
                              "Loan Percent"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $res->loanpercent ?>"> 
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Price">Loan Month:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input  class="form-control input-sm" id="loanmonth" name="loanmonth" placeholder=
                              "Loan Percent"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off" value="<?php echo $res->loanMonth ?>"> 
                        </div>
                      </div>
                    </div> 

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Description">Description:</label>

                        <div class="col-md-8"> 
                          <textarea  class="form-control input-sm" id="Desloandescriptioncription" name="loandescription" placeholder=
                              "Description"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"><?php echo $res->loandescription; ?></textarea> 
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


             
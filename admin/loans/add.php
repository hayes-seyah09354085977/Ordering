<?php 
 if(!isset($_SESSION['ADMIN_USERID'])){
    redirect(web_root."admin/index.php");
   }

  $autonum = New Autonumber();
  $res = $autonum->set_autonumber('employeeid');

 ?> 

 <section id="feature" class="transparent-bg">
        <div class="container">
           <div class="center wow fadeInDown">
                 <h2 class="page-header">Add New Employee</h2>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>
               
            <div class="row">
                <div class="features">
 
                  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=add" method="POST" enctype="multipart/form-data">
        
                     <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "LoanName">Loan Name:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="loanname" name="loanname" placeholder=
                              "Loan Name" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
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
                              "Loan Percent"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"> 
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "LoanName">Loan Month:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                           <input class="form-control input-sm" id="loanmonth" name="loanmonth" placeholder=
                              "Loan Month" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
                        </div>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Description">Loan Description:</label>

                        <div class="col-md-8"> 
                          <textarea  class="form-control input-sm" id="loandescription" name="loandescription" placeholder=
                              "Description"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea> 
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
       
       
                
                </div><!--/.services-->
            </div><!--/.row-->  
        </div><!--/.container-->
    </section><!--/#feature-->
 

 
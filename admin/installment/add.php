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
                 <h2 class="page-header">Add Installment</h2>
                <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut <br> et dolore magna aliqua. Ut enim ad minim veniam</p> -->
            </div>
               
            <div class="row">
                <div class="features">
 
                  <form class="form-horizontal span6  wow fadeInDown" action="controller.php?action=add" method="POST" enctype="multipart/form-data">
        
                  <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "Categories">Product:</label>

                          <div class="col-md-8">
                            <select required class="form-control input-sm" id="pid" name="pid">
                              <option value="None">Select</option>
                              <?php 
                                $sql ="Select * From tblproduct ";
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                                  echo '<option value='.$row->ProductID.'>'.$row->ProductName.'</option>';
                                }

                              ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Price">Plan Name:</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input required class="form-control input-sm" id="plan" name="plan" placeholder=
                              "Plan Name"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"> 
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="col-md-8">
                        <label class="col-md-4 control-label" for=
                        "Price">Months (Select Between 1 - 12 Months):</label>

                        <div class="col-md-8">
                          <input name="deptid" type="hidden" value="">
                          <input required type='number' class="form-control input-sm" id="mos" name="mos" placeholder=
                              "Months" min='1' max='12'  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"> 
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-8">
                          <label class="col-md-4 control-label" for=
                          "Categories">Percentage:</label>

                          <div class="col-md-8">
                            <select required class="form-control input-sm" id="percent" name="percent">
                              <option value="None">Select</option>
                              <?php 
                                $sql ="Select * From percentage ";
                                $mydb->setQuery($sql);
                                $res  = $mydb->loadResultList();
                                foreach ($res as $row) {
                                  # code...
                                  echo '<option value='.$row->id.'>'.$row->percentage.'</option>';
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
       
       
                
                </div><!--/.services-->
            </div><!--/.row-->  
        </div><!--/.container-->
    </section><!--/#feature-->

    <script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
    <script>
    function setInputFilter(textbox, inputFilter) {
		["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
			textbox.addEventListener(event, function() {
					if (inputFilter(this.value)) {
						this.oldValue = this.value;
						this.oldSelectionStart = this.selectionStart;
						this.oldSelectionEnd = this.selectionEnd;
					} else if (this.hasOwnProperty("oldValue")) {
						this.value = this.oldValue;
						this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
					}
				});
			});
		}
	setInputFilter(document.getElementById("Price"), function(value) {
    return /^\d{0,15}$/.test(value); });
    
    </script>
 

 
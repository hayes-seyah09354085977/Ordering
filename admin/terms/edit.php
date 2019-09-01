<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


  $id = $_GET['id'];
  $termss = New Terms();
  
  $singleterms = $termss->single_terms($id);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">

          <fieldset>
            <legend>Update Terms and Condition</legend>
                      
<!-- asd <?php print_r($singleterms); ?> -->
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="CATEGORY">Terms and Condition:</label>

                      <div class="col-md-8">
                       <input  id="id" name="id"   type="HIDDEN" value="<?php echo $singleterms->id; ?>">
                         <input class="form-control input-sm" id="Terms" name="Terms" placeholder=
                            "Terms" type="text" value="<?php echo $singleterms->Terms; ?>">
                      </div>
                    </div>
                  </div>


            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                      <!-- <a href="index.php" class="btn btn_fixnmix"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp;<strong>Back</strong></a> -->
                      <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                   
                      </div>
                    </div>
                  </div>

              
          </fieldset> 

        <div class="form-group">
                <div class="rows">
                  <div class="col-md-6">
                    <label class="col-md-6 control-label" for=
                    "otherperson"></label>

                    <div class="col-md-6">
                   
                    </div>
                  </div>

                  <div class="col-md-6" align="right">
                   

                   </div>
                  
              </div>
              </div>
          
        </form>
      

        </div><!--End of container-->
  
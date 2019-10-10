<?php
    if (!isset($_SESSION['ADMIN_USERID'])){
      redirect(web_root."admin/index.php");
     }


  $categoryid = $_GET['id'];
  $category = New FAQ();
  $singlecategory = $category->single_faq($categoryid);

?> 
 <form class="form-horizontal span6" action="controller.php?action=edit" method="POST">
 <input  id="CATEGORYID" name="CATEGORYID"   type="HIDDEN" value="<?php echo $singlecategory->id; ?>">
          <fieldset>
            <legend>Update FAQ</legend>
                      

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="CATEGORY">Category:</label>

                      <div class="col-md-8">
                       
                         <input class="form-control input-sm" id="question" name="question" placeholder=
                            "Question" type="text" value="<?php echo $singlecategory->Question; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for="CATEGORY">Answer:</label>

                      <div class="col-md-8">
                       
                         <input class="form-control input-sm" id="answer" name="answer" placeholder=
                            "Answer" type="text" value="<?php echo $singlecategory->Answer; ?>">
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
  
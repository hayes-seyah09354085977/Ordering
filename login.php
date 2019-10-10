  
     <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button class="close" data-dismiss="modal" type=
                  "button">×</button>

                  <h4 class="modal-title" id="myModalLabel">Login</h4>
                </div>

                <!-- <form action="process.php?action=login" enctype="multipart/form-data" method="post"> -->
                  <div class="modal-body hold-transition login-page">
                    <div id="loginerrormessage"></div>
                    <div class="login-box"> 
                        <div class="login-box-body" style="border: solid 1px #ddd;padding: 35px;min-height: 350px;"> 
                            <div class="form-group has-feedback">
                              <input type="text" class="form-control" placeholder="Email or Username" name="user_email" id="user_email">
                              <span class="fa fa-user form-control-feedback" style="margin-top: -22px;"></span>
                            </div>
                            <div class="form-group has-feedback">
                              <input type="password" class="form-control" placeholder="Password" name="user_pass" id="user_pass">
                              <span class="fa fa-lock form-control-feedback" style="margin-top: -22px;"></span>
                            </div>
                            <div class="row">
                              <div class="col-xs-8">
                                <div class="checkbox icheck">
                                  <label>
                                    <input type="checkbox"> Remember Me
                                  </label>
                                </div>
                              </div>
                              <!-- /.col -->
                              <div class="col-xs-4">
                                
                              </div>
                              <!-- /.col -->
                            </div>
                          
                          <a href="#" data-toggle="modal"      data-target="#forgotten">I forgot my password</a><br>
                          <a href="<?php echo web_root; ?>index.php?q=register/customer" class="text-center">Create New Account</a>

                        </div>
                        <!-- /.login-box-body -->
                      </div>
                  </div>

                  <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Close</button> <button class="btn btn-primary"
                    name="btnlogin" id="btnlogin"  >Login</button>
                  </div>
                <!-- </form> -->
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal --> 


<div class="modal fade varmodal" id="forgotten" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Forgot Password</h4>
      </div>
      <div class="modal-body">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Email or Username" name="user_email222" id="user_email222">
        <span class="fa fa-user form-control-feedback" style="margin-top: -22px;"></span><br>
        <button class="btn btn-primary" name="btnlogin" id="Forgotpass"  >Ok</button>
      </div>
       
      </div>
      <div class="modal-footer">
      </div>
    </div>
    
  </div>
</div>
<script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script>
$(document).ready(function(){
  $('#Forgotpass').click(function(){
    $.post('forgotten.php',{e:'var',user_email:$('#user_email222').val()},function(data){
      console.log(data)
    })
  })
})
</script>

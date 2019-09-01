<?php
require_once("../include/initialize.php");

 ?>
  <?php
 // login confirmation
  if(isset($_SESSION['ADMIN_USERID'])){
    redirect(web_root."admin/index.php");
  }
  // build/
  ?>
   
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Watch ur Toyo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  
	<link rel="icon" type="image/png" href="build/images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="build/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="build/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="build/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="build/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="build/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="build/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="build/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="build/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="build/css/util.css">
	<link rel="stylesheet" type="text/css" href="build/css/main.css">

</head>
<body style="background-color: #666666;">

<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">

          <div>
         
          </div>
          
          <form  action="" method="post" class="login100-form validate-form">
            <span class="login100-form-title p-b-43">
            Login to Store
            </span>
            <p><?php check_message(); ?></p>
            <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
              <input class="input100" type="text" placeholder="Username" name="user_email">
              <span class="focus-input100"></span>
            </div>
            <div class="wrap-input100 validate-input" data-validate="Password is required">
              <input class="input100" type="password" placeholder="Password"  name="user_pass">
              <span class="focus-input100"></span>
            </div>
            <div class="container-login100-form-btn">
              <button type="submit" name="btnLogin" class="login100-form-btn">
                Login
              </button>
            </div>
          </form>

				  <div class="login100-more" style="background-image: url('build/images/bg-01.jpg');"></div>
			</div>
		</div>
	</div>









<?php 

if(isset($_POST['btnLogin'])){
  $email = trim($_POST['user_email']);
  $upass  = trim($_POST['user_pass']);
  $h_upass = sha1($upass);
  
   if ($email == '' OR $upass == '') {

      message("Invalid Username and Password!", "error");
      redirect("login.php");
         
    } else {  
  //it creates a new objects of member
    $user = new User();
    //make use of the static function, and we passed to parameters
    $res = $user->userAuthentication($email, $h_upass);
    if ($res==true) { 
       message("You logon as ".$_SESSION['ROLE'].".","success");
      // if ($_SESSION['ROLE']=='Administrator' || $_SESSION['ROLE']=='Cashier'){

        $_SESSION['ADMIN_USERID'] = $_SESSION['USERID'];
        $_SESSION['ADMIN_FULLNAME'] = $_SESSION['FULLNAME'] ;
        $_SESSION['ADMIN_USERNAME'] =$_SESSION['USERNAME'];
        $_SESSION['ADMIN_ROLE'] = $_SESSION['ROLE'];
        $_SESSION['ADMIN_PICLOCATION'] = $_SESSION['PICLOCATION'];

        unset( $_SESSION['USERID'] );
        unset( $_SESSION['FULLNAME'] );
        unset( $_SESSION['USERNAME'] );
        unset( $_SESSION['PASS'] );
        unset( $_SESSION['ROLE'] );
        unset($_SESSION['PICLOCATION']);

         redirect(web_root."admin/index.php");
      // } 
    }else{
      message("Account does not exist!", "error");
       redirect(web_root."admin/login.php"); 
    }
 }
 } 
 ?> 
	<script src="build/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="build/vendor/animsition/js/animsition.min.js"></script>
	<script src="build/vendor/bootstrap/js/popper.js"></script>
	<script src="build/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="build/vendor/select2/select2.min.js"></script>
	<script src="build/vendor/daterangepicker/moment.min.js"></script>
	<script src="build/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="build/vendor/countdowntime/countdowntime.js"></script>
	<script src="build/js/main.js"></script>

<script>
  $(function () {
    
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>

 


 



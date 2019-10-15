<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php
                // $query = "SELECT * FROM `tbltitle` WHERE TItleID=1";
                // $res = mysql_query($query) or die(mysql_error());
                // $viewTitle = mysql_fetch_assoc($res);
                // echo $viewTitle['Title'];
            ?>
        </title>
       <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo web_root;?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/font-awesome/css/font-awesome.min.css">

        <!-- <link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/dataTables.bootstrap.css">  -->
        <!-- <link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/jquery.dataTables.min.css">  -->

        <!-- Ionicons -->
        <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo web_root;?>dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo web_root;?>dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link href="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" href="<?php echo web_root;?>plugins/dataTables/jquery.dataTables.min.css">  

        <link rel="stylesheet" href="<?php echo web_root; ?>plugins/select2/select2.css">
        <!-- Daterange picker -->
        <!-- <link rel="stylesheet" href="<?php echo web_root;?>plugins/daterangepicker/daterangepicker-bs3.css"> -->
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo web_root;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> 
        <style>
          li.mychat {
          margin-top: 2%;
          font-size: 31px;
          cursor: pointer;
          }
          .modal-lg {
              width: 1025px;
          }
        </style>


  <!-- CSS INCLUDE -->        
  <!-- <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/> -->
  <link rel="stylesheet" href="<?php echo web_root; ?>admin/dist/sweetalert2.css">
  <link rel="stylesheet" href="<?php echo web_root; ?>admin/dist/animate.css">
 
    </head>

 <body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo web_root;?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Store</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Watch Ur Toyo</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="mychat">
            <i class="fa fa-user" style="color:white; "></i> 
          </li>
          <?php
            $fullname;
              $user = New User();
              $singleuser = $user->single_user($_SESSION['ADMIN_USERID']);
              $fullname =$singleuser->FullName;
          ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu" style="padding-right: 15px;"  >
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo web_root.'admin/user/'. $singleuser->PicLoc;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $singleuser->FullName; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              
              <li class="user-header"> 
                <img data-target="#menuModal"  data-toggle="modal"  src="<?php echo web_root.'admin/user/'. $singleuser->PicLoc;?>" class="img-circle" alt="User Image" />  
              </li> 
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo web_root.'admin/user/index.php?view=view&id='.$_SESSION['ADMIN_USERID'] ;?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo web_root ;?>admin/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>



 <div class="modal fade" id="menuModal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button class="close" data-dismiss="modal" type=
                                    "button">x</button>

                                    <h4 class="modal-title" id="myModalLabel">Image.</h4>
                                </div>

                                <form action="<?php echo web_root; ?>admin/user/controller.php?action=photos" enctype="multipart/form-data" method=
                                "post">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="rows">
                                                <div class="col-md-12">
                                                    <div class="rows">
                                                        <div class="col-md-8"> 
                                                            <input class="mealid" type="hidden" name="mealid" id="mealid" value="">
                                                              <input name="MAX_FILE_SIZE" type="hidden" 
                                                              value="1000000"> 
                                                              <input id="photo" name="photo" type="file">
                                                        </div>

                                                        <div class="col-md-4"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-default" data-dismiss="modal" type=
                                        "button">Close</button> <button class="btn btn-primary"
                                        name="savephoto" type="submit">Upload Photo</button>
                                    </div>
                                </form>
                            </div><!-- /.modal-content-->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->  



  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
 
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu"> 
        <li  class="<?php echo (currentpage() == 'index.php') ? "active" : false;?>" >
          <a href="<?php echo web_root ;?>admin/">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>  
          </a> 
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Categories</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu"> 
            <li class="<?php echo (currentpage() == 'category') ? "active" : false;?>" > 
              <a href="<?php echo web_root ;?>admin/category/">
                <i class="fa fa-list"></i> <span>Category</span>  
              </a>
            </li> 
            <li class="<?php echo (currentpage() == 'variationcategory') ? "active" : false;?>" > 
              <a href="<?php echo web_root ;?>admin/variationcategory/">
                <i class="fa fa-list"></i> <span>Variation Category</span>  
              </a>
            </li>
            <li class="<?php echo (currentpage() == 'supplier') ? "active" : false;?>" > 
              <a href="<?php echo web_root ;?>admin/supplier/">
                <i class="fa fa-list"></i> <span>Suppliers</span>  
              </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Products</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">  
            <li class="<?php echo (currentpage() == 'variation') ? "active" : false;?>" > 
              <a href="<?php echo web_root ;?>admin/variation/">
                <i class="fa fa-list"></i> <span>Variation</span>  
              </a>
            </li>
            <!-- <li class="<?php echo (currentpage() == 'store') ? "active" : false;?>" >
              <a href="<?php echo web_root ;?>admin/store/">
                <i class="fa fa-building"></i> <span>Store</span> 
              </a>
            </li> -->
            <li class="<?php echo (currentpage() == 'products') ? "active" : false;?>" >
              <a href="<?php echo web_root ;?>admin/products/">
                <i class="fa fa-suitcase"></i> <span>Products</span> 
              </a>
            </li> 
            <li class="<?php echo (currentpage() == 'installment') ? "active" : false;?>" >
              <a href="<?php echo web_root ;?>admin/installment/">
                <i class="fa fa-suitcase"></i> <span>Installment</span> 
              </a>
            </li> 
            <li class="<?php echo (currentpage() == 'inventory') ? "active" : false;?>">
              <a href="<?php echo web_root; ?>admin/inventory/">
                <i class="fa fa-list-alt"></i> <span>Inventory</span> </a>
            </li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Transaction</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">  
            <li class="<?php echo (currentpage() == 'stockin') ? "active" : false;?>" > 
              <a href="<?php echo web_root ;?>admin/stockin/">
                <i class="fa fa-th"></i> <span>Stock-in</span>  
              </a>
            </li> 
            
            
            <li class="<?php echo (currentpage() == 'orders') ? "active" : false;?>" > 
              <a href="<?php echo web_root ;?>admin/orders/">
                <i class="fa fa-th-list"></i> <span>Orders</span>  
              </a>
            </li>
            <li class="<?php echo (currentpage() == 'critical') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>admin/critical/">
            <i class="fa fa-th-list"></i> <span>Critical Stocks</span>  
          </a>
        </li>
          </ul>
        </li>
        
       <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo web_root ;?>pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="<?php echo web_root ;?>pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="<?php echo web_root ;?>pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="<?php echo web_root ;?>pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="<?php echo web_root ;?>pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="<?php echo web_root ;?>pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>-->
         
        <?php if ($_SESSION['ADMIN_ROLE']=='Administrator') { ?> 
          
          <!-- <li class="<?php echo (currentpage() == 'loans') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>admin/loans/">
            <i class="fa fa-th-list"></i> <span>Loan Structure</span>  
          </a>
        </li> -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Store Management</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu">  
        <li class="<?php echo (currentpage() == 'terms') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>admin/terms/">
            <i class="fa fa-th-list"></i> <span>Terms And Condition</span>  
          </a>
        </li>
        <li class="<?php echo (currentpage() == 'faq') ? "active" : false;?>" > 
          <a href="<?php echo web_root ;?>admin/faq/">
            <i class="fa fa-th-list"></i> <span>FAQ</span>  
          </a>
        </li>
          <li class="<?php echo (currentpage() == 'user') ? "active" : false;?>">
          <a href="<?php echo web_root; ?>admin/user/">
            <i class="fa fa-user"></i> <span>Manage Users</span> </a>
        </li> 
        <li class="<?php echo (currentpage() == 'customer') ? "active" : false;?>">
          <a href="<?php echo web_root; ?>admin/customer/">
            <i class="fa fa-user"></i> <span>Manage Customers</span> </a>
        </li> 
         
        </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Reports</span>
            <i class="fa fa-angle-left pull-right"></i>
          </a>
          <ul class="treeview-menu"> 
          <li class="<?php echo (currentpage() == 'transactionrep') ? "active" : false;?>">
            <a href="<?php echo web_root; ?>admin/transactionrep/">
              <i class="fa fa-user"></i> <span>Transaction Report </span> </a>
          </li>
          <li class="<?php echo (currentpage() == 'inventoryrep') ? "active" : false;?>">
            <a href="<?php echo web_root; ?>admin/inventoryrep/">
              <i class="fa fa-user"></i> <span>Inventory Report</span> </a>
          </li>
        </ul>
        </li>
        <?php } ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content-header">
      <h1>
        <?php echo isset($title) ? $title : ''; ?>
        <!-- <small>it all starts here</small> -->
      </h1>
      <ol class="breadcrumb">
        <?php

          if ($title!='Home') {
            # code... 
            $active_title = '';
            if (isset($_GET['view'])) {
              # code...
              $active_title = '<li class='.$active_title.'><a href="index.php">'.$title.'</a></li>';
            }else{
              $active_title = '<li class='.$active_title.'>'.$title.'</li>';
            }
            echo '<li><a href='.web_root.'admin/><i class="fa fa-dashboard"></i> Home</a></li>';
            echo  $active_title;
            echo  isset($_GET['view']) ? '<li class="active">'.$_GET['view'].'</li>' : '';
          } 


        ?>
      </ol>
    </section>
         <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">

              <?php 
               check_message();
               require_once $content; 
               ?> 
             </div>
             </div>
           </div>
         </div>
         </section>
 </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="chat" role="dialog">
      <div class="modal-dialog modal-lg">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title2" >Chat </h3>
          </div>
          <div class="modal-body ">
            <div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item mychatframe" src="<?php echo web_root; ?>/plugins/mychat/index.php?name=<?php  echo $singleuser->FullName; ?>Store"></iframe></div>
                
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
     
      </div>
    </div>

  

  

    </body>
      <script type="text/javascript" src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"> </script>
      <script type="text/javascript" src="<?php echo web_root; ?>bootstrap/js/bootstrap.min.js" ></script>
      <script src="<?php echo web_root;?>dist/js/app.min.js"></script> 

      <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datepicker.js" ></script> 
      <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.js" charset="UTF-8"></script>
      <script type="text/javascript" src="<?php echo web_root; ?>plugins/datepicker/locales/bootstrap-datetimepicker.uk.js" charset="UTF-8"></script>

      <script type="text/javascript" src="<?php echo web_root; ?>plugins/dataTables/dataTables.bootstrap.min.js" ></script> 
      <script src="<?php echo web_root; ?>plugins/datatables/jquery.dataTables.min.js"></script> 

      <script src="<?php echo web_root; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>

      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.js"></script> 
      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script> 
      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script> 
      <script type="text/javascript" language="javascript" src="<?php echo web_root; ?>plugins/select2/select2.full.min.js"></script> 
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

      <script src="<?php echo web_root; ?>admin/dist/sweetalert2.js"></script>
      <!-- <script src="<?php echo web_root; ?>admin/dist/bootstrap.min.js"></script> -->
<!-- jQuery 2.1.4 --> 

<script> 
  $("#findProduct").on("change",function(){
    var productID = $(this).val();
    // alert(productID)
    $.ajax({
      type:"POST",  
      url: "loaddata.php",    
      dataType: "text",  //expect html to be returned  
      data:{ProductID:productID},               
      success: function(data){    
       $('#loaddata').hide();   
       $('#loaddata').fadeIn(); 
       $('#loaddata').html(data);   
      } 
    })
  });

  $(function(){
    $(".btn-danger").click(function(){
       if (confirm("Are you sure you want to delete this?")) {
        return true;
       }else{
        return false;
       }
    })
  });
   $(function(){
     var productID = $("#findProduct").val();
    // alert(productID)
      $.ajax({
        type:"POST",  
        url: "loaddata.php",    
        dataType: "text",  //expect html to be returned  
        data:{ProductID:productID},               
        success: function(data){    
         $('#loaddata').hide();   
         $('#loaddata').fadeIn(); 
         $('#loaddata').html(data);   
        } 
      });
  });

  $(function(){
    $('.mychat').click(function(){
                    $('#chat').modal('show');
                  })
     $('.select2').select2();
  });
  $(function () {
    $("#dash-table").DataTable();
    $('#dash-table2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });

$('input[data-mask]').each(function() {
  var input = $(this);
  input.setMask(input.data('mask'));
});


$('#BIRTHDATE').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});
$('#HIREDDATE').inputmask({
  mask: "2/1/y",
  placeholder: "mm/dd/yyyy",
  alias: "date",
  hourFormat: "24"
});

$('.date_picker').datetimepicker({
  format: 'mm/dd/yyyy',
  startDate : '01/01/1950', 
  language:  'en',
  weekStart: 1,
  todayBtn:  1,
  autoclose: 1,
  todayHighlight: 1, 
  startView: 2,
  minView: 2,
  forceParse: 0 

});


</script>
  <script type="text/javascript">
      var ctx = document.getElementById("chartjs_pie").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($qty); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
                $(document).ready(function(){
                  $('.mychat').click(function(){
                    $('#chat').modal('show');
                  })
                  let nnum = "<?php echo $nnum;?>";
                  
                  if(nnum != 0){
                    // alert('yey')
                    var $div2blink = $("#divtoBlink"); // Save reference, only look this item up once, then save
                    var backgroundInterval = setInterval(function(){
                        $div2blink.toggleClass("backgroundRed");
                    },1500)
                  }
                  else{
                    // alert('asd')
                  }
                })
    </script>


</html>
 
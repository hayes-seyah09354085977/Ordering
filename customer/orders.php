 <style>
  i.fa.fa-eye, span.fa.fa-times.fw-fa,span.fa.fa-check {
    font-size: 25px;
  }
  td.conf {
    padding-right: 32px !important;
  }
 </style>

<script src="../plugins/ckeditor/ckeditor.js"></script>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason To Cancel Order</h5>
      </div>
      <div class="modal-body">
        <div class="alert-danger" style="height:30px;text-align:center;padding:5px;margin: 12px;">Please Add Reason To Cancel Order, Thank You.</div>
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <textarea name="editor1" id="editor1" rows="10" cols="50"></textarea>
            </div>
      
          </div>
        </div>

      </div>
      <!-- End Container -->
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a class="proceed" href="#"><button type="button" class="btn btn-primary">Submit</button></a>
      </div>
    </div>
</div>
<!-- end modal -->

<!-- Modal Returned -->
<div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reason Return Order</h5>
      </div>
      <form class="form-horizontal proceed_ro" method="POST" action="#" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="alert-danger" style="height:30px;text-align:center;padding:5px;margin: 12px;">Please Add Reason To Cancel Order, Thank You.</div>

            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <textarea name="editor2" id="editor2" rows="10" cols="50"></textarea>
                </div>
                <div class="col-md-8"> 
                          <input type=
                            "hidden" value="1000000"> <input id=
                            "ret_pic" name="ret_pic" type=
                            "file">
                        </div>
              </div>
            </div>

          </div>
          <!-- End Container -->
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button class="btn btn-primary" name="submit" type="submit" >Submit</button>
          </div>
      </form>
    </div>
</div>
<!-- end modal -->
 <!-- Content Wrapper. Cont
 ains page content -->
  <div class="content-wrapper"> 
    <!-- Main content -->
    <section class="content">
      <div class="row"> 
        <!-- /.col -->
        <?php if (!isset($_GET['p'])) {  ?>
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">List of Orders</h3> 
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
                    <thead>
                      <tr>

                    <th>Customer</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Address</th> 
                    <th>Order Type</th>
                    <th>Status</th>

                    <th width="14%" >Action</th> 
                      </tr> 
                    </thead> 
                    <tbody>
                      <?php 
                       // `COMPANYID`, `OCCUPATIONTITLE`, `REQ_NO_EMPLOYEES`, `SALARIES`, `DURATION_EMPLOYEMENT`, `QUALIFICATION_WORKEXPERIENCE`, `JOBDESCRIPTION`, `PREFEREDSEX`, `SECTOR_VACANCY`, `JOBSTATUS`
                        $mydb->setQuery("SELECT *,s.ProductID as pid FROM `tblproduct` p,`tblcategory` c,`tblstockout` s,tblcustomer cs WHERE p.`CategoryID`=c.`CategoryID` AND p.`ProductID`=s.`ProductID` AND s.CustomerID=cs.CustomerID AND s.CustomerID=".$_SESSION['CustomerID']);
                        $cur = $mydb->loadResultList(); 
                      foreach ($cur as $result) {
                          echo '<tr>';
                              // echo '<td width="5%" align="center"></td>';
                              // echo '<td>
                              //      <input type="checkbox" name="selector[]" id="selector[]" value="'.$result->CATEGORYID. '"/>
                      //    ' . $result->CATEGORIES.'</a></td>';
                      echo '<td>'. $result->CustomerName.'</td>';
                      echo '<td>'. $result->ProductName.'</td>';
                      echo '<td>' . $result->Description.'</a></td>';
                      echo '<td>' . $result->Price.'</a></td>'; 
                      echo '<td>'. $result->Quantity.'</td>'; 
                      echo '<td>'. $result->CustomerAddress.'</td>';
                      echo '<td>'. $result->order_type.'</td>';  
                      echo '<td>'. $result->Status.'</td>';  
                     
                      if ($result->Status=="Cancelled" || $result->Status=="Confirmed" || $result->Status=="Pending for Cancellation" || $result->Status=="Returning Product Ordered" ) {
                        # code...
                        echo '<td class="conf" align="center"><a title="View" href="index.php?view=viewproduct&id='.$result->StockoutID.'" class="  ">  <i class="fa fa-eye" aria-hidden="true"></i></a></td>';
                      }else if($result->Status=="For Delivery"){
                         echo '<td align="center"><a title="View" href="index.php?view=viewproduct&id='.$result->StockoutID.'" class="  ">  <i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a title="Delivered" href="controller.php?action=Deilvered&id='.$result->StockoutID.'&ProductID='.$result->pid.'&TransQuantity='.$result->Quantity.'" class=" ">  <span class="fa  fa-check fw-fa "></a></td>';
                      }else if($result->Status=="Delivered"){
                         echo '<td align="center"><a title="View" href="index.php?view=viewproduct&id='.$result->StockoutID.'" class="  ">  <i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a onclick="modifypath('.$result->StockoutID.')" title="Cancel"  data-toggle="modal" data-target="#returnModal">  <span class="fa  fa-times fw-fa "></a></td>';
                      }else{
                        // echo '<td align="center"><a title="View" href="index.php?view=viewproduct&id='.$result->StockoutID.'" class="  ">  <i class="fa fa-eye" aria-hidden="true"></i></a>
                        // <a title="Cancel" href="controller.php?action=cancel&id='.$result->StockoutID.'&ProductID='.$result->pid.'&TransQuantity='.$result->Quantity.'" class=" ">  <span class="fa  fa-times fw-fa "></a></td>';
                        echo '<td align="center"><a title="View" href="index.php?view=viewproduct&id='.$result->StockoutID.'" class="  ">  <i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a onclick="modifypath('.$result->StockoutID.')" title="Cancel"  data-toggle="modal" data-target="#exampleModal">  <span class="fa  fa-times fw-fa "></a></td>';
                      }
                      echo '</tr>';
                      } 
                      ?>
                    </tbody>
                    
                  </table> 
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div> 
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
        <?php }else{
          require_once ("viewjob.php");          
        } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<script src="<?php echo web_root; ?>plugins/home-plugins/js/jquery.js"></script>
<script src="<?php echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.js"></script>
<script src="<?php echo web_root; ?>plugins/jQueryUI/jquery-ui.min.js"></script>
<script>
  CKEDITOR.replace( 'editor1' );
  // CKEDITOR.replace( 'editor2' );
  $('.alert-danger').css({
    'display':'none'
  })

   function modifypath(id){
    //  $('.proceed').attr('href','controller.php?action=cancel&id='+id)
    $('.proceed').attr('data',id)
    $('.proceed_ro').attr('action',"controller.php?action=return_order&id="+id)
  }

  $('.proceed').click(function(){
    var id = $('.proceed').attr('data')
    if(CKEDITOR.instances.editor1.getData()==""){
      $('.alert-danger').css({
    'display':'block'
  })
    }else{
      $.ajax({
           type: "POST",
           dataType: 'json',
           url: "../ajaxSession.php",
           data: {e:'orders',reason:CKEDITOR.instances.editor1.getData()},
           success: function(data){
              console.log(data)
           }
         });
      $('.proceed').attr('href',"controller.php?action=cancel&id="+id);
    }
  })
  $('.proceed_ro').click(function(){
    var id = $('.proceed_ro').attr('data')
      $('.proceed').attr('action',"controller.php?action=return_order&id="+id);
  })

</script>
 
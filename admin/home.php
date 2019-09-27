
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">

              <?php
                $sql = "SELECT COUNT(*) as NUM FROM tblproduct p,`tblstockout` s WHERE p.ProductID=s.ProductID AND `Status`='Pending' AND StoreID=".$_SESSION['ADMIN_USERID'];
                $mydb->setQuery($sql);
                $orders = $mydb->loadSingleResult();
                echo '<h3>'.$orders->NUM.'</h3>';

              ?>
           

              <p>Pending Orders</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php
                $sql = "SELECT COUNT(*) as NUM FROM `tblproduct` WHERE StoreID=".$_SESSION['ADMIN_USERID'];
                $mydb->setQuery($sql); 
                $product = $mydb->loadSingleResult();
                echo '<h3>'.$product->NUM.'</h3>';

              ?>
              <p>All Products</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php

                // $expiry_date = "2017-12-31 00:00:00";
                // $today = date('d-m-Y',time()); 
                // $exp = date('d-m-Y',strtotime($expiry_date));
                // $expDate =  date_create($exp);
                // $todayDate = date_create($today);
                // $diff =  date_diff($todayDate, $expDate);
                // if($diff->format("%R%a")>0){
                // echo "active";
                // }else{
                // echo "inactive";
                // }
                // echo "Remaining Days ".$diff->format("%R%a days");
 
                $sql = "SELECT COUNT(*) as NUM FROM `tblproduct` WHERE DATE(DateExpire)<=DATE(NOW()) AND StoreID=".$_SESSION['ADMIN_USERID'];
                $mydb->setQuery($sql); 
                $product = $mydb->loadSingleResult();
                echo '<h3>'.$product->NUM.'</h3>';

              ?>

              <p>Critical Stocks</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php
                $sql = "SELECT SUM(Remaining) as NUM FROM `tblinventory` i, tblproduct p 
                WHERE i.ProductID=p.ProductID AND StoreID=".$_SESSION['ADMIN_USERID'];
                $mydb->setQuery($sql);
                $inventory = $mydb->loadSingleResult();
                echo '<h3>'.$inventory->NUM.'</h3>';

              ?>
              <p>Overall Stocks</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">

          	  <?php
                $sql = "SELECT  * FROM `tblinventory` i, tblproduct p 
                WHERE i.ProductID=p.ProductID AND StoreID=".$_SESSION['ADMIN_USERID'];
                $mydb->setQuery($sql);
                $res = $mydb->loadResultList();
                foreach ($res as $row) {
                	# code...
                	$productname[] = $row->ProductName;
                	$qty[] = $row->Remaining;
                }

              ?>
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right"> 
              <li class="active"><a href="#chartjs_pie" data-toggle="tab">Pie</a></li>
              <li class=""><a href="#a_pie" data-toggle="tab">Critical Stocks</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Inventory</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <canvas class="chart tab-pane active" id="chartjs_pie" style="position: relative; height: 300px;"></canvas> 
              <canvas class="chart tab-pane active" id="a_pie" style="position: relative; height: 300px;"></canvas> 
            </div>
          </div>
          <!-- /.nav-tabs-custom -->

           
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  
  
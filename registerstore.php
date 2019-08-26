<section id="content">
    <div class="container content">    
     <p> <?php check_message();?></p>      
    <form class="row form-horizontal span6  wow fadeInDown" action="process.php?action=registerstore" method="POST">
    <h2 class=" ">Store Information</h2>
    <div class="row"> 
      <div class="form-group">
        <div class="col-md-8">
        <label class="col-md-4 control-label" for=
          "StoreName">Store Name:</label>

          <div class="col-md-8">
            <input name="JOBID" type="hidden" value="<?php echo $_GET['job'];?>">
             <input class="form-control input-sm" id="StoreName" name="StoreName" placeholder=
                "Store Name" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
          </div>
        </div>
      </div>

     
      <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for=
          "StoreAddress">Address:</label>

          <div class="col-md-8">

           <textarea class="form-control input-sm" id="StoreAddress" name="StoreAddress" placeholder=
              "Address" type="text" value="" required    autocomplete="off"></textarea>
          </div>
        </div>
      </div>  
  

       <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for=
          "ContactNo">Contact No.:</label>

          <div class="col-md-8">
            
             <input class="form-control input-sm" id="ContactNo" name="ContactNo" placeholder=
                "Contact No." type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
          </div>
        </div>
      </div>   

      <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for=
          "Username">Username:</label>

          <div class="col-md-8">
            <input name="deptid" type="hidden" value="">
            <input  class="form-control input-sm" id="Username" name="Username" placeholder=
                "Username"    onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
            </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-8">
          <label class="col-md-4 control-label" for=
          "Password">Password:</label>

          <div class="col-md-8">
            <input name="deptid" type="hidden" value="">
            <input  class="form-control input-sm" id="Password" name="Password" placeholder=
                "Password" type="password" autocomplete="off"> 
          </div>
        </div>
      </div>  
      <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label" for=
            ""></label>  

            <div class="col-md-8"> 
                <label><input type="checkbox"> By Signing up you are agree with our <a href="#">terms and condition</a></label>
           </div>
          </div>
      </div>    
      <div class="form-group">
          <div class="col-md-8">
            <label class="col-md-4 control-label" for=
            "idno"></label>  

            <div class="col-md-8">
               <button class="btn btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button> 
           
           </div>
          </div>
      </div>    
    </form>
  </div>
</section> 
<script type="text/javascript" src=" https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>  
  <script type="text/javascript">
    var map = null;
    var directionsDisplay = null;
    var directionsService = null;
    function initialize() {
        var myLatlng = new google.maps.LatLng(10.640739,122.968956);
        var myOptions = {
            zoom: 7,
            center: {lat:10.640739, lng:122.968956},
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map($("#map_canvas").get(0), myOptions);
      directionsDisplay = new google.maps.DirectionsRenderer();
      directionsService = new google.maps.DirectionsService();
      var input = document.getElementById('StoreAddress');
      var searchBox = new google.maps.places.SearchBox(input); 
    } 
    $(document).ready(function() {
        initialize();
    });
 
  </script>  
  <div  id="results" style="width: 990px; height: 500px;display: none;">
    <div id="map_canvas" style="width: 80%; height: 100%; float: left;"></div>
  </div> 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&libraries=places"> </script>

 

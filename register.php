<style>
section#inner-headline {
    background: #37393c !important;
}
.modal-dialog {
    width: 50%;
}

</style>
<!-- modal start -->
<div class="modal fade varmodal" id="termsandconditions" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Terms And Condition</h4>
        </div>
        <div class="modal-body">
		<?php
			$sql3 ="SELECT * FROM `tblterms`";
			$mydb->setQuery($sql3);
			$cur3 = $mydb->executeQuery();
			$maxrow2 = $mydb->num_rows($cur3);
			$res2 = $mydb->loadSingleResult(); 
			echo $res2->Terms;
			?>
				  
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-default TermClose" >Close</button> -->
        </div>
      </div>
      
    </div>
</div>
<!-- end modal -->
<section id="content">
    <div class="container content">    
     <p> <?php check_message();?></p>     
		<form class="row form-horizontal span6  wow fadeInDown" action="process.php?action=register" method="POST">
		<h2 class=" ">Customer Information</h2>
		<div class="row"> 
			<div class="form-group">
				<div class="col-md-8">
				<label class="col-md-4 control-label" for=
					"CustomerName">Fullname:</label>

					<div class="col-md-8">
					  <input name="JOBID" type="hidden" value="<?php echo $_GET['job'];?>">
					   <input class="form-control input-sm" id="CustomerName" name="CustomerName" placeholder=
					      "Fullname" type="text" value=""  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
					</div>
				</div>
			</div>

			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "Email">Email:</label>

			    <div class="col-md-8"> 
			      <input  class="form-control input-sm" id="Email" name="Email" placeholder=
			          "Email"   autocomplete="off">
			      </div>
			  </div>
			</div>

		 
			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for=
					"CustomerAddress">Address:</label>

					<div class="col-md-8">

					 <textarea class="form-control input-sm" id="CustomerAddress" name="CustomerAddress" placeholder=
					    "Address" type="text" value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off"></textarea>
					</div>
				</div>
			</div> 

			<div class="form-group">
				<div class="col-md-8">
					<label class="col-md-4 control-label" for=
					"Gender">Sex:</label>

					<div class="col-md-8">
					 <div class="col-lg-5">
					    <div class="radio">
					      <label><input checked id="optionsRadios1" checked="True" name="optionsRadios" type="radio" value="Female">Female</label>
					    </div>
					  </div>

					  <div class="col-lg-4">
					    <div class="radio">
					      <label><input id="optionsRadios2"   name="optionsRadios" type="radio" value="Male"> Male</label>
					    </div>
					  </div> 
					 
					</div>
				</div>
			</div>
  

			 <div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "CustomerContact">Mobile No.:</label>

			    <div class="col-md-8">
			      
			       <input class="form-control input-sm" id="CustomerContact" name="CustomerContact" placeholder=
			          "Contact No." type="text" any value="" required  onkeyup="javascript:capitalize(this.id, this.value);" autocomplete="off">
			    </div>
			  </div>
			</div>   

			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "Customer_Username">Username:</label>

			    <div class="col-md-8"> 
			      <input  class="form-control input-sm" id="Customer_Username" name="Customer_Username" placeholder=
			          "Username"   autocomplete="off">
			      </div>
			  </div>
			</div>

			<div class="form-group">
			  <div class="col-md-8">
			    <label class="col-md-4 control-label" for=
			    "Customer_Password">Password:</label>

			    <div class="col-md-8"> 
			      <input  class="form-control input-sm" id="Customer_Password" name="Customer_Password" placeholder=
			          "Password" type="password" autocomplete="off"> 
			    </div>
			  </div>
			</div>  
			<div class="form-group">
			    <div class="col-md-8">
			      <label class="col-md-4 control-label" for=
			      ""></label>  

			      <div class="col-md-8"> 
				  		<input id="terms" type="checkbox" hidden> 
			      		<label>By Sign up you are agree with our <a data-toggle="modal" data-target="#termsandconditions" id="tterms">terms and condition</a></label>
			     </div>
			    </div>
			</div>    
			<div class="form-group">
			    <div class="col-md-8">
			      <label class="col-md-4 control-label" for=
			      "idno"></label>  

			      <div class="col-md-8">
			         <button id='btnsubmit' class="btn btn-primary btn-sm" name="btnRegister" type="submit" ><span class="fa fa-save fw-fa"></span> Register</button> 
			     
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
      var input = document.getElementById('CustomerAddress');
      var searchBox = new google.maps.places.SearchBox(input); 
    } 
    $(document).ready(function() {
        initialize();
		$('#tterms').click(function(){
			$('#terms').click();
		})
    });

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
	setInputFilter(document.getElementById("CustomerContact"), function(value) {
  	return /^\d{0,11}$/.test(value); });
	//   button disabled if terms and condition not checked
	document.getElementById("btnsubmit").disabled = true;
	document.getElementById("btnsubmit").style.background='#000000';
	$("input#terms").change(function() {
		if(this.checked) {
			document.getElementById("btnsubmit").disabled = false;
		}else{
			document.getElementById("btnsubmit").disabled = true;
			document.getElementById("btnsubmit").style.background='#000000';

		}
	});
 
  </script>  
  <div  id="results" style="width: 990px; height: 500px;display: none;">
    <div id="map_canvas" style="width: 80%; height: 100%; float: left;"></div>
  </div> 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&libraries=places"> </script>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Faces of negros|Places</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- styles -->
    <style type="text/css">
        .red {
    color: red;
}
    #results  {width: 990px; height: 500px }
    div#results #map_canvas   { width: 65%; height: 100%; float: left; }
    div#results #directions_panel { width: 35%; height: 100%; overflow: auto; float: right; }
    select{
        width: 189px;
        border-radius: 5px;
        padding: 10px;
      }
      input[type=text]{
            border-radius: 5px;
            height: 25px;
            padding: 0px;
      }
      #fixedbutton {
    position: fixed;
    bottom: 12px;
    right: 40px; 
}
.round-button {
  width:70px;
}
.round-button-circle {
  width: 100%;
  height:0;
  padding-bottom: 100%;
  border-radius: 50%;
  border:10px solid #cfdcec;
  overflow:hidden;
        
  background: #51BD46; 
  box-shadow: 0 0 3px gray;
}
.round-button-circle:hover {
  background:#30588e;
}
.round-button a {
  display:block;
  float:left;
  width:100%;
  padding-top:50%;
  padding-bottom:50%;
  line-height:1em;
  margin-top:-0.5em;
        
  text-align:center;
  color:#e2eaf3;
  font-family:Verdana;
  font-size:1.2em;
  font-weight:bold;
  text-decoration:none;
}
  </style> 
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
    var input = document.getElementById('start');
    var searchBox = new google.maps.places.SearchBox(input);
    var input2 = document.getElementById('end');
    var searchBox2 = new google.maps.places.SearchBox(input2);
  }

  function getDirections(){
    var start = $('#start').val();
    var end = $('#end').val();
    if(!start || !end){
      alert("Origin and destination are required");
      return;
    }
    var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.DirectionsTravelMode[$('#travelMode').val()],
            unitSystem: google.maps.DirectionsUnitSystem[$('#unitSystem').val()],
            provideRouteAlternatives: true
      };
    directionsService.route(request, function(response, status) {
          if (status == google.maps.DirectionsStatus.OK) {
              directionsDisplay.setMap(map);
              directionsDisplay.setPanel($("#directions_panel").get(0));
              // console.log(response)
              directionsDisplay.setDirections(response);
              var summaryPanel = ($("#distance_panel").get(0));
        summaryPanel.innerHTML = '';
        var x = document.getElementById("rutaS");
        $('#rutaS option').remove();
              for (var j = 0; j < response.routes.length; j++){
        var option = document.createElement("option");
                var route = response.routes[j];
                // console.log(response.routes[j]);
                console.log(route)
          var routeSegment = j + 1;
          summaryPanel.innerHTML += '<b>Route ' + routeSegment + ': ';
          summaryPanel.innerHTML += route.legs[0].distance.text;
          option.text = route.legs[0].distance.text;
          option.value =route.legs[0].distance.text.substring(0,(route.legs[0].distance.text.length - 2));
          x.add(option);
          summaryPanel.innerHTML += ' (' + route.legs[0].distance.value + 'm)<br><br>';
              }
          } else {
              alert("Please place the origin and destine correctly");
          }
      });
  }
  function c(){
    var price = $('#type').val();
    var km = $('#rutaS').val();
    $('#costo').val('0');
    if (price != "" && km != "") {
          var nkm;
          if (parseFloat(km)>3) {
            nkm = parseInt(km);
            var neto = nkm * 1;
              document.getElementById('costo').value = Math.round(price) + Math.round(neto);
          }else{
            nkm = parseInt(km); // xd 3 km o menos
            document.getElementById('costo').value = price;  
          }
        }else{
          console.log("")
        }
  }
  $('#type').live('change',function(){
    c();
  });
  $('#rutaS').live('change',function(){
    c();
  });
  $('#search').live('click', function(){ getDirections(); });
  $('.routeOptions').live('change', function(){ getDirections(); });
  
  $(document).ready(function() {
      initialize();
  });



  function printPage(id) {
    var html="<html>";
    html+= document.getElementById(id).innerHTML;
    html+="</html>";
    var printWin = window.open('','','left=0,top=0,width=1,height=1,toolbar=0,scrollbars=0,status =0');
    printWin.document.write(html);
    printWin.document.close();
    printWin.focus();
    printWin.print();
    printWin.close();
}
  </script>
</head>
     




  
 
<body >

     
  <header>
    <!-- Navbar
    ================================================== --> 
  </header>
 <div class="span8">
<section id="subintro" class = "jumbotron">
  <form class = "form-inline">
    
  <input type="text" class="form-control" style ="margin-right:40px" id="start" placeholder="From address or coordinates" />
   
    <input type="text" id="end" class="form-control"  placeholder=" To address or coordinates" />
      <button type="button" class = "pull-right btn-lg btn-warning"   id="search" style="width: 225px; height: 30px;margin-right:20px;">Seach Route</button> 

  </section>
<!--   <input type="button" value="Print" class = "btn btn-lg btn-primary" onclick="printPage('map_canvas');"></input> -->
  <div id="results" style="width: 990px; height: 500px;display: inline-block;">
 
    <div id="map_canvas" style="width: 80%; height: 100%; float: left;"></div>
  </div>
  
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
     center: {lat:10.640739, lng:122.968956},
          zoom: 2
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
      }

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
          } else {
            me.destinationPlaceId = place.place_id;
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

    </script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTanm_xZQi4_RHeCAxerOqXN96NUwrbZU&libraries=places"> </script>


</body>
</html>

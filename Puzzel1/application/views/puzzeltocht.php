<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

<div class="collapse navbar-collapse" id="navbar1">
      <ul class="nav navbar-nav navbar-right">
        <?php if ($this->session->userdata('login')){ ?>
        <li><a href="<?php echo base_url(); ?>index.php/profile/index"<p class="navbar-text">Hello <?php echo $this->session->userdata('uname'); ?></p></a></li>
        <li><a href="<?php echo base_url(); ?>index.php/home/logout">Log Out</a></li>
        <?php } else { ?>
        <li><a href="<?php echo base_url(); ?>index.php/login">Login</a></li>
        <li><a href="<?php echo base_url(); ?>index.php/signup">Signup</a></li>
        <?php } ?>
      </ul>
    </div>
    
<script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
	<meta charset="utf-8">
	 <title>Welcome to Puzzeltocht</title>

  <style type="text/css">

  ::selection { background-color: #E13300; color: white; }
  ::-moz-selection { background-color: #E13300; color: white; }

  body {
    background-color: #fff;
    margin: 40px;
    font: 13px/20px normal Helvetica, Arial, sans-serif;
    color: #4F5155;
  }

  a {
    color: #003399;
    background-color: transparent;
    font-weight: normal;
  }

  h1 {
    color: #444;
    background-color: transparent;
    border-bottom: 1px solid #D0D0D0;
    font-size: 30 px;
    font-weight: normal;
    margin: 0 0 14px 0;
    padding: 14px 15px 10px 15px;
  }

  code {
    font-family: Consolas, Monaco, Courier New, Courier, monospace;
    font-size: 12px;
    background-color: #f9f9f9;
    border: 1px solid #D0D0D0;
    color: #002166;
    display: block;
    margin: 14px 0 14px 0;
    padding: 12px 10px 12px 10px;
  }

  #body {
    margin: 0 15px 0 15px;
  }

  p.footer {
    text-align: right;
    font-size: 11px;
    border-top: 1px solid #D0D0D0;
    line-height: 32px;
    padding: 0 10px 0 10px;
    margin: 20px 0 0 0;
  }

  #container {
    margin: 10px;
    border: 1px solid #D0D0D0;
    box-shadow: 0 0 8px #D0D0D0;
  }

  </style>
</head>
<body>

<h1>Welkom op Puzzeltocht</h1>

<div id="container">
  
  <div id="body">
    <p>Loop rond en zoek de vragen, en win zoveel mogelijk prijzen!</p>
  </div>

  <p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<div id="map"></div>
 
<style>
      body {
        font-size: 83%;
      }
      body, input, textarea {
        font-family: arial, sans-serif;
      }
      #map {
        width: 950px;
        height: 600px;
      }

      #infowindow{
      }



    </style>

<div id="map-canvas"></div>
<pre>
  <?=print_r($getlocatie)?></pre>
<script>

  var locations = [<?php foreach ($getlocatie as $row){ ?>
  ['<div id="puzzell">' + '<h1><?php echo $row->titel;?></h1>' + '<p><?php echo $row->informatie;?></p>' + '<p><img style="width:200px;height:130px;" src="<?php echo $row->foto; ?>" /></p></div>' + '<button onclick="javascript:quiz();">Start</button>',     <?php echo $row->lat;?>,  <?php echo $row->long;?>],<?php } ?>

];
var map;


function initMap(){

  var infowindow = new google.maps.InfoWindow(); /* SINGLE */
   map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: new google.maps.LatLng(51.800142, 4.669297)

  });
  
  function placeMarker( loc ) {
    var latLng = new google.maps.LatLng( loc[1], loc[2]);
    var marker = new google.maps.Marker({
      position : latLng,
      map      : map
    });
    google.maps.event.addListener(marker, 'click', function(){
        infowindow.close(); // Close previously opened infowindow
        infowindow.setContent( "<div id='infowindow'>"+ loc[0] +"</div>");
        infowindow.open(map, marker);
    });
  }

    if (navigator.geolocation)
    navigator.geolocation.watchPosition(gotPosition, function() {
      noGeolocation('Error: The Geolocation service failed.');
    }, { enableHighAccuracy: true, maximumAge: 10e3, timeout: 20e3 });
  else
    noGeolocation('Error: Your browser doesn\'t support geolocation.');
  
  // ITERATE ALL LOCATIONS
  // Don't create functions inside for loops
  // therefore refer to a previously created function
  // and pass your iterating location as argument value:
  for(var i=0; i<locations.length; i++) {
    placeMarker( locations[i] );
  } 
  
}
google.maps.event.addDomListener(window, 'load', initMap);


var  you
  , pos
  , t_0
  , log = ''
  
  , head = '["latitude","longitude","precision","time"]'
  , zoom
  , time
  , from
  ;

//google.maps.event.addDomListener(window, 'load', init);

function init() {
/*  map = new google.maps.Map( document.getElementById('map')
                           , { zoom: zoom
                             , mapTypeId: google.maps.MapTypeId.ROADMAP
                             });

*/
}

function gotPosition(position) {
  var at  = position.coords
    , off = at.accuracy
    , z
    ;

var url =  'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAARCAYAAADdRIy+AAAAAXNSR0IArs4c6QAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAALEwAACxMBAJqcGAAAAAd0SU1FB9sBHxAxMpOb3XcAAAOBSURBVDjLfZRNa1xlGIav877nY2bOzJnMR77TNIkJpSpBW4qiGGJAECpSEFz0D/gDKrp9wVVBXPkLXLkrqBtBZKJFQaqghbZp09SkTUwyH5mvMzPnvHPOcZEUumj6wL17nmvz3PdtcMoopQRg27btdpYvXQSS7N9/3NZaB0BHKTV83p3xHJAFzFQWVj4bdPjonGsXisIwm35Iy2C40dON0VHrxurD9evAvlKqfypQKeW15l9d/enI+9qr+2fWXplmcbpA0UtT6wx48OSIu4/r3Nqqkjs3tvN+/uiat31vHagppRIA8xnYBPnShRub1reiUU0vX5gnPTlKfjzPzEiKIBPg4GDFNrlmwJ2bW7O981PfXM1mP7b73T+B/wDECSwTRdHi9/L8V9t399Le3BSMT0B+BDIukWkTp1ySfIF4bJzk7ByMlfn3zl76x/RrXwohlpRSRQCplDKAs9uzF6/+/Oveh1GpyOjSAsWJUUbyOTK2hU4EDS05HNocxDYHkaQRG9Dr03hULU8vz9e9o92ttbW1ugA8YGrTz7wT6JhkbJJBdoSelaMTSGoD2O1DLYB2CD1t03dKUJyAyUmCgWbTz6w4jlMA0ibgSim9Wms4S2EEcnk6Ikd7KKkDMoaUgC5QF9CS0MWEdB68IhQK1FrRDIICkDUBUwhh+M3Aw3XBcakmKUoGuAZEBlgG9CVUTWiY0JaAnYFUBtwsfifwyJMAlglorXXsOk6bSGbBJLIk94cwAM5YYNvQT6CewKEFiQNoEwwbTBs3JduABnwT8E3T9MuOfLzRjaeIYpAJ2jJ4aMC2AVb62FrBEGILsAGRQJxAklB2zZ1EJwOgJ4DOcDjcfSnT+8XRIQwGEA6ODWXAUELfPlZsnkRBAFpDEOBEmsW0fzMMwyqgZaVSYXV1NSyFh61mbumtvX5SJpuBnAupp04FQqAHBIAP1Jqwf8DreePepc5v16WU95VSwdN1P47jB5ed29fmDO1TrUOtDZ0TSPNEPU7e3YVagzmh/feSW58KITaUUl0ACVCpVKhUKv67b7+xP1/K/NXxs282+kEhiQEtIBTQS+BIw2ELeVDl5V536wNv+xPXf/K7Uqr+oraxgdF19/Lnjyz3is6mygeYaQwYJ+5b3aC2EHa+W/F/+AJoKKX0C+vrGbABpCzLyvqzK8uJIaPcTuWfMAw10D+tD/8H7d6IDx2EfHUAAAAASUVORK5CYII='
  pos = ll(at.latitude, at.longitude);
  if (you) you.setPosition(pos); else {
    t_0 = Math.round(+new Date / 1000);
    you = new google.maps.Marker({ map: map
                                 , position: pos
                                 , icon: marker(url, s(20, 17), p(10, 8))
                                 });
    google.maps.event.addListener(you, 'click', function() {
      location = 'mailto:?subject=GPS%20Track&body='
               + encodeURIComponent(log + ' ]\n}\n');
    });
  }
  if (!zoom) map.setCenter(pos);

  // zoom in, as precision improves (or out again)
  if (off > 2e3) z = 15;
  if (off < 2e3) z = 16;
  if (off < 900) z = 17;
  if (off < 100) z = 18;
  if (z !== zoom) map.setZoom(zoom = z);

  map.panTo(pos);
  save(at);
}

function noGeolocation(message) {
  /*var opts = { map: map
             , position: ll(60, 105)
             , content: message
             }
    , info = new google.maps.InfoWindow(opts);
  map.setCenter(opts.position);*/
}

function s(w, h) { return new google.maps.Size(w, h); }
function p(x, y) { return new google.maps.Point(x, y); }
function ll(y, x) { return new google.maps.LatLng(y, x); }
function marker(url, size, hotspot, origin) {
  return new google.maps.MarkerImage(url, size, origin || p(0, 0), hotspot);
}

function save(at) {
  var lat = at.latitude.toFixed(6) // decimeter precision should be quite enough
    , lng = at.longitude.toFixed(6)
    , pre = at.accuracy.toFixed(0)
    ;
  time = Math.round(new Date / 1000) - t_0;
  log += (log ? ' ,' : '{"time":'+ t_0 +'\n,"head":\n '+ head +'\n,"data":\n [')
       + '[' + lat +','+ lng +','+ pre +','+ time +']\n';
}


      function autoUpdate() {
  navigator.geolocation.getCurrentPosition(function(position) {  
    var newPoint = new google.maps.LatLng(position.coords.latitude, 
                                          position.coords.longitude);

    if (marker) {
      // Marker already created - Move it
      marker.setPosition(newPoint);
    }
    else {
      // Marker does not exist - Create it
      marker = new google.maps.Marker({
        position: newPoint,
        map: map
      });
    }

    // Center the map on the new position
    map.setCenter(newPoint);
  }); 

  // Call the autoUpdate() function every 5 seconds
  setTimeout(autoUpdate, 5000);
}

autoUpdate();

    </script>



<div id="container">

<div id="puzzell">

<script type="text/javascript">

function quiz(){
  jQuery.ajax({
    'url': '<?php echo base_url();?>index.php/Questions/quizdisplay',
    'success': function(data){
      jQuery('#puzzell').html(data);
    }
  })
  
}

</script>

</div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h4>Score van alle users</h4>
      <hr/>
      <?php foreach ($getlocatie as $row){ ?><?php } ?> 
    <table id="rankings" border="1">  
        <tbody>  
           <tr>  
              <td class="rank">long</td> 
              <td class="rank">titel</td>
              <td class="rank">foto</td> 
           </tr>     
           <?php  
           foreach ($getlocatie as $row)  
           {  
              ?><tr>  
              <td class="nothing"><?php echo $row->long;?> <?php echo $row->lat;?></td>  
              <td class="nothing"><?php echo $row->titel;?></td> 
              <td class="first"><?php echo $row->foto;?></td>  
              </tr>  
           <?php } ?>  
        </tbody>
    </table>
      
      </div>

    </div>
  </div>  

  <form method="post" action="<?php echo base_url();?>">
  <input type="submit" value="Hoofd menu">

 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_jsH5jPSAsj60eCayjs1Gj58iSXPp3vw&callback=initMap">
    </script>


</body>
</html>


    <?php foreach($getlocatie as $row) { ?>
        <p><?php echo $row->titel;?></p>
        <?php } ?>
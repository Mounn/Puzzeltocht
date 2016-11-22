<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
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
		font-size: 30	px;
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

    </style>


<script>

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 51.800142, lng: 4.669297},
          zoom: 16
        });


        var infoWindow = new google.maps.InfoWindow({map: map});
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('<p>Titel: ' + this.title + '</p>' +
      '<p>Informatie: ' + this.etype + '</p>' +
      '<p>Foto: ' + this.cause + '</p>' +
      '<button onclick="javascript:quiz();">Start</button>' + '<div id="puzzell">' + ''
      );
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>



<div id="container">
  <h1>Speeltocht quizz</h1>
<div id="puzzell">
<input type="button" onclick="javascript:quiz();">

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



  <form method="post" action="<?php echo base_url();?>">
  <input type="submit" value="Hoofd menu">


    <table border="1">  
        <tbody>  
           <tr>  
              <td>ID</td>  
              <td>titel</td> 
              <td>informatie</td> 
              <td>foto</td>
           </tr>     
           <?php  
           foreach ($getinformatie as $row)  
           {  
              ?><tr>  
              <td><?php echo $row->id;?></td>  
              <td><?php echo $row->titel;?></td>  
              <td><?php echo $row->informatie;?></td> 
              <td ><?php echo $row->foto;?></td>   

              </tr>  
           <?php } ?>  
           </tbody>
  </table>


 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_jsH5jPSAsj60eCayjs1Gj58iSXPp3vw&callback=initMap">
    </script>


</body>
</html>




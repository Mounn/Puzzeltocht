<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<script src="https://maps.googleapis.com/maps/api/js?callback=myMap"></script>
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyA_jsH5jPSAsj60eCayjs1Gj58iSXPp3vw"></script>
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
  
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyA_jsH5jPSAsj60eCayjs1Gj58iSXPp3vw&sensor=false&extension=.js'></script> 
 
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
      #styles, #add-tab {
        float: left;
        margin-top: 10px;
        width: 400px;
      }
      #styles label,
      #add-tab label {
        display: inline-block;
        width: 130px;
      }
      .phoney {
        background: -webkit-gradient(linear,left top,left bottom,color-stop(0, rgb(112,112,112)),color-stop(0.51, rgb(94,94,94)),color-stop(0.52, rgb(57,57,57)));
        background: -moz-linear-gradient(center top,rgb(112,112,112) 0%,rgb(94,94,94) 51%,rgb(57,57,57) 52%);
      }
      .phoneytext {
        text-shadow: 0 -1px 0 #000;
        color: #fff;
        font-family: Helvetica Neue, Helvetica, arial;
        font-size: 16px;
        line-height: 25px;
        padding: 4px 45px 4px 15px;
        font-weight: bold;
        background: url(../images/arrow.png) 95% 50% no-repeat;
      }            
      .phoneytab {
        text-shadow: 0 -1px 0 #000;
        color: #fff;
        font-family: Helvetica Neue, Helvetica, arial;
        font-size: 18px;
        background: rgb(112,112,112) !important;
      }
    </style>

    <script>
      var script = '<script src="/puzzel/inc/js/infobubble';
      if (document.location.search.indexOf('compiled') !== -1) {
        script += '-compiled';
      }
      script += '.js"><' + '/script>';
      document.write(script);
    </script>
    <script>
      var map, infoBubble, infoBubble2;
      function init() {
        var mapCenter = new google.maps.LatLng(51.803248,4.701906);
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: mapCenter,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var marker = new google.maps.Marker({
          map: map,
          position: new google.maps.LatLng(51.7981774, 4.678754000000026),
          draggable: true
        });
        var contentString = '<div id="content">'+
        '<h1>Davinci</h1>'+
        '<p><b>Dordrecht</b>,  is met zijn 118.496 inwoners (1 april 2016, bron: CBS) de vijfde gemeente van de Nederlandse provincie Zuid-Holland ' +
        'De grootstedelijke agglomeratie Drechtsteden, waar Dordrecht deel van uitmaakt, is met ongeveer 280.000 inwoners de 9de van Nederland '+
        'De stad ligt op de plaats waar de Merwede zich splitst in de Noord en de Oude Maas '+
        'De gemeente Dordrecht omvat het gehele Eiland van Dordrecht. De bewoners van Dordrecht noemen hun stad veelal Dordt '+
        'Dordrecht beschikt over 4 politiebureaus, 2 brandweerkazernes, '+
        'een ziekenhuis (Albert Schweitzer Ziekenhuis) en een gevangenis (Gevangenis Dordrecht).</p>'+
        '</div>';
        infoBubble = new InfoBubble({
          maxWidth: 600
        });
        infoBubble2 = new InfoBubble({
          map: map,
          position: new google.maps.LatLng(51.803248, 4.701906),
          shadowStyle: 1,
          padding: 0,
          backgroundColor: 'rgb(57,57,57)',
          borderRadius: 4,
          arrowSize: 6,
          borderWidth: 1,
          borderColor: '#2c2c2c',
          disableAutoPan: true,
          hideCloseButton: true,
          arrowPosition: 30,
          backgroundClassName: 'phoney',
          arrowStyle: 2
        });
        infoBubble.open(map, marker);
        infoBubble2.open();
        var div = document.createElement('DIV');
        div.innerHTML = 'Hier komt de vraag';
        infoBubble.addTab('Vraag', div);
        infoBubble.addTab('INFO', contentString);
        google.maps.event.addListener(marker, 'click', function() {
          if (!infoBubble.isOpen()) {
            infoBubble.open(map, marker);
          }
        });
        google.maps.event.addDomListener(document.getElementById('update'),
            'click', updateStyles);
        google.maps.event.addDomListener(document.getElementById('add'),
            'click', addTab);
        google.maps.event.addDomListener(document.getElementById('update-tab'),
            'click', updateTab);
        google.maps.event.addDomListener(document.getElementById('remove'),
            'click', removeTab);
        google.maps.event.addDomListener(document.getElementById('open'),
            'click', function() {
            infoBubble2.open();
        });
        google.maps.event.addDomListener(document.getElementById('close'),
            'click', function() {
          infoBubble2.close();
        });
      }
      google.maps.event.addDomListener(window, 'load', init);
      function updateStyles() {
        var shadowStyle = document.getElementById('shadowstyle').value;
        infoBubble.setShadowStyle(shadowStyle);
        var padding = document.getElementById('padding').value;
        infoBubble.setPadding(padding);
        var borderRadius = document.getElementById('borderRadius').value;
        infoBubble.setBorderRadius(borderRadius);
        var borderWidth = document.getElementById('borderWidth').value;
        infoBubble.setBorderWidth(borderWidth);
        var borderColor = document.getElementById('borderColor').value;
        infoBubble.setBorderColor(borderColor);
        var backgroundColor = document.getElementById('backgroundColor').value;
        infoBubble.setBackgroundColor(backgroundColor);
        var maxWidth = document.getElementById('maxWidth').value;
        infoBubble.setMaxWidth(maxWidth);
        var maxHeight = document.getElementById('maxHeight').value;
        infoBubble.setMaxHeight(maxHeight);
        var minWidth = document.getElementById('minWidth').value;
        infoBubble.setMinWidth(minWidth);
        var minHeight = document.getElementById('minHeight').value;
        infoBubble.setMinHeight(minHeight);
        var arrowSize = document.getElementById('arrowSize').value;
        infoBubble.setArrowSize(arrowSize);
        var arrowPosition = document.getElementById('arrowPosition').value;
        infoBubble.setArrowPosition(arrowPosition);
        var arrowStyle = document.getElementById('arrowStyle').value;
        infoBubble.setArrowStyle(arrowStyle);
        var closeSrc = document.getElementById('closeSrc').value;
        infoBubble.setCloseSrc(closeSrc);
      }
      function addTab() {
        var title = document.getElementById('tab-title').value;
        var content = document.getElementById('tab-content').value;
        if (title !== '' && content !== '') {
          infoBubble.addTab(title, content);
        }
      }
      function updateTab() {
        var index = document.getElementById('tab-index-update').value;
        var title = document.getElementById('tab-title-update').value;
        var content = document.getElementById('tab-content-update').value;
        if (index) {
          infoBubble.updateTab(index, title, content);
        }
      }
      function removeTab() {
        var index = document.getElementById('tab-index').value;
        infoBubble.removeTab(index);
      }
    </script>

    

</script>


<div id="container">
  <h1>Speeltocht quizz</h1>
<div id="puzzell">
<input type="button" onclick="javascript:quiz();" value="Start">

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


</body>
</html>




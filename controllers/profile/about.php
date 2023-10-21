<?php
/**
 * Routing
 * Waar in de applicatie ben je?
 *
 * Voor het gebruik gaan we er gebruik van maken van de volgende opbouw
 * - index(home)
 * - contact
 * - details
 *      - profiel
 *      - cijfers
 *      - ervaringen
 *      - hobby
 * - about
 */
$sql = "SELECT * FROM content where page='about'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$content = "
<article class='grid-main'>
 <div class='grid-left'>
  <img class='profile-icon-large' src='/public/images/moveIcon_def.png' alt='profile'>
  wefejqnfiquvnipureh
 </div>
 <div class='grid-right'>
  <p>Locatie</p>
  <div class='map-container' style='border-color:red;border-width: 1px;'>
   <div id='map' style='height:100%;'></div>
  </div>
 </div>
 <script src='https://unpkg.com/leaflet@1.7.1/dist/leaflet.js'></script>
 <script>
  var map = L.map('map').setView([52.37156887996604, 5.219101315953748], 17);  

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href=\"https://www.openstreetmap.org/copyright\">OpenStreetMap</a> contributors'
  }).addTo(map);

  L.marker([52.37156887996604, 5.219101315953748]).addTo(map)
    .bindPopup('Windesheim in Almere locatie Circus')
    .openPopup();

	function onMapClick(e) {
		alert('You clicked the map at ' + e.latlng);
	}
	map.on('click', onMapClick);
 </script>
";


require 'views/base.view.php';
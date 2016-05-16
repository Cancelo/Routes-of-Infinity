window.addEventListener('load', iniciarMap, false);

var markers = [];

function iniciarMap() {	
	var myLatLng = {lat: -25.363, lng: 131.044};

	var map = new google.maps.Map(document.getElementById('mapMostrar'), {
		zoom: 4,
		center: myLatLng
	}); 
	
	var coord = [
		new google.maps.LatLng(-25.363,131.044),
		new google.maps.LatLng(-27.363,129.044),
		new google.maps.LatLng(-17.363,169.044),
		new google.maps.LatLng(-37.363,119.044)
	];

	var etiquetas = ["Ponferrada", "Rusia", "Dinamarca", "Fabero"];
  
	for(i=0; i<coord.length; i++){		
		
		var markerMostrar = new google.maps.Marker({
			position: coord[i],
			title: etiquetas[i],
			map: map
		});
		
		var infowindow = new google.maps.InfoWindow({
			content: etiquetas[i]
		});		
		infowindow.open(map, markerMostrar);
		
		// Array necesario para centrtar el mapa según las ubicaciones guardadas
		markers.push(markerMostrar);
	}

	var bounds = markers.reduce(function(bounds, marker) {
		return bounds.extend(marker.getPosition());
	}, new google.maps.LatLngBounds());

	map.setCenter(bounds.getCenter());
	map.fitBounds(bounds);	
		
	  

}
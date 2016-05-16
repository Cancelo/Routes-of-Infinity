window.addEventListener('load', iniciarMap, false);

var markers = [];
var coord = [-25.363,131.044, -27.363,129.044, -23.363,129.044];
var etiquetas = ["Ponferrada", "Rusia", "Dinamarca"];


function iniciarMap() {	
	var myLatLng = {lat: -25.363, lng: 131.044};

	var map = new google.maps.Map(document.getElementById('mapMostrar'), {
		zoom: 4,
		center: myLatLng
	});  
  
	for(i=0; i<coord.length; i++){
		var ubicaciones = new google.maps.LatLng(coord[i], coord[i+1]);
		
		var marker = new google.maps.Marker({
			position: ubicaciones,
			title: "hola",
			map: map
		});
		
		markers.push(marker);
		i++;
	}

	var bounds = markers.reduce(function(bounds, marker) {
		return bounds.extend(marker.getPosition());
	}, new google.maps.LatLngBounds());

	map.setCenter(bounds.getCenter());
	map.fitBounds(bounds);	
		
	  

}
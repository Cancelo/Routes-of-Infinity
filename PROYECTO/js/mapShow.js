window.addEventListener('load', iniciarMap, false);

// Transformas el string ubicacionesPHP recibido desde la consulta
var ubicaciones = [];
var coordenadas = [];

alert(ubicacionesPHP);

// Separa el string por ":" y lo alamcena en el array ubicaciones
ubicaciones = ubicacionesPHP.split(":");

for(i=0; i<ubicaciones.length-1;i++) {
	// Extrae las cordenadas de los paréntesis y los almacena en el array coordenadas
	var coordenadaString=ubicaciones[i].substring(ubicaciones[i].lastIndexOf("(")+1,ubicaciones[i].lastIndexOf(")"));
	coordenadas.push(coordenadaString);

	alert(i+": "+ ubicaciones[i] +"\n->"+ coordenadas[i]);
}
// Convierte a string el array coordenadas, a este string se le hará un split por "," y se pasará a entero
var coordenadasFinalString = coordenadas.toString();
alert(coordenadasFinalString);

var markers = [];

function iniciarMap() {
	var myLatLng = {lat: -25.363, lng: 131.044};

	var map = new google.maps.Map(document.getElementById('mapMostrar'), {
		zoom: 4,
		center: myLatLng
	});
	
	// Split y convierte a enteros
	var coordenadasInt = coordenadasFinalString.split(',').map(Number);
	var coord = [];
	// Recorre el array creado e incrementa 2 cada vuelta
	for(i=0; i<coordenadasInt.length; i++) {
		// Crea objetos necesarios para la api de maps y les da las coordenadas de la ruta. Los almacena en el array coord
		var latlong = new google.maps.LatLng(coordenadasInt[i], coordenadasInt[i+1]);
		coord.push(latlong);
		i++;
	}
	
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
window.addEventListener('load', iniciarMap, false);

// Transformas el string ubicacionesPHP recibido desde la consulta
var ubicacion = [];
var coordenadas = [];
var etiquetas = [];

console.log("[ubicacionesPHP]: "+ubicacionesPHP);

// Separa el string por ":" y lo alamcena en el array ubicacion
ubicacion = ubicacionesPHP.split(":");
ubicacion.pop();

console.log("[Tamaño ubicacion]: " + ubicacion.length);

for(i=0; i<ubicacion.length;i++) {
	// Extrae las cordenadas de los paréntesis y los almacena en el array coordenadas
	var coordenadaString=ubicacion[i].substring(ubicacion[i].lastIndexOf("(")+1,ubicacion[i].lastIndexOf(")"));
	coordenadas.push(coordenadaString);

	console.log("[ubicacion -> coordenadas]["+i+"]: "+ ubicacion[i] +" -> "+ coordenadas[i]);
}
// Convierte a string el array coordenadas, a este string se le hará un split por "," y se pasará a entero
var coordenadasFinalString = coordenadas.toString();
console.log("[coordenadasFinalString.toString]: " + coordenadasFinalString);

for(i=0; i<ubicacion.length;i++) {
	// Extrae las etiquetas y las almacena en el array etiquetas
	var etiquetasString=ubicacion[i].substring(0,ubicacion[i].lastIndexOf("("));
	etiquetas.push(etiquetasString);
	console.log("[ubicacion -> etiquetas]["+i+"]: "+ ubicacion[i] +" -> "+ etiquetas[i]);					
}
				
console.log("[etiquetas.toString]: " + etiquetas.toString());

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
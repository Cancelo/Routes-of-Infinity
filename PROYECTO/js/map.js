// Variables
var map;
var markersArrayTmp = [];
var markersArrayGuardado = [];
var coordenadasEvento;

// Configuración inicial del mapa
var myOptions = {
	zoom: 2,
	center: {lat: 34, lng: 6},
	clickableIcons: false
};

// Función inicial
function initAutocomplete() {
	// Inicia el mapa con las opciones myOptions
	map = new google.maps.Map(document.getElementById("map"), myOptions);

	// Listener evento guardar
	document.getElementById("guardar").addEventListener('click', guardar, false);
	// Listener evento deshacer
	document.getElementById("undo").addEventListener('click', undo, false);
	// Listener evento terminar
	document.getElementById("terminar").addEventListener('click', terminar, false);

	// Evento click en el mapa
	google.maps.event.addListener(map, "click", function(event) {
		// Pone el foco en el input etiqueta
		document.getElementById("etiqueta").focus();
		// Llama a la función establecerMarker y le pasa como parámetro latitud y longitud del evento click
		establecerMarker(event.latLng);
	});	

	// Crea el searchbox de la API de places y lo linkea al input pac-input
	var input = document.getElementById('pac-input');
	var searchBox = new google.maps.places.SearchBox(input);
	map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

	// Resultados del searchbox, API places
	map.addListener('bounds_changed', function() {
		searchBox.setBounds(map.getBounds());
	});

	// Listener del evento que se produce cuando el usuario selecciona una predicción del searchbox
	searchBox.addListener('places_changed', function() {
		// Recupera los lugares
		var places = searchBox.getPlaces();

		if (places.length == 0) {
			return;
		}
		// Llamada a borrarTmp
		borrarTmp();

		// Para cada lugar recupera la información como localización, nombre...
		var bounds = new google.maps.LatLngBounds();

		places.forEach(function(place) {
			// Crea un marker para cada lugar que coincida con la busqueda y hace push en el markersArrayTmp
			markersArrayTmp.push(new google.maps.Marker({
				map: map,
				title: place.name,
				animation: google.maps.Animation.BOUNCE,
				opacity: 0.7,
				position: place.geometry.location
			}));

			if (place.geometry.viewport) {
				bounds.union(place.geometry.viewport);
			} else {
				bounds.extend(place.geometry.location);
			}
		});
		map.fitBounds(bounds);		
	});

	// Utilizado para que el mapa aparezca centrado en su posición de origen independientemente de la resolución
	var altoMap = window.innerHeight;
	document.getElementById("map").style.height = "550px";
	document.getElementById("map").style.width = "auto";
	google.maps.event.addDomListener(window, "resize", function() {
		var center = map.getCenter();
		google.maps.event.trigger(map, "resize");
		map.setCenter(center);
	});
}

function establecerMarker(location) {
	// Guarda las coordenadas del evento
	coordenadasEvento = location;

	// Llama a la función borrarTmp
	borrarTmp();

	// Crea el marker con las coordenadas recibidas
	var marker = new google.maps.Marker({
		position: location,
		animation: google.maps.Animation.BOUNCE,
		opacity: 0.7,
		map: map
	});

	// Añade el marker al array
	markersArrayTmp.push(marker);
}

// Elimina todos los marcadores del array mediante la eliminación de las referencias a ellos
// Utilizado para que solo muestre una ubicación. Sólo abrá una ubicación el este array
function borrarTmp() {
	if (markersArrayTmp) {
		for (i in markersArrayTmp) {
			markersArrayTmp[i].setMap(null);
		}
		markersArrayTmp.length = 0;
	}
}

// Guarda las coordenadas del evento click en el array definitivo
function guardar() {
	// Si no se introduce etiqueta no se guarda y establece el foco en el input etiqueta
	if (document.getElementById("etiqueta").value.length == 0 || document.getElementById("etiqueta").value == null) {
		document.getElementById("etiqueta").focus();
	}
	else if(coordenadasEvento == null) {
		Materialize.toast('Selecciona un punto en el mapa', 1000);
	}
	else {
		// Llama a la funcion mostrar
		mostrar(coordenadasEvento);

		// Crea en el árbol DOM los div con las ubicaciones y la etiqueta introducida
		var div = document.createElement('div');
		div.innerHTML = "<div class='chip'>"+document.getElementById("etiqueta").value+"</div>";
		div.setAttribute('class', 'chip');
		document.getElementById("chipsLateral").appendChild(div);

		var div = document.createElement('div');
		div.innerHTML = "<div class='chip'>"+document.getElementById("etiqueta").value+"</div>";
		div.setAttribute('class', 'chip');
		document.getElementById("chipsModal").appendChild(div);

		// Borra el input etiqueta
		document.getElementById("etiqueta").value = "";
	}
}

// Muestra en el mapa los markers guardados en el array
function mostrar(coordenadasEvento) {
	borrarTmp();

	// Toma el valor del input del formulario. Esto será la etiqueta del marker
	var etiqueta = document.getElementById("etiqueta").value;

	// Crea un marker con las coordenadas del evento. Éste será definitivo
	var marker = new google.maps.Marker({
		position: coordenadasEvento,
		title: etiqueta,
		map: map
	});	

	// Añade el marker al array. Se mostraran todos los markers de este array en el mapa
	markersArrayGuardado.push(marker);

	// Muestra la etiqueta de cada marker en el mapa
	var infowindow = new google.maps.InfoWindow({
		content: etiqueta
	});
	infowindow.open(map, marker);
}

function undo() {
	var longitudArray = markersArrayGuardado.length;	

	if(longitudArray <= 0) {
		Materialize.toast('No hay ubicaciones guardadas', 1000)

	}
	else {
		var x = document.getElementById("chipsLateral").lastElementChild;
		document.getElementById("chipsLateral").removeChild(x);

		var y = document.getElementById("chipsModal").lastElementChild;
		document.getElementById("chipsModal").removeChild(y);

		var i = longitudArray - 1;
		markersArrayGuardado[i].setMap(null);

		markersArrayGuardado.length = longitudArray - 1;
	}
}

function terminar() {
	if(markersArrayGuardado.length <= 0) {
		Materialize.toast('Introduce al menos una ubicación', 1000)
	}
	else {
		var toBBDD = "";

		for (var indice in markersArrayGuardado){		
			toBBDD += markersArrayGuardado[indice].title+markersArrayGuardado[indice].position+":";		
		}
		console.log(toBBDD);
		document.getElementById("ubicacionesRuta").value = toBBDD;
	}	
}
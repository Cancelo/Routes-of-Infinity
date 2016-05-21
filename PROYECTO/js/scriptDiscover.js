window.addEventListener('load', iniciar, false);


function iniciar(){ 
	 document.getElementById("limpiar").addEventListener('click', limpiarFiltro, false);
}

function limpiarFiltro() {
	window.location.href = 'discover.php';
}
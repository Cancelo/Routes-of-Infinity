<?php
include_once 'app/Conexion.inc.php';
include_once 'app/DAORuta.inc.php';
include_once 'app/DAOUsuario.inc.php';

class MostrarRutas {

	public static function rutaConFormato($control){
		if($control == 0) {
			$rutas = DAORuta::getTodas(Conexion::getConexion());
			if(count($rutas)) {
				foreach($rutas as $ruta) {
					self::formatoRutaDiscover($ruta);
				}
			}
		}
		else if($control == 1) {
			$rutas = DAORuta::getTodasPorIdUsuario(Conexion::getConexion());
			if(count($rutas)) {
				foreach($rutas as $ruta) {
					self::formatoRutaProfile($ruta);
				}
			}
			else {
				echo "<div class='center'>No tienes ruta. Puedes crear una <a href='create.php'>aquí</a></div>";
			}
		}
	}

	public static function formatoRutaDiscover($ruta) {
		if(!isset($ruta)) {
			return;
		}

		$rutaCoord = "";
		// Separa el string por ":" y lo almacena en un array
		$ubicacion = explode(":", $ruta->getUbicaciones());
		// Para cada indice del array extrae las coordenadas que se encuentran entre paréntesis
		for($i=0; $i < count($ubicacion)-1; $i++){
			preg_match('/\((.*?)\)/', $ubicacion[$i], $coord);

			// Concatena las coordenadas con formato determinado
			$rutaCoord .= "&markers=color:red%7Clabel:%7C".$coord[1];
		}

		// Ruta para Google StaticMaps, añado las coordenadas a la URL. Esto devolverá una imagen
		$rutaMaps = "https://maps.googleapis.com/maps/api/staticmap?size=600x300&maptype=roadmap".$rutaCoord;

		// Condiciones para determinar el color y el icono de la ruta
		if($ruta->getTipo() == "Ocio"){
			$tipo = "local_bar";
			$color = "blue";
		}
		else if($ruta->getTipo() == "Cultural"){
			$tipo = "account_balance";
			$color = "green";
		}
		else {
			$tipo = "map";
			$color = "orange";
		}
?>
	<div class="col s12 m6 l4">
		<div class="card">
			<div class="card-image waves-effect waves-block waves-light">
				<img class="activator" src="<?php echo $rutaMaps; ?>" />
				<i class="material-icons circle tipoTag <?php echo $color; ?>"><?php echo $tipo; ?></i>
			</div>
			<div class="card-content">
				<span class="card-title activator grey-text text-darken-4">
					<?php echo $ruta->getNombre(); ?>
					<i class="material-icons right">more_vert</i>
				</span>
				<p><?php echo $ruta->getCiudad(); ?></p>
				<p style="font-size: 12.5px;">
					Por <span class="cyan-text"><?php echo DAOUsuario::usuarioPorId(Conexion::getConexion(), $ruta->getIdUsuario())->getNombre(); ?></span> a <?php echo $ruta->getFechaCreacion(); ?>
				</p>
				<p class="right-align">
					<a class="cyan-text" href="show.php?r=<?php echo $ruta->getId(); ?>">Ver ruta</a>
				</p>
			</div>
			<div class="card-reveal">
				<span class="card-title grey-text text-darken-4">
					<?php echo $ruta->getNombre(); ?>
					<i class="material-icons right">close</i>
				</span>
				<p><?php echo nl2br($ruta->getDescripcion()); ?></p>
			</div>
		</div>
	</div>
<?php
	}

	public static function formatoRutaProfile($ruta) {
		if(!isset($ruta)) {
			return;
		}

		$color = "";
		if($ruta->getTipo() == "Ocio"){
			$color = "blue";
			$icono = "local_bar";
		}
		else if($ruta->getTipo() == "Cultural"){
			$color = "green";
			$icono = "account_balance";
		}
		else{
			$color = "orange";
			$icono = "map";
		}

?>
						<li class="collection-item avatar">
						  <i class="material-icons circle <?php echo $color; ?>"><?php echo $icono; ?></i>
						  <span class="title"><?php echo $ruta->getNombre(); ?></span>
						  <p><span class="cyan-text"><?php echo $ruta->getTipo(); ?></span> en <span class="cyan-text"><?php echo $ruta->getCiudad(); ?></span><br>
							 <?php echo $ruta->getFechaCreacion(); ?>
						  </p>
						  <a href="delete.php" class="secondary-content"><i class="red-text material-icons">delete</i></a>
							<a id="linkVer" href="show.php?r=<?php echo $ruta->getId(); ?>" class="secondary-content">
								<i class="cyan-text material-icons">remove_red_eye</i>
							</a>
						</li>
<?php


	}


}
<?php
include_once("mysql.inc.php");

	conecta($c);

	if($c==null) {
		echo "Fallo de conexión";
	}
	else {
		mysqli_select_db($c, "routesofinfinity");

		$sql="SELECT * FROM routes order by fecha desc";

		$resultado=mysqli_query($c, $sql);

		if($resultado) {

		$filas=mysqli_num_rows($resultado);

			if($filas==0) {
				echo "<div class='post'>Todavía no hay rutas :(</div>";
			}
			else {
				while($registro=mysqli_fetch_array($resultado)) {

				$rutaCoord = "";

				// Separa el string por ":" y lo almacena en un array
				$ubicacion = explode(":", $registro['ubicaciones']);
				// Para cada indice del array extrae las coordenadas que se encuentran entre paréntesis
				for($i=0; $i < count($ubicacion)-1; $i++){
					preg_match('/\((.*?)\)/', $ubicacion[$i], $coord);

					// Concatena las coordenadas con formato determinado
					$rutaCoord .= "&markers=color:red%7Clabel:%7C".$coord[1];
				}

				// Ruta para Google StaticMaps, añado las coordenadas a la URL. Esto devolverá una imagen
				$rutaMaps = "https://maps.googleapis.com/maps/api/staticmap?size=600x300&maptype=roadmap".$rutaCoord;



					echo "
						<div class='col s12 m6 l4'>
							<div class='card'>
								<div class='card-image waves-effect waves-block waves-light'>
									<img class='activator' src='".$rutaMaps."'>
								</div>
								<div class='card-content'>
									<span class='card-title activator grey-text text-darken-4'>".$registro['nombre']."<i class='material-icons right'>more_vert</i></span>
									<p>".$registro['ciudad']."</p>
									<p style='font-size: 12.5px;'>Por <span class='cyan-text'>".$registro['user']."</span> a ".$registro['fecha']."</p>						
									<p class='right-align'><a class='cyan-text' href='show.php?r=".$registro['id']."'>Ver ruta</a></p>
								</div>
								<div class='card-reveal'>
									<span class='card-title grey-text text-darken-4'>".$registro['nombre']."<i class='material-icons right'>close</i></span>
									<p>".$registro['descripcion']."</p>
								</div>
							</div>
						</div>
					";						
				}
			}
		}
			else {
				$error=mysqli_error($c);
				echo $error;
			}
		}
	mysqli_close($c);
?>
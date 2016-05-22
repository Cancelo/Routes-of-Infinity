<?php
	include_once("mysql.inc.php");

	$busqueda = "";
	$orden = "";
	$caracteristicas = "";
	$tipo = "";

	$sql = "SELECT * FROM routes";

	if(isset($_GET['b']) && $_GET['b'] != "") {
		$busqueda = $_GET['b'];

		$sql .= " WHERE (ciudad LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%')";
	}

	if(isset($_GET['tipo']) && $_GET['tipo'] != ""){
		$tipo = $_GET['tipo'];

		if(isset($_GET['b']) && $_GET['b'] != ""){
			$sql .= " AND tipo = '$tipo'";
		}
		else {
			$sql .= " WHERE tipo = '$tipo'";
		}		
	}

	if(isset($_GET['caract']) && $_GET['caract'] != ""){
		$caracteristicas = $_GET['caract'];

		$sql .= " ORDER BY $caracteristicas";
	}	

	if(isset($_GET['orden']) && $_GET['orden'] != ""){
		$orden = $_GET['orden'];

		if(isset($_GET['caract']) && $_GET['caract'] != ""){
			$sql .= " $orden";	
		}				
	}

	//echo $sql;

	conecta($c);

	if($c==null) {
		echo "Fallo de conexión";
	}
	else {
		mysqli_select_db($c, "routesofinfinity");	

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

					// Conctatena las coordenadas con formato determinado
					$rutaCoord .= "&markers=color:red%7Clabel:%7C".$coord[1];
				}

				// Ruta para Google StaticMaps, añado las coordenadas a la URL. Esto devolverá una imagen
				$rutaMaps = "https://maps.googleapis.com/maps/api/staticmap?size=600x300&maptype=roadmap".$rutaCoord;

					if($registro['tipo'] == "Ocio"){
						$tipo = "local_bar";
						$color = "blue";
					}
					else if($registro['tipo'] == "Cultural"){
						$tipo = "account_balance";
						$color = "green";
					}
					else {
						$tipo = "map";
						$color = "orange";
					}


					echo "
						<div class='col s12 m6 l4'>
							<div class='card'>
								<div class='card-image waves-effect waves-block waves-light'>
									<img class='activator' src='".$rutaMaps."'>
									<i class='material-icons circle tipoTag ".$color."'>".$tipo."</i>
								</div>
								<div class='card-content'>
									<span class='card-title activator grey-text text-darken-4'>".$registro['nombre']."<i class='material-icons right'>more_vert</i></span>
									<p>".$registro['ciudad']."</p>
									<p class='cyan-text' style='font-size: 12px;'>Por ".$registro['user']." a ".$registro['fecha']."</p>						
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
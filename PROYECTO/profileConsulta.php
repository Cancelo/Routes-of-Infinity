<?php
include_once("mysql.inc.php");

	conecta($c);

	if($c==null) {
		echo "Fallo de conexión";
	}
	else {
		mysqli_select_db($c, "routesofinfinity");

		$sql="SELECT * FROM routes where user = '$user' order by fecha desc";

		$resultado=mysqli_query($c, $sql);

		if($resultado) {

		$filas=mysqli_num_rows($resultado);

			if($filas==0) {
				echo "<div class='post'>No tienes ruta. Puedes crear una <a href='create.php'>aquí</a></div>";
			}
			else {
				while($registro=mysqli_fetch_array($resultado)) {

					$id = $registro['id'];

					$color = "";			
					if($registro['tipo'] == "Ocio"){
						$color = "blue";
						$icono = "local_bar";
					}
					else if($registro['tipo'] == "Cultural"){
						$color = "green";
						$icono = "account_balance";
					}
					else{
						$color = "orange";
						$icono = "map";
					}

					echo "
						<li class='collection-item avatar'>
						  <i class='material-icons circle $color'>$icono</i>
						  <span class='title'>".$registro['nombre']."</span>
						  <p><span class='cyan-text'>".$registro['tipo']."</span> en <span class='cyan-text'>".$registro['ciudad']."</span><br>
							 ".$registro['fecha']."
						  </p>
						  <a href='delete.php' class='secondary-content'><i class='red-text material-icons'>delete</i></a>
						  <a id='linkVer' href='show.php?r=$id' class='secondary-content'><i class='cyan-text material-icons'>remove_red_eye</i></a>
						</li>
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
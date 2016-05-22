<?php
	if (!isset($_GET['r'])) {
		header("Location:discover.php");
	} else if ($_GET['r'] == "") {
		header("Location:discover.php");
	} else {
		$id = $_GET['r'];

		include_once("mysql.inc.php");

		conecta($c);

		if ($c == null) {
			echo "Fallo de conexión";
		} else {
			mysqli_select_db($c, "routesofinfinity");

			$sql = "SELECT * FROM routes WHERE id='$id'";

			$resultado = mysqli_query($c, $sql);

			if ($resultado) {

				$filas = mysqli_num_rows($resultado);

				if ($filas == 0) {
					echo "No coincide con id";
				} else {
					while ($registro = mysqli_fetch_array($resultado)) {
						$nombre = $registro['nombre'];
						$ciudad = $registro['ciudad'];
						$descripcion = $registro['descripcion'];
						$tipo = $registro['tipo'];
						$autor = $registro['user'];

						$ubicaciones = $registro['ubicaciones'];
					}
				}
			} else {
				$error = mysqli_error($c);
				echo $error;
			}
			mysqli_close($c);
		}
	}
?>
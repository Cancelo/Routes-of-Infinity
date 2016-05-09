<?php

	$nombreRuta = $_POST['nombreRuta'];
	$ciudadRuta = $_POST['ciudadRuta'];
	$descripcionRuta = $_POST['descripcionRuta'];
	$tipoRuta = $_POST['tipoRuta'];
	$ubicacionesRuta = $_POST['ubicacionesRuta'];
	$user = "Ruben";
	date_default_timezone_set('Europe/Madrid');
	$fecha= date('Y-m-d H:i:s');	

	include_once("mysql.inc.php");

	conecta($c);

	if($c==null) {
		#echo "Fallo de conexión";
		header("Location:create.html?e=0");
	}
	else {
		mysqli_select_db($c, "routesofinfinity");

		$sql="insert into routes values (0, '$nombreRuta', '$ciudadRuta', '$descripcionRuta', '$tipoRuta', '$ubicacionesRuta', '$user', '$fecha')";
		$resultado=mysqli_query($c, $sql);
		mysql_query("SET NAMES 'utf8'");

		if($resultado) {

			$filas=mysqli_affected_rows($c);

			if($filas>0) {
				header("Location:create.html?e=1");
			}
			else {
				#echo "No se han realizado cambios";
				header("Location:create.html?e=0");
			}
		}
		else {
			$error=mysqli_error($c);
			echo $error;
		}
	}
	mysqli_close($c);
?>
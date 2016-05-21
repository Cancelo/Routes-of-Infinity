<?php
	if(!isset($_POST['nombreRuta']) || !isset($_POST['ciudadRuta']) || !isset($_POST['descripcionRuta']) || !isset($_POST['tipo']) || !isset($_POST['ubicacionesRuta'])){
		echo "No se han recibido parametros";
	}
	else if($_POST['nombreRuta'] == "" || $_POST['ciudadRuta'] == "" || $_POST['descripcionRuta'] == "" || $_POST['tipo'] == "" || $_POST['ubicacionesRuta'] == "") {
		echo "Campos vacíos";
	}
	else{

		session_start();
		
		$nombreRuta = $_POST['nombreRuta'];
		$ciudadRuta = $_POST['ciudadRuta'];
		$descripcionRuta = $_POST['descripcionRuta'];
		$tipoRuta = $_POST['tipo'];	
		$ubicacionesRuta = $_POST['ubicacionesRuta'];
		$user = $_SESSION['user'];
		date_default_timezone_set('Europe/Madrid');
		$fecha= date('Y-m-d H:i:s');

		$tamano = substr_count($ubicacionesRuta, ':');

		echo "Tipo ".$tipoRuta;

		include_once("mysql.inc.php");

		conecta($c);

		if($c==null) {
			#echo "Fallo de conexión";
			header("Location:create.php?e=0");
		}
		else {
			mysqli_select_db($c, "routesofinfinity");

			$sql="insert into routes values (0, '$nombreRuta', '$ciudadRuta', '$descripcionRuta', '$tipoRuta', '$ubicacionesRuta', '$user', '$fecha', 0, $tamano)";
			$resultado=mysqli_query($c, $sql);
			mysql_query("SET NAMES 'utf8'");

			if($resultado) {

				$filas=mysqli_affected_rows($c);

				if($filas>0) {
					header("Location:create.php?e=1");
				}
				else {
					#echo "No se han realizado cambios";
					header("Location:create.php?e=0");
				}
			}
			else {
				$error=mysqli_error($c);
				echo $error;
			}
		}
		mysqli_close($c);
	}
?>
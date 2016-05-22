<?php
	
	$user = $_POST['user'];
	$pass = $_POST['pass'];
	$repass = $_POST['repass'];
	$vip = 0;
	date_default_timezone_set('Europe/Madrid');
	$fecha= date('Y-m-d H:i:s');

	echo $user.$pass.$repass.$vip;

	include_once("mysql.inc.php");

	conecta($c);

	if($c==null) {
		#echo "Fallo de conexión";
		header("Location:login.html?e=0");
	}
	else {
		mysqli_select_db($c, "routesofinfinity");

		$sql="insert into usuario values (0, '$user', '$pass', '$vip', '$fecha')";
		$resultado=mysqli_query($c, $sql);
		mysql_query("SET NAMES 'utf8'");

		if($resultado) {

			$filas=mysqli_affected_rows($c);

			if($filas>0) {
				header("Location:login.html?e=1");
			}
			else {
				#echo "No se han realizado cambios";
				header("Location:login.html?e=0");
			}
		}
		else {
			$error=mysqli_error($c);
			echo $error;
		}
	}
	mysqli_close($c);
?>
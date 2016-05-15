<?php
	include("mysql.inc.php");

	if(!isset($_POST['user']) || !isset($_POST['pass'])) {
		echo "No se han recibido datos";
		#header("Location:index.php");
	}
	else if($_POST['user'] == "" || $_POST['pass'] == "") {
		echo "Campos vacíos";
		#header("Location:index.php");
	}
	else {
		$user=$_POST['user'];
		$pass=$_POST['pass'];

		conecta($c);

		mysqli_select_db($c,"routesofinfinity");

		$sql="select * from usuario where nombre='$user' and pass='$pass'";

		$resultado=mysqli_query($c,$sql);

		$registro=mysqli_fetch_array($resultado);

		$filas=mysqli_num_rows($resultado);

		if($resultado) {
			if($filas==0) {
				echo "No coincide login y pass";
				#header("Location:index.php");
			}
			else {
				# Correcto
				session_start();
				$_SESSION['user']=$registro['nombre'];
				header("Location:discover.php");
			}
		}
		else {
			echo "Error";
			#header("Location:index.php");
		}
		
		mysqli_close($c);
	}
?>
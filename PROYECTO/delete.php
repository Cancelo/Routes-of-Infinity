		<?php
			include("mysql.inc.php");

			if(!isset($_POST['id'])) {
				echo "No se han recibido los parámetros.";
			}
			elseif($_POST['id']=="") {
				echo "Parámetros vacíos.";
			}
			else {
				$cif=$_POST['id'];

				conecta($c);

				if($c==null) {
					echo "Fallo de conexión";
				}
				else {
					mysqli_select_db($c, "ejercicioDDL3");

					$sql="delete from companias where cif='$cif'";

					$resultado=mysqli_query($c, $sql);

					if($resultado) {

						$filas=mysqli_affected_rows($c);

						if($filas>0) {
							echo "Se han realizado cambios. $resultado cambio";
						}
						else {
							echo "No se han realizado cambios";
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
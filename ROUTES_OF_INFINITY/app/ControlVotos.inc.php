<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

class ControlVotos {

	public static function haVotado($conexion, $id_ruta, $id_usuario){
		$control = false;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM control_votos WHERE id_usuario = :id_usuario AND id_ruta = :id_ruta";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
				$sentencia->bindParam(':id_ruta', $id_ruta, PDO::PARAM_INT);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $control = true;
                } else {
                    $control = false;
                }
            }
			catch (Exception $ex) {
                print "[ControlVotos0]" . $ex->getMessage();
            }
        }
        return $control;
	}

	public static function votar($conexion, $id_ruta, $id_usuario) {
		$control = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO control_votos(id_usuario, id_ruta) VALUES(:id_usuario, :id_ruta)";
                $sentencia = $conexion->prepare($sql);
                // Enlazamos los parámetros anteriores e indicamos el tipo
				$sentencia->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
				$sentencia->bindParam(':id_ruta', $id_ruta, PDO::PARAM_INT);
                // Nos indica si la consulta se ha ejecutado
                $control = $sentencia->execute();
            }
			catch (PDOException $ex) {
                echo "[ControlVotos1]" . $ex->getMessage();
            }

			try {
			    $sql = "UPDATE ruta SET votos = votos + 1 WHERE id = :id_ruta";
			    $sentencia = $conexion->prepare($sql);
			    // Enlazamos los parámetros anteriores e indicamos el tipo
			    $sentencia->bindParam(':id_ruta', $id_ruta, PDO::PARAM_STR);
			    // Nos indica si la consulta se ha ejecutado
			    $control = $sentencia->execute();
			}
			catch (PDOException $ex) {
			    print "[ControlVotos2]" . $ex->getMessage();
			}
        }
        // Devolvemos si se ha insertado o no
        return $control;
    }
}
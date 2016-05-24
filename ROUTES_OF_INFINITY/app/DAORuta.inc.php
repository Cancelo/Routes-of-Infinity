<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Ruta.inc.php';

class DAORuta {

    public static function insertarRuta($conexion, $ruta) {
        $control = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO ruta(nombre, ciudad, descripcion, tipo, ubicaciones, id_usuario, fecha_creacion, votos, tamano)
                VALUES(:nombre, :ciudad, :descripcion, :tipo, :ubicaciones, :id_usuario, now(), 0, :tamano)";
                $sentencia = $conexion->prepare($sql);
                // Enlazamos los parámetros anteriores e indicamos el tipo
                $sentencia->bindParam(':nombre', $ruta->getNombre(), PDO::PARAM_STR);
                $sentencia->bindParam(':ciudad', $ruta->getCiudad(), PDO::PARAM_STR);
                $sentencia->bindParam(':descripcion', $ruta->getDescripcion(), PDO::PARAM_STR);
                $sentencia->bindParam(':tipo', $ruta->getTipo(), PDO::PARAM_STR);
                $sentencia->bindParam(':ubicaciones', $ruta->getUbicaciones(), PDO::PARAM_STR);
                $sentencia->bindParam(':id_usuario', $ruta->getIdUsuario(), PDO::PARAM_STR);
                $sentencia->bindParam(':tamano', $ruta->getTamano(), PDO::PARAM_INT);
                // Nos indica si la consulta se ha ejecutado
                $control = $sentencia->execute();
            }
            catch (PDOException $ex) {
                print "DAOUsuario" . $ex->getMessage();
            }
        }
        // Devolvemos si se ha insertado o no
        return $control;
    }

	public static function getTodas($conexion) {
		$rutas = [];

		if(isset($conexion)) {
			try {
				$sql = "SELECT * FROM ruta ORDER BY fecha_creacion DESC";
				$sentencia = $conexion->prepare($sql);
				$sentencia->execute();

				$resultado = $sentencia->fetchAll();

				if(count($resultado)){
					foreach($resultado as $fila) {
						$rutas[] = new Ruta(
							$fila['id'], $fila['nombre'], $fila['ciudad'],
							$fila['descripcion'], $fila['tipo'], $fila['ubicaciones'],
							$fila['id_usuario'], $fila['fecha_creacion'], $fila['votos'], $fila['tamano']
						);
					}
				}
			} catch (PDOException $ex) {
				print "DAORuta" . $ex->getMessage();
			}
		}
		return $rutas;
	}

	public static function getTodasPorIdUsuario($conexion) {
		$rutas = [];

		if(isset($conexion)) {
			try {
				$sql = "SELECT * FROM ruta WHERE id_usuario = :id_usuario ORDER BY fecha_creacion DESC";
				$sentencia = $conexion->prepare($sql);
				$sentencia->bindParam(':id_usuario', $_SESSION['id'], PDO::PARAM_STR);
				$sentencia->execute();

				$resultado = $sentencia->fetchAll();

				if(count($resultado)){
					foreach($resultado as $fila) {
						$rutas[] = new Ruta(
							$fila['id'], $fila['nombre'], $fila['ciudad'],
							$fila['descripcion'], $fila['tipo'], $fila['ubicaciones'],
							$fila['id_usuario'], $fila['fecha_creacion'], $fila['votos'], $fila['tamano']
						);
					}
				}
			}
			catch (PDOException $ex) {
				print "DAORuta" . $ex->getMessage();
			}
		}
		return $rutas;
	}

	public static function rutaPorId($conexion, $id){
        $ruta = null;

        if(isset($conexion)) {
            try {
                $sql = "SELECT * FROM ruta WHERE id = :id";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if(!empty($resultado)) {
                    $ruta = new Ruta(
							$resultado['id'], $resultado['nombre'], $resultado['ciudad'],
							$resultado['descripcion'], $resultado['tipo'], $resultado['ubicaciones'],
							$resultado['id_usuario'], $resultado['fecha_creacion'], $resultado['votos'], $resultado['tamano']
						);
                }
            }
			catch (PDOException $es) {
                print "[DAORuta]" . $ex->getMessage();
            }
        }
        return $ruta;
    }
}

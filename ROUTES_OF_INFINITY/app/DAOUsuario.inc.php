<?php

class DAOUsuario {

    public static function getTodo($conexion) {
        $usuarios = array();

        if (isset($conexion)) {
            try {
                include_once 'Usuario.inc.php';

                $sql = "SELECT * FROM usuario";
                // Prepara una sentencia para su ejecución, ignora caracteres peligrosos
                $sentencia = $conexion->prepare($sql);
                // Ejecutamos la sentencia
                $sentencia->execute();
                // Devuleve todos los resultados
                $resultado = $sentencia->fetchAll();
                // Comprobamos que el array no esta vacío y lo recorremos obteniendo cada filas
                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new Usuario(
                                $fila['id'], $fila['nombre'], $fila['password'], $fila['fecha_registro'], $fila['vip'], $fila['bloqueado']);
                    }
                } else {
                    print 'No hay usuarios';
                }
            } catch (PDOException $ex) {
                print "DAOUsuario" . $ex->getMessage();
            }
        }
        return $usuarios;
    }

    public static function insertarUsuario($conexion, $usuario) {
        $control = false;

        if (isset($conexion)) {
            try {
                $sql = "INSERT INTO usuario(nombre, password, fecha_registro, vip, bloqueado) VALUES(:nombre, :password, now(), 0, 0)";
                $sentencia = $conexion->prepare($sql);
                // Enlazamos los parámetros anteriores e indicamos el tipo
                $sentencia->bindParam(':nombre', $usuario->getNombre(), PDO::PARAM_STR);
                $sentencia->bindParam(':password', $usuario->getPassword(), PDO::PARAM_STR);
                // Nos indica si la consulta se ha ejecutado
                $control = $sentencia->execute();
            } catch (PDOException $ex) {
                print "DAOUsuario" . $ex->getMessage();
            }
        }
        // Devolvemos si se ha insertado o no
        return $control;
    }

    public static function nombrerepetido($conexion, $nombre) {
        $control = true;

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM usuario WHERE nombre = :nombre";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $control = true;
                } else {
                    $control = false;
                }
            } catch (Exception $ex) {
                print "[DAOUsuario]" . $ex->getMessage();
            }
        }
        return $control;
    }

}

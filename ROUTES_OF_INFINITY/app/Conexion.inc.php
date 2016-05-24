<?php

class Conexion {

    private static $conexion;

    public static function openConexion() {
        if (!isset(self::$conexion)) {
            try {
                include_once 'config.inc.php';

                self::$conexion = new PDO('mysql:host=' . SERVIDOR . '; dbname=' . NOMBRE_BBDD, USER, PASSWORD);
                // Hacemos que muestre errores en caso de que lo haya
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // Especificamos la codificación
                self::$conexion->exec("SET CHARACTER SET utf8");
            } catch (PDOException $ex) {
                print "Conexion" . $ex->getMessage();
                // En caso de que falle terminamos la conexion
                die();
            }
        }
    }

    public static function closeConexion() {
        if (isset(self::$conexion)) {
            // Si existe la conexión liberamos memoria destruyendo el objeto
            self::$conexion = null;
        }
    }

    public static function getConexion() {
        return self::$conexion;
    }

}

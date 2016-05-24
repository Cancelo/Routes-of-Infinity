<?php

    class ControlSesion {

        public static function startSesion($id, $nombre) {
            // Iniciamos la session si no esta iniciada y almacenamos id y usuario en la session con los parametros recibidos
            if(session_id() == '') {
                session_start();
            }
            $_SESSION['id'] = $id;
            $_SESSION['nombre'] = $nombre;
        }

        public static function endSesion() {
            //Iniciamos la session si no esta iniciada y eliminamos la sesion. Borramos si existieran del array de session el id y el usuario, despues destruimos las session
            if(session_id() == '') {
                session_start();
            }
            if(isset($_SESSION['id'])){
                unset($_SESSION['id']);
            }
            if(isset($_SESSION['nombre'])){
                unset($_SESSION['nombre']);
            }
            session_destroy();
        }

        public static function sesionActiva() {
            // Iniciamos la session si no esta iniciada y comprobamos si existe el id y el nombre. Devolvemos true si la session esta activa
            if(session_id() == '') {
                session_start();
            }
            if(isset($_SESSION['id']) && isset($_SESSION['nombre'])) {
                return true;
            }
            else {
                return false;
            }
        }
    }
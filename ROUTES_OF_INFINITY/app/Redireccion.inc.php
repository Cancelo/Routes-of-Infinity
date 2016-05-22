<?php

class Redireccion {

    public static function redirect($url) {
        // Concatenamos la URL donde queremos redirigir, mostramos la url nueva en la barra de direcciones
        // e indicamos el error del servidor. En este caso redirección (301)
        header('Location: '.$url, true, 301);
        // Terminamos la ejecución
        die();
    }

}

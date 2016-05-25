<?php

include_once 'DAOUsuario.inc.php';

class ValidadorLogin {

    private $usuario;
    private $error;

    public function __construct($conexion, $nombre, $password) {
        $this->error = "";
        if (!$this->controlVariable($nombre) || !$this->controlVariable($password)) {
            $this->usuario = null;
            $this->error = "<script>showToast('Algo ha salido mal, asegurate de rellenar todos los campos', 3500);</script>";
        } else {
            $this->usuario = DAOUsuario::usuarioPorNombre($conexion, $nombre);
            if (is_null($this->usuario) || !password_verify($password, $this->usuario->getPassword())) {
                $this->error = "<script>showToast('El usuario o la contraseña son incorrectos', 3500);</script>";
            }
        }
    }

    private function controlVariable($variable) {
        if (isset($variable) && !empty($variable)) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getError() {
        return $this->error;
    }

}

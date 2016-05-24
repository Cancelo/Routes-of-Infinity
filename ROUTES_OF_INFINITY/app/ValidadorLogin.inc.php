<?php

include_once 'DAOUsuario.inc.php';

class ValidadorLogin {

    private $usuario;
    private $alert;

    public function __construct($conexion, $nombre, $password) {
        $this->error = "";

        if(!$this->controlVariable($nombre) || !$this->controlVariable($password)){
            $this->usuario = null;
            $this->alert = "Campos vacíos o no recibidos";
        }
        else {
            $this->usuario = DAOUsuario::usuarioPorNombre($conexion, $nombre);

            if(is_null($this->usuario) || !password_verify($password, $this->usuario->getPassword())) {
                $this->alert = "Datos incorrectos";
            }
        }
    }

    private function controlVariable($variable) {
        if(isset($variable) && !empty($variable)) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getError(){
        return $this->error;
    }

    public function showAlert(){
        if($this->error !== "") {
            echo "ERROR";
            echo $this->error;
        }
    }
}
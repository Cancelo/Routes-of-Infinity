<?php

class Usuario {

    private $id;
    private $nombre;
    private $password;
    private $fecha_registro;
    private $vip;
    private $bloqueado;

    public function __construct($id, $nombre, $password, $fecha_registro, $vip, $bloqueado) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->password = $password;
        $this->fecha_registro = $fecha_registro;
        $this->vip = $vip;
        $this->bloqueado = $bloqueado;
    }

    // GET
    public function getId() {
        return $this->id;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getPassword() {
        return $this->password;
    }
    public function getFechaRegistro() {
        return $this->fecha_registro;
    }
    public function getVip() {
        return $this->vip;
    }
    public function getBloqueado() {
        return $this->bloqueado;
    }

    // SET
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setPassword($password) {
        $this->paswword = $password;
    }
    public function setVip($vip) {
        $this->vip = $vip;
    }
    public function setBloqueado($bloqueado) {
        $this->blqueado = $bloqueado;
    }
}

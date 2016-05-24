<?php

class Ruta {

    private $id;
    private $nombre;
    private $ciudad;
    private $descripcion;
    private $tipo;
    private $ubicaciones;
    private $id_usuario;
    private $fecha_creacion;
    private $votos;
    private $tamano;

    public function __construct($id, $nombre, $ciudad, $descripcion, $tipo, $ubicaciones, $id_usuario, $fecha_creacion, $votos, $tamano) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
        $this->descripcion = $descripcion;
        $this->tipo = $tipo;
        $this->ubicaciones = $ubicaciones;
        $this->id_usuario = $id_usuario;
        $this->fecha_creacion = $fecha_creacion;
        $this->votos = $votos;
        $this->tamano = $tamano;
    }

    // GET
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCiudad() {
        return $this->ciudad;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function getUbicaciones() {
        return $this->ubicaciones;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getFechaCreacion() {
        return $this->fecha_creacion;
    }

    public function getVotos() {
        return $this->votos;
    }

    public function getTamano() {
        return $this->tamano;
    }

    // En esta versión de la aplicación no se podrán modificar las rutas creadas, por eso no existen setters
}

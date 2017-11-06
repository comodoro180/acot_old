<?php

class Usuario {
    
    private $id;
    private $nombre;
    private $email;
    private $clave;
    private $fecha_registro;
    private $activo;
    
    public function __construct($id, $nombre, $email, $clave, $fecha_registro, $activo) {
        $this -> id = $id;
        $this -> nombre = $nombre;
        $this -> email = $email;
        $this -> clave = $clave;
        $this -> fecha_registro = $fecha_registro;
        $this -> activo = $activo;
    }
    
    public function obtener_id() {
        return $this -> id;
    }
    
    public function obtener_nombre() {
        return $this -> nombre;
    }
    
    public function obtener_email() {
        return $this -> email;
    }
    
    public function obtener_clave() {
        return $this -> clave;
    }
    
    public function obtener_fecha_registro() {
        return $this -> fecha_registro;
    }
    
    public function esta_activo() {
        return $this -> activo;
    }
    
    public function cambiar_nombre($nombre) {
        $this -> nombre = $nombre;
    }
    
    public function cambiar_email($email) {
        $this -> email = $email;
    }
    
    public function cambiar_clave($clave) {
        $this -> clave = $clave;
    }
    
    public function cambiar_activo($activo) {
        $this -> activo = $activo;
    }
}
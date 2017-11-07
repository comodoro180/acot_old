<?php
include_once '../controles/Conexion.php';
include_once '../modelo/Usuario.obj.php';
include_once '../controles/Usuario.rep.php';
include_once '../controles/UsuarioSesion.php';

$clave = filter_input(INPUT_POST, 'clave');
$email = filter_input(INPUT_POST, 'email');

Conexion::abrir_conexion();
$conexion = Conexion::obtener_conexion();

$usuario = RepositorioUsuario::obtener_usuario_por_email($conexion, $email);

if (!isset($usuario) || !password_verify($clave, $usuario->obtener_clave())) {    
    echo 'Datos incorrectos';
} else if (!$usuario->esta_activo()) {
    echo 'El usuario se ecuentra inactivo';
} else {
    ControlSesion::iniciar_sesion($usuario->obtener_id(), $usuario->obtener_nombre());
}
    
Conexion::cerrar_conexion();

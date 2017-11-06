<?php

include_once '../controles/Conexion.php';
include_once '../modelo/Usuario.obj.php';
include_once '../controles/Usuario.rep.php';

$usuario = New Usuario('', filter_input(INPUT_POST, 'nombre'), filter_input(INPUT_POST, 'email'), filter_input(INPUT_POST, 'clave1'), '', 0);

Conexion::abrir_conexion();
$conexion = Conexion::obtener_conexion();

$nombre_existe = RepositorioUsuario::nombre_existe($conexion, $usuario->obtener_nombre());
$email_existe = RepositorioUsuario::email_existe($conexion, $usuario->obtener_email());

if ($nombre_existe) {
    echo 'El nombre de usuario ya existe';
} else if ($email_existe) {
    echo 'El email ya se encuentra registrado';
} else {
    $usuario_insertado = RepositorioUsuario::insertar_usuario($conexion, $usuario);    
}

Conexion::cerrar_conexion();






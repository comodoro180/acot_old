<?php
include_once '../controles/Conexion.php';
include_once '../modelo/Usuario.obj.php';
include_once '../controles/Usuario.rep.php';

$email = filter_input(INPUT_POST, 'email');
$clave = filter_input(INPUT_POST, 'nuevaClave1');
//echo $email;
Conexion::abrir_conexion();
$conexion = Conexion::obtener_conexion();

$usuario= RepositorioUsuario::obtener_usuario_por_email($conexion, $email);

if (!isset($usuario)){
    echo "Error :usuario no encontrado";
} else {
    if (!RepositorioUsuario::cambiar_clave($conexion, $usuario->obtener_id(), $clave)){
        echo "Error al actualizar la clave";
    }
}


Conexion::cerrar_conexion();
<?php
include_once '../controles/Conexion.php';
include_once '../modelo/Usuario.obj.php';
include_once '../controles/Usuario.rep.php';
include_once '../controles/UsuarioSesion.php';

$email = filter_input(INPUT_POST, 'email');
$codigo = filter_input(INPUT_POST, 'codigo');

Conexion::abrir_conexion();
$conexion = Conexion::obtener_conexion();

$usuario = RepositorioUsuario::obtener_usuario_por_email($conexion, $email);

$resultado = RepositorioUsuario::activar_usuario($conexion, $email, $codigo);

if (!$resultado) {
  echo "Error al activar el usuario";
} 
  
Conexion::cerrar_conexion();

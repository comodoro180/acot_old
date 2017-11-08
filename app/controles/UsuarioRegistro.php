<?php

include_once '../controles/Conexion.php';
include_once '../modelo/Usuario.obj.php';
include_once '../controles/Usuario.rep.php';

$clave = password_hash(filter_input(INPUT_POST, 'clave1'),PASSWORD_DEFAULT);

$usuario = New Usuario('', filter_input(INPUT_POST, 'nombre'), filter_input(INPUT_POST, 'email'), $clave, '', 0);

Conexion::abrir_conexion();
$conexion = Conexion::obtener_conexion();

$nombre_existe = RepositorioUsuario::nombre_existe($conexion, $usuario->obtener_nombre());
$email_existe = RepositorioUsuario::email_existe($conexion, $usuario->obtener_email());

if ($nombre_existe) {
    echo 'El nombre de usuario ya existe';
} else if ($email_existe) {
    echo 'El email ya se encuentra registrado';
} else {
    RepositorioUsuario::insertar_usuario($conexion, $usuario);
    $usuario_insertado=RepositorioUsuario::obtener_usuario_por_email($conexion, $usuario->obtener_email());
    $codigo = RepositorioUsuario::insertar_codigo_activacion($conexion, $usuario_insertado->obtener_id());
    
    if (!isset($codigo)){        
        echo 'Transacción sin código de activación.';
        
    } else {
        $destinatario = $usuario->obtener_email();
        $asunto = "ACOT-Código de activación";
        $mensaje = "Gracias por registrarte! <br>"
                . "Ingresa el siguiente código para activar tu usuario<br><h2>".$codigo."</h2>";

        $exito = mail($destinatario, $asunto, $mensaje);

        if (!$exito) {
                echo 'envio fallido '.$codigo;
        }         
    }
}

Conexion::cerrar_conexion();






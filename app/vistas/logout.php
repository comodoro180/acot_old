<?php

include_once '../controles/UsuarioSesion.php';
include_once '../controles/Redireccion.php';
include_once '../conf/config.inc.php';

ControlSesion :: cerrar_sesion();
Redireccion :: redirigir(INICIO);

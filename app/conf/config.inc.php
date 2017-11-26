<?php
    
//info de la base de datos
define('NOMBRE_SERVIDOR', 'localhost');
define('NOMBRE_USUARIO', 'root');
define('PASSWORD', '');
define('NOMBRE_BD', 'acot');

//Rutas de la web
define('SERVIDOR','http://localhost:8080/acot/app');
define('INICIO',SERVIDOR.'/vistas/index.php');
define('REGISTRO_USUARIO',SERVIDOR.'/vistas/RegistroUsuario.php');
define('LOGIN',SERVIDOR.'/vistas/login.php');
define('LOGOUT',SERVIDOR.'/vistas/logout.php');
define('ACTIVAR_USUARIO',SERVIDOR.'/vistas/ActivarUsuario.php');
define('RECUPERAR_CLAVE',SERVIDOR.'/vistas/RecuperarClave.php');
define('CAMBIAR_CLAVE',SERVIDOR.'/vistas/CambiarClave.php');
define('ADMINISTRACION',SERVIDOR.'/vistas/administracion.php');
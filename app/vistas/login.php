<?php
include_once '../conf/config.inc.php';
include_once '../controles/Conexion.php';
include_once '../controles/Usuario.rep.php';
include_once '../controles/UsuarioSesion.php';
include_once '../controles/Redireccion.php';
$titulo = 'login';
include_once '../plantillas/encabezado.php';
include_once '../plantillas/menu.php';

if (ControlSesion::sesion_iniciada()){
    Redireccion::redirigir(INICIO);
}

?>

<div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-headig text-center">
          <h4>Ingresa tus datos</h4>
        </div>
        <div class="panel-body"> 
          <form id="formularioLogin" rol="form">                         
            <input id="email" type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <br>
            <input id="clave" type="password" name="clave" class="form-control" placeholder="Clave" required>
            <br>
            <button id="login" name="login" class="btn btn-primary btn-block">
              Iniciar sesión
            </button>
          </form>
          <br>
          <div class="text-center">
            <a href="<?php echo RECUPERAR_CLAVE; ?>">¿Olvidaste tu contraseña?</a>
          </div>
          <br>
          <div class="text-center">
            <a href="<?php echo ACTIVAR_USUARIO; ?>">Activar usuario</a>
          </div>           
        </div> 
        <div id="mensaje" class="hide" role="alert">           
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script> 
<script src="../js/ValidarLogin.js"></script>

<?php
include_once '../plantillas/pie.php';
?>
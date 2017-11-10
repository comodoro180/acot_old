<?php
include_once '../conf/config.inc.php';
include_once '../controles/Conexion.php';
include_once '../controles/Usuario.rep.php';
//include_once '../controles/UsuarioSesion.php';
//include_once '../controles/Redireccion.php';
$titulo = 'Recuperar clave';
include_once '../plantillas/encabezado.php';
include_once '../plantillas/menu.php';

if (isset($_POST['RecuperarClave'])){
    RepositorioUsuario::recuperar_clave($_POST['email']);
}

?>

<div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-headig text-center">
          <h4>Recuperar contraseña</h4>
        </div>
        <div class="panel-body"> 
          <form id="formularioRecuperarClave" rol="form" action="<?php $_SERVER['PHP_SELF']?>" method="POST">                        
            <input id="email" type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <br>
            <br>
            <button id="RecuperarClave" name="RecuperarClave" class="btn btn-primary btn-block">
              Enviar
            </button>
          </form>
          <br>
          <br>
<!--          <div class="text-center">
            <a href="<?php echo RECUPERAR_CLAVE; ?>">¿Olvidaste tu contraseña?</a>
          </div>          -->
        </div> 
        <div id="mensaje" class="hide" role="alert">           
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script> 
<!-- <script src="../js/ValidarActivacion.js"></script> -->
<?php
include_once '../plantillas/pie.php';
?>

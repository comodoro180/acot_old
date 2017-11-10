<?php
//include_once '../conf/config.inc.php';
//include_once '../controles/Conexion.php';
//include_once '../controles/Usuario.rep.php';
//include_once '../controles/UsuarioSesion.php';
//include_once '../controles/Redireccion.php';
$titulo = 'Activar usuario';
include_once '../plantillas/encabezado.php';
include_once '../plantillas/menu.php';

?>

<div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-headig text-center">
          <h4>Activación de usuarios</h4>
        </div>
        <div class="panel-body"> 
          <form id="formularioActivacion" rol="form">                         
            <input id="email" type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <br>
            <input id="codigo" type="text" name="codigo" class="form-control" placeholder="Código de activación" required>
            <br>
            <button id="activar" name="activar" class="btn btn-primary btn-block">
              Activar usuario
            </button>
          </form>
          <br>      
        </div> 
        <div id="mensaje" class="hide" role="alert">           
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script> 
<script src="../js/ValidarActivacion.js"></script>

<?php
include_once '../plantillas/pie.php';
?>


<?php
include_once '../conf/config.inc.php';
include_once '../controles/Conexion.php';
include_once '../controles/Usuario.rep.php';
$titulo = 'Registro';
include_once '../plantillas/encabezado.php';
include_once '../plantillas/menu.php';
?>

<div class="container">
  <div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h1 class="panel-title">Registro de usuarios</h1>
        </div>
        <div class="panel-body">
          <form id="FormularioUsuario" role="form">
            <div class="form-group">
              <label>Nombre:</label>
              <input id="nombre" type="text" class="form-control" name="nombre">
            </div>
            <div class="form-group">
              <label>Correo electrónico:</label>
              <input id="email" type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label>Contraseña:</label>
              <input id="clave1" type="password" class="form-control" name="clave1">
            </div>
            <div class="form-group">
              <label>Repite la contraseña:</label>
              <input id="clave2" type="password" class="form-control" name="clave2">
            </div>
            <div class="text-right">
              <button id="registrar" type="button" class="btn btn-primary" name="enviar" data-toggle="modal" data-target="#mesaje">
                Registrar
              </button>         
            </div>  
          </form>
        </div>
        <div id="resp" >            
        </div>        
      </div>
    </div>
    <div class="col-md-3"></div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mensaje" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 id="tituloMensaje" class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p id="textoMensaje"> </p>
      </div>
      <div id="mensajePie" class="modal-footer">
        <a id="enlaceActivar" href="<?php echo ACTIVAR_USUARIO ?>" class="btn btn-success pull-left" data-dismiss="modal">Activar usuario</a>
        <a id="enlaceInicio" href="<?php echo INICIO ?>" class="btn btn-primary" data-dismiss="modal">Volver al menu</a>
        <a id="enlaceMensaje" class="btn btn-primary">Cerrar</a>        
      </div>
    </div>      
  </div>
</div>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>     
<script src="../js/ValidarRegistroUsuario.js"></script>

<?php
include_once '../plantillas/pie.php';
?>

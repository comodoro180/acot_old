<?php
include_once '../conf/config.inc.php';
include_once '../controles/Usuario.rep.php';
include_once '../controles/Conexion.php';

$titulo = 'Cambiar clave';
include_once '../plantillas/encabezado.php';
include_once '../plantillas/menu.php';

//$codigo_valido=false;
//$mensaje='';

 if (isset($_POST['validarCodigo'])) {
     $email=$_POST['email'];
     $codigo=$_POST['codigo'];
     if (RepositorioUsuario::validar_codigo($email, $codigo)){
         $codigo_valido = true;
     }
 }
 
 if ($codigo_valido && isset($_POST['cambiarClave'])) {
     $clave1=$_POST['nuevaClave1'];
     $clave2=$_POST['nuevaClave2'];
     if ($clave1!==$clave2){
         $mensaje='Las claves deben coincidir';
     } else {
         $mensaje='ok';
     }
 }

?>

<div class="container">
  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <div class="panel panel-default">
        <div class="panel-headig text-center">
          <h4>Cambio de contraseña</h4>
        </div>
        <div class="panel-body"> 
          <form id="formularioCambioClave" rol="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST"> 
              <?php
              if (!$codigo_valido) {
                  ?>            
                <input id="email" type="email" name="email" class="form-control" placeholder="Email" required autofocus>
                <br>
                <input id="codigo" type="text" name="codigo" class="form-control" placeholder="Código" required> 
                <br>
                <button id="validarCodigo" name="validarCodigo" class="btn btn-primary btn-block">
                  Validar código
                </button>            
                <?php
            }
            ?>             
            <?php
            if ($codigo_valido) {
                ?>
                <input id="nuevaClave1" type="password" name="nuevaClave1" class="form-control" placeholder="Nueva clave" required> 
                <br>
                <input id="nuevaClave2" type="password" name="nuevaClave2" class="form-control" placeholder="Repite la nueva clave" required> 
                <br>  
                <button id="cambiarClave" name="cambiarClave" class="btn btn-primary btn-block">
                  Cambiar contraseña
                </button>                
                <?php
            }
            ?>
          </form>
          <br>       
        </div> 
        <?php
        if ($mensaje!='') {
            ?>
            <div id="mensaje" class="alert alert-success" role="alert"> 
              <?php echo "Error: ".$mensaje ?>
            </div>
            <?php
        } else { echo "Hola";}
        ?>        
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
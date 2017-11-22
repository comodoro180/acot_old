<?php
include_once '../conf/config.inc.php';
include_once '../controles/Usuario.rep.php';
include_once '../controles/Conexion.php';

$titulo = 'Cambiar clave';
include_once '../plantillas/encabezado.php';
include_once '../plantillas/menu.php';

$codigo_valido = false;
//$mensaje='';

if (isset($_POST['validarCodigo'])) {
    $email = $_POST['email'];
    $codigo = $_POST['codigo'];
    if (RepositorioUsuario::validar_codigo($email, $codigo)) {
        $codigo_valido = true;
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
                <input id="email" type="email" name="email" class="form-control" placeholder="Email" required value="<?php if (isset($_POST['validarCodigo'])) echo $email;?>">
                <br>
                <input id="codigo" type="text" name="codigo" class="form-control" placeholder="Código" required> 
                <br>
                <button id="validarCodigo" name="validarCodigo" class="btn btn-primary btn-block">
                  Validar código
                </button> 
                <?php
                if (isset($_POST['validarCodigo'])) {
                    ?>                 
                    <br>
                    <div id="mensaje1" class="alert alert-danger" role="alert"> 
                      Código no valido
                    </div>                  
                    <?php
                }
            }
            ?>             
            <?php
            if ($codigo_valido) {
                ?>
                <input id="email" type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email ?>" >
                <br>                
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
        <div id="mensaje" class="alert alert-success hide" role="alert">           
        </div>      
      </div>
    </div>
  </div>
</div>


<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script> 
<script src="../js/ValidarCambioClave.js"></script>
<?php
include_once '../plantillas/pie.php';
?>
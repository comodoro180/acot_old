<?php
include_once '../plantillas/encabezado.php';
include_once '../plantillas/menu.php';
?>
<div class="container-fluid">
  <div class="row">
    <!--Inicio menu lateral  -->
    <div class="col-sm-3">
      <div class="panel-group">
        <!--Geografica-->
        <div class="panel panel-default">          
          <div class="panel-heading">
            <h4 class="panel-title">              
              <a data-toggle="collapse" href="#Adm_geografica">Geográfica</a>
            </h4>
          </div>
          <div id="Adm_geografica" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item">One</li>
              <li class="list-group-item">Two</li>
              <li class="list-group-item">Three</li>
            </ul>
            <div class="panel-footer">Footer</div>
          </div>
        </div>
        <!--Fin Geografica-->
        <!--Usuarios-->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#Adm_usuarios">Usuarios</a>
            </h4>
          </div>
          <div id="Adm_usuarios" class="panel-collapse collapse">
            <ul class="list-group">
              <li class="list-group-item">One</li>
              <li class="list-group-item">Two</li>
              <li class="list-group-item">Three</li>
            </ul>
            <div class="panel-footer">Footer</div>
          </div>
        </div> 
        <!--fin usuarios-->
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" href="#Adm_prueba">Prueba</a>
            </h4>
          </div>
          <div id="Adm_prueba" class="panel-collapse collapse">

<!--              <div class="col-lg-offset-1"></div>-->
            <div class="panel-group">
              <div class="panel panel-default">          
                <div class="panel-heading">
                  <h4 class="panel-title">              
                    <a data-toggle="collapse" href="#Adm_prueba1">Prueba 1</a>
                  </h4>
                </div>
                <div id="Adm_prueba1" class="panel-collapse collapse">
                  <ul class="list-group">
                    <li class="list-group-item">One</li>
                    <li class="list-group-item">Two</li>
                    <li class="list-group-item">Three</li>
                  </ul>
                  <div class="panel-footer">Footer</div>
                </div>
              </div>
              <div class="panel panel-default">          
                <div class="panel-heading">
                  <h4 class="panel-title">              
                    <a data-toggle="collapse" href="#Adm_prueba2">Prueba 2</a>
                  </h4>
                </div>
                <div id="Adm_prueba2" class="panel-collapse collapse">
                  <ul class="list-group">
                    <li class="list-group-item">One</li>
                    <li class="list-group-item">Two</li>
                    <li class="list-group-item">Three</li>
                  </ul>
                  <div class="panel-footer">Footer</div>
                </div>
              </div>               
            </div>
        
          </div>
        </div>
        <!--        Fin prueba-->
      </div>   
    </div>
    <!--fin menu lateral   -->
    <div class="col-sm-9">

    </div>     
  </div>
</div>

<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script> 
<!--<script src="../js/ValidarLogin.js"></script>-->
<?php
include_once '../plantillas/pie.php';
?>



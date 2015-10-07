<?php include 'structure/navbar.php'; ?>

<div class="container">
  <h1 class="page-header">Edita tu perfil</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="structure/img/avatar.jpg" class="avatar img-circle img-thumbnail" alt="Foto">
              <div class="alert alert-warning">
                <i class="fa fa-folder-open"></i>
        Elige la foto desde tu equipo.
      </div>
        <input type="file" class="text-center center-block well well-sm">
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <div class="alert alert-info alert-dismissable">
        <a class="panel-close close" data-dismiss="alert">×</a> 
        <i class="fa fa-photo"></i>
        Tu foto debe ser tipo <strong>cédula de identidad</strong>, de lo contrario será eliminada.
      </div>
      <h3>Información personal</h3>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">Nombre:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Apellido paterno:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text">
          </div>
        </div>
          <div class="form-group">
          <label class="col-lg-3 control-label">Apellido materno:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Correo electrónico:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Pais:</label>
          <div class="col-lg-3">
            <div class="ui-select">
              <select id="pais" class="form-control">
                <option value="Chile">Chile</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Región:</label>
          <div class="col-lg-3">
            <div class="ui-select">
              <select id="region" class="form-control">
              <?php
              require 'include/conexion.php';
              $query = "SELECT * FROM region";
              $resultado = $mysqli->query($query);
              while ($rows = $resultado->fetch_assoc()) {
                print("<option value='".$rows['REGION_ID']."'>".$rows['REGION_NOMBRE']."</option>");
              }
              ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Ciudad:</label>
          <div class="col-lg-3">
            <div class="ui-select">
              <select id="ciudad" class="form-control">
                <option value="0">Seleccione ciudad...</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Skype:</label>
          <div class="col-md-8">
            <input class="form-control" value="" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Contraseña:</label>
          <div class="col-md-8">
            <input class="form-control" value="" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Confirmar contraseña:</label>
          <div class="col-md-8">
            <input class="form-control" value="" type="password">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label"></label>
          <div class="col-md-8">
            <input class="btn btn-primary" value="Guardar cambios" type="button">
            <span></span>
            <input class="btn btn-default" value="Cancelar" type="reset">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  <script src="structure/jquery/jquery-1.11.3.min.js"></script>
<script src="structure/js/jquery-perfiles.js"></script>
<?php include 'structure/footer.php';?>
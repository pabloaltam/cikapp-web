<?php include 'structure/navbarFinSession.php'; ?>

<div class="container">
  <h1 class="page-header">Mi empresa</h1>
  <div class="row">
    <!-- left column -->
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="structure/img/avatar.jpg" class="avatar img-circle img-thumbnail" alt="Foto">
              <div class="alert alert-warning">
                <i class="fa fa-folder-open"></i>
        Elige el logo desde tu equipo.
      </div>
        <input type="file" class="text-center center-block well well-sm">
      </div>
    </div>
    <!-- edit form column -->
    <div class="col-md-8 col-sm-6 col-xs-12 personal-info">
      <h3>Información de la empresa</h3>
      <form class="form-horizontal" role="form">
        <div class="form-group">
          <label class="col-lg-3 control-label">Rut:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text">
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Razón social:</label>
          <div class="col-lg-8">
            <input class="form-control" value="" type="text">
          </div>
        </div>
          <div class="form-group">
          <label class="col-lg-3 control-label">Rubro:</label>
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
              <select id="pais" class="form-control">
                <option value="Chile">IX Región</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Ciudad:</label>
          <div class="col-lg-3">
            <div class="ui-select">
              <select id="pais" class="form-control">
                <option value="Chile">Temuco</option>
              </select>
            </div>
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

<?php include 'structure/footer.php';?>
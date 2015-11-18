<?php include 'structure/navbarFinSession.php'; ?>
<div class="container">
  <div class="row">
    <div class="col-md-8 col-xs-10">
      <div class="well panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-xs-12 col-sm-4 text-center">
              <img src="http://api.randomuser.me/portraits/women/21.jpg" alt="" class="center-block img-circle img-thumbnail img-responsive">
              <ul class="list-inline ratings text-center" title="Ratings">
                <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
                <li><a href="#"><span class="fa fa-star fa-lg"></span></a></li>
              </ul>
            </div>
            <!--/col-->
            <div class="col-xs-12 col-sm-8">
              <h2><?php echo $_SESSION['nombre']." " .$_SESSION['apellido']." " .$_SESSION['apellidoM']?></h2>
              <p><strong>Correo electrónico </strong> <?php echo $_SESSION['email'];?></p>
              <p><strong>Ubicación </strong> 
                  <?php
                                    require 'include/conexion.php';
                                    $query = "SELECT a.COMUNA_NOMBRE, c.REGION_NOMBRE, d.PAIS_NOMBRE FROM comuna a, provincia b, region c, pais d where a.COMUNA_PROVINCIA_ID=b.PROVINCIA_ID and b.PROVINCIA_REGION_ID=c.REGION_ID and c.REGION_PAIS_ID=d.PAIS_ID and a.COMUNA_ID={$_SESSION['COMUNA_ID']};";
                                    $resultado = $mysqli->query($query);
                                    while ($rows = $resultado->fetch_assoc()) {
                                        print($rows['COMUNA_NOMBRE'] . ", ".$rows['REGION_NOMBRE'] . ", ".$rows['PAIS_NOMBRE']);
                                    }
                                    ?></p>
              <p>Skype <strong>Usuario </strong>
                <span class="label label-info tags">campo1</span>
                <span class="label label-info tags">campo2</span>
              </p>
            </div>
            <!--/col-->
            <div class="clearfix"></div>
            <div class="col-xs-12 col-sm-4">
              <h2><strong> 20,7K </strong></h2>
              <p><small>Followers</small></p>
              <button class="btn btn-success btn-block"><span class="fa fa-plus-circle"></span> Follow </button>
            </div>
            <!--/col-->
            <div class="col-xs-12 col-sm-4">
              <h2><strong>245</strong></h2>
              <p><small>Following</small></p>
              <button class="btn btn-info btn-block"><span class="fa fa-user"></span> View Profile </button>
            </div>
            <!--/col-->
            <div class="col-xs-12 col-sm-4">
              <h2><strong>43</strong></h2>
              <p><small>Snippets</small></p>
              <button type="button" class="btn btn-primary btn-block"><span class="fa fa-gear"></span> Options </button>
            </div>
            <!--/col-->
          </div>
          <!--/row-->
        </div>
        <!--/panel-body-->
      </div>
      <!--/panel-->
    </div>
    <!--/col-->
  </div>
  <!--/row-->
</div>
<!--/container-->
<?php include 'structure/footer.php';?>

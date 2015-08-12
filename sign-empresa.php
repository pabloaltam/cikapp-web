<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cikapp - Inicio de sesión</title>
    </head>

    <body>

        <?php include 'structure/navbar.php'; ?>


        <div class="container sign-in-up">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <br>
      <!-- Nav tabs -->
      <div class="text-center">
        <div class="btn-group">
          <a href="#new" role="tab" data-toggle="tab" class="big btn btn-primary"><i class="fa fa-plus"></i> Nueva empresa</a>
          <a href="#user" role="tab" data-toggle="tab" class="big btn btn-danger"><i class="fa fa-user"></i> Tenemos una cuenta</a>
        </div>
      </div>
      <p class="click2select">Presiona para elegir</p>
      <div class="tab-content">
        <div class="tab-pane fade in active" id="new">
          <br>
          <fieldset>
            <div class="form-group">
              <div class="right-inner-addon">
                <i class="fa fa-envelope"></i>
                <input class="form-control input-lg" placeholder="Rut" type="text">
              </div>
            </div>
            <div class="form-group">
              <div class="right-inner-addon">
                <i class="fa fa-envelope"></i>
                <input class="form-control input-lg" placeholder="Correo electrónico" type="text">
              </div>
            </div>
            <div class="form-group">
              <div class="right-inner-addon">
                <i class="fa fa-key"></i>
                <input class="form-control input-lg" placeholder="Contraseña" type="password">
              </div>
            </div>
            <div class="form-group">
              <div class="right-inner-addon">
                <i class="fa fa-key"></i>
                <input class="form-control input-lg" placeholder="Confirmar contraseña" id="" type="password">
              </div>
            </div>
          </fieldset>
          <hr>

          <div class="tab-content">
            <div class="tab-pane fade in active text-center" id="pp">
              <button class="btn btn-primary btn-lg btn-block">Registrar empresa</button>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="user">
          <br>
          <fieldset>
            <div class="form-group">
              <div class="right-inner-addon">
                <i class="fa fa-envelope"></i>
                <input class="form-control input-lg" placeholder="Rut" type="text">
              </div>
            </div>
            <div class="form-group">
              <div class="right-inner-addon">
                <i class="fa fa-key"></i>
                <input class="form-control input-lg" placeholder="Contraseña" type="password">
              </div>
            </div>
          </fieldset>
          <br>
          <div class=" text-center">
            <button class="btn btn-primary">Entrar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php include 'structure/footer.php'; ?>
        <script src="structure/js/jquery.Rut.min.js"></script>
        <script src="structure/js/login.js"></script>
    </body>
</html>
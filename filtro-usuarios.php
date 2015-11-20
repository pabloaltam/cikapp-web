<?php include 'structure/navbarFinSession.php'; ?>


<div class="container sign-in-up">
    <div class="row">
        <div class="col-md-4">
            <br>
            <!-- Nav tabs -->
            <div class="text-center">
                <h3>Filtro de postulantes</h3>
            </div>
            <br />
            <form action="" method="POST" autocomplete="off" name="frmIdentificarme" id="frmIdentificarme">
                <fieldset>
                    <div class="form-group">
                        <input type="checkbox" class="" id="conocimientos">
                        <label for="conocimientos"> Conocimientos</label>
                        <br>
                        <div>
                            <input id="txtConocimientos" type="text" class="conocimientos form-control" name="conocimientos" disabled>
                        <br>
                        <input type="checkbox" class="" id="estudios">
                        <label for="estudios">Estudios</label>
                        <br>
                        <input id="txtEstudios" type="text" class="form-control" name="estudios" disabled>
                        <br>
                        <input type="checkbox" class="" id="nivIngles">
                        <label for="nivIngles">Nivel de Ingles</label>
                        <br>
                        <input id="txtNivIngles"type="text" class="form-control" name="nivIngles" disabled>
                        <br>
                        <input type="checkbox" class="" id="region">
                        <label for="region">Region</label>
                        <br>
                        <input id="txtRegion" type="text" class="form-control" name="region" disabled>
                        <br>
                        <input type="checkbox" class="" id="ciudad">
                        <label for="ciudad">Ciudad</label>
                        <br>
                        <input id="txtCiudad" type="text" class="form-control" name="ciudad" disabled>
                        <br>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="col-md-7 col-md-offset-1">
            <div class="scroll" id="scroll">
        </div>
        </div>
    </div>
</div>



<?php include 'structure/footer.php'; ?>
<script src="structure/js/jquery.Rut.min.js"></script>
<script src="structure/js/filtro.js"></script>
<script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>


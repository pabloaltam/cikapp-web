<?php include 'structure/navbar.php'; 
ini_set("display_errors",1);
?>
<div id="top-nav" class="navbar navbar-inverse navbar-static-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-toggle"></span>
      </button>
      <a class="navbar-brand" href="#">Control Panel</a>
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        
        <li class="dropdown">
          <a class="dropdown-toggle" role="button" data-toggle="dropdown" href="#">
            <i class="glyphicon glyphicon-user"></i> Mi Empresa <span class="caret"></span></a>
          <ul id="g-account-menu" class="dropdown-menu" role="menu">
              <li><a href="edit-enterprise-profile.php">Mi Perfil</a></li>
            <li><a href="#"><i class="glyphicon glyphicon-lock"></i> Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div><!-- /container -->
</div>
<!-- /Header -->

<!-- Main -->
<div class="container">
  
  <!-- upper section -->
  <div class="row">
	<div class="col-sm-3">
      <!-- left -->
      <h3><i class="glyphicon glyphicon-briefcase"></i> Tareas</h3>
      <hr>
      
      <ul class="nav nav-stacked">
        <li><a href="#"><i class="glyphicon glyphicon-flash"></i> Notificaciones</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-link"></i> Enlaces</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-eye-open"></i> Seguidos</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-plus"></i> Más..</a></li>
      </ul>
      
      <hr>
      
  	</div><!-- /span-3 -->
    <div class="col-sm-9">
      	
      <!-- column 2 -->	
       <h3><i class="glyphicon glyphicon-dashboard"></i> Escritorio</h3>  
            
       <hr>
      
	   <div class="row">
            <!-- center left-->	
         	<div class="col-md-7">
			  <div class="well">Mensajes <span class="badge pull-right">3</span></div>
              
              <hr>
              
              <div class="panel panel-default">
                  <div class="panel-heading"><h4>Estado de las postulaciones</h4></div>
                  <div class="panel-body">
                    
                    <small>Completadas</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%">
                        <span class="sr-only">72%</span>
                      </div>
                    </div>
                    <small>En progreso</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        <span class="sr-only">20%</span>
                      </div>
                    </div>
                    <small>Sin postulantes</small>
                    <div class="progress">
                      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        <span class="sr-only">80%</span>
                      </div>
                    </div>

                  </div><!--/panel-body-->
              </div><!--/panel-->                     
              
          	</div><!--/col-->
         
            <!--center-right-->
        	<div class="col-md-5">
              
                <ul class="nav nav-justified">
         			<li><a href="#"><i class="glyphicon glyphicon-cog"></i></a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-heart"></i></a></li>
         			<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-comment"></i><span class="count">3</span></a><ul class="dropdown-menu" role="menu"><li><a href="#">1. Quiero saber de que se trata..</a></li><li><a href="#">2. Cuanto pagan en promedio..</a></li><li><a href="#"><strong>Todos los mensajes</strong></a></li></ul></li>
         			<li><a href="#"><i class="glyphicon glyphicon-user"></i></a></li>
         			<li><a title="Add Widget" data-toggle="modal" href="#addWidgetModal"><span class="glyphicon glyphicon-plus-sign"></span></a></li>
       			</ul>  
              
                <hr>
              
				<p>
                  Resumen
                </p>
                		<p>
                  detallado
                </p>
                <hr>
              
                <div class="btn-group btn-group-justified">
                  <a href="#" class="btn btn-info col-sm-3">
                    <i class="glyphicon glyphicon-usd"></i><br>
                    Valores
                  </a>
                  <a href="#" class="btn btn-info col-sm-3">
                    <i class="glyphicon glyphicon-stats"></i><br>
                    Reporte
                  </a>
                  <a href="#" class="btn btn-info col-sm-3">
                    <i class="glyphicon glyphicon-calendar"></i><br>
                    Agenda
                  </a>
                  <a href="#" class="btn btn-info col-sm-3">
                    <i class="glyphicon glyphicon-question-sign"></i><br>
                    Ayuda
                  </a>
                </div>
              
			</div><!--/col-span-6-->
     
       </div><!--/row-->
  	</div><!--/col-span-9-->
    
  </div><!--/row-->
  <!-- /upper section -->
  
  <!-- lower section -->
  <div class="row">
    
    <div class="col-md-12">
      <hr>
      <a href="#"><strong><i class="glyphicon glyphicon-list-alt"></i> Personas que coinciden</strong></a>  
    </div>
    <div class="col-md-8">
      
      <table class="table table-striped">
        <thead>
          <tr><th>Edad</th><th>Sexo</th><th>Recomendado</th><th>Descripcion</th></tr>
        </thead>
        <tbody>
         <tr><td>45</td><td>M</td><td>SI</td><td><a href="#">Experto en PHP y SQL</a></td></tr>
         <tr><td>29</td><td>F</td><td>NO</td><td><a href="#">Diseñador Bootstap</a></td></tr>
         <tr><td>18</td><td>F</td><td>SI</td><td><a href="#">Especialista en Redes Sociales</a></td></tr>
         <tr><td>34</td><td>M</td><td>NO</td><td><a href="#">Master en SEO</a></td></tr>
         
        </tbody>
      </table>
      
      <hr>              
      
      <div class="panel panel-default">
        <div class="panel-heading"><h4>Ultimos Avisos</h4></div>
        <div class="panel-body">
          <div class="list-group">
            <a href="#" class="list-group-item active">Administrador de Servidor..</a>
            <a href="#" class="list-group-item">Diseñador Web..</a>
            <a href="#" class="list-group-item">Publicista en Redes Sociales..</a>
          </div>
        </div>
      </div>
      
      <hr>
      
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
        Recuerda <a href="#">Cerrar Sesion</a> al terminar.
      </div>

    
    </div>
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-title">
            <i class="glyphicon glyphicon-wrench pull-right"></i>
            <h4>Publicar Aviso</h4>
          </div>
        </div>
        <div class="panel-body">
          
    <!-- FORMULARIO -->
			
			
<form class="form form-vertical" action="publicaciones.php" method="get">
	<div class="control-group">
		<label>Nombre del Cargo</label>
		<div class="controls">
			<input type="text" name="nombreCargo" class="form-control" placeholder="Nombre Puesto o Cargo del Trabajo">
		</div>
	</div>
	
	<div class="control-group">
		<label>Lugar del trabajo</label>
		<div class="controls">
			<input type="text" name="lugarTrabajo" class="form-control" placeholder="Lugar del Trabajo">
		</div>
	</div>
	
	<div class="control-group">
	<label>Tipo de Contrato</label>
	<div class="controls">
		<input type="text" name="tipoContrato" class="form-control" placeholder="Tipo del Contrato del Trabajo">
	</div>
	
	<div class="control-group">
		<label>Tipo de Jornada Laboral</label>
		<div class="controls">
			<input type="text" name="tipoJornadaLaboral" class="form-control" placeholder="Tipo de Jornada Laboral del Trabajo">
		</div>
	</div>
		
		<div class="control-group">
			<label>Fecha de Inicio</label>
			<div class="controls">
				<input type="date" class="form-control" name="fechaInicio" step="1" min="<?php echo date("Y-m-d");?>" max="2015-12-31" value="<?php echo date("Y-m-d");?>">
			</div>
		</div>      
            <div class="control-group">
              <label>Publicación</label>
              <div class="controls">
                <textarea name="publicacion" class="form-control" placeholder="Descripcion breve y funciones"></textarea>
              </div>
            </div> 

            <div class="control-group">
              <label>Tipo del Plan de Publicacion</label>
              <div class="controls">
                <select name="tipoPublicacion" class="form-control"><option>A</option></option><option>AA</option><option>AAA</option><option>Nicho</option></select>
              </div>
            </div>    

             <div class="control-group">
              <label>Confirmar Contraseña</label>
              <div class="controls">
                <input type="password" name="pass" class="form-control" placeholder="Clave">
                
              </div>

            <div class="control-group">
              <label></label>
              <div class="controls">
              <input type="hidden" name="rut" value="11111111-1"/>
                <button type="submit" class="btn btn-primary">
                  Publicar
                </button>
              </div>

            </div>   
            
          </form>
			
			
			
	<!-- FORMULARIO -->

          
        </div><!--/panel content-->
      </div><!--/panel-->
      
     
    </div><!--/col-->
    
  </div><!--/row-->
  
</div><!--/container-->
<!-- /Main -->

<?php include 'structure/footer.php';?>

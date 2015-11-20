<?php 
ini_set("display_errors",1);
include 'structure/navbar.php';
require('publicacion.class.php');
$obj_publicacion = new publicacion();

if ($_GET['accion']=='editar'){
  $var_publicacion=$obj_publicacion ->obtieneUnaPublicacion($_GET['id'],'11111111-1');
?>
<!-- FORMULARIO -->
<div class="container">
<form class="form-horizontal" action="publicaciones.php" method="get">
	<div class="control-group">
		<label>Nombre del Cargo</label>
		<div class="controls">
			<input type="text" name="nombreCargo" value="<?php echo $var_publicacion[0][1];?>" class="form-control" placeholder="Nombre Puesto o Cargo del Trabajo">
		</div>
	</div>
	
	<div class="control-group">
		<label>Lugar del trabajo</label>
		<div class="controls">
			<input type="text" name="lugarTrabajo" value="<?php echo $var_publicacion[0][2];?>" class="form-control" placeholder="Lugar del Trabajo">
		</div>
	</div>
	
	<div class="control-group">
	<label>Tipo de Contrato</label>
	<div class="controls">
		<input type="text" name="tipoContrato" value="<?php echo $var_publicacion[0][3];?>" class="form-control" placeholder="Tipo del Contrato del Trabajo">
	</div>
	
	<div class="control-group">
		<label>Tipo de Jornada Laboral</label>
		<div class="controls">
			<input type="text" name="tipoJornadaLaboral" value="<?php echo $var_publicacion[0][4];?>" class="form-control" placeholder="Tipo de Jornada Laboral del Trabajo">
		</div>
	</div>
		
		<div class="control-group">
			<label>Fecha de Inicio</label>
			<div class="controls">
				<input type="date" class="form-control" value="<?php echo substr($var_publicacion[0][5],0,10);?>" name="fechaInicio">
			</div>
		</div>      
            <div class="control-group">
              <label>Publicación</label>
              <div class="controls">
                <textarea name="publicacion" class="form-control" placeholder="Descripcion breve y funciones"><?php echo $var_publicacion[0][6];?></textarea>
              </div>
            </div> 

            <div class="control-group">
              <label>Tipo del Plan de Publicacion</label>
              <div class="controls">
                <?php if($var_publicacion[0][7]=='A'){ ?>
                <select name="tipoPublicacion" value="<?php echo $var_publicacion[0][7];?>" class="form-control"><option selected>A</option></option><option>AA</option><option>AAA</option><option>Nicho</option></select>
               <?php }
                else if($var_publicacion[0][7]=='AA'){?>
                <select name="tipoPublicacion" value="<?php echo $var_publicacion[0][7];?>" class="form-control"><option>A</option></option><option selected>AA</option><option>AAA</option><option>Nicho</option></select>
               <?php }
                else if($var_publicacion[0][7]=='AAA'){?>
                <select name="tipoPublicacion" value="<?php echo $var_publicacion[0][7];?>" class="form-control"><option>A</option></option><option>AA</option><option selected>AAA</option><option>Nicho</option></select>
               <?php }
                else {?>
                <select name="tipoPublicacion" value="<?php echo $var_publicacion[0][7];?>" class="form-control"><option>A</option></option><option>AA</option><option>AAA</option><option selected>Nicho</option></select>
               <?php }
                ?>
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
              <input type="hidden" name="id" value="<?php echo $var_publicacion[0][0];?>"/>
              <input type="hidden" name="accion" value="actualizar"/>
              <input type="hidden" name="rut" value="11111111-1"/>
                <button type="submit" class="btn btn-primary">
                  Actualizar
                </button>
              </div>

            </div>   
            
          </form>
			
		</div>	
			
	<!-- FORMULARIO -->



<?php
 
}

else if ($_GET['accion']=='eliminar'){
  try{$obj_publicacion ->eliminarPublicacion($_GET['id'],'11111111-1');} catch(Exception $e){ echo "Se ha producido un error : ".$e->getMessage();}
  echo "La Publicacion ".$_GET['id']." ha sido eliminada";
  
}

else if ($_GET['accion']=='agregar'){
//VARIABLES PARA AGREGAR PUBLICACION
if (isset($_GET["publicacion"])){
$rut = $_GET['rut'];
$nombreCargo=$_GET["nombreCargo"];
$lugarTrabajo=$_GET["lugarTrabajo"];
$tipoContrato=$_GET["tipoContrato"];
$tipoJornadaLaboral=$_GET["tipoJornadaLaboral"];
$fechaInicio=$_GET["fechaInicio"];
$publicacion=$_GET["publicacion"];
$tipoPublicacion=$_GET["tipoPublicacion"];
$pass=$_GET["pass"];
}

if (!isset($publicacion) || trim($publicacion)===''){

} else {
try{$obj_publicacion ->agregarPublicacion($rut,$nombreCargo,$lugarTrabajo,$tipoContrato,$tipoJornadaLaboral,$fechaInicio,$publicacion,$tipoPublicacion);} catch(Exception $e){ echo "Se ha producido un error : ".$e->getMessage();}
}
}

else if ($_GET['accion']=='actualizar'){
  
//VARIABLES PARA ACTUALIZAR PUBLICACION
if (isset($_GET["publicacion"])){
$id = $_GET['id'];
$rut = $_GET['rut'];
$nombreCargo=$_GET["nombreCargo"];
$lugarTrabajo=$_GET["lugarTrabajo"];
$tipoContrato=$_GET["tipoContrato"];
$tipoJornadaLaboral=$_GET["tipoJornadaLaboral"];
$fechaInicio=$_GET["fechaInicio"];
$publicacion=$_GET["publicacion"];
$tipoPublicacion=$_GET["tipoPublicacion"];
$pass=$_GET["pass"];
}

if (!isset($publicacion) || trim($publicacion)===''){

} else {
  echo "Publicacion Actualizada";
try{$obj_publicacion ->editaPublicacion($id,$rut,$nombreCargo,$lugarTrabajo,$tipoContrato,$tipoJornadaLaboral,$fechaInicio,$publicacion,$tipoPublicacion);} catch(Exception $e){ echo "Se ha producido un error : ".$e->getMessage();}
}
}


//GENERAR LISTA DE PUBLICACIONES
?>
<div class="container">
  <h2>Últimas Publicaciones</h2>
  <p>Listado de todas las publicaciones realizadas hasta la fecha:</p>            
  <table class="table table-striped table-bordered table-hover">
    <thead>
  <tr>
    <th>ID</th>
    <th>CARGO</th> 
    <th>LUGAR DE TRABAJO</th>
    <th>CONTRATO</th>
    <th>JORNADA LABORAL</th>
    <th>FECHA INICIO</th>
    <th>DESCRIPCION</th>
    <th>TIPO</th>
    <th>PUBLICADO EL</th>
    <th>ACCIONES</th>
  </tr>
  </thead>
    <tbody>
<?php 
$var_publicaciones=$obj_publicacion ->obtienePublicacionesUsuario("11111111-1");
$var_cantidad_publicaciones=count($var_publicaciones);?>
<?php for($j=0;$j<$var_cantidad_publicaciones;$j++){?>
  <tr>
<td><?php echo $var_publicaciones[$j][0];?></td>
<td><?php echo $var_publicaciones[$j][1];?></td>
<td><?php echo $var_publicaciones[$j][2];?></td>
<td><?php echo $var_publicaciones[$j][3];?></td>
<td><?php echo $var_publicaciones[$j][4];?></td>
<td><?php echo $var_publicaciones[$j][5];?></td>
<td><?php echo $var_publicaciones[$j][6];?></td>
<td><?php echo $var_publicaciones[$j][7];?></td>
<td><?php echo $var_publicaciones[$j][8];?></td>
<td><a href="publicaciones.php?accion=editar&id=<?php echo $var_publicaciones[$j][0];?>"><input type="button" style="-moz-border-radius: 2px;border-radius:2px;color: green;" value="Editar"> </a>&nbsp;<a onclick="return confirm('Esta seguro de eliminar la Publicacion <?php echo $var_publicaciones[$j][0];?>?');" href="publicaciones.php?accion=eliminar&id=<?php echo $var_publicaciones[$j][0];?>"><input type="button" style="-moz-border-radius: 2px;border-radius:2px;color: red;" value="Eliminar"> </a></td>
</tr>
<?php };?>
    </tbody>
  </table>
</div>

<?php include 'structure/footer.php'; ?>
        <script src="structure/js/jquery.Rut.min.js"></script>
        <script src="structure/js/login.js"></script>

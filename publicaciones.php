<?php 
ini_set("display_errors",1);
include 'structure/navbar.php';
require('publicacion.class.php');
$obj_publicacion = new publicacion();

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
<td><a href="publicaciones.php?editar=<?php echo $var_publicaciones[$j][0];?>"><input type="button" style="-moz-border-radius: 2px;border-radius:2px;color: green;" value="Editar"> </a>&nbsp;<a onclick="return confirm('Esta seguro de eliminar la Publicacion <?php echo $var_publicaciones[$j][0];?>?');" href="publicaciones.php?borrar=<?php echo $var_publicaciones[$j][0];?>"><input type="button" style="-moz-border-radius: 2px;border-radius:2px;color: red;" value="Eliminar"> </a></td>
</tr>
<?php };?>
    </tbody>
  </table>
</div>

<?php include 'structure/footer.php'; ?>
        <script src="structure/js/jquery.Rut.min.js"></script>
        <script src="structure/js/login.js"></script>

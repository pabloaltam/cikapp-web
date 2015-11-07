<?php 
ini_set("display_errors",0);
require('publicacion.class.php');
$rut = $_GET['rut'];
$nombreCargo=$_GET["nombreCargo"];
$lugarTrabajo=$_GET["lugarTrabajo"];
$tipoContrato=$_GET["tipoContrato"];
$tipoJornadaLaboral=$_GET["tipoJornadaLaboral"];
$fechaInicio=$_GET["fechaInicio"];
$publicacion=$_GET["publicacion"];
$tipoPublicacion=$_GET["tipoPublicacion"];
$pass=$_GET["pass"];

if (!isset($publicacion) || trim($publicacion)===''){ echo "Debe escribir un descripcion de la publicacion";} 
$obj_publicacion = new publicacion();
try{
$obj_publicacion ->agregarPublicacion($rut,$nombreCargo,$lugarTrabajo,$tipoContrato,$tipoJornadaLaboral,$fechaInicio,$publicacion,$tipoPublicacion);} catch(Exception $e){
 echo "Se ha producido un error : ".$e->getMessage();
}

?>
<table style="width:100%">
  <tr>
    <th>ID</th>
    <th>CARGO</th> 
    <th>LUGAR DE TRABAJO</th>
    <th>TIPO DE CONTRATO</th>
    <th>JORNADA LABORAL</th>
    <th>FECHA INICIO</th>
    <th>PUBLICACION</th>
    <th>TIPO DE PUBLICACION</th>
    <th>PUBLICADO EL DIA</th>
  </tr>
<?php 
$var_publicaciones=$obj_publicacion ->obtienePublicacionesUsuario($rut);
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
  </tr>
<?php };?>
</table>

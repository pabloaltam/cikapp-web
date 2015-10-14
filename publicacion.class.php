<?php 
class publicacion
{
function obtienePublicacionesUsuario($rut){
	include("mysql.inc.php");
	$consulta_publicaciones ="select id,fecha,tipo,publicacion,cargo from publicaciones
	where
	rut='$rut' order by fecha desc";
	$resultado = $mysqli->query($consulta_publicaciones);
	$i=0;
	while($fila = $resultado->fetch_assoc()){
			
    $arreglo[$i]=array($fila['id'],$fila['fecha'],$fila['tipo'],$fila['cargo'],$fila['publicacion']);
	$i++;
}
		return $arreglo;
}
function agregarPublicacion($rut,$tipo,$publicacion,$cargo){	 
	include("mysql.inc.php");
    $agrega_publicacion = "insert into publicaciones(rut,tipo,publicacion,cargo)
	values('$rut','$tipo','$publicacion','$cargo')";
	$resultado = $mysqli->query($agrega_publicacion);
	$mysqli->close();
}

}
?>
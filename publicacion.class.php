	<?php 
// id,rut,cargo,lugar_trabajo,tipo_contrato,tipo_jornada,fecha_inicio,tipo_publicacion,publicacion,fecha_publicacion
	class publicacion
	{

		function obtienePublicacionesUsuario($rut){
		include("include/conexion.php");
		$consulta_publicaciones ="select id,fecha,tipo_publicacion,publicacion,cargo from publicaciones
		where
		rut='$rut' order by fecha desc";
		$resultado = $mysqli->query($consulta_publicaciones);
		$i=0;
		while($fila = $resultado->fetch_assoc()){
		$arreglo[$i]=array($fila['id'],$fila['fecha_publicacion'],$fila['tipo'],$fila['cargo'],$fila['publicacion']);
		$i++;
		}
			return $arreglo;
		}
	function agregarPublicacion($rut,$cargo,$lugar_trabajo,$tipo_contrato,$tipo_jornada,$fecha_inicio,$tipo_publicacion,$publicacion){	 
		include("include/conexion.php");
		$agrega_publicacion = "insert into publicaciones(rut,cargo,lugar_trabajo,tipo_contrato,tipo_jornada,fecha_inicio,tipo_publicacion,publicacion)
		values('$rut','$cargo','$lugar_trabajo','$tipo_contrato','$tipo_jornada','$fecha_inicio','$tipo_publicacion','$publicacion')";
		$resultado = $mysqli->query($agrega_publicacion);
		$mysqli->close();
	}

	}
	?>
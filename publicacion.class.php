<?php 
// id,rut,cargo,lugar_trabajo,tipo_contrato,tipo_jornada,fecha_inicio,publicacion,tipo_publicacion,fecha_publicacion
	class publicacion
	{
		
		function obtienePublicacionesUsuario($rut){
		include("include/conexion.php");
		$rut="11111111-1";
		$consulta_publicaciones ="SELECT * FROM publicaciones WHERE rut='$rut' ORDER BY fecha_publicacion DESC";
		$resultado = $mysqli->query($consulta_publicaciones);
		$i=0;
		while($fila = $resultado->fetch_assoc()){
		$arreglo[$i]=array($fila['id'],$fila['cargo'],$fila['lugar_trabajo'],$fila['tipo_contrato'],$fila['tipo_jornada'],$fila['fecha_inicio'],$fila['publicacion'],$fila['tipo_publicacion'],$fila['fecha_publicacion'] );
		$i++;
		}
			return $arreglo;
		}
	function agregarPublicacion($rut,$cargo,$lugar_trabajo,$tipo_contrato,$tipo_jornada,$fecha_inicio,$publicacion,$tipo_publicacion){	 
		include("include/conexion.php");
		$hora= date("Y-m-d H:i:s");    
		$agrega_publicacion = "insert into publicaciones(rut,cargo,lugar_trabajo,tipo_contrato,tipo_jornada,fecha_inicio,publicacion,tipo_publicacion,fecha_publicacion)
		values('$rut','$cargo','$lugar_trabajo','$tipo_contrato','$tipo_jornada','$fecha_inicio','$publicacion','$tipo_publicacion','$hora')";
		$resultado = $mysqli->query($agrega_publicacion);
		$mysqli->close();
	}

	}
	?>

<!doctype html>
<html lang="es">
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">		
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<title>Cikapp mensajes</title>
	</head>
	<body>
		<div  class="container-fluid">
			<section  style="padding: 5%;">			
				<div class="row">				
					<h1 class="text-center">Sistema de mensajería<small></small></h1>	
					<hr>
				</div>	
				<div class="row">
					<form method="post" id="formChat" role="form">
						<div class="form-group">
						<?php
						session_start();
						$mi_id = $_SESSION['idUsuario'];
						$usuario = $_GET['usuario'];
						$random_number = rand();
						
						if(isset($_POST['message']) && !empty($_POST['message'])) {
							 include("include/conexion.php");
							 $mensaje = $_POST['message'];
							 $revisar_conversacion = "SELECT `hash` FROM `grupo_mensajes` WHERE (`usuario_uno`='$mi_id' AND `usuario_dos`='$usuario') OR (`usuario_uno`='$usuario' AND `usuario_dos`='$mi_id')";
                             $resultado = $mysqli->query($revisar_conversacion);
                             $row_cnt = mysqli_num_rows($resultado);
                             echo "<p>$row_cnt</p>";
                                                                                  
                                 if($row_cnt == 1){
                                                    
                             } else {
                             $iniciar_conversacion = "INSERT INTO `grupo_mensajes` VALUES ('$mi_id', '$usuario','$random_number')";
                             $guardar_mensaje = "INSERT INTO `mensajes` VALUES ('', '$random_number', '$mi_id', '$mensaje')";
                                                
                             $resultado = $mysqli->query($iniciar_conversacion);
                             $resultado = $mysqli->query($guardar_mensaje);                                   
                             }
						}
						$id = $_GET['usuario'];
                        include("include/conexion.php");
        				$consulta_usuarios ="SELECT * FROM usuario WHERE idUsuario = '$id' ";
        				$resultado = $mysqli->query($consulta_usuarios);
                        while ($rows = $resultado->fetch_assoc()) {
                                    $nombre = $rows['nombre'];
                                    $apellido = $rows['apellido'];
                                    $apellidoM = $rows['apellidoM'];
                                    $idUsuario = $rows['idUsuario'];
                                }
                        
						?>

							<p class="help-block">Enviar mensaje a</p>
							<input type="text" class="form-control" id="user" name="user" value="<?php echo $idUsuario ?>">
							<label for="user"><?php echo $nombre ." " .$apellido ." " .$apellidoM; ?></label>
						</div>
						<div class="form-group">							
							<div class="row">
								<div class="col-md-12" >
									<div id="conversation" style="height:200px; border: 1px solid #CCCCCC; padding: 12px;  border-radius: 5px; overflow-x: hidden;">
										
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">				
							<label for="message">Mensaje</label>
							<textarea id="message" name="message" placeholder="Ingresar mensaje"  class="form-control" rows="3"></textarea>
						</div>
						<button id="send" class="btn btn-primary" >Enviar</button>						
					</form>
				</div>
			</section>	
		</div>	
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>		
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script>
		
			$(document).on("ready", function(){				
				$.ajaxSetup({"cache":false});
				setInterval("cargarMensajes()", 500);

			});

			var cargarMensajes = function(){

				var frm = $("#formChat").serialize();
				$.ajax({
					url: "conversacion.php",
       				type: "post",
        			data: frm
				}).done(function( info ){
					$("#conversation").html( info );
					$("#conversation p:last-child").css({"background-color": "lightgreen", 
						"paddin-bottom": "20px"});
					$("#conversation").prop("scrollHeight");
					$("#conversation").scrollTop(altura);
				})
			}

		</script>
	</body>
</html>
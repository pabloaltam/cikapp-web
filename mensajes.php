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
					<form id="formChat" role="form">
						<div class="form-group">
						<?php

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
							<input type="hidden" class="form-control" id="user" name="user" value="<?php echo $idUsuario ?>">
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
							<textarea id="message" name="message" placeholder="Enter Message"  class="form-control" rows="3"></textarea>
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
				registrarMensajes();
				$.ajaxSetup({"cache":false});
				setInterval("cargarMensajes()", 500);

			});

			var registrarMensajes = function(){
				$("#send").on("click", function(e){
					e.preventDefault();
					var frm = $("#formChat").serialize();
					$.ajax({
						type: "POST",
						url: "registrar-mensaje.php",
						data: frm
					}).done(function(info){
						console.log( info );
					})
				});
			}

			var cargarMensajes = function(){
				$.ajax({
					type: "POST",
					url: "conversacion.php"
				}).done(function( info ){
					$("#conversation").html( info );
					$("#conversation p:last-child").css({"background-color": "lightgreen", 
						"paddin-bottom": "20px"});
				})
			}

		</script>
	</body>
</html>
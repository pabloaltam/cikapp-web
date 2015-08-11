<?php

class login
{

	/*function validarRut($rut) {

        require("conexion.php");
        $query = "SELECT rut FROM usuario";
        try {
            
        if (strpos($rut, "-") == false) {
            $RUT[0] = substr($rut, 0, -1);
            $RUT[1] = substr($rut, -1);
        } else {
            $RUT = explode("-", trim($rut));
        }
        $elRut = str_replace(".", "", trim($RUT[0]));
        $factor = 2;
        $suma = 0;
        for ($i = strlen($elRut) - 1; $i >= 0; $i--):
            $factor = $factor > 7 ? 2 : $factor;
            $suma += $elRut{$i} * $factor++;
        endfor;
        $resto = $suma % 11;
        $dv = 11 - $resto;
        if ($dv == 11) {
            $dv = 0;
        } else if ($dv == 10) {
            $dv = "k";
        } else {
            $dv = $dv;
        }
        if ($dv == trim(strtolower($RUT[1]))) {            
            $resultado = $con->query($query);
            foreach ($resultado as $fila) {
                if ($fila["rut"] == $rut) {
                    return FALSE;
                }
            }
            return TRUE;
        } else {
            return FALSE;
        }
        } catch (PDOException $e) {
            //EN caso de ERROR
        } finally {

            $resultado = null;
            $con = null;
        }
    }*/

    function log($user, $pass) {
    	require('config.php'); //Incluimos la conexion a la base de datos.

        try{

            if( ($user == '') or ($pass == '') )
            {
                echo '<script language="JavaScript" type="text/javascript">
                        alert("Debe ingresar sus datos");
                        </script>';
            }else{
                include('ejecutar_en_db.php');
                if($this->validarRut($rut)) {

                    $pass_encriptada = sha1($pass); //Encriptacion
                    $sql = "SELECT * FROM usuario WHERE rut= ? and password= ?";
                    $res = $con->prepare($sql);
                    $res->execute(array($user, $pass_encriptada));
                    //Comprobamos que si el usuario y la pass introducidas existan
                    foreach($res as $rows) {
                        if ($rows["rut"] == $rut) {
                            //Si existen los datos introducidos registraremos dos sesiones
                            //@session_start();
                            //$_SESSION['login'] = "si";//Le damos el valor SI a la sesion login.
                            //$_SESSION['usuario'] = $rows["nombre"];//Le damos el valor del nombre de usuario a la sesion user.
                            echo '<script language="JavaScript" type="text/javascript">
                            alert("Bienvenido usuario");//Mostramos alerta de bienvenida
                            </script>';
                            echo "<meta http-equiv='Refresh' content='2;url=../index.php'>";//Redirigimos a nuestro index                    
                        }else{
                            echo '<script language="JavaScript" type="text/javascript">
                            alert("Usuario y contraseña incorrectas");
                            </script>';
                        }
                    }
                }else{
                    echo '<script language="JavaScript" type="text/javascript">
                        alert("Ingrese su rut correctamente.");
                        </script>';
                }
                //$user = $_POST['user'];
                //$pass = $_POST['pass'];
            }

        }catch(PDOException $e) {
            //echo $e->getMessage();
        }finally {

            $con = null;
        }
	}

	function sesion_iniciada () {
		@session_start(); //inicia sesion (la @ evita los mensajes de error si la session ya está iniciada)

		if (!isset($_SESSION['usuario'])) return false; //no existe la variable $_SESSION['usuario']. No logueado.
    	if (!is_array($_SESSION['usuario'])) return false; //la variable no es un array $_SESSION['usuario']. No logueado.
    	if (empty($_SESSION['usuario']['user'])) return false; //no tiene almacenado el usuario en $_SESSION['usuario']. No logueado.
 
    	//cumple las condiciones anteriores, entonces es un usuario validado
    	return true;
	}

	function logout() {
    	@session_start(); //inicia sesion (la @ evita los mensajes de error si la session ya está iniciada)
    	unset($_SESSION['usuario']); //eliminamos la variable con los datos de usuario;
    	session_write_close(); //nos asegurmos que se guarda y cierra la sesion
    	return true;
	}
}
$test = new OperacionesMYSQL();
# Esta insertando pero aun falta todas las validaciones y la seguridad.
# Falta validad si que el usuario no existe.
# IMPORTANTE: El Rut tiene que contener puntos
$test->log("22.222.222-2","hola");
print("</br>");
?>
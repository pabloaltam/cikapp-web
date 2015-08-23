<?php
    function login($user, $pass) {
    	
        include('ejecutar_en_db.php');
        $obj = new OperacionesMYSQL();
        //$obj->RutValidate($user)
        if($obj->RutValidate($user)) {
            require('config.php'); //Incluimos la conexion a la base de datos.
            $sql = "SELECT * FROM usuario WHERE rut= ? and password= ?";
            //$pass_encriptada = sha1(md5($pass)); //Encriptacion
            //$sql = "SELECT * FROM usuario WHERE rut= '$user' and password= '$pass_encriptada'";
            if($res = $mysqli->prepare($sql)) {
                $pass_encriptada = sha1(md5($pass)); //Encriptacion
                $res->bind_param('ss', $user, $pass_encriptada);
                $res->execute();
                $res->store_result();//transfiere resultados desde la ultima consulta
                //Comprobamos que si el usuario y la pass introducidas existan
                if($res->num_rows == 1) {
                    $res->bind_result($nombre, $email);//enlaza variables a los resultados de la ultima consulta
                    $res->fetch();//obtiene el resultado de la utima peticion
                    
                    //Si existen los datos introducidos registraremos sesiones
                    //@session_start();
                    //$_SESSION['login'] = "si";//Le damos el valor SI a la sesion login.
                    //$_SESSION['usuario'] = $nombre;//Le damos el valor del nombre de usuario a la sesion usuario.
                    //$_SESSION['email'] = $email;
                    
                    //echo "<br> Bienvenido! ". $_SESSION['usuario'];
                    //echo "<p> Bienvenido! </p>";
                
                    return TRUE;
                }else{
                    return FALSE;
                }
            }
            echo '<p>ya valiste</p>';
            $res->close();
        }else{
            echo '<p>rut no valido, ingreselo correctamente</p>';
            return FALSE;
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
?>
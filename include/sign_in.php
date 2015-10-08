<?php
    function login($user, $pass) {
    	
        include('ejecutar_en_db.php');
        $obj = new OperacionesMYSQL();
        $user = str_replace('.', '', $user);
        if($obj->RutValidateLogin($user)) {
            require('conexion.php'); //Incluimos la conexion a la base de datos.
            $sql = "SELECT * FROM usuario WHERE rut=? and password=?";
            if($stmt = $mysqli->prepare($sql)){
                $pass_encriptada = sha1(md5($pass));
                $stmt->bind_param('ss',$user, $pass_encriptada);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($rows = $result->fetch_assoc()) {
                    if($rows['codigo'] == 1){
                        @session_start();
                        if(sesion_iniciada()){
                            logout();
                        }
                        $_SESSION['idUsuario'] = $rows['idUsuario'];
                        $_SESSION['rut'] = $rows['rut'];
                        $_SESSION['nombre'] = $rows['nombre'];//Le damos el valor del nombre de usuario a la sesion usuario.
                        $_SESSION['apellido'] = $rows['apellido'];       
                        $_SESSION['email'] = $rows['email'];

                        return TRUE;
                    }else{
                        echo '<p>Antes de acceder debe confirmar el registro en su email</p>';
                        return FALSE;
                    }
                } else {
                    echo '<p>No ha podido iniciar sesion, intente mas tarde</p>';
                    return FALSE;
                }  
            } else {
                echo '<p>Su usuario no se encuentra, por favor regístrese primero</p>';
                return FALSE;
            }
            $stmt->free_result();
            $stmt->close();
        }else{
            echo '<p>Rut no valido, ingreselo correctamente</p>';
            return FALSE;
        }
    }

	function sesion_iniciada () { //comprueba si la sesion esta abierta
        @session_start(); //inicia sesion (la @ evita los mensajes de error si la session ya está iniciada)

        if (!isset($_SESSION['idUsuario'])){
            if (!isset($_SESSION['nombre'])){
                if (!isset($_SESSION['email'])){
                    if (!isset($_SESSION['rut'])){
                        if (!isset($_SESSION['apellido'])){
                            if (empty($_SESSION['rut'])){
                                return false;
                                }
                            }
                        }
                    }
                }
            }
            //cumple las condiciones anteriores, entonces es un usuario validado
            return true;
    }

    function logout() {
        @session_start(); //inicia sesion (la @ evita los mensajes de error si la session ya está iniciada)
            
        unset($_SESSION['idUsuario']);
        unset($_SESSION['nombre']); //elimina la variable con los datos de usuario;
        unset($_SESSION['apellido']);
        unset($_SESSION['email']);
        unset($_SESSION['rut']);
        session_write_close(); //se guarda y cierra la sesion
    
        session_destroy();
    }
?>
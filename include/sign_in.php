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
                        header("location: panel-usuario.php");
                        if(sesion_iniciada()){
                            logout();
                        }
                        $_SESSION['idUsuario'] = $rows['idUsuario'];
                        $_SESSION['rut'] = $rows['rut'];
                        $_SESSION['nombre'] = $rows['nombre'];//Le damos el valor del nombre de usuario a la sesion usuario.
                        $_SESSION['apellido'] = $rows['apellido'];
                        $_SESSION['apellidoM'] = $rows['apellidoM'];
                        $_SESSION['email'] = $rows['email'];
                        $_SESSION['COMUNA_ID'] = $rows['COMUNA_ID'];

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
    
    function recuperar_clave($email, $rut){
        require('conexion.php'); //Incluimos la conexion a la base de datos.
        $sql = "SELECT * FROM usuario WHERE rut=? and email=?";
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param('ss',$rut, $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($rows = $result->fetch_assoc()) {
                if($rows['codigo'] == 1){ //revisar otra vez
                    $clave_nueva = clave_aleatoria(10);
                    $clave_nueva_encriptada = sha1(md5($clave_nueva));
                    $sql2="UPDATE usuario SET password = '$clave_nueva_encriptada' WHERE rut = '$rut' and email = '$email'";
                    $stmt->execute();
                    
                    $headers = "From: admin@cikapp.com";
                    $mensaje = '<table width="629" border="0" cellspacing="1" cellpadding="2"> 
                    <tr> 
                      <td width="623" align="left"></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor="#2EA354"><div style="color:#FFFFFF; font-size:14; font-family: Arial, Helvetica, sans-serif; text-transform: capitalize; font-weight: bold;"><strong>     Estos son sus datos  '.$rows['nombre'].'</strong></div></td> 
                    </tr> 
                    <tr> 
                      <td height="95" align="left" valign="top"><div style=" color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; margin-bottom:3px;"> RUT: '.$rows['rut'].'</strong><br><br><br> 

                            <strong>SU EMAIL : </strong>'.$rows['email'].'</strong><br><br><br>
                            <strong>SU NUEVA CONTRASEÑA : </strong>'.$clave_nueva.'</strong><br><br><br> 
                            <strong>POR FAVOR CAMBIE A UNA NUEVA CONTRASEÑA AL ENTRAR LA PRIMERA VEZ, PARA MAYOR SEGURIDAD.</strong><br><br> 
                            <strong>GRACIAS POR CONFIAR EN CIKAPP.</strong><br> 
                      </div> 
                      </td> 
                    </tr> 
                  </table>';
                    if (!mail("$email", "Nueva contraseña para acceder a su cuenta de cikapp.", "$mensaje", "$headers")) {
                        echo "<p>No se pudo enviar el email.</p>";
                    } else {
                        echo "<p>Se ha enviado un correo con su nueva contraseña su direccion de email, al ingresar con ella a su cuenta por favor cambiela para una mayor seguridad<p>";
                    }
                }  
            }
        }
    }
    
    function clave_aleatoria($largo) {   //FUNCION PARA CREAR UNA CLAVE ALEATORIA 
        $pattern = "123456789PIUYTREWQASDFGHJKLMNBVCXZ123456789PLMK1IJNBHUYGVC123456789FTRDXZSEWAQWSDERFTGYHUJ123569876543ERDFREDESWQASWQASDGHGTY";  
        for($i=0;$i<$largo;$i++) {  
          $keyal .= $pattern{rand(0,35)};  
        }  
        return $keyal;  
    }  
?>

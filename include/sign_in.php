<?php
    function loginUsuario($user, $pass) {
        include('ejecutar_en_db.php');
        $obj = new OperacionesMYSQL();
        $user = str_replace('.', '', $user);
        if($obj->RutValidateLoginUser($user)) {
            require('conexion.php'); //Incluimos la conexion a la base de datos.
                $pass_encriptada = sha1(md5($pass));
            $sql = "SELECT * FROM usuario WHERE rut='$user' and password='$pass_encriptada'";
            if($result = $mysqli->query($sql)){
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
                        $_SESSION['apellidoM'] = $rows['apellidoM'];
                        $_SESSION['email'] = $rows['email'];
                        $_SESSION['COMUNA_ID'] = $rows['COMUNA_ID'];
                        header("Location: panel-usuario.php");
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
    function loginEmpresa($user, $pass) {
        include('ejecutar_en_db.php');
        $obj = new OperacionesMYSQL();
        $user = str_replace('.', '', $user);
        if($obj->RutValidateLoginEnterprise($user)) {
            require('conexion.php'); //Incluimos la conexion a la base de datos.
            $pass_encriptada = sha1(md5($pass));
            $sql = "SELECT * FROM empresa WHERE rut='$user' and password='$pass_encriptada'";
            if($stmt = $mysqli->query($sql)){
                if ($rows = $result->fetch_assoc()) {
                    if($rows['codigo'] == 1){
                        @session_start();
                        header("Location: panel-empresa.php");
                        if(sesion_iniciada()){
                            logout();
                        }
                        $_SESSION['idEmpresa'] = $rows['idEmpresa'];
                        $_SESSION['rutEmpresa'] = $rows['rut'];
                        $_SESSION['nombreEmpleado'] = $rows['nombre'];//Le damos el valor del nombre de usuario a la sesion usuario.
                        $_SESSION['apellidoEmpleado'] = $rows['apellido'];
                        $_SESSION['apellidoMEmpleado'] = $rows['apellidoM'];
                        $_SESSION['emailEmpleado'] = $rows['email'];
                        $_SESSION['cargoEmpleado'] = $rows['cargo'];
                        $_SESSION['razonSocial'] = $rows['razonSocial'];
                        $_SESSION['faxEmpresa'] = $rows['faxEmpresa'];
                        $_SESSION['fonoEmpresa'] = $rows['fonoEmpresa'];
                        $_SESSION['websiteEmpresa'] = $rows['websiteEmpresa'];
                        $_SESSION['emailEmpresa'] = $rows['emailEmpresa'];
                        
                        $_SESSION['direccionEmpresa'] = $rows['direccionEmpresa'];
                        $_SESSION['COMUNA_ID'] = $rows['COMUNA_ID'];

                        return TRUE;
                    }else{
                        echo '<p>Antes de acceder debe confirmar el registrode su cuenta en su email</p>';
                        return FALSE;
                    }
                } else {
                    echo '<p>No ha podido iniciar sesión, intente más tarde</p>';
                    return FALSE;
                }
            } else {
                echo '<p>Su empresa no se encuentra en nuestra base de datos, por favor regístrese primero</p>';
                return FALSE;
            }
            $stmt->free_result();
            $stmt->close();
        }else{
            echo '<p>Rut no válido, ingréselo correctamente</p>';
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
                                if (empty($_SESSION['idEmpresa'])){
                                    if (empty($_SESSION['rutEmpresa'])){
                                        if (empty($_SESSION['nombreEmpleado'])){
                                            if (empty($_SESSION['apellidoEmpleado'])){
                                                if (empty($_SESSION['apellidoMEmpleado'])){
                                                    if (empty($_SESSION['emailEmpleado'])){
                                                        if (empty($_SESSION['cargoEmpleado'])){
                                                            if (empty($_SESSION['razonSocial'])){
                                                                if (empty($_SESSION['faxEmpresa'])){
                                                                    if (empty($_SESSION['fonoEmpresa'])){
                                                                        if (empty($_SESSION['websiteEmpresa'])){
                                                                            if (empty($_SESSION['emailEmpresa'])){
                                                                                if (empty($_SESSION['direccionEmpresa'])){
                                                                                    if(empty($_SESSION['COMUNA_ID'])){
                                                                                        return false;
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                } 
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
        
        unset($_SESSION['idEmpresa']);
        unset($_SESSION['rutEmpresa']);
        unset($_SESSION['nombreEmpleado']);
        unset($_SESSION['apellidoEmpleado']);
        unset($_SESSION['apellidoMEmpleado']);
        unset($_SESSION['emailEmpleado']);
        unset($_SESSION['cargoEmpleado']);
        unset($_SESSION['razonSocial']);
        unset($_SESSION['faxEmpresa']);
        unset($_SESSION['fonoEmpresa']);
        unset($_SESSION['websiteEmpresa']);
        unset($_SESSION['emailEmpresa']);
        unset($_SESSION['direccionEmpresa']);

        session_destroy();
    }
    
    function recuperar_claveEmpresa($email, $rut){
        require('conexion.php'); //Incluimos la conexion a la base de datos.
        $sql = "SELECT * FROM empresa WHERE rut='$rut' and emailEmpresa='$email'";
        if($stmt = $mysqli->query($sql)){
            if ($rows = $result->fetch_assoc()) {
                if($rows['codigo'] == 1){ //revisar otra vez
                    $clave_nueva = clave_aleatoria(5);
                    $clave_nueva_encriptada = sha1(md5($clave_nueva));
                    $sql2="UPDATE empresa SET password = '$clave_nueva_encriptada' WHERE rut = '$rut' and emailEmpresa = '$email'";
                    $stmt->execute();
                    
                    $headers = "From: admin@cikapp.com";
                    $mensaje = '<table width="629" border="0" cellspacing="1" cellpadding="2"> 
                    <tr> 
                      <td width="623" align="left"></td> 
                    </tr> 
                    <tr> 
                      <td bgcolor="#2EA354"><div style="color:#FFFFFF; font-size:14; font-family: Arial, Helvetica, sans-serif; text-transform: capitalize; font-weight: bold;"><strong>     Estos son sus datos  '.$rows['razonSocial'].'</strong></div></td> 
                    </tr> 
                    <tr> 
                      <td height="95" align="left" valign="top"><div style=" color:#000000; font-family:Arial, Helvetica, sans-serif; font-size:12px; margin-bottom:3px;"> RUT: '.$rows['rut'].'</strong><br><br><br> 

                            <strong>SU EMAIL : </strong>'.$rows['emailEmpresa'].'</strong><br><br><br>
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
                } else {
                    echo "<p>No puede ingresar hasta que valide su cuenta con el email que se ha enviado a su correo, por favor revíselo nuevamente en su bandeja de entrada.</p>";
                }  
            }
        }
    }
    function recuperar_claveUsuario($email, $rut){
        require('conexion.php'); //Incluimos la conexion a la base de datos.
        $sql = "SELECT * FROM usuario WHERE rut='$rut' and email='$email'";
        if($stmt = $mysqli->query($sql)){
            if ($rows = $result->fetch_assoc()) {
                if($rows['codigo'] == 1){ //revisar otra vez
                    $clave_nueva = clave_aleatoria(5);
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
                }  else {
                    echo "<p>No puede ingresar hasta que valide su cuenta con el email que se ha enviado a su correo, por favor revíselo nuevamente en su bandeja de entrada.</p>";
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
    function esEmpresa($rut){
        $res = substr($rut,0,2);
        if($res >= '72'){
            return TRUE; 
        } else {
            return FALSE;
        }
    }
?>

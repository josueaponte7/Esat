<?
		
		
  
        $chances = 2 - login_fails();
        
        if(isset($_POST["login"])):

            $link = connect();
            $username = $_POST["username"];
            $password = $_POST["password"];
            $sql = "SELECT * FROM `usuarios` WHERE `usuario` = '$username' AND `estatus` = 'Activo'";
            $qry = mysql_query($sql,$link);
            $row = mysql_fetch_array($qry);

            if(mysql_num_rows($qry) > 0):
                if(md5($password) == $row["contrasena"]):
                $_SESSION["admin"] = $row["usuario"];
                $_SESSION["nivel"] = $row["nivel"];
                $_SESSION["admin.id"] = $row["cod_usu"];
   
				/* Para implantar luego 
				 * 
                if( $row["contrasena_al"] <= date("Y-m-d")):
                    $_SESSION["admin.cambiar_contrasena"] = true;
                    $url = SG_URL.'perfil/contrasena';
                else:
                    $_SESSION["admin.cambiar_contrasena"] = false;
                    $url = SG_URL;
                endif;
                * 
                * */
                $target = (isset($url)) ? $url : SG_URL;
                add_event('Sistema','Ingresar');
                document::redirect($target);
                else:
                add_event('Sistema','Ingresar','Error');
                message::error("Datos de acceso incorrectos, intente nuevamente.<br />Intentos Restantes: <b>" . $chances ."</b>");
                endif;
            else:
            
                $_SESSION["tries"] = $_SESSION["tries"] + 1;
                add_event('Sistema','Ingresar','Error');
                message::error("Datos de acceso incorrectos, intente nuevamente.<br />Intentos Restantes: <b>" . $chances ."</b>");
                
            endif;

        endif;



?>

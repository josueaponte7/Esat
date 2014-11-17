<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset($_SESSION["usuario"], $_SESSION["contrasena"])) {
    header("Location: index.php"); //evita que se ingrese a cualquier pagina no iniciando sesion
} else {
    ?>
    <?php
//VARIABLE DEL FORMULARIO
    $cedula    = $_POST["cedula"];
    $apellido  = $_POST["apellido"];
    $nombre    = $_POST["nombre"];
    $telefono  = $_POST["codigo_tel"].'-'.$_POST["telefono"];
    $email     = $_POST["email"];
    $direccion = $_POST["direccion"];
    $sexo      = $_POST["sexo"];

//echo "Los datos fueron procesados de forma exitosa";
//$email=$email2;
//$xasunto="Soporte en Linea";
//$xmensaje=$problema2;
//mail($xemail, $xasunto, $xmensaje);
    ?>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <!-- Start css3menu.com HEAD section -->
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
            <!-- End css3menu.com HEAD section -->
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Sistema de Control de Estudios - ESAT</title>
            <script language="JavaScript">


                //creamos la funcion, y como parametro haremos referencia a form (sera el nombre de nuestro formulario)

                function test(form1) {
                    if (form1.cedula.value == "") {
                        alert("Ingrese la cedula del facilitador(a)!");
                        return false;
                    }
                    if (form1.nombre.value == "") {
                        alert("Ingrese el Nombre del facilitador(a)!");
                        return false;
                    }
                    if (form1.apellido.value == "") {
                        alert("Ingrese el apellido del facilitador(a)!");
                        return false;
                    }
                    if (form1.sexo.value == "") {
                        alert("Ingrese el sexo del facilitador(a)!");
                        return false;
                    }
                    if (form1.telefono.value == "") {
                        alert("Ingrese el telefono del facilitador(a)!");
                        return false;
                    }
                    if (form1.email.value == "" || form1.email.value.indexOf('@') == -1 || form1.email.value.indexOf('.') == -1) {
                        alert("La direccion de correo no es valida!");
                        return false;
                    }
                    if (form1.direccion.value == "") {
                        alert("Ingrese la direccion del facilitador(a)!");
                        return false;
                    }
                    document.forms[0].submit();
                    return true
                }
            </script>
            <script language="JavaScript">

            var nav4 = window.Event ? true : false;
                function acceptNum(evt) {
                    var key = nav4 ? evt.which : evt.keyCode;
                    return (key <= 13 || (key >= 48 && key <= 57));
                }
            </script>
            <style type="text/css"> 

                input { font-family: Tahoma; font-size: 14px; border: #990000; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px} 

            </style>
            <style type="text/css">

                body,td,th {
                    font-family: Tahoma;
                    font-size: 12px;
                }
                a:link {
                    color: #CC0000;
                }
                a:visited {
                    color: #CC0000;
                }
                a:hover {
                    color: #CC0000;
                }
                a:active {
                    color: #CC0000;
                }
                .password {font-family : arial, sans-serif;
                }
                .Estilo51 {font-family: Geneva, Arial, Helvetica, sans-serif; color: #000000; }
                .Estilo52 {
                    font-size: 18px;
                    font-weight: bold;
                    color: #333333;
                }
                .Estilo5 {font-size: 12px; font-weight: bold; color: #FFFFFF; }
                .Estilo53 {font-size: 12px;
                           font-weight: bold;
                }
                .Estilo6 {	color: #FF0000;
                           font-weight: bold;
                }
                .Estilo54 {font-size: 12px}
                .Estilo57 {font-weight: bold; color: #000000; font-size: 12px; }
                .Estilo60 {color: #FFFFFF; font-weight: bold;}
                .Estilo13 {font-size: 12px;
                           font-family: Tahoma;
                }
                .Estilo59 {font-weight: bold; font-family: Tahoma;}

            </style></head>

        <body>
            <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <th colspan="2" scope="col"><img src="images/logo-oficial.jpg" width="100%" height="60" /></th>
                </tr>
                <tr>
                    <td colspan="2"><!-- Start css3menu.com BODY section -->
    <?php include("menufinal.php"); ?>
                        <!-- End css3menu.com BODY section --></td>
                </tr>
                <tr>
                    <td colspan="2"><img src="images/titulo.jpg" width="100%" height="82" /></td>
                </tr>
                <tr>
                    <td width="51%">&nbsp;</td>
                    <td width="49%"><div align="right"><span class="Estilo51">
                                Bienvenido
                                <br/>Has entrado con el nombre de usuario
                                <?php echo $_SESSION["usuario"]; ?>
                            </span><span class="Estilo51">
                                <?php
                                require './conex.php';
                                conectar();
                                $fecha = date("Y/m/d");
                                $hora = date("h:i a ");
                                $usuario2 = $_SESSION["usuario"];
                                $operacion = "Registro un Facilitador(a)";
                                $sql5 = "INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
                                mysql_query($sql5);
                                ?>
                            </span></div></td>
                </tr>
                <tr>
                    <td valign="top"><div align="center">
                            <p class="Estilo52">Registro de Facilitadores </p>
                            <span class="Estilo13"><span class="Estilo54"><span class="Estilo59">
                                        <?php
                                        $query1 = "SELECT * FROM facilitadores WHERE cedula='$cedula'";
                                        $result = mysql_query($query1);
                                        if (mysql_num_rows($result) == 0) {
                                            $sql = "insert into facilitadores (cedula, nombre, telefono, email, direccion, apellido, sexo) values ('$cedula', '$nombre', '$telefono', '$email', '$direccion', '$apellido', '$sexo');";
                                            $result = mysql_query($sql);
                                            if ($result) {
                                                ?>
                                                            <script language="JavaScript">
                                                                alert("El facilitador(a) se registro exitosamente");
                                                                location.href = "facilitadores.php"
                                                            </script>
                                                <?php
                                            }
                                            ?>
                                        </span>Los datos fueron procesados de forma exitosa. </span>la pagina ser&aacute; redireccionada</span>
                                <p>&nbsp;</p>
                            </div></td>
                        <td width="49%"><img src="images/facilitadoress.jpg" width="593" height="417"></td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                    </tr>
                </table>
            </body>
        </html>
        <?php
    } else {
//echo "Este proveedor ya existe";
//echo "<br><a href='proveedor.php'>Volver</a>";
        ?>
        <script language="JavaScript">
            alert("Este Facilitador(a) ya existe");
            location.href = "facilitadores.php"
        </script>
        <?php
    }
}
?>
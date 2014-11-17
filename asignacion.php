<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset($_SESSION["usuario"], $_SESSION["contrasena"])) {
    header("Location: index.php"); //evita que se ingrese a cualquier pagina no iniciando sesion
} else {
    require './conex.php';
    conectar();
    ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
            <script type="text/javascript" src="javascript/jquery-1.11.0.js"></script>
            <script type="text/javascript" src="javascript/bootstrap.js"></script>
            <script type="text/javascript" src="javascript/funciones.js"></script>
            <!-- End css3menu.com HEAD section -->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Sistema de Control de Estudios - ESAT</title>
            <script language="JavaScript">

                function test(form1) {
                    if (form1.cedula_fac.value == "") {
                        alert("Ingrese los datos del facilitador(a)!");
                        return false;
                    }
                    if (form1.codigo_materia.value == "") {
                        alert("Ingrese los datos de la materia!");
                        return false;
                    }
                    document.forms[0].submit();
                    return true
                }

                var cursor;
                if (document.all) {
                    // Est� utilizando EXPLORER
                    cursor = 'hand';
                } else {
                    // Est� utilizando MOZILLA/NETSCAPE
                    cursor = 'pointer';
                }

                function verdocente() {
                    miPopup = window.open("verdocente.php", "miwin", "width=900,height=400,scrollbars=yes");
                    miPopup.focus();
                }
                function vermateria() {
                    miPopup = window.open("vermateria.php", "miwin", "width=900,height=400,scrollbars=yes");
                    miPopup.focus();
                }


                var nav4 = window.Event ? true : false;
                function acceptNum(evt) {
                    var key = nav4 ? evt.which : evt.keyCode;
                    return (key <= 13 || (key >= 48 && key <= 57));
                }

            </script>
            <style type="text/css"> 
                input { font-family: Tahoma; font-size: 14px; border: #990000; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px} 

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
                .Estilo53 {font-size: 12px;
                           font-weight: bold;
                }
                .Estilo6 {	color: #FF0000;
                           font-weight: bold;
                }
                .Estilo54 {font-size: 12px}
                .Estilo57 {font-weight: bold; color: #000000; font-size: 12px; }
                .Estilo62 {
                    font-size: 12px;
                    color: #FFFFFF;
                    font-weight: bold;
                }
                .Estilo63 {
                    color: #FFFFFF;
                    font-weight: bold;
                }

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

                            # GUARDAR AUDITORIA
                            $fecha = date("Y/m/d");
                            $hora = date("h:i a ");
                            $usuario2 = $_SESSION["usuario"];
                            $operacion = "Ingreso a la Asignacion de Materias";
                            $sql5 = "INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
                            mysql_query($sql5);
                            ?>
                        </span></div></td>
            </tr>
            <tr>
                <td valign="top"><div align="center">
                        <p class="Estilo52">Incorporaci&oacute;n de Asignaturas </p>
<!--                        <form action="regasignacion.php" method="post" name="form1" id="form1" onSubmit="return Validar(this);">-->
                        <form action="regasignacion.php" method="post" name="form1" id="form1">
                            <table border="0">

                                <tr>
                                    <td height="18" colspan="6" bordercolor="#6A90B5" bgcolor="#AA0000"><span class="Estilo62">Datos Facilitador </span></td>
                                </tr>
                                <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>
                                <tr>
                                <td width="149">
                                <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">C.I:</label>
                                                <input name="cedula_fac" type="text" class="form-control input-sm" id="cedula_fac"  maxlength="8" placeholder="Solo numeros">
                                            </div>
                                </td>
                                <td width="15" align="left">
                                <span class="Estilo6" style="margin-left: 2px;">*</span>
                                </td>
                                <td width="151">
                                <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Nombre:</label>
                                                <input name="nombre" type="text" class="form-control input-sm" id="nombre" placeholder="Introduzca el Nombre">
                                            </div>
                                </td>
                                <td width="15" align="left">
                                <span class="Estilo6" style="margin-left: 2px;">*</span>
                                </td>
                                <td width="212">
                                <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Apellido:</label>
                                                <input name="apellido" type="text" class="form-control input-sm" id="apellido" size="35" maxlength="12" placeholder="Introduzca el Apellido">
                                            </div>
                                </td>
                                    <td width="13" align="left" valign="medio">
                                <span class="Estilo6" style="margin-left: 2px;">*<strong>
                                                    <span class="Estilo94 Estilo95 Estilo10 Estilo14">
                                                        <img src="images/lupa.jpg" width="20" height="15" style="margin-left: 2px;" onClick="verdocente()" onMouseOver="style.cursor = cursor" title="Buscar">
                                                    </span>
                                                </strong>
                                            </span>
                                </td>
                                </tr>                               
                                <tr>
                                    <td colspan="6" bordercolor="#6A90B5" bgcolor="#AA0000"><span class="Estilo63">Datos de Asignatura </span></td>
                                </tr>
                                 <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>                                
                                <tr>
                                <td width="149">
                                <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">C&oacute;digo:</label>
                                                <input name="codigo_materia" type="text" class="form-control input-sm" id="codigo_materia"  maxlength="8" placeholder="Introduzca el Codigo">
                                            </div>
                                </td>
                                <td width="5" align="left">
                                <span class="Estilo6" style="margin-left: 2px;">*</span>
                                </td>
                                <td width="151">
                                <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Asignatura:</label>
                                                <input name="materia" type="text" class="form-control input-sm" id="materia" placeholder="Introduzca la Manteria">
                                            </div>
                                </td>
                                <td width="7" align="left">
                                <span class="Estilo6" style="margin-left: 2px;">*</span>
                                </td>
                                <td width="212">
                                <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Menci&oacute;n:</label>
                                                <input name="mencion" type="text" class="form-control input-sm" id="mencion" size="35" maxlength="12" placeholder="Introduzca la Mencion">
                                            </div>
                                </td>
                                <td width="13" align="left" valign="medio">
                                <span class="Estilo6" style="margin-left: 2px;">*<strong><span class="Estilo94 Estilo95 Estilo10 Estilo14"><img src="images/lupa.jpg" width="20" height="15" style="margin-left: 2px;" onClick="vermateria()" onMouseOver="style.cursor = cursor" title="Buscar"></span></strong></span></span>
                                </td>
                                </tr>
                                <tr>
                                    <td colspan="6" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">Nota: <span class="Estilo6">*</span> Campos Obligatorios </span></td>
                                </tr>
                                 <tr>
                                    <td>
                                        &nbsp;
                                    </td>
                                </tr>                                
                                <tr>
                                    <td colspan="2">
                                        <input name="Submit" type="submit" class="Estilo53" id="registrar"  value="Registrar"/>
                                        <input name="Submit2" type="reset" class="Estilo53" id="cancelar" value="Cancelar"/>
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <p>&nbsp;</p>
                    </div></td>
                <td width="49%"><img src="images/asignacion.jpg" width="587" height="410"></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
        </table>
    </body>
</html>
<?php
}
?>

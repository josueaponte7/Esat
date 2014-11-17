<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset($_SESSION["usuario"], $_SESSION["contrasena"])) {
    header("Location: index.php"); //evita que se ingrese a cualquier pagina no iniciando sesion
} else {
    ?>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <!-- Start css3menu.com HEAD section -->

            <!-- End css3menu.com HEAD section -->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Sistema de Control de Estudios - ESAT</title>
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
            <script type="text/javascript" src="javascript/jquery-1.11.0.js"></script>
            <script type="text/javascript" src="javascript/bootstrap.js"></script>
            <script type="text/javascript" src="javascript/funciones.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    var numero = '0123456789';
                    var alphanumeric = ' 0123456789abcdefghijklmnñopqrstuvwxyz';
                    $('#cedula,#telefono').validar(numero);
                    $('#nombre,#apellido').validar(alphanumeric);
                });
            </script>
            <script language="JavaScript">

                //creamos la funcion, y como parametro haremos referencia a form (sera el nombre de nuestro formulario)

                function test(form1) {
                    if (form1.cedula.value.length <= 6) {
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
                <!--
                var nav4 = window.Event ? true : false;
                function acceptNum(evt) {
                    var key = nav4 ? evt.which : evt.keyCode;
                    return (key <= 13 || (key >= 48 && key <= 57));
                }
                //-->
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

            </style>
        </head>

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
                                <?php echo $_SESSION["usuario"];
                                ?>
                            </span><span class="Estilo51">
                                <?php
                                require './conex.php';
                                conectar();
                                # GUARDAR AUDITORIA
                                $fecha     = date("Y/m/d");
                                $hora      = date("h:i a ");
                                $usuario2  = $_SESSION["usuario"];
                                $operacion = "Ingreso al Registro de Facilitadores";
                                $sql5      = "INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
                                mysql_query($sql5);
                                ?>
                            </span></div></td>
                </tr>
                <tr>
                    <td valign="top"><div align="center">
                            <p class="Estilo52">Registro de Facilitadores </p>
                            <!--      <form action="regfacilitadores.php" method="post" name="form1" id="form1" onSubmit="return Validar(this);">-->
                            <form action="regfacilitadores.php" method="post" name="form1" id="form1">
                                <table border="0">
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">C.I:</label>
                                                <input name="cedula" type="text" class="form-control input-sm" id="cedula"  maxlength="8" placeholder="Solo numeros">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="Estilo6" style="margin-left: 5px;">*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Nombre:</label>
                                                <input name="nombre" type="text" class="form-control input-sm" id="nombre" placeholder="Introduzca el Nombre">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="Estilo6" style="margin-left: 5px;">*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Apellido:</label>
                                                <input name="apellido" type="text" class="form-control input-sm" id="apellido" size="35" maxlength="12" placeholder="Introduzca el Apellido">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="Estilo6" style="margin-left: 5px;">*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Sexo:</label>
                                                <select name="sexo" class="form-control input-sm">
                                                    <option value="0">Seleccione:</option>
                                                    <option value="Masculino">Masculino</option>
                                                    <option value="Femenino">Femenino</option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="Estilo6" style="margin-left: 5px;">*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-horizontal">
                                                <label for="exampleInputEmail1">Tel&eacute;fono:</label>
                                                <div class="form-group">
                                                    <div class="col-sm-5">
                                                        <select name="codigo_tel" class="form-control input-sm" id="codigo_tel">
                                                            <option value="0" selected>Seleccione:</option>
                                                            <option value="0412">0412</option>
                                                            <option value="0416">0416</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-sm-7">
                                                        <input name="telefono" type="text" class="form-control input-sm" id="telefono"  maxlength="7" placeholder="Introduzca el Tel&eacute;fono">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="Estilo6" style="margin-left: 5px;">*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label>Email:</label>
                                                <input name="email" type="text" class="form-control input-sm" id="email" size="45" placeholder="ejemplo@correo.com">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="Estilo6" style="margin-left: 5px;">*</span>
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Direcci&oacute;n:</label>
                                                <textarea name="direccion" cols="43" rows="2" class="form-control input-sm" id="direccion" placeholder="Introduzca la Direcci&oacute;n"></textarea>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="Estilo6" style="margin-left: 5px;">*</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td >&nbsp;</td>
                                    </tr>                                    
                                    <tr>
                                        <td ><span class="Estilo54">Nota: <span class="Estilo6">*</span> Campos Obligatorios </span></td>
                                    </tr> 
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input name="Submit" type="submit" class="Estilo53" id="registrar"  value="Registrar"/>
                                            <input name="Submit2" type="reset" class="Estilo53" id="cancelar" value="Cancelar"/>
                                        </td>
                                    </tr>
                                </table>
                            </form>
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
}
?>

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
                    <!--<link rel="stylesheet" href="menuadmin.css3prj_files/css3menu1/style.css" type="text/css" /><style>._css3m{display:none}</style>-->
            <!-- End css3menu.com HEAD section -->
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>Sistema de Control de Estudios - ESAT</title>
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
            <link rel="stylesheet" href="css/bootstrap-datepicker.css" type="text/css" />
            <script type="text/javascript" src="javascript/jquery-1.11.0.js"></script>
            <script type="text/javascript" src="javascript/bootstrap.js"></script>
            <script type="text/javascript" src="javascript/bootstrap-datepicker.js"></script>
            <script type="text/javascript" src="javascript/bootstrap-datepicker.es.js"></script>
            <script type="text/javascript" src="javascript/funciones.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    var numero = '0123456789';
                    $('#cedula,#pasaporte,#telefono').validar(numero);
                    $('#fecha1').datepicker({
                        format: "dd/mm/yyyy",
                        language: "es",
                        startDate: "-80y",
                        endDate: "-15y",
                        autoclose: true
                    });

                    $('#registrar').click(function (event) {
                        if ($('#cedula').val() == '') {
                            event.preventDefault();
                            $('#cedula').parent('div').addClass('has-error');
                            $('#cedula').focus();
                        }else{
                            $('#form1').submit();
                        }
                    });
                });

            </script>

            <style type="text/css">
                body,td,th {
                    font-family: Tahoma;
                    font-size: 12px;
                }
                input[type="submit"],input[type="reset"] { 
                    font-family: Tahoma; 
                    font-size: 14px; 
                    border: #990000; 
                    border-style: solid; 
                    border-top-width: 1px; 
                    border-right-width: 1px; 
                    border-bottom-width: 1px; 
                    border-left-width: 1px
                }
                .Estilo53 {
                    font-size: 12px;
                    font-weight: bold;
                }
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
                                <?php
                                //echo "<html><body>";
                                echo "Bienvenido ";
//echo $SESSION["nombre"]." ";
//echo $SESSION["apellido"];
                                echo "<br>Has entrado con el nombre de usuario ";
                                echo $_SESSION["usuario"];
//echo "<br>Para cerrar la sesi&oacute;n, pulsa: <a href='logout.php'>Cerrar Sesi&oacute;n</a>";
                                echo "</body></html>";
                            }
                            ?>
                        </span><span class="Estilo51">
                            <?php
                            require './conex.php';
                            conectar();
                            # GUARDAR AUDITORIA
                            $fecha     = date("Y/m/d");
                            $hora      = date("h:i a ");
                            $usuario2  = $_SESSION["usuario"];
                            $operacion = "Ingreso al Registro de Participantes";
                            $sql5      = "INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
                            mysql_query($sql5);
                            ?>
                        </span></div></td>
            </tr>
            <tr>
                <td valign="top"><div align="center">
                        <p class="Estilo52">Registro de Participantes </p>
                        <form action="regparticipantes.php"  method="post" name="form1" id="form1" >
                            <table border="0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">C.I:</label>
                                                <input name="cedula" type="text" class="form-control input-sm" id="cedula"  maxlength="8" placeholder="Solo numeros">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Pasaporte:</label>
                                                <input name="pasaporte" type="text" class="form-control input-sm" id="pasaporte" maxlength="8" placeholder="Solo numeros">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Nombre:</label>
                                                <input name="nombre" type="text" class="form-control input-sm" id="nombre" placeholder="Introduzca el Nombre">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Apellido:</label>
                                                <input name="apellido" type="text" class="form-control input-sm" id="apellido" size="35" maxlength="12" placeholder="Introduzca el Apellido">
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
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
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-bottom: 12px;">
                                            <label for="exampleInputEmail1">Estado Civil:</label>
                                            <select name="estado_civil" class="form-control input-sm" id="estado_civil">
                                                <option value="0" selected>Seleccione:</option>
                                                <option value="Soltero(a)">Soltero(a)</option>
                                                <option value="Casado(a)">Casado(a)</option>
                                                <option value="Divorciado(a)">Divorciado(a)</option>
                                                <option value="Viudo(a)">Viudo(a)</option>                
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-bottom: 12px;">
                                            <label for="exampleInputEmail1">Condici&oacute;n:</label>
                                            <select name="condicion" class="form-control input-sm" id="condicion">
                                                <option value="0" selected>Seleccione:</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Libre">Libre</option>
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-bottom: 12px;">
                                            <label for="exampleInputEmail1">Fecha de Nacimiento:</label>
                                            <input name="fecha1" style="background-color: #FFFFFF" type="text" class="form-control input-sm" id="fecha1" size="25" readonly="true">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-bottom: 12px;">
                                            <label for="exampleInputEmail1">Lugar de Nacimiento:</label>
                                            <input name="lugar_nacimiento" type="text" class="form-control input-sm" id="lugar_nacimiento"  placeholder="Introduzca Lugar de Nacimiento">
                                        </div>
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
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-bottom: 12px;">
                                            <label>Email:</label>
                                            <input name="email" type="text" class="form-control input-sm" id="email" size="45" placeholder="ejemplo@correo.com">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group" style="margin-bottom: 12px;">
                                            <label for="exampleInputEmail1">Direcci&oacute;n:</label>
                                            <textarea name="direccion" cols="43" rows="2" class="form-control input-sm" id="direccion" placeholder="Introduzca la Direcci&oacute;n"></textarea>
                                        </div>
                                    </td>
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
                <td width="49%" valign="top"><img src="images/participantes.jpg" width="589" height="444"></td>
            </tr>
            <tr>
                <td colspan="2">&nbsp;</td>
            </tr>
        </table>
    </body>
</html>

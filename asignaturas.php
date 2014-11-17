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
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
            <script type="text/javascript" src="javascript/jquery-1.11.0.js"></script>
            <script type="text/javascript" src="javascript/bootstrap.js"></script>
            <script type="text/javascript" src="javascript/funciones.js"></script>
            <!-- End css3menu.com HEAD section -->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Sistema de Control de Estudios - ESAT</title>
            <script type="text/javascript">
                $(document).ready(function () {
                    $('#mencion').change(function () {
                        var cod_men = $(this).val();
                        var cod_tipo = $('#tipo').find('option').filter(':selected').val();
                        if (cod_men != 0 && cod_tipo != 0) {

                            var men = cod_men + '/' + cod_tipo;
                            $.post("buscar_asignatura.php", {cod_men: cod_men, cod_tipo: cod_tipo}, function (respuesta) {
                                men = men + '-' + respuesta;
                                $('#codigo').val(men);
                            });
                        } else {
                            $('#codigo').val('');
                        }
                    });

                    $('#tipo').change(function () {
                        var cod_tipo = $(this).val();
                        var cod_men = $('#mencion').find('option').filter(':selected').val();
                        if (cod_men != 0 && cod_tipo != 0) {
                            var men = cod_men + '/' + cod_tipo;
                            $.post("buscar_asignatura.php", {cod_men: cod_men, cod_tipo: cod_tipo}, function (respuesta) {
                                men = men + '-' + respuesta;
                                $('#codigo').val(men)
                            });
                        } else {
                            $('#codigo').val('')
                        }
                    });
                    var numero = '0123456789';
                    $('#uc').validar(numero);
                    
//                    $('#registrar').click(function (event) {
//                        if ($('#mencion').val() == '') {
//                            event.preventDefault();
//                            $('#mencion').parent('div').addClass('has-error');
//                            $('#mencion').focus();
//                        }else{
//                            $('#form1').submit();
//                        }
//                    });
                    
                });
            </script>

            <style type="text/css"> 
                <!-- 
                input { font-family: Tahoma; font-size: 14px; border: #990000; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px} 

            </style>
            <style type="text/css">
                <!--
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
                .Estilo94 {font-family: Verdana; font-size: 12px; }
                -->
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
                    <td width="49%">
                        <div align="right">
                            <span class="Estilo51">
                                Bienvenido
                                <br/>Has entrado con el nombre de usuario 
                                <?php echo $_SESSION["usuario"]; ?>
                            </span>
                            <span class="Estilo51">
                                <?php
                                require './conex.php';
                                conectar();
                                # GUARDAR AUDITORIA
                                $fecha     = date("Y/m/d");
                                $hora      = date("h:i a ");
                                $usuario2  = $_SESSION["usuario"];
                                $operacion = "Ingreso al Registro de Asignaturas";
                                $sql5      = "INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
                                mysql_query($sql5);
                                ?>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><div align="center">
                            <p class="Estilo52">Registro de Asignaturas </p>
<!--                            <form action="regasignaturas.php" method="post" name="form1" id="form1" onSubmit="return Validar(this);">-->
                            <form action="regasignaturas.php" method="post" name="form1" id="form1">
                                <table border="0" style="width: 70%">                                  
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Nombre: </label>
                                                <input name="nombre" type="text" class="form-control input-sm" id="nombre" placeholder="Introduzca el Nombre">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="Estilo6" style="margin-left: 5px;">*</span>
                                        </td>
                                    </tr>                                    
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="form-group" style="margin-bottom: 12px;">
                                                <label for="exampleInputEmail1">Unidad de Cr&eacute;dito: </label>
                                                <input name="uc" type="text" class="form-control input-sm"  id="uc" maxlength="1" placeholder="Solo N&uacute;mero">
                                            </div>
                                        </td>
                                        <td>
                                            <span class="Estilo6" style="margin-left: 5px;">*</span>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td>&nbsp;</td>
                                    </tr>                                    
                                    <tr>
                                        <td>
                                            <span>Nota: <span class="Estilo6">*</span> Campos Obligatorios </span>
                                        </td>
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
                    <td width="49%" valign="top"><img src="images/ASIGNATURAS2.jpg" width="665" height="426"></td>
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

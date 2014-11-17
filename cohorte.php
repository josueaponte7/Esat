<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset($_SESSION["usuario"], $_SESSION["contrasena"])) {
    header("Location: index.php"); //evita que se ingrese a cualquier pagina no iniciando sesion
} else {

    require './conex.php';
    conectar();
    # GUARDAR AUDITORIA
    $fecha     = date("Y/m/d");
    $hora      = date("h:i a ");
    $usuario2  = $_SESSION["usuario"];
    $operacion = "Ingreso al Registro de Cohosrte";
    $sql5      = "INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
    mysql_query($sql5);
    
    $cohorte = date('Y');
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
            <script type="text/javascript">


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
                    <td colspan="2">
                        <img src="images/titulo.jpg" width="100%" height="82" />
                    </td>
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
                        </div>
                    </td>
                </tr>
                <tr>
                    <td valign="top"><div align="center">
                            <p class="Estilo52">Registrar Cohorte <?php echo $cohorte; ?></p>
                            <form action="cohortereg.php" method="post" name="form1" id="form1" onSubmit="return Validar(this);">
                                <table style="width: 90%" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">

                                    <tr>
                                        <td bordercolor="#6A90B5" bgcolor="#FFFFFF">
                                            <span class="Estilo54">
                                                <strong>Menci&oacute;n:</strong>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#6A90B5" bgcolor="#FFFFFF">
                                            <span class="Estilo54">
                                                 <select name="mencion" id="mencion" class="form-control input-sm">
                                                    <option value="0">Seleccione:</option> 
                                                    <?php
                                                    $sql       = "SELECT cod_men,nombre FROM menciones";
                                                    $result    = mysql_query($sql);
                                                    while ($row       = mysql_fetch_array($result)) {
                                                        ?>
                                                        <option value="<?php echo $row["cod_men"]; ?>"><?php echo $row["nombre"]; ?></option> 
                                                        <?php
                                                    }
                                                    ?>
                                                </select>  
                                                <span class="Estilo6">*</span>
                                                        
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Cuatrimestre:</strong></span></td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#6A90B5" bgcolor="#FFFFFF">
                                            <span class="Estilo54">
                                                 <select name="cuatrimestre" id="cuatrimestre" class="form-control input-sm">
                                                    <option value="0">Seleccione:</option> 
                                                    <?php
                                                    $sql       = "SELECT id_cuatrimestre,cuatrimestre FROM cuatrimestre;";
                                                    $result    = mysql_query($sql);
                                                    while ($row1 = mysql_fetch_array($result)) {
                                                        ?>
                                                        <option value="<?php echo $row1["id_cuatrimestre"]; ?>"><?php echo utf8_encode($row1["cuatrimestre"]); ?></option> 
                                                        <?php
                                                    }
                                                    ?>
                                                </select>  
                                                <span class="Estilo6">*</span>     
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#6A90B5" bgcolor="#FFFFFF">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#6A90B5" bgcolor="#FFFFFF">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table border="1" align="center" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Asignatura
                                                        </th>
                                                        <th>
                                                            Seleccione
                                                        </th>
                                                        <th>
                                                            Tipo
                                                        </th>
                                                    </tr>
                                                </thead>
                                                    <tbody>
                                                    <?php
                                                    $sql       = "SELECT cod_asi,nombre FROM asignaturas;";
                                                    $result    = mysql_query($sql);
                                                    while ($row2 = mysql_fetch_array($result)) {
                                                        ?>
                                                        <tr>
                                                            <td style="height: 40px;">
                                                                <?php echo $row2['nombre'];?>
                                                            </td>
                                                            <td style="text-align: center">
                                                                <input type="checkbox" name="asignatura[]" value="<?php echo $row2['cod_asi'] ?>" />
                                                            </td>
                                                            <td>
                                                                <select name="tipo[]" id="tipo" class="form-control input-sm">
                                                                    <option value="0">seleccione:</option>
                                                                    <option value="OB">OBLIGATORIA</option>
                                                                    <option value="EL">ELECTIVA</option>
                                                                </select> 
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                        
                                                    </tbody>
                                                </table>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#6A90B5" bgcolor="#FFFFFF">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">Nota: <span class="Estilo6">*</span> Campos Obligatorios </span></td>
                                    </tr>
                                    <tr>
                                        <td bordercolor="#6A90B5">
                                            <div align="center" class="Estilo54">
                                                <label>
                                                    <input name="Submit" type="submit" class="Estilo53"  value="Registrar">
                                                </label>
                                                <label>
                                                    <input name="Submit2" type="submit" class="Estilo53" value="Cancelar">
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <p>&nbsp;</p>
                        </div></td>
                    <td width="49%" valign="top"><img src="images/ChangePassword.png" width="100%" height="400"></td>
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


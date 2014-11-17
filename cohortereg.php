<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset($_SESSION["usuario"], $_SESSION["contrasena"])) {
    header("Location: index.php"); //evita que se ingrese a cualquier pagina no iniciando sesion
} else {
    
    
    $mencion      = $_POST["mencion"];
    $cuatrimestre = $_POST["cuatrimestre"];
    $asignatura   = $_POST["asignatura"];
    $tipo         = $_POST["tipo"];
    $estatus = "Activo";
    $cohorte = date('Y');
    require_once './conex.php';
    conectar();
    ?>
    <!DOCTYPE html PUBLIC >
    <html>
        <head>
            <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
            <script type="text/javascript" src="javascript/jquery-1.11.0.js"></script>
            <script type="text/javascript" src="javascript/bootstrap.js"></script>
            <script type="text/javascript" src="javascript/funciones.js"></script>
            <!-- End css3menu.com HEAD section -->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Sistema de Control de Estudios - ESAT</title>

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
                    </td>
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
                            <span class="Estilo51">
                            </span>
                        </div>
                    </td>
                </tr>
            </table>
                <?php
                $query1       = "SELECT siglas FROM menciones WHERE cod_men='$mencion'";
                $result       = mysql_query($query1);
                $row2 = mysql_fetch_array($result);
                $siglas = $row2['siglas'];
                
                $sql_del = "DELETE FROM cohorte WHERE cod_men=$mencion AND id_cuatrimestre=$cuatrimestre;";
                mysql_query($sql_del);
                $j = 1;
                for ($i = 0; $i < count($asignatura); $i++) {
                    $codigo = $siglas.'/'.$tipo[$i].'-'.str_pad($j, 2,'0',STR_PAD_LEFT);
                    $sql_in = "INSERT INTO cohorte(codigo,cohorte,cod_men,id_cuatrimestre,cod_asi,tipo)
                                            VALUES('$codigo','$cohorte','$mencion','$cuatrimestre',$asignatura[$i],'$tipo[$i]');";
                    mysql_query($sql_in);
                    $j++;
                }

                $fecha     = date("Y/m/d");
                $hora      = date("h:i a ");
                $usuario2  = $_SESSION["usuario"];
                $operacion = "Registro un Menci&oacute;n";
                $sql5      = "INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
                mysql_query($sql5);
                ?>
                <script language="JavaScript">
                    alert("La Cohorte se registro exitosamente");
                    location.href = "cohorte.php";
                </script>
                   
        </body>
    </html>
    <?php
}
?>
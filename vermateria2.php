<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset($_SESSION["usuario"], $_SESSION["contrasena"])) {
    header("Location: index.php"); //evita que se ingrese a cualquier pagina no iniciando sesion
} else {

    require './conex.php';
    conectar();
    $query    = "SELECT * FROM asignaturas";
    $result   = mysql_query($query);
    $array    = mysql_fetch_array($result);
    if (mysql_num_rows($result) == 0) {
        ?>
        <script language="JavaScript">
            alert("No se ha encontrado ningun registro.");
            parent.window.close();
        </script>
        <?php
    }
    ?>
    <?php
    $_pagi_sql     = "SELECT * from asignaturas order by codigo asc";
    $resultado     = mysql_query($_pagi_sql);
    $_pagi_cuantos = 15;
    require("paginator.inc.php");
    $con_pro       = mysql_num_rows($resultado);
    ?>
    <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
            <title>.....:::::GESTEMARCA:::::.....</title>
            <script language="javascript">

                function pon_prefijo(codigo, nombre, mencion) {
                    parent.opener.document.form1.codigo_materia.value = codigo;
                    parent.opener.document.form1.materia.value = nombre;
                    parent.window.close();
                }

            </script>
            <script>
                function Valida()
                {
                    if (IsChk('Checkbox'))
                    {
            //ok, hay al menos 1 elemento checkeado env�a el form!
                        return true;
                    } else {
            //ni siquiera uno chequeado no env�a el form
                        alert('Seleccione al menos un elemento para eliminar!');
                        return false;
                    }
                }
                function IsChk(chkName)
                {
                    var found = false;
                    var chk = document.getElementsByName(chkName + '[]');
                    for (var i = 0; i < chk.length; i++)
                    {
                        found = chk[i].checked ? true : found;
                    }
                    return found;
                }
            </script>
            <?php
   
            $sql    = "SELECT * FROM asignaturas order by codigo asc";
            $result = mysql_query($sql);

            $count = mysql_num_rows($result);
            ?>
            <style type="text/css">

                body,td,th {
                    font-family: Geneva, Arial, Helvetica, sans-serif;
                    font-size: 12px;
                    color: #000000;
                }
                body {
                    background-image: url();
                }
                .Estilo10 {font-family: Verdana;
                           font-size: 14px;
                }
                .Estilo106 {font-size: 12px}
                a:link {
                    color: #006600;
                }
                a:visited {
                    color: #006600;
                }
                a:hover {
                    color: #FF0000;
                }
                a:active {
                    color: #006600;
                }
                .Estilo113 {
                    font-size: 15px;
                    font-weight: bold;
                }
                .Estilo116 {font-size: 12px; font-weight: bold; color: #FFFFFF; font-family: Geneva, Arial, Helvetica, sans-serif; }
                .Estilo118 {font-family: Geneva, Arial, Helvetica, sans-serif; color: #FFFFFF; font-weight: bold; }
                .Estilo121 {font-family: Geneva, Arial, Helvetica, sans-serif; font-weight: bold; }
                .Estilo122 {
                    color: #FFFFFF;
                    font-weight: bold;
                }

            </style></head>

        <body>
            <div align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <th valign="top" scope="col"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <th scope="row"><div align="justify" class="Estilo106">
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="1231" align="right" valign="top"><form name="form1" method="post" action="verinsumo1.php">
                                                            <label>
                                                                <div align="center"><span class="Estilo113">LISTA DE ASIGNATURAS </span></div>
                                                            </label>
                                                        </form></td>
                                                </tr>
                                            </table>
                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                <tr>
                                                    <th scope="row"><form name="form2" method="post" action="" onSubmit="return Valida()">
                                                            <table width="100%" border="1" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
                                                                <tr bgcolor="#1D78AF">
                                                                    <td width="200" height="22" align="center" bgcolor="#AA0000"><span class="Estilo116">C&oacute;digo</span></td>
                                                                    <td width="441" align="center" bgcolor="#AA0000"><span class="Estilo116">Nombre</span></td>
                                                                    <td width="317" align="center" bgcolor="#AA0000"><span class="Estilo122">Menci&oacute;n</span></td>
                                                                    <td width="163" align="center" bgcolor="#AA0000"><span class="Estilo122">Cuatrimestre</span></td>
                                                                    <td width="160" align="center" bgcolor="#AA0000"><span class="Estilo122">Tipo</span></td>
                                                                    <td width="77" align="center" bgcolor="#AA0000"><span class="Estilo118">Acci&oacute;n</span></td>
                                                                </tr>
    <?php while ($rows = mysql_fetch_array($_pagi_result)) { ?>
                                                                    <tr>
                                                                        <td><span class="Estilo121">
                                                                    <?php echo $rows['codigo'] ?>
                                                                            </span></td>
                                                                        <td><span class="Estilo121">
                                                                                <?php echo $rows['nombre'] ?>

                                                                            </span></td>
                                                                        <td><span class="Estilo121">
                                                                                <?php echo $rows['mencion'] ?>
                                                                            </span></td>
                                                                        <td><span class="Estilo121">
                                                                                <?php echo $rows['cuatrimestre'] ?>
                                                                            </span></td>
                                                                        <td><span class="Estilo121">
                                                                                <?php echo $rows['tipo'] ?>
                                                                            </span></td>
                                                                        <td align="center"><a href="javascript:pon_prefijo('<?php echo $rows['codigo']; ?>','<?php echo $rows['nombre'] ?>')" title="Seleccionar Materia" class="Estilo121"><img src="images/ok.jpg" width="23" height="23" border="0"></a></td>
                                                                    </tr>
                                                                            <?php } ?>
                                                            </table>
                                                        </form></th>
                                                </tr>
                                            </table>
                                            <div align="center"><span class="Estilo10"><?php echo $_pagi_navegacion ?></span></div>
                                        </div></th>
                                </tr>
                            </table></th>
                    </tr>
                </table>
            </div>
        </body>
    </html>
<?php } ?>
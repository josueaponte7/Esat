<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset ($_SESSION["usuario"],$_SESSION["contrasena"]))
{
header ("Location: index.php");//evita que se ingrese a cualquier pagina no iniciando sesion
}else {
?>
<?php
function formateaBD($fecha) {
        $fechaesp = preg_split("/[\-\/]/", $fecha);
        $revertirfecha = array_reverse($fechaesp);
        $fechabd = implode('-', $revertirfecha);
        return $fechabd;
    }
    require './conex.php';
    conectar();
//VARIABLE DEL FORMULARIO
    $cedula           = $_POST["cedula"];
    $pasaporte        = $_POST["pasaporte"];
    $apellido         = $_POST["apellido"];
    $nombre           = $_POST["nombre"];
    $telefono         = $_POST["codigo_tel"].'-'.$_POST["telefono"];
    $email            = $_POST["email"];
    $direccion        = $_POST["direccion"];
    $sexo             = $_POST["sexo"];
    $fecha1           = formateaBD($_POST["fecha1"]);
    $lugar_nacimiento = $_POST["lugar_nacimiento"];
    $estado_civil     = $_POST["estado_civil"];
    $condicion        = $_POST["condicion"];
    $estatus          = "Activo";
//echo "Los datos fueron procesados de forma exitosa";
//$email=$email2;
//$xasunto="Soporte en Linea";
//$xmensaje=$problema2;
//mail($xemail, $xasunto, $xmensaje);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Start css3menu.com HEAD section -->
	<!--<link rel="stylesheet" href="menuadmin.css3prj_files/css3menu1/style.css" type="text/css" /><style>._css3m{display:none}</style>-->
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<!-- End css3menu.com HEAD section -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Control de Estudios - ESAT</title>

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
      <? include("menufinal.php"); ?>
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
  # GUARDAR AUDITORIA
$fecha= date ("Y/m/d");
$hora= date ("h:i a ");
$usuario2 = $_SESSION["usuario"]; 
$operacion= "Registro un Participante";
$sql5="INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
mysql_query($sql5); 
 
?>
    </span></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">
      <p class="Estilo52">Registro de Participantes </p>
      <span class="Estilo13"><span class="Estilo54"><span class="Estilo59">
      <?php
$date=date("Y-m-d");
$query1="SELECT * FROM participantes WHERE cedula='$cedula'";
$result=mysql_query($query1);
if (mysql_num_rows($result)==0)
{
//
//
$sql = "insert into participantes (cedula, nombre, telefono, email, direccion, apellido, sexo, pasaporte, fecha_nacimiento, lugar_nacimiento, estado_civil, condicion, estatus) values ('$cedula', '$nombre', '$telefono', '$email', '$direccion', '$apellido', '$sexo', '$pasaporte', '$fecha1', '$lugar_nacimiento', '$estado_civil', '$condicion', '$estatus');";
$result_ced=mysql_query($sql);
if ($result_ced)  
{
?>
      <script language="JavaScript">
alert("El Participante se registro exitosamente");
location.href="participantes.php";
          </script>
      <?php	
//header ("Location: proveedor.php");
//echo "Los datos fueron procesados de forma exitosa";
}
?>
      </span>Los datos fueron procesados de forma exitosa. </span>la pagina ser&aacute; redireccionada</span>
      <p>&nbsp;</p>
    </div></td>
    <td width="49%"><img src="images/participantes.jpg" width="589" height="444"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?
} else {
//echo "Este proveedor ya existe";
//echo "<br><a href='proveedor.php'>Volver</a>";
?>
<script language="JavaScript">
alert("Este Participante ya existe");
location.href="participantes.php"
</script>
<?php	
}
?>
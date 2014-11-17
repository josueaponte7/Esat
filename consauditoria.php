<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset ($_SESSION["usuario"],$_SESSION["contrasena"]))
{
header ("Location: index.php");//evita que se ingrese a cualquier pagina no iniciando sesion
}else {
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
            <script type="text/javascript" src="javascript/jquery-1.11.0.js"></script>
            <script type="text/javascript" src="javascript/bootstrap.js"></script>
            <script type="text/javascript" src="javascript/funciones.js"></script>
            <!-- End css3menu.com HEAD section -->
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sistema de Control de Estudios - ESAT</title>
<script language="JavaScript">
!-- Hide

//creamos la funcion, y como parametro haremos referencia a form (sera el nombre de nuestro formulario)

function test(form1) {
if (form1.codigo.value == ""){
alert("Ingrese el codigo de la asignatura!");return false;
}
if (form1.nombre.value == ""){
alert("Ingrese el Nombre de la asignatura!");return false;
}
if (form1.uc.value == ""){
alert("Ingrese las unidades de creditos de la asignatura!");return false;
}
document.forms[0].submit();
return true
}
</script>
<script language="JavaScript">

var nav4 = window.Event ? true : false;
function acceptNum(evt){   
var key = nav4 ? evt.which : evt.keyCode;   
return (key <= 13 || (key>= 48 && key <= 57));
}
//-->
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
.Estilo94 {font-family: Verdana; font-size: 12px; }
-->
</style></head>

<body>
<script language="javascript" src="./cal.js"></script>
<script language="javascript" src="./cal_conf.js"></script>
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

	  ?>
      </span><span class="Estilo51">
        <?php	 
          require './conex.php';
          conectar();
  # GUARDAR AUDITORIA
$fecha= date ("Y/m/d");
$hora= date ("h:i a ");
$usuario2 = $_SESSION["usuario"]; 
$operacion= "Ingreso al Informe de Auditoria";
$sql5="INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
mysql_query($sql5); 
 
?>
    </span></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">
      <p class="Estilo52">Informe de Auditoria </p>
      <form action="consauditoria2.php" method="post" name="form1" target="_blank" id="form1" onSubmit="return Validar(this);">
        <table width="368" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">

          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Fecha Desde:</strong></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <label></label>
              <input name="fecha1" type="text" id="fecha1" size="35" readonly=&rdquo;readonly&rdquo;>
              <small><a href="javascript:showCal('Calendar1')"><img src="images/calendario.jpg" width="25" height="27" border="0"></a> <span class="Estilo6">*</span></small></span>              <div align="left" class="Estilo54"></div>            <div align="left" class="Estilo54"></div></td>
            </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Fecha Hasta:</strong></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><input name="fecha2" type="text" id="fecha2" size="35" readonly=&rdquo;readonly&rdquo;>
              <small><a href="javascript:showCal('Calendar2')"><img src="images/calendario.jpg" width="25" height="27" border="0"></a> <span class="Estilo6">*</span></small></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">Nota: <span class="Estilo6">*</span> Campos Obligatorios </span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5"><div align="center" class="Estilo54">
                <label>
                <input name="Submit" type="submit" class="Estilo53" onClick="test(this.form);return false" value="Consultar">
                </label>
                <label>
                <input name="Submit2" type="reset" class="Estilo53" value="Cancelar">
                </label>
            </div></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
    </div></td>
    <td width="49%" valign="top"><img src="images/auditoria.jpg" width="100%" height="400"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php } ?>
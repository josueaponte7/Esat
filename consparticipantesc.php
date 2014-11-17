<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset ($_SESSION["usuario"],$_SESSION["contrasena"]))
{
header ("Location: index.php");//evita que se ingrese a cualquier pagina no iniciando sesion
}else {
?>
<?php mysql_connect("localhost","root","admin");
$cohorte=$_REQUEST["cohorte"];
   mysql_select_db("esat");
   $query="SELECT * from inscripcion where cohorte='$cohorte' group by cedula_par";
   $resultado=mysql_query($query);
?>
<? mysql_connect("localhost","root","admin");
   mysql_select_db("esat");
   $_pagi_sql="SELECT * from inscripcion where cohorte='$cohorte' group by cedula_par";
   $resultado=mysql_query($_pagi_sql);
   $_pagi_cuantos = 10;
require("paginator.inc.php");
$con_pro = mysql_num_rows($resultado);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="menuadmin.css3prj_files/css3menu1/style.css" type="text/css" /><style>._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Control de Estudios - ESAT</title>
<script language="JavaScript">
!-- Hide

//creamos la funcion, y como parametro haremos referencia a form (sera el nombre de nuestro formulario)

function test(form1) {
if (form1.cedula.value == ""){
alert("Ingrese la cedula del facilitador(a)!");return false;
}
if (form1.nombre.value == ""){
alert("Ingrese el Nombre del facilitador(a)!");return false;
}
if (form1.apellido.value == ""){
alert("Ingrese el apellido del facilitador(a)!");return false;
}
if (form1.sexo.value == ""){
alert("Ingrese el sexo del facilitador(a)!");return false;
}
if (form1.telefono.value == ""){
alert("Ingrese el telefono del facilitador(a)!");return false;
}
if (form1.email.value == "" || form1.email.value.indexOf('@') == -1 || form1.email.value.indexOf('.')== -1){
alert("La direccion de correo no es valida!");return false;
}
if (form1.direccion.value == ""){
alert("Ingrese la direccion del facilitador(a)!");return false;
}
document.forms[0].submit();
return true
}
</script>
<script language="JavaScript">
<!--
var nav4 = window.Event ? true : false;
function acceptNum(evt){   
var key = nav4 ? evt.which : evt.keyCode;   
return (key <= 13 || (key>= 48 && key <= 57));
}
//-->
</script>
<style type="text/css"> 
<!-- 
input { font-family: Tahoma; font-size: 14px; border: #990000; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px} 

}

--> 
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
.Estilo54 {font-size: 12px}
.Estilo94 {font-family: Verdana; font-size: 12px; }
.Estilo95 {font-size: 14px;
	font-weight: bold;
}
-->
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
 include("conexion44.php");
 $db=conectate();
  # GUARDAR AUDITORIA
$fecha= date ("Y/m/d");
$hora= date ("h:i a ");
$usuario2 = $_SESSION["usuario"]; 
$operacion= "Realizo un Reporte de Participantes";
$sql5="INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
mysql_query($sql5, $db); 
 
?>
    </span></div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><div align="center">
      <p class="Estilo52">Reporte de Participantes </p>
      <form action="consparticipantesc.php" method="post" name="form1" id="form1" onSubmit="return Validar(this);">
        <table width="368" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Indique Cohorte: 
                  <input name="cohorte" type="text" class="Estilo53" id="cohorte" size="8">              
                <input name="Submit" type="submit" class="Estilo53" onClick="test(this.form);return false" value="Buscar">
            </strong></span></td>
          </tr>
        </table>
      </form>
      <form action="consparticipantesm.php" method="post" name="form1" id="form2" onSubmit="return Validar(this);">
        <table width="560" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">
          <tr>
            <td width="556" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Indique Menci&oacute;n:
                  <span class="Estilo94">
                  <?php 
				//$cedula3=$cedula2;
		require("enlacebd6.php");
		$conn = Conectarse();
//if ($servicio=="Paquetes")
//{
$sql="Select nombre from menciones";
$result=mysql_query($sql);

echo '<select name="mencion">';
//Mostramos los registros en forma de men&uacute; desplegable
while ($row=mysql_fetch_array($result))
{echo '<option>'.$row["nombre"];}
mysql_free_result($result);
//}
?>
                  </span>                    
                  <input name="Submit2" type="submit" class="Estilo53" onClick="test(this.form);return false" value="Buscar">
            </strong></span></td>
          </tr>
        </table>
      </form>
      <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">

        <tr>
          <td width="105"><div align="center"><strong>C.I.</strong></div></td>
          <td width="262"><div align="center"><span class="Estilo53">Nombre y Apellido </span></div></td>
          <td width="95"><div align="center"><strong>Sexo</strong></div></td>
          <td width="96"><div align="center"><strong>Estado Civil </strong></div></td>
          <td width="122"><div align="center"><strong>Fecha Nacimiento </strong></div></td>
          <td width="100"><div align="center"><span class="Estilo53">Tel&eacute;fonos</span></div></td>
          <td width="160"><div align="center"><span class="Estilo53">Email</span></div></td>
          <td width="108"><div align="center"><span class="Estilo53">Condici&oacute;n</span></div></td>
          <td width="240"><div align="center"><strong>Direcci&oacute;n</strong></div></td>
          </tr>
        <?php while($fila=mysql_fetch_array($_pagi_result)){?>
        <tr>
          <td><span class="Estilo53">
            <? echo $fila['cedula_par'];
			$cedula=$fila['cedula_par']; ?></span></td>
          <td><span class="Estilo95">
            <?php
 //include("conexion44.php");
 $db=conectate();
 $sql4="SELECT * FROM participantes where cedula='$cedula'"; 
  //var_dump($sql2); die;
 $res4=mysql_query($sql4,$db);
// $nro_fila2= @mysql_num_rows ($res2);
 $ligne4=@mysql_fetch_array($res4);
 //while ($ligne2 = @mysql_fetch_array ($res2)) 
 //var_dump($ligne); 
 {
 ?>
            <? echo $ligne4["nombre"]; ?> <? echo $ligne4["apellido"]; ?></span></td>
          <td><span class="Estilo54"><span class="Estilo95"><? echo $ligne4["sexo"]; ?></span></span></td>
          <td><span class="Estilo54"><span class="Estilo95"><? echo $ligne4["estado_civil"]; ?></span></span></td>
          <td><span class="Estilo54"><span class="Estilo95"><? echo $ligne4["fecha_nacimiento"]; ?></span></span></td>
          <td><span class="Estilo54"><span class="Estilo95"><? echo $ligne4["telefono"]; ?></span></span></td>
          <td><span class="Estilo54"><span class="Estilo95"><? echo $ligne4["email"]; ?></span></span></td>
          <td><span class="Estilo54"><span class="Estilo95"><? echo $ligne4["condicion"]; ?></span></span></td>
          <td><span class="Estilo54"><span class="Estilo95">
            <? echo $ligne4["direccion"]; ?>
            <?php } ?>
            </span></span></td>
          </tr>
        <? }?>
      </table>
      <p><? echo $_pagi_navegacion ?></p>
      <p>&nbsp;</p>
    </div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>

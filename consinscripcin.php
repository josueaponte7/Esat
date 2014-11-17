<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset ($_SESSION["usuario"],$_SESSION["contrasena"]))
{
header ("Location: index.php");//evita que se ingrese a cualquier pagina no iniciando sesion
}else {
?>
<?php 
    require './conex.php';
    conectar();
   $query="SELECT * from inscripcion order by ninscripcion";
   $resultado=mysql_query($query);

   $_pagi_sql="SELECT * from inscripcion order by ninscripcion";
   $resultado=mysql_query($_pagi_sql);
   $_pagi_cuantos = 10;
require("paginator.inc.php");
$con_pro = mysql_num_rows($resultado);
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
.Estilo54 {font-size: 12px}
.Estilo11 {font-size: 10px}
.Estilo55 {font-size: 14px}
.Estilo6 {color: #FF0000;
	font-weight: bold;
}
.Estilo57 {color: #000000; font-weight: bold; }

</style></head>

<body>
<script language="javascript" src="./cal3.js"></script>
<script language="javascript" src="./cal_conf2.js"></script>
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

	  ?>
      </span><span class="Estilo51">
        <?php	 

  # GUARDAR AUDITORIA
$fecha= date ("Y/m/d");
$hora= date ("h:i a ");
$usuario2 = $_SESSION["usuario"]; 
$operacion= "Realizo un Reporte de Inscripci�n";
$sql5="INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
mysql_query($sql5, $db); 
 
?>
    </span></div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><div align="center">
      <p class="Estilo52">Reporte de Inscripciones </p>
      <form name="form1" method="post" action="consinscripcionfecha.php">
        <span class="Estilo54"><strong>Desde:</strong> 
        <input name="fecha1" type="text" id="fecha1" size="15" readonly=&rdquo;readonly&rdquo;>
        <small><a href="javascript:showCal('Calendar1')"><img src="images/calendario.jpg" width="25" height="27" border="0"></a> <span class="Estilo57"> Hasta: </span></small></span> 
        <input name="fecha2" type="text" id="fecha2" size="15" readonly=&rdquo;readonly&rdquo;>
        <small><a href="javascript:showCal('Calendar2')"><img src="images/calendario.jpg" width="25" height="27" border="0"></a></small>
        <input type="submit" name="Submit" value="BUSCAR">
      </form>
      <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">

        <tr>
          <td width="115"><div align="center"><strong>N&deg;</strong></div></td>
          <td width="249"><div align="center"><strong>C.I.</strong></div></td>
          <td width="160"><div align="center"><span class="Estilo53">Nombre y Apellido </span></div></td>
          <td width="164"><div align="center"><span class="Estilo53">Tel&eacute;fonos</span></div></td>
          <td width="357"><div align="center"><strong>Doctorado</strong></div></td>
          <td width="116"><div align="center"><strong>Fecha</strong></div></td>
          <td width="54">&nbsp;</td>
        </tr>
        <?php while($fila=mysql_fetch_array($_pagi_result)){?>
        <tr>
          <td><span class="Estilo54">
            <?php echo $fila['ninscripcion']?>
          </span></td>
          <td><span class="Estilo11"> <span class="Estilo54">
            <?php echo $fila['cedula_par'];
			$cedula_par=$fila['cedula_par']; ?>
          </span></span></td>
          <td><span class="Estilo55">
            <?php
 //include("conexion44.php");

 $sql4="SELECT * FROM participantes where cedula='$cedula_par'"; 
  //var_dump($sql2); die;
 $res4=mysql_query($sql4,$db);
// $nro_fila2= @mysql_num_rows ($res2);
 $ligne4=@mysql_fetch_array($res4);
 //while ($ligne2 = @mysql_fetch_array ($res2)) 
 //var_dump($ligne); 
 {
 ?>
            <?php echo $ligne4["nombre"]; ?> <?php echo $ligne4["apellido"]; ?></span></td>
          <td><span class="Estilo54"><span class="Estilo55"><?php echo $ligne4["telefono"]; ?></span><span class="Estilo55"><strong>
            <?php } ?>
            </strong></span></span></td>
          <td><span class="Estilo54">
            <?php echo $fila['doctorado']?>
          </span></td>
          <td><span class="Estilo54">
            <?php echo $fila['fecha']?>
          </span></td>
          <td>
              <div align="center">
                  <a href="imprimirinscripcion.php?idu=<?php echo $fila['ninscripcion']?>" target="_blank">
                      <img src="images/imprimir.png" width="36" height="36" border="0" title="Eliminar">
                  </a>
              </div>
          </td>
        </tr>
        <?php }?>
      </table>
      <p><?php echo $_pagi_navegacion ?></p>
      <p><a href="inscripcionpdf.php" target="_blank"><img src="images/descarga.jpg" width="48" height="48" border="0" title="Imprimir en PDF"></a></p>
    </div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?php } ?>
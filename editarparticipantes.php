<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset ($_SESSION["usuario"],$_SESSION["contrasena"]))
{
header ("Location: index.php");//evita que se ingrese a cualquier pagina no iniciando sesion
}else {
?>
<?php mysql_connect("localhost","root","admin");
	mysql_select_db("esat");
if(isset($_GET['ac'])){
$query="update participantes set cedula='".$_POST['cedula']."',nombre='".$_POST['nombre']."',telefono='".$_POST['telefono']."',apellido='".$_POST['apellido']."',email='".$_POST['email']."',direccion='".$_POST['direccion']."',pasaporte='".$_POST['pasaporte']."',condicion='".$_POST['condicion']."',fecha_nacimiento='".$_POST['fecha1']."',lugar_nacimiento='".$_POST['lugar_nacimiento']."',estado_civil='".$_POST['estado_civil']."' where cod_par=".$_POST['cod_par'];
mysql_query($query);
header("location:consparticipantes.php");};

$cod_par=$_GET['cod_par'];
$q="select * from participantes where cod_par=".$cod_par;
$result=mysql_query($q);
$filav=mysql_fetch_array($result);

//$inv="select * from investigador where id_inv=".$filav['id_inv'];
//$invr=mysql_query($inv);
//$invr1=mysql_fetch_array($invr);

//$invtotal="select * from investigador";
//$invtotal1=mysql_query($invtotal);
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
.Estilo98 {color: #000000}
-->
</style></head>

<body>
<script language="javascript" src="./cal2.js"></script>
<script language="javascript" src="./cal_conf2.js"></script>
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
$operacion= "Modifico un Participante";
$sql5="INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
mysql_query($sql5, $db); 
 
?>
    </span></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">
      <p class="Estilo52">Modificar Participantes</p>
      <form action="?ac" method="post" name="form1" id="form1" onSubmit="return Validar(this);">
        <table width="368" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>C.I.:</strong></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <label></label>
              <input name="cedula" type="text" class="Estilo53" id="cedula" onKeyPress="return acceptNum(event)" value="<?=$filav['cedula']?>" size="20" maxlength="8" placeholder="Solo numeros">
            </span>
              <div align="left" class="Estilo54"></div>
              <div align="left" class="Estilo54"></div></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Pasaporte:</strong></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="pasaporte" type="text" class="Estilo53" id="pasaporte" onKeyPress="return acceptNum(event)" value="<?=$filav['pasaporte']?>" size="20" maxlength="8" placeholder="Solo numeros">
            </span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Nombre:</strong></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="nombre" type="text" class="Estilo53" id="nombre" value="<?=$filav['nombre']?>" size="35" placeholder="Introduzca el Nombre">
            </span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Apellido:</strong></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="apellido" type="text" class="Estilo53" id="apellido" value="<?=$filav['apellido']?>" size="35" maxlength="12" placeholder="Introduzca el Apellido">
            </span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo57">Sexo:</span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><label><span class="Estilo54">
              <input name="sexo" type="text" class="Estilo53" id="sexo" value="<?=$filav['sexo']?>" size="35" placeholder="Introduzca el Sexo" />
            </span></label></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Estado Civil: </strong></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><label><span class="Estilo54">
              <input name="estado_civil" type="text" class="Estilo53" id="estado_civil" value="<?=$filav['estado_civil']?>" size="35" placeholder="Introduzca el Estado Civil" />
            </span></label></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Condici&oacute;n:</strong></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="condicion" type="text" class="Estilo53" id="condicion" value="<?=$filav['condicion']?>" size="35" placeholder="Introduzca La condicion" />
            </span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Fecha de Nacimiento: </strong></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><input name="fecha1" type="text" class="Estilo53" id="fecha1" value="<?=$filav['fecha_nacimiento']?>" size="25" readonly=&rdquo;readonly&rdquo;>
                <small><a href="javascript:showCal('Calendar1')"><img src="images/calendario.jpg" width="25" height="27" border="0"></a> <span class="Estilo6">*</span> </small></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Lugar de Nacimiento: </strong></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><input name="lugar_nacimiento" type="text" class="Estilo53" id="lugar_nacimiento" value="<?=$filav['lugar_nacimiento']?>" size="45" placeholder="ejemplo@correo.com">
                <span class="Estilo6">*</span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Tel&eacute;fono:</strong></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><input name="telefono" type="text" class="Estilo53" id="telefono" value="<?=$filav['telefono']?>" size="35" maxlength="12" placeholder="Ej. 0000-0000000">
                <span class="Estilo6">*</span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo57">Email:</span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><input name="email" type="text" class="Estilo53" id="email" value="<?=$filav['email']?>" size="45" placeholder="ejemplo@correo.com">
                <span class="Estilo6">*</span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Direcci&oacute;n:</strong></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><textarea name="direccion" cols="43" rows="2" class="Estilo53" id="direccion" placeholder="Introduzca la Direcci&oacute;n"><?=$filav['direccion']?>
            </textarea>
                <span class="Estilo6">*</span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>

          <tr>
            <td bordercolor="#6A90B5"><div align="center" class="Estilo54">
                <label>
                <input name="Submit" type="submit" class="Estilo53" onClick="test(this.form);return false" value="Modificar">
                </label>
                <label></label>
                <span class="Estilo98">
                <input name="cod_par" type="hidden" id="cod_par" value="<?=$filav['cod_par']?>">
                </span></div></td>
          </tr>
        </table>
      </form>
      </div></td>
    <td width="49%"><img src="images/participantes.jpg" width="590" height="464"></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>

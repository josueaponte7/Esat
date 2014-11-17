<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset ($_SESSION["usuario"],$_SESSION["contrasena"]))
{
header ("Location: index.php");//evita que se ingrese a cualquier pagina no iniciando sesion
}else {
?>
<?php
//VARIABLE DEL FORMULARIO
$cedula_par=$_REQUEST["cedula_par"];
$cuatrimestre=$_REQUEST["cuatrimestre2"];
?>
<?php mysql_connect("localhost","root","admin");
   mysql_select_db("esat");
   $query="SELECT * from notas where cuatrimestre='$cuatrimestre' order by cuatrimestre";
   $resultado=mysql_query($query);
?>
<? mysql_connect("localhost","root","admin");
   mysql_select_db("esat");
   $_pagi_sql="SELECT * from notas where cuatrimestre='$cuatrimestre' order by cuatrimestre";
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
<script>
		var cursor;
		if (document.all) {
		// Está utilizando EXPLORER
		cursor='hand';
		} else {
		// Está utilizando MOZILLA/NETSCAPE
		cursor='pointer';
		}
		
function verparticipante(){
				miPopup = window.open("verparticipante.php","miwin","width=900,height=400,scrollbars=yes");
				miPopup.focus();
			}	
function vermateria(){
				miPopup = window.open("vermateria2.php","miwin","width=900,height=400,scrollbars=yes");
				miPopup.focus();
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
.Estilo11 {font-size: 10px}
.Estilo55 {font-size: 14px}
.Estilo6 {color: #FF0000;
	font-weight: bold;
}
.Estilo94 {font-family: Verdana; font-size: 12px; }
.Estilo95 {color: #000000}
.Estilo95 {font-weight: bold}
-->
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
$operacion= "Realizo un Reporte de Calificaciones Obtenidos";
$sql5="INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
mysql_query($sql5, $db); 
 
?>
    </span></div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><div align="center">
      <p class="Estilo52">Reporte de Calificaciones Obtenidas </p>
      <form action="imprimirnotas.php" method="post" name="form1" target="_blank">
        <table width="804" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">

          <tr>
            <td width="103" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <label></label>
              </span>
                <div align="left" class="Estilo54"><strong>C.I.:</strong></div>
              <div align="left" class="Estilo54"></div></td>
            <td width="152" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Nombre:</strong></span></td>
            <td width="541" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Apellido:<span class="Estilo11">
              <?php
//include("conexion44.php");
 $db=conectate();
 $sql5="SELECT * FROM inscripcion order by ninscripcion desc limit 1";
 $res5=mysql_query($sql5,$db);
 $nro_fila= @mysql_num_rows ($res5);
 while ($ligne5 = @mysql_fetch_array ($res5)) 
 {
 ?>
              </span>
                    <?  $ligne5["ninscripcion"]; ?>
                    <? $total=$ligne5["ninscripcion"];
					$ninscripcion=$total+1;
					 $ninscripcion; ?>
                    <span class="Estilo11">
                    <input name="ninscripcion" type="hidden" id="ninscripcion" value="<? echo $ninscripcion; ?>">
                    <?php }?>
                  </span></strong></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="cedula_par" type="text" class="Estilo53" id="cedula_par" onKeyPress="return acceptNum(event)" size="12" maxlength="8" placeholder="C.I. Participante">
            </span></td>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="nombre" type="text" class="Estilo53" id="nombre" size="20" placeholder="Nombre del Participante">
            </span></td>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="apellido" type="text" class="Estilo53" id="apellido" size="20" placeholder="Apellido del Participante">
              <span class="Estilo6"><strong><span class="Estilo94 Estilo95 Estilo10 Estilo14"><img src="images/lupa.jpg" width="20" height="15" onClick="verparticipante()" onMouseOver="style.cursor=cursor" title="Buscar"> </span><span class="Estilo95">Cuatrimestre:</span></strong>
              <select name="cuatrimestre" class="Estilo53" id="cuatrimestre">
                <option selected>seleccione..</option>
                <option value="PRIMERO">PRIMERO</option>
                <option value="SEGUNDO">SEGUNDO</option>
                <option value="TERCERO">TERCERO</option>
                <option value="CUARTO">CUARTO</option>
                <option value="QUINTO">QUINTO</option>
                <option value="SEXTO">SEXTO</option>
                <option value="SEPTIMO">SEPTIMO</option>
                <option value="OCTAVO">OCTAVO</option>
                <option value="NOVENO">NOVENO</option>
                </select>
              <input type="submit" name="Submit" value="BUSCAR">
              </span></span></td>
          </tr>

          <tr>
            <td colspan="3" bordercolor="#6A90B5" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
        </table>
        </form>
      <form action="consnotas2.php" method="post" name="form1">
        <table width="519" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">

          <tr>
            <td width="515" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><span class="Estilo6"><strong><span class="Estilo95">Cuatrimestre:</span></strong>
              <select name="cuatrimestre2" class="Estilo53" id="cuatrimestre2">
                <option selected>seleccione..</option>
                <option value="PRIMERO">PRIMERO</option>
                <option value="SEGUNDO">SEGUNDO</option>
                <option value="TERCERO">TERCERO</option>
                <option value="CUARTO">CUARTO</option>
                <option value="QUINTO">QUINTO</option>
                <option value="SEXTO">SEXTO</option>
                <option value="SEPTIMO">SEPTIMO</option>
                <option value="OCTAVO">OCTAVO</option>
                <option value="NOVENO">NOVENO</option>
              </select>
              <input type="submit" name="Submit2" value="BUSCAR">
            </span></span></td>
            </tr>
        </table>
      </form>
      <form action="consnotasc.php" method="post" name="form3" id="form3" onSubmit="return Validar(this);">
        <table width="368" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Indique Cohorte:
              <input name="cohorte" type="text" class="Estilo53" id="cohorte" size="8">
                    <input name="Submit3" type="submit" class="Estilo53" onClick="test(this.form);return false" value="Buscar">
            </strong></span></td>
          </tr>
        </table>
      </form>
      <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">

        <tr>
          <td width="213"><div align="center"><strong>Apellidos y Nombres </strong></div></td>
          <td width="160"><div align="center"><strong>C&eacute;dula de Identidad </strong></div></td>
          <td width="189"><div align="center"><span class="Estilo53">Facilitador (90%) </span></div></td>
          <td width="96"><div align="center"><span class="Estilo53">Nota Auto </span></div></td>
          <td width="121"><div align="center"><strong>Def. Auto (5%) </strong></div></td>
          <td width="94"><div align="center"><strong>TOTAL CO </strong></div></td>
          <td width="208"><div align="center"><strong>Definitivo Co. (5%) </strong></div></td>
          <td width="152"><div align="center"><strong>Definitivo (20 pts.) </strong></div></td>
          <td width="138"><div align="center"><strong>Definitivo (100%) </strong></div></td>
          </tr>
        <?php while($fila=mysql_fetch_array($_pagi_result)){?>
        <tr>
          <td><span class="Estilo54">
            <? $fila['cedula_par'];
			$cedula_par=$fila['cedula_par']; ?>
            <span class="Estilo55">
            <?php
 //include("conexion44.php");
 $db=conectate();
 $sql4="SELECT * FROM participantes where cedula='$cedula_par'"; 
  //var_dump($sql2); die;
 $res4=mysql_query($sql4,$db);
// $nro_fila2= @mysql_num_rows ($res2);
 $ligne4=@mysql_fetch_array($res4);
 //while ($ligne2 = @mysql_fetch_array ($res2)) 
 //var_dump($ligne); 
 {
 ?><? echo $ligne4["apellido"]; ?></span>          <span class="Estilo55"> <? echo $ligne4["nombre"]; ?><strong>
            <?php } ?>
            </strong></span></span></td>
          <td><span class="Estilo11"> <span class="Estilo54">
            <?=$fila['cedula_par'];
			$cedula_par=$fila['cedula_par']; ?>
          </span></span></td>
          <td><span class="Estilo54">
            <?=$fila['facilitador'];
			$facilitador=$fila['facilitador']; ?>
          </span></td>
          <td><span class="Estilo54">
            <?=$fila['notaauto'];
			$notaauto=$fila['notaauto']; ?>
          </span></td>
          <td><span class="Estilo54">
            <?php echo $defauto=$notaauto*1/20; ?>
          </span></td>
          <td><span class="Estilo54">
            <?=$fila['totalco'];
			$totalco=$fila['totalco']; ?>
          </span></td>
          <td><span class="Estilo54"><?php echo $definitivoco=$totalco*1/20; ?></span></td>
          <td><span class="Estilo54"><?php echo $definitivoptos=$facilitador+$defauto+$definitivoco; ?></span></td>
          <td><span class="Estilo54"><?php echo $definitivopor=$definitivoptos*100/20; ?></span></td>
          </tr>
        <? }?>
      </table>
      <p><? echo $_pagi_navegacion ?></p>
      <p><a href="notaspdf.php" target="_blank"><img src="images/descarga.jpg" width="48" height="48" border="0" title="Imprimir en PDF"></a></p>
    </div></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>

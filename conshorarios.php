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
    $query = "SELECT * from horario order by nhorario";
    $resultado = mysql_query($query);

   $_pagi_sql="SELECT * from horario order by nhorario";
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

	  ?>
      </span><span class="Estilo51">
        <?php	 

  # GUARDAR AUDITORIA
$fecha= date ("Y/m/d");
$hora= date ("h:i a ");
$usuario2 = $_SESSION["usuario"]; 
$operacion= "Realizo un Reporte de Horarios";
$sql5="INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
mysql_query($sql5, $db); 
 
?>
    </span></div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><div align="center">
      <p class="Estilo52">Reporte de Horarios </p>
      <form action="conshorariosc.php" method="post" name="form1" id="form1" onSubmit="return Validar(this);">
        <table width="368" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Indique Cohorte:
              <input name="cohorte" type="text" class="Estilo53" id="cohorte" size="8">
                    <input name="Submit" type="submit" class="Estilo53" onClick="test(this.form);return false" value="Buscar">
            </strong></span></td>
          </tr>
        </table>
      </form>
      <form action="conshorariosm.php" method="post" name="form1" id="form2" onSubmit="return Validar(this);">
        <table width="560" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">
          <tr>
            <td width="556" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Indique Menci&oacute;n: <span class="Estilo94">
              <?php 
				//$cedula3=$cedula2;
	
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
          <td width="138"><div align="center"><strong>Cuatrimestre</strong></div></td>
          <td width="293"><div align="center"><span class="Estilo53">Asignatura </span></div></td>
          <td width="197"><div align="center"><strong>Mes</strong></div></td>
          <td width="118"><div align="center"><strong>Jueves</strong></div></td>
          <td width="125"><div align="center"><strong>Viernes</strong></div></td>
          <td width="118"><div align="center"><strong>Sabado</strong></div></td>
          <td width="253"><div align="center"><strong>Menci&oacute;n</strong></div></td>
          <td width="40">&nbsp;</td>
        </tr>
        <?php while($fila=mysql_fetch_array($_pagi_result)){?>
        <tr>
          <td><p align="center" class="Estilo54">
            <?php echo $fila['cuatrimestre']?>
              <?php $fila['id']?>
              </p>
            <p align="center" class="Estilo54"><strong><strong><strong>(Cohorte:            
              <?php echo $fila['cohorte']?>
            </strong></strong></strong>)</p></td>
          <td><p align="center" class="Estilo11"> <span class="Estilo54">
            <?php echo $fila['asignatura']?>
            
          </span></p>
            <p align="center" class="Estilo11"><span class="Estilo54">
              <?php echo $fila['hora']?>
            </span></p>            </td>
          <td><div align="center"><span class="Estilo54">
            <?php echo $fila['mes']?>
          </span></div></td>
          <td><div align="center"><span class="Estilo54">
            <?php echo $fila['jueves']?>
          </span></div></td>
          <td><div align="center"><span class="Estilo54">
            <?php echo $fila['viernes']?>
          </span></div></td>
          <td><div align="center"><span class="Estilo54">
            <?php echo $fila['sabado']?>
          </span></div></td>
          <td><div align="center"><span class="Estilo54">
            <?php echo $fila['mencion']?>
          </span></div></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th scope="col">
                    <a href="editarasignaturas.php?cod_asi=<?php echo $fila['cod_asi']?>">
                    </a>
                    <a href="eliminarhorario.php?id=<?php echo $fila['id']?>"onclick="return confirm('<?php echo $_SESSION["usuario"];?> Estas seguro que deseas eliminar?')">
                        <img src="images/eliminar.jpg" width="36" height="36" border="0" title="Eliminar">
                    </a>
                </th>
                </tr>
          </table></td>
        </tr>
        <?php }?>
      </table>
      <p><?php echo $_pagi_navegacion ?></p>
      <p>
          <a href="horariospdf.php" target="_blank">
              <img src="images/descarga.jpg" width="48" height="48" border="0" title="Imprimir en PDF">
          </a>
      </p>
    </div></td>
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
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
   $query="SELECT * from facilitadores order by cod_fac";
   $resultado=mysql_query($query);

   $_pagi_sql="SELECT * from facilitadores order by cod_fac";
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


	  ?>
      </span><span class="Estilo51">
        <?php	 

  # GUARDAR AUDITORIA
$fecha= date ("Y/m/d");
$hora= date ("h:i a ");
$usuario2 = $_SESSION["usuario"]; 
$operacion= "Realizo un Reporte de Facilitadores";
$sql5="INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
mysql_query($sql5); 
 
?>
    </span></div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><div align="center">
      <p class="Estilo52">Reporte de Facilitadores </p>
      <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">

        <tr>
          <td width="107"><div align="center"><strong>C.I.</strong></div></td>
          <td width="230"><div align="center"><span class="Estilo53">Nombre y Apellido </span></div></td>
          <td width="148"><div align="center"><strong>Sexo</strong></div></td>
          <td width="152"><div align="center"><span class="Estilo53">Tel&eacute;fonos</span></div></td>
          <td width="228"><div align="center"><span class="Estilo53">Email</span></div></td>
          <td width="252"><div align="center"><strong>Direcci&oacute;n</strong></div></td>
          <td width="74">&nbsp;</td>
        </tr>
        <?php while($fila=mysql_fetch_array($_pagi_result)){?>
        <tr>
          <td><span class="Estilo54">
            <?php echo $fila['cedula']?>
            <?php $fila['cod_fac']?>
          </span></td>
          <td><span class="Estilo11"> <span class="Estilo54">
            <?php echo $fila['nombre']?>
            <?php echo $fila['apellido']?>
          </span></span></td>
          <td><span class="Estilo54">
            <?php echo $fila['sexo']?>
          </span></td>
          <td><span class="Estilo54">
            <?php echo $fila['telefono']?>
          </span></td>
          <td><span class="Estilo54">
            <?php echo $fila['email']?>
          </span></td>
          <td><span class="Estilo54">
            <?php echo $fila['direccion']?>
          </span></td>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th scope="col">
                    <a href="editarfacilitadores.php?cod_fac=<?php echo $fila['cod_fac']?>">
                        <img src="images/modificar.png" width="36" height="36" border="0" title="Modificar">
                    </a>
                </th>
                <th scope="col">
                    <a href="eliminarfacilitadores.php?cod_fac=<?php echo $fila['cod_fac']?>"onclick="return confirm('<?php echo $_SESSION["usuario"];?> Estas seguro que deseas eliminar?')">
                        <img src="images/eliminar.jpg" width="36" height="36" border="0" title="Eliminar">
                    </a>
                </th>
              </tr>
          </table>
          </td>
        </tr>
        <?php }?>
      </table>
      <p><?php echo $_pagi_navegacion ?></p>
      <p><a href="facilitadorespdf.php" target="_blank">
              <img src="images/descarga.jpg" width="48" height="48" border="0" title="Imprimir en PDF"></a></p>
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
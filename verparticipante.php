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
$query="SELECT * FROM participantes";
$result=  mysql_query($query);
$array=mysql_fetch_array($result);

if(mysql_num_rows($result)==0){
?>
<script language="JavaScript">
alert("No se ha encontrado ningun registro.");
//parent.window.close();
</script>
<?php
}
?>
<?php 

   $_pagi_sql="SELECT * from participantes order by cedula asc";
   $resultado=mysql_query($_pagi_sql);
   $_pagi_cuantos = 15;
require("paginator.inc.php");
$con_pro = mysql_num_rows($resultado);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Control de Estudios - ESAT</title>
<script language="javascript">

function pon_prefijo(cedula,nombre,apellido) {
    parent.opener.document.form1.cedula_par.value=cedula;
	parent.opener.document.form1.nombre.value=nombre;
	parent.opener.document.form1.apellido.value=apellido;
	parent.window.close();
}

</script>
<script>
function Valida ()
{
if (IsChk('Checkbox'))
{
//ok, hay al menos 1 elemento checkeado env�a el form!
return true;
} else {
//ni siquiera uno chequeado no env�a el form
alert ('Seleccione al menos un elemento para eliminar!');
return false;
}
}
function IsChk(chkName)
{
var found = false;
var chk = document.getElementsByName(chkName+'[]');
for (var i=0 ; i < chk.length ; i++)
{
found = chk[i].checked ? true : found;
}
return found;
}
</script>
<?php
$sql="SELECT * FROM participantes order by cedula asc";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

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
                      <div align="center"><span class="Estilo113">LISTA DE PARTICIPANTES </span></div>
                      </label>
                  </form></td>
                </tr>
              </table>
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <th scope="row"><form name="form2" method="post" action="" onSubmit="return Valida()">
                      <table width="100%" border="1" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC" bgcolor="#FFFFFF">
                        <tr bgcolor="#1D78AF">
                          <td width="159" height="22" align="center" bgcolor="#AA0000"><span class="Estilo116">C.I.</span></td>
                          <td width="304" align="center" bgcolor="#AA0000"><span class="Estilo116">Nombre y Apellido </span></td>
                          <td width="217" align="center" bgcolor="#AA0000"><span class="Estilo122">Tel&eacute;fono</span></td>
                          <td width="370" align="center" bgcolor="#AA0000"><span class="Estilo118">Direcci&oacute;n</span></td>
                          <td width="153" align="center" bgcolor="#AA0000"><span class="Estilo118">Acci&oacute;n</span></td>
                        </tr>
                        <?php
while($rows=mysql_fetch_array($_pagi_result)){ ?>
                        <tr>
                          <td><span class="Estilo121">
                            <?php echo $rows['cedula']?>
                          </span></td>
                          <td><span class="Estilo121">
                            <?php echo $rows['nombre']?>
                            <?php echo $rows['apellido']?>
                          </span></td>
                          <td><span class="Estilo121">
                            <?php echo $rows['telefono']?>
                          </span></td>
                          <td><span class="Estilo121">
                            <?php echo $rows['direccion']?>
                            <?php echo $rows['tp']?>
                          </span></td>
                          <td align="center">
                              <a href="javascript:pon_prefijo('<?php echo $rows['cedula']; ?>','<?php echo$rows['nombre']?>','<?php echo $rows['apellido']?>')" title="Seleccionar Participante" class="Estilo121">
                                  <img src="images/ok.jpg" width="23" height="23" border="0">
                              </a>
                          </td>
                        </tr>
                        <?php }?>
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
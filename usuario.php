<?php
session_start();
// sin no existe un susuario vuelve a la pagina de login
if (!isset ($_SESSION["usuario"],$_SESSION["contrasena"]))
{
header ("Location: index.php");//evita que se ingrese a cualquier pagina no iniciando sesion
}else {
    require './conex.php';
          conectar();
  # GUARDAR AUDITORIA
    $fecha     = date("Y/m/d");
    $hora      = date("h:i a ");
    $usuario2  = $_SESSION["usuario"];
    $operacion = "Ingreso al Registro de Usuario";
    $sql5      = "INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
    mysql_query($sql5);
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
<script type="text/javascript">
$(document).ready(function(){
});
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

</style></head>

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
     Bienvenido
     <br/>Has entrado con el nombre de usuario
      <?php echo $_SESSION["usuario"]; ?>
      </span><span class="Estilo51">
    </span></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">
      <p class="Estilo52">Registro de Usuarios </p>
      <form action="regusuario.php" method="post" name="form1" id="form1" onSubmit="return Validar(this);">
        <table width="368" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">

          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Nombre:</strong></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="nombre" type="text" class="Estilo53" id="nombre" size="35" placeholder="Introduzca el Nombre">
              <span class="Estilo6">*</span></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Apellido:</strong></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="apellido" type="text" class="Estilo53" id="apellido" size="35" maxlength="12" placeholder="Introduzca el Apellido">
              <span class="Estilo6">*</span></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo57">Nivel:</span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><label>
              <select name="nivel" class="Estilo53">
                <option value="0">Seleccione:</option>
                <?php 
                $query   = "SELECT id_nivel,nivel FROM nivel_usuario;";
                $resultado  = mysql_query($query);
                while ($fila = mysql_fetch_array($resultado)) { ?>
                 <option value="<?php echo $fila['id_nivel'];?>"><?php echo $fila['nivel'];?></option>
                <?php
                }
                ?>
                </select>
            </label>
                <span class="Estilo6">*</span></td>
          </tr>

          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo57">Email:</span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><input name="email" type="text" class="Estilo53" id="email" size="45" placeholder="ejemplo@correo.com">
                <span class="Estilo6">*</span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Usuario:</strong></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo6"><span class="Estilo54">
              <input name="usuario" type="text" class="Estilo53" id="usuario" size="35" maxlength="12" placeholder="Introduzca el Usuario">
            </span>*</span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Contrase&ntilde;a:</strong></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo6"><span class="Estilo54">
              <input name="contrasena" type="password" class="Estilo53" id="contrasena" size="35" maxlength="12" placeholder="Introduzca la Contrase&ntilde;a">
            </span>*</span></td>
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
                    <input name="Submit" type="submit" id="registrar"  class="Estilo53"  value="Registrar">
                </label>
                <label>
                    <input name="Submit2" type="reset" id="cancelar" class="Estilo53" value="Cancelar">
                </label>
            </div></td>
          </tr>
        </table>
      </form>
      <p>&nbsp;</p>
    </div></td>
    <td width="49%" valign="top">
        <img src="images/usuario.jpg" width="591" height="352">
    </td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</body>
</html>
 <?php } ?>
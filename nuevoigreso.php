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
    $operacion = "Ingreso a Inscripcion de Nuevo Ingreso";
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
	<!-- End css3menu.com HEAD section -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Control de Estudios - ESAT</title>
<script language="JavaScript">
function test(form1) {
if (form1.cedula_par.value == ""){
alert("Ingrese los datos del Participante!");return false;
}
if (form1.cohorte.value == ""){
alert("Ingrese la cohorte!");return false;
}
if (form1.cuatrimestre.value == ""){
alert("Ingrese el cuatrimestre!");return false;
}
if (form1.codigo_materia.value == ""){
alert("Ingrese los datos de la materia!");return false;
}
document.forms[0].submit();
return true
}

		var cursor;
		if (document.all) {
		// Est� utilizando EXPLORER
		cursor='hand';
		} else {
		// Est� utilizando MOZILLA/NETSCAPE
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

var nav4 = window.Event ? true : false;
function acceptNum(evt){   
var key = nav4 ? evt.which : evt.keyCode;   
return (key <= 13 || (key>= 48 && key <= 57));
}

</script>
<style type="text/css"> 

input { font-family: Tahoma; font-size: 14px; border: #990000; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px} 

</style>
<style type="text/css">

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
.Estilo62 {
	font-size: 12px;
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo63 {
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo94 {font-family: Verdana; font-size: 12px; }
.Estilo11 {font-size: 10px}
.Estilo3 {font-family: Arial}
.Estilo95 {color: #000000}
.Estilo95 {font-weight: bold}
.Estilo96 {font-family: Arial; font-weight: bold; font-size: 12px; }

</style>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th colspan="2" scope="col">
        <img src="images/logo-oficial.jpg" width="100%" height="60" />
    </th>
  </tr>
  <tr>
    <td colspan="2"><!-- Start css3menu.com BODY section -->
      <?php include("menufinal.php"); ?>
    <!-- End css3menu.com BODY section -->
    </td>
  </tr>
  <tr>
    <td colspan="2">
        <img src="images/titulo.jpg" width="100%" height="82" />
    </td>
  </tr>
  <tr>
    <td width="51%">&nbsp;</td>
    <td width="49%">
        <div align="right">
            <span class="Estilo51">Bienvenido<br/>Has entrado con el nombre de usuario:
                <span style="font-weight: bold">
                    <?php echo strtoupper($_SESSION["usuario"]); ?>
                </span>
            </span>
    </td>
  </tr>
  <tr>
    <td valign="top">
        <div align="center">
      <p class="Estilo52">Inscripci&oacute;n de Nuevo Ingreso </p>
<!--      <form action="nuevoingreso2.php" method="post" name="form1" id="form1" onSubmit="return Validar(this);">-->
      <form action="nuevoingreso2.php" method="post" name="form1" id="form1">
          <table  border="0">
          <tr>
            <td colspan="7" bordercolor="#6A90B5" bgcolor="#AA0000"><span class="Estilo62">Datos Participante </span></td>
          </tr>
            <tr>
                <td colspan="7">&nbsp;</td>
            </tr>
            
            <tr>
                <td width="200">
                        <div class="form-group" style="margin-bottom: 12px;">
                            <label for="exampleInputEmail1">C.I:</label>
                            <input name="cedula_par" type="text" class="form-control input-sm" id="cedula_par" onKeyPress="return acceptNum(event)"  maxlength="8" placeholder="Solo numeros"/>
                      </div>
                </td>
                <td width="2" align="left">
                    <span style="color: #ff0000;font-weight: bold;margin-left: 2px;" style="margin-left: 2px;">*</span>
                </td>
                <td width="200">
                    <div class="form-group" style="margin-bottom: 12px;">
                        <label for="nombre">Nombre:</label>
                        <input name="nombre" type="text" class="form-control input-sm" id="nombre" placeholder="Introduzca el Nombre"/>
                    </div>
                </td>
                <td align="left">
                    <span style="color: #ff0000;font-weight: bold;margin-left: 2px;" style="margin-left: 2px;">*</span>
                </td>
                <td width="212">
                    <div class="form-group" style="margin-bottom: 12px;">
                        <label for="exampleInputEmail1">Apellido:</label>
                        <input name="apellido" type="text" class="form-control input-sm" id="apellido" size="35" maxlength="12" placeholder="Introduzca el Apellido">
                    </div>
                </td>
                <td align="left" valign="medio">
                    <span style="color: #ff0000;font-weight: bold;margin-left: 2px;" style="margin-left: 2px;">*</span>
                </td>
                <td>
                    <img src="images/lupa.jpg" width="20" height="15" style="margin-left: 2px;" onClick="verparticipante()" onMouseOver="style.cursor=cursor" title="Buscar"/>

                </td>
              <?php

 $ninscripcion = '';
 $sql5="SELECT * FROM inscripcion order by ninscripcion desc limit 1";
 $res5=mysql_query($sql5);
 $nro_fila= @mysql_num_rows ($res5);
 while ($ligne5 = @mysql_fetch_array ($res5)) 
 {
 ?>

                  <?php 
                  $ligne5["ninscripcion"]; 
                  $total=$ligne5["ninscripcion"];
                  $ninscripcion=$total+1;
                  
                  ?>
                  <input name="ninscripcion" type="hidden" id="ninscripcion" value="<?php echo $ninscripcion; ?>">
                  <?php }?>
                  
          </tr> 
            <tr>
                <td>
                    <div class="form-group" style="margin-bottom: 12px;">
                        <label for="exampleInputEmail1">Cohorte: </label>
                        <input name="cohorte" type="text" class="form-control input-sm" id="cohorte" value="<?php echo $fecha= date ("Y"); ?>" placeholder="Introduzca la Cohorte">
                    </div>
                </td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                </tr>
          <tr>
            <td width="149"colspan="3">
                <div class="form-group" style="margin-bottom: 12px;">
                        <label for="exampleInputEmail1">Doctorado: </label>
                        <select name="mencion" id="mencion" class="form-control input-sm">
                            <option value="0">Seleccione:</option> 
                            <?php
                            $sql    = "SELECT cod_men,nombre FROM menciones";
                            $result = mysql_query($sql);
                            while ($row    = mysql_fetch_array($result)) {
                                ?>
                                <option value="<?php echo $row["cod_men"]; ?>"><?php echo $row["nombre"]; ?></option> 
                                <?php
                            }
                            ?>
                        </select>                                             
                    </div>
            </td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>

                <td colspan="3">
                    <div class="form-group" style="margin-bottom: 12px;">
                        <label for="exampleInputEmail1">Cuatrimestre:</label>
                            <input name="cuatrimestre" type="text" class="form-control input-sm" id="cuatrimestre" value="PRIMERO" placeholder="Introduzca el Nombre">
                        </div>
                </td>
                <td>
                        <span class="Estilo6" style="margin-left: 2px;">*</span>
                </td>
            <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>  
          <tr>
              <td colspan="7">&nbsp;</td>
          </tr>
          <tr>
              <td bordercolor="#6A90B5" bgcolor="#AA0000" colspan="7">
                  <span class="Estilo63">Datos de Asignaturas a Inscribir </span>
              </td>
 
          </tr>
            <tr>
                <td colspan="7">
                   &nbsp;
               </td>
           </tr>

                <tr>
                    <td>
                        <div class="form-group" style="margin-bottom: 12px;">
                        <label for="codigo">C&oacute;digo: </label>
                        <input name="codigo_materia" type="text" class="form-control input-sm" id="codigo_materia"  placeholder="Introduzca el Codigo"/>
                        </div>
                    </td>
                    <td>
                    <span class="Estilo6">*</span>                        
                    </td>
                    <td>
                        <div class="form-group" style="margin-bottom: 12px;">
                        <label for="codigo">Asignatura: </label>
                        <input name="materia" type="text" class="form-control input-sm" id="materia"  placeholder="Introduzca la Manteria"/>
                        </div>
                    </td>
                    <td><span class="Estilo6">*</span></td>
                    <td>    
                        <table border="0" style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td style="width:15%"><img src="images/lupa.jpg" width="20" height="15" onClick="vermateria()" onMouseOver="style.cursor=cursor" title="Buscar"> </td>
                                        <td><input title="AGREGAR" alt="AGREGAR" name="Submit" value="AGREGAR" onClick="test(this.form);return false" src="images/agregar.jpg"  type="image"></td>
                                    </tr>
                                </tbody>
                            </table>
                    </td>
                </tr>

          <tr>
            <td colspan="7" bordercolor="#6A90B5" bgcolor="#FFFFFF">
                <label>
                    <span class="Estilo54">Nota: <span class="Estilo6">*</span> Campos Obligatorios </span>
                </label>
            </td>
          </tr>
          <tr>
            <td colspan="7" bordercolor="#6A90B5" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="7" bordercolor="#6A90B5"><div align="center" class="Estilo54">
                <label></label>
                <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="Estilo53">
                  <tr>
                    <td width="124"><div align="center" class="Estilo96">C&oacute;digo</div></td>
                    <td width="228"><div align="center" class="Estilo96">Asignatura</div></td>
                    <td width="122"><div align="center" class="Estilo96">Cuatrimestre</div></td>
                    <td width="33">&nbsp;</td>
                  </tr>
                  <?php

///$cedula_par=$cedula_par; UPDATE JOSUE
// include("conexion1.php");

 $sql="SELECT * FROM detalle_inscripcion where ninscripcion='$ninscripcion'";
 $res=mysql_query($sql);
 $nro_fila= @mysql_num_rows ($res);
 while ($ligne = @mysql_fetch_array ($res)) 
 {
 ?>
                  <tr>
                    <td class="Estilo53"><div align="center"><strong>
                        <?php echo $ligne["codigo_materia"]; ?>
                        </strong><strong><strong><strong>
                        <?php $ligne["id"]; ?>
                    </strong></strong></strong></div></td>
                    <td class="Estilo53"><div align="center" class="Estilo95"><span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3 Estilo95">
                        <?php echo $ligne["cantidad"];?>
                    </span></div></td>
                    <td class="Estilo53"><div align="center" class="Estilo95"><span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3 Estilo95">
                        <?php echo $ligne["cuatrimestre"]; ?>
                    </span></div></td>
                    <td>
                        <a href="eliminarmat.php?id=<?php echo $ligne['id']?>"onclick="return confirm('<?php echo $_SESSION["usuario"];?> Estas seguro que deseas eliminar?')">
                            <img src="images/eliminar.jpg" width="29" height="29" border="0"></a>
                        <a href="eliminarfactura.php?id=<?php echo $fila['id']?>">
                        </a>
                    </td>
                  </tr>
                  <?php
	$nro_fila++;
 } ?>
                </table>
            </div></td>
          </tr>
        </table>
        <p><strong>FIN DE INSCRIPCI&Oacute;N </strong></p>
      </form>
      <p>&nbsp;</p>
    </div></td>
    <td width="49%"><img src="images/inscripcion.jpg" width="100%" height="400"></td>
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

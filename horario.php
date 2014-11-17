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
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Control de Estudios - ESAT</title>
<script language="JavaScript">
//creamos la funcion, y como parametro haremos referencia a form (sera el nombre de nuestro formulario)

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
</script>
<script>
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

</style></head>

<body>
<script language="javascript" src="./dias.js"></script>
<script language="javascript" src="./dias_conf.js"></script>
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
$operacion= "Ingreso a Horarios";
$sql5="INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
mysql_query($sql5); 
 
?>
    </span></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">
      <p class="Estilo52">Horarios</p>
      <form action="horario2.php" method="post" name="form1" id="form1" onSubmit="return Validar(this);">
        <table width="534" border="0" align="center" cellpadding="0" cellspacing="2" bordercolor="#666666">

          <tr>
            <td colspan="3" bordercolor="#6A90B5" bgcolor="#AA0000"><span class="Estilo62">Detalle Horario </span></td>
          </tr>
          <tr>
            <td width="129" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <label></label>
            </span>              
              <div align="left" class="Estilo54"><strong>Periodo:</strong></div>            
              <div align="left" class="Estilo54"></div></td>
            <td width="177" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Cuatrimestre:</strong></span></td>
            <td width="220" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong>Cohorte:<span class="Estilo11">
              <?php

 $sql5="SELECT * FROM horario order by nhorario desc limit 1";
 $res5=mysql_query($sql5);
 $nro_fila= @mysql_num_rows ($res5);
 
 $ligne5 = @mysql_fetch_array ($res5);
 $horario=$ligne5["nhorario"]+1;
 ?>
            </span>

                  <span class="Estilo11">
                  <input name="nhorario" type="hidden" id="nhorario" value="<?php echo $nhorario; ?>">

                  </span></strong></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="periodo" type="text" class="Estilo53" id="periodo" size="12" maxlength="8" placeholder="Indique el Periodo">
              <span class="Estilo6">*</span></span></td>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <label>
              <select name="cuatrimestre" class="Estilo53" id="cuatrimestre">
                <option selected>seleccione..</option>
                <option value="I">PRIMERO</option>
                <option value="II">SEGUNDO</option>
                <option value="III">TERCERO</option>
                <option value="IV">CUARTO</option>
                <option value="V">QUINTO</option>
                <option value="VI">SEXTO</option>
                <option value="VII">SEPTIMO</option>
                <option value="VIII">OCTAVO</option>
                <option value="IX">NOVENO</option>
              </select>
              </label>
              <span class="Estilo6">*</span></span></td>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54"><strong><span class="Estilo94">
              <?php 

//{
$sql="Select cohorte from inscripcion group by cohorte";
$result=mysql_query($sql);

echo '<select name="cohorte">';
//Mostramos los registros en forma de men&uacute; desplegable
while ($row=mysql_fetch_array($result))
{echo '<option>'.$row["cohorte"];}
mysql_free_result($result);
//}
?>
            </span></strong></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Jueves:</strong></td>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Viernes:</strong></td>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Sabado:</strong></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="jueves" type="text" class="Estilo53" id="jueves" size="8" readonly=&rdquo;readonly&rdquo;>
              <small><a href="javascript:showCal('Calendar1')"><img src="images/calendario.jpg" width="25" height="27" border="0"></a></small></span></td>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="viernes" type="text" class="Estilo53" id="viernes" size="12" readonly=&rdquo;readonly&rdquo;>
              <small><a href="javascript:showCal('Calendar2')"><img src="images/calendario.jpg" width="25" height="27" border="0"></a></small></span></td>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="sabado" type="text" class="Estilo53" id="sabado" size="12" readonly=&rdquo;readonly&rdquo;>
              <small><a href="javascript:showCal('Calendar3')"><img src="images/calendario.jpg" width="25" height="27" border="0"></a></small></span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Mes:</strong></td>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Hora:</strong></td>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <label>
              <select name="mes" class="Estilo53" id="mes">
                <option selected>seleccione..</option>
                <option value="ENERO">ENERO</option>
                <option value="FEBRERO">FEBRERO</option>
                <option value="MARZO">MARZO</option>
                <option value="ABRIL">ABRIL</option>
                <option value="MAYO">MAYO</option>
                <option value="JUNIO">JUNIO</option>
                <option value="JULIO">JULIO</option>
                <option value="AGOSTO">AGOSTO</option>
                <option value="SEPTIEMBRE">SEPTIEMBRE</option>
                <option value="OCTUBRE">OCTUBRE</option>
                <option value="NOVIEMBRE">NOVIEMBRE</option>
                <option value="DICIEMBRE">DICIEMBRE</option>
              </select>
              </label>
              <span class="Estilo6">*</span></span></td>
            <td colspan="2" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="horario" type="text" class="Estilo53" id="horario" size="40" placeholder="Introduzca los Dias">
            </span></td>
            </tr>
          <tr>
            <td colspan="3" bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Doctorado:<span class="Estilo94">
            <?php 

$sql="Select nombre from menciones";
$result=mysql_query($sql);

echo '<select name="mencion">';
//Mostramos los registros en forma de men&uacute; desplegable
while ($row=mysql_fetch_array($result))
{echo '<option>'.$row["nombre"];}
mysql_free_result($result);
//}
?>
            </span></strong></td>
            </tr>
          <tr>
            <td colspan="3" bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Observaciones:</strong></td>
            </tr>
          <tr>
            <td colspan="3" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="observacion" type="text" class="Estilo53" id="observacion" size="60" placeholder="Introduzca los Dias">
            </span></td>
          </tr>
          <tr>
            <td colspan="3" bordercolor="#6A90B5" bgcolor="#AA0000"><span class="Estilo63">Datos de Asignaturas </span></td>
          </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>C&oacute;digo:</strong></td>
            <td colspan="2" bordercolor="#6A90B5" bgcolor="#FFFFFF"><strong>Asignatura:</strong></td>
            </tr>
          <tr>
            <td bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="codigo_materia" type="text" class="Estilo53" id="codigo_materia" size="12" placeholder="Introduzca el Codigo">
              <span class="Estilo6">*</span></span></td>
            <td colspan="2" bordercolor="#6A90B5" bgcolor="#FFFFFF"><span class="Estilo54">
              <input name="materia" type="text" class="Estilo53" id="materia" size="20" placeholder="Introduzca la Manteria">
              <span class="Estilo6">*</span></span><span class="Estilo54"><span class="Estilo6"><strong><span class="Estilo94 Estilo95 Estilo10 Estilo14"><img src="images/lupa.jpg" width="20" height="15" onClick="vermateria()" onMouseOver="style.cursor=cursor" title="Buscar"> 
              <input title="AGREGAR" alt="AGREGAR" name="Submit" value="AGREGAR" onClick="test(this.form);return false" src="images/agregar.jpg"  type="image">
              </span></strong></span></span></td>
            </tr>
          <tr>
            <td colspan="3" bordercolor="#6A90B5" bgcolor="#FFFFFF"><label><span class="Estilo54">Nota: <span class="Estilo6">*</span> Campos Obligatorios </span></label></td>
          </tr>
          <tr>
            <td colspan="3" bordercolor="#6A90B5" bgcolor="#FFFFFF">&nbsp;</td>
          </tr>
          <tr>
            <td colspan="3" bordercolor="#6A90B5"><div align="center" class="Estilo54">
                <label></label>
                <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000" class="Estilo53">
                  <tr>
                    <td width="81"><div align="center" class="Estilo96">Cuatrimestre</div></td>
                    <td width="163"><div align="center" class="Estilo96">Asignatura</div></td>
                    <td width="68"><div align="center" class="Estilo96">Mes</div></td>
                    <td width="68"><div align="center">Jueves</div></td>
                    <td width="68"><div align="center">Viernes</div></td>
                    <td width="68"><div align="center">Sabado</div></td>
                  </tr>
                  <?php

$nhorario=$horario;

 $sql="SELECT * FROM horario where nhorario='$nhorario'";
 $res=mysql_query($sql);
 $nro_fila= @mysql_num_rows ($res);
 while ($ligne = @mysql_fetch_array ($res)) 
 {
 ?>
                  <tr>
                    <td class="Estilo53"><div align="center"><span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3 Estilo95">
                      <?php echo $ligne["cuatrimestre"]; 
					  $cuatrimestre=$ligne["cuatrimestre"]; ?>
                    </span> <span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3 Estilo95">
                   <?php if (cuatrimestre<>0)
{
echo "Cohorte:";
}
?>
<?php echo $ligne["cohorte"]; ?>
                    </span></div></td>
                    <td class="Estilo53"><div align="center" class="Estilo95"><span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3 Estilo95">
                        <?php echo $ligne["asignatura"]; ?>
                    </span> <span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3 Estilo95">
                     <?php echo $ligne["hora"]; ?>
                    </span></div></td>
                    <td class="Estilo53"><div align="center" class="Estilo95"><span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3 Estilo95">
                        <?php echo $ligne["mes"]; ?>
                    </span></div></td>
                    <td class="Estilo53"><div align="center"><span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3 Estilo95">
                      <?php echo $ligne["jueves"]; ?>
                    </span></div></td>
                    <td class="Estilo53"><div align="center"><span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3 Estilo95">
                      <?php echo $ligne["viernes"]; ?>
                    </span></div></td>
                    <td class="Estilo53"><div align="center"><span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3 Estilo95">
                      <?php echo $ligne["sabado"]; ?>
                    </span></div></td>
                  </tr>
                  <?php
	$nro_fila++;
 } ?>
                </table>
            </div></td>
          </tr>
        </table>
        <p><strong>FIN DE HORARIO </strong></p>
      </form>
      </div></td>
    <td width="49%"><img src="images/horario.jpg" width="591" height="395"></td>
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
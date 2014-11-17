<?php
session_start();

// sin no existe un susuario vuelve a la pagina de login
if (!isset ($_SESSION["usuario"],$_SESSION["contrasena"]))
{
header ("Location: index.php");//evita que se ingrese a cualquier pagina no iniciando sesion
}else {
?>
<?php
$database = "esat"; /* Nuestra base de datos */
    $dbuser = "root"; /* Nuestro user mysql */
    $dbpass = "admin"; /* Nuestro password mysql */
    $server = "localhost";
   $codigo_materia=$_POST["codigo_materia"];
    //$nrequisicion1 = $_POST['nrequisicion'];
	
//$ncompra1=$_POST["ncompra"];
$rif_proveedor=$_POST["rif_proveedor"];
$fecha2=$_POST["fecha2"];
$trimestre=$_POST["trimestre"];
    $link8 = mysql_connect($server, $dbuser, $dbpass);

    if ($_POST['ac'] == 'guarda_notas') {
        
        include("func.php");
        include("conexion.php");

        $fecha= date ("d-m-Y");
        foreach ($_POST['cedula_par'] as $cedula_parr) {
            $cedula_par[] = $cedula_parr;
        }
        foreach ($_POST['cuatrimestre'] as $cuatrimestree) {
            $cuatrimestre[] = $cuatrimestree;
        }
        foreach ($_POST['cohorte'] as $cohortee) {
            $cohorte[] = $cohortee;
        }
        foreach ($_POST['codigo_materia'] as $codigo_materiaa) {
            $codigo_materia[] = $codigo_materiaa;
        }
		foreach ($_POST['facilitador'] as $facilitadorr) {
            $facilitador[] = $facilitadorr;
        }
		foreach ($_POST['notaauto'] as $notaautoo) {
            $notaauto[] = $notaautoo;
        }
		foreach ($_POST['totalco'] as $totalcoo) {
            $totalco[] = $totalcoo;
        }

        for ($i = 0; $i < count($cedula_par); $i++) {

            if (!empty($cedula_par[$i])) {
                
                $suma_cant=$precio[$i];
                $codigopp=$codigop[$i];
                
             
                $sql = "insert into notas (cedula_par, cuatrimestre, cohorte, codigo_materia, facilitador, notaauto, totalco, fecha) values ('$cedula_par[$i]', '$cuatrimestre[$i]', '$cohorte[$i]', '$codigo_materia[$i]', '$facilitador[$i]', '$notaauto[$i]', '$totalco[$i]', '$fecha');";
                If ($res = send_sql($db, $sql)) {
                    
                }
            }
        }
       
?>
<script language="JavaScript">
alert("Se proceso exitosamente el ingreso de notas");
location.href="notas.php"
</script>
<?	
          //header("Location: ingreso2.php?idu=$ncompra&msg=exito");
    }


$query="SELECT * FROM detalle_inscripcion WHERE codigo_materia='$codigo_materia'";

$result8=@mysql_db_query($database,$query,$link8);
$array8=@mysql_fetch_array($result8);
if(mysql_num_rows($result8)==0){
?>

 <script language="JavaScript">
alert("No existe una asignatura con este codigo");
location.href="notas.php"
</script>
<?
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Start css3menu.com HEAD section -->
	<link rel="stylesheet" href="menuadmin.css3prj_files/css3menu1/style.css" type="text/css" /><style>._css3m{display:none}</style>
	<!-- End css3menu.com HEAD section -->
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistema de Control de Estudios - ESAT</title>
<script src="javascript/jquery-1.11.0.js" type="text/javascript"></script>

<script language="JavaScript" type="text/javascript">

$(document).ready(function () {
    
});
//creamos la funcion, y como parametro haremos referencia a form (sera el nombre de nuestro formulario)

function test(form1) {
if (form1.facilitador[<?php echo $i ?>].value >= "19"){
alert("Ingrese los datos del Participante!");return false;
}

document.forms[0].submit();
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
		
function verdocente(){
				miPopup = window.open("verdocente.php","miwin","width=900,height=400,scrollbars=yes");
				miPopup.focus();
			}	
function vermateria(){
				miPopup = window.open("vermateria.php","miwin","width=900,height=400,scrollbars=yes");
				miPopup.focus();
			}	
</script>
<script language="JavaScript">

var nav4 = window.Event ? true : false;
function acceptNum(evt){   
var key = nav4 ? evt.which : evt.keyCode;   
return (key <= 13 || (key>= 48 && key <= 57));
}
//-->
</script>
<style type="text/css"> 

input { 
    font-family: Tahoma; font-size: 14px; border: #990000; border-style: solid; border-top-width: 1px; border-right-width: 1px; border-bottom-width: 1px; border-left-width: 1px
} 



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
.Estilo63 {
	color: #FFFFFF;
	font-weight: bold;
}
.Estilo11 {font-size: 10px}
.Estilo3 {font-family: Arial}
.Estilo95 {color: #000000}
.Estilo95 {font-weight: bold}
.Estilo122 {font-family: Tahoma; font-size: 12px; }
.Estilo93 {font-family: Geneva, Arial, Helvetica, sans-serif;
	color: #000000;
	font-size: 14px;
	font-weight: bold;
}
.Estilo97 {font-size: 9px}
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
$operacion= "Registro una Nota";
$sql5="INSERT INTO auditoria (fecha, hora, usuario, accion) VALUES ('$fecha', '$hora', '$usuario2', '$operacion')";
mysql_query($sql5, $db); 
 
?>
    </span></div></td>
  </tr>
  <tr>
    <td valign="top"><div align="center">
      <p class="Estilo52">Ingreso de Notas </p>
      <form name="form1" id="form1" method="post" action="?ac=guarda_notas" onSubmit="return Validar(this);">
        <p><strong>Facilitador:</strong> 
           <?php
 //include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM asignacion where codigo_materia='$codigo_materia'";
 $res2=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res2);
 while ($ligne2 = @mysql_fetch_array ($res2)) 
 {
 ?>
           <? echo $ligne2["cedula_fac"]; 
		   $cedula_fac=$ligne2["cedula_fac"]; ?>
          <?php }?>
        - 
        <?php
 //include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM facilitadores where cedula='$cedula_fac'";
 $res3=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res3);
 while ($ligne3 = @mysql_fetch_array ($res3)) 
 {
 ?>
        <? echo $ligne3["nombre"]; ?>  <? echo $ligne3["apellido"]; ?>
        <?php }?>
</p>
        <p><strong>Asignatura: </strong>
          <?php
 //include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM asignaturas where codigo='$codigo_materia'";
 $res4=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res4);
 while ($ligne4 = @mysql_fetch_array ($res4)) 
 {
 ?>
          <? echo $ligne4["nombre"]; ?>
          <?php }?>
        </p>
        <table width="664" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#000000">
          <tr>
            <th bgcolor="#AA0000" scope="col"><span class="Estilo63">Datos de Participantes </span></th>
          </tr>
        </table>
        <table width="664" border="1" align="center" cellpadding="1" cellspacing="1" bordercolor="#000000">
          <tr>
            <td width="197"><div align="center"><strong>C.I. / Nombre del Participante </strong></div></td>
            <td width="95"><div align="center"><strong>Cuatrimestre</strong></div></td>
            <td width="80"><div align="center"><strong>Cohorte</strong></div></td>
            <td width="84"><div align="center"><strong>Facilitador (90%) </strong></div></td>
            <td width="85"><div align="center"><strong>Nota Auto </strong></div></td>
            <td width="90"><div align="center"><strong>TOTAL CO </strong></div></td>
            </tr>
          <?php
        $db = conectate();
        $sql = "SELECT
detalle_inscripcion.id,
detalle_inscripcion.cedula_par,
detalle_inscripcion.codigo_materia,
detalle_inscripcion.cuatrimestre,
detalle_inscripcion.cohorte,
asignaturas.nombre
FROM
detalle_inscripcion
Inner Join asignaturas ON detalle_inscripcion.codigo_materia = asignaturas.codigo where codigo_materia='$codigo_materia'";
        $res = mysql_query($sql, $db);
        $j = 0;
        $arreglo = array();
        while ($rs = mysql_fetch_array($res)) {
            $arreglo[$j] = $rs;
            $j++;
        }
        if (!empty($arreglo)) {
            $array_Recp = $arreglo;
        }
        for ($i = 0; $i < count($array_Recp); $i++) {
            ?>
          <tr>
            <td height="45"><div align="center" class="Estilo95">
                <div align="center">
                  <? $array_Recp[$i]["id"]; ?>
                  <? echo $array_Recp[$i]["cedula_par"]; 
				  $cedula_par=$array_Recp[$i]["cedula_par"]; ?> - 
                  <?php
 //include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM participantes where cedula='$cedula_par'";
 $res5=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res5);
 while ($ligne5 = @mysql_fetch_array ($res5)) 
 {
 ?>
                  <? echo $ligne5["nombre"]; ?> <? echo $ligne5["apellido"]; ?>
                  <?php }?>
                </div>
            </div></td>
            <td height="45"><div align="center"><? echo $array_Recp[$i]["cuatrimestre"]; ?></div></td>
            <td height="45"><div align="center"><? echo $array_Recp[$i]["cohorte"]; ?></div></td>
            <td><div align="center" class="Estilo95">
              <div align="center"><span class="Estilo11 Estilo14 Estilo15 Estilo53 Estilo54 Estilo3"><span class="Estilo11"> </span></span>
                <input name="facilitador[<? echo $i ?>]2" type="text" class="input" id="facilitador[<? echo $i ?>]" style="width:50px;" />
              </div>
            </div></td>
            <td><div align="center">
              <input name="notaauto[<? echo $i ?>]22" type="text" class="input" id="notaauto[<? echo $i ?>]2" style="width:50px;" value="" />
            </div></td>
            <td><div align="center">
              <input name="totalco[<? echo $i ?>]2222" type="text" class="input" id="totalco[<? echo $i ?>]222" style="width:50px;" value="" />
              <span class="Estilo95">
              <input name="cuatrimestre[<? echo $i ?>]" type="hidden" class="input" id="cuatrimestre<? echo $i ?>" style="width:50px;" value="<? echo $array_Recp[$i]["cuatrimestre"]; ?>" />
              <input name="cohorte[<? echo $i ?>]" type="hidden" class="input" id="cohorte<? echo $i ?>" style="width:50px;" value="<? echo $array_Recp[$i]["cohorte"]; ?>" />
              <input name="cedula_par[<? echo $i ?>]2" type="hidden" class="input" id="cedula_par[<? echo $i ?>]" style="width:50px;" value="<? echo $array_Recp[$i]["cedula_par"]; ?>" />
              </span><span class="Estilo95">
              <input name="codigo_materia[<? echo $i ?>]22" type="hidden" class="input" id="codigo_materia[<? echo $i ?>]2" style="width:50px;" value="<? echo $array_Recp[$i]["codigo_materia"]; ?>" />
              </span></div></td>
            </tr>
          <?php } ?>
        </table>
        <p align="center" class="Estilo93 Estilo97 Estilo122">
          <input title="PROCESAR NOTAS" alt="PROCESAR NOTAS" name="Submit3" value="PROCESAR NOTAS" src="imagenes/Guardar.jpg"  type="submit" onClick="test(this.form);return false">
        </p>
      </form>
      <p>&nbsp;</p>
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

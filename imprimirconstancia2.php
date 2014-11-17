<?php
 ob_start();
 ?>
<?php
//VARIABLE DEL FORMULARIO
$cedula_par=$_REQUEST["cedula_par"];
?>
<html>
<head>
<LINK REL="Shortcut Icon" HREF="imagenes/iconoceian.ico">
<title>CENTRO DE EDUCACI&Oacute;N INICIAL NACIONAL &ldquo;AQUILES NAZOA&rdquo;</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #000000;
}
.Estilo105 {font-size: 18px; font-weight: bold; }
-->
</style>
</head>

<body>

<p align="center"><img src="images/superior.PNG" width="808" height="150"></p>
<p align="center">&nbsp;</p>
<h1 align="center">CONSTANCIA</h1>
<p align="center">&nbsp;</p>
<p align="justify">Quien suscribe, Liliana  Vel&aacute;zquez, titular de la  c&eacute;dula de identidad&nbsp;N&ordm;  V-14.061.626, en su car&aacute;cter de Directora de Secretar&iacute;a de la Escuela Socialista  de Agricultura Tropical (ESAT), adscrita al Instituto Nacional de Investigaciones  Agr&iacute;colas (INIA), hace constar que la ciudadano(a)<strong> <?php
 include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM participantes where cedula='$cedula_par'";
 $res2=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res2);
 while ($ligne2 = @mysql_fetch_array ($res2)) 
 {
 ?>
  <? echo $ligne2["nombre"]; echo " "; echo $ligne2["apellido"]; ?>
  <?php }?>,</strong> titular de la C&eacute;dula de Identidad <strong>N&ordm; <?php echo $cedula_par; ?>, </strong>es Participante Regular de la Cohorte 2008 del Programa Conducente a Grado Acad&eacute;mico: <strong><?php
 //include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM inscripcion where cedula_par='$cedula_par' order by id DESC LIMIT 1";
 $res3=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res3);
 while ($ligne3 = @mysql_fetch_array ($res3)) 
 {
 ?>
  <? echo $ligne3["doctorado"]; ?>
  <?php }?>
  </strong>, cursando actualmente el &nbsp;<strong>
  <?php
 //include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM detalle_inscripcion where cedula_par='$cedula_par' order by id DESC LIMIT 1";
 $res4=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res4);
 while ($ligne4 = @mysql_fetch_array ($res4)) 
 {
 ?>
  <? echo $ligne4["cuatrimestre"]; ?>
  <?php }?>
  </strong> Cuatrimestre<strong> </strong>dictado en el  Per&iacute;odo <? echo $fecha= date ("Y"); ?>,<strong> </strong>en la sede de la ESAT Aragua, ubicado en la  instalaciones del INIA-CENIAP, en los d&iacute;as y horarios establecidos por el  referido Programa.</p>
<p align="justify">&nbsp;</p>
<p>Constancia que se expide  a solicitud de la parte interesada en Maracay, a los <? echo $fecha= date ("d");?> &nbsp;d&iacute;as del mes  <? echo $fecha= date ("m");?> del a&ntilde;o 
<? echo $fecha= date ("Y"); ?>. </p>
<p><strong>&nbsp;</strong></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center"><strong>Liliana Vel&aacute;zquez</strong><br>
<strong>Directora (E) de  Secretar&iacute;a INIA-ESAT</strong></p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center">&nbsp;</p>
<p align="center"><img src="images/inferior.PNG" width="810" height="92"><br>
</p>
</body>
</html>
<? 

$out=ob_get_contents();
//var_dump($out);
ob_end_clean();
include("MPDF53/mpdf.php");
$mpdf=new mPDF();
$mpdf->WriteHTML($out);
$mpdf->Output();
exit;  ?> 
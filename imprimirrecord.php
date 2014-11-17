<?php
 ob_start();
 ?>
<?php
//VARIABLE DEL FORMULARIO
$cedula_par=$_REQUEST["cedula_par"];
$cuatrimestre=$_REQUEST["cuatrimestre"];
?>
<?php mysql_connect("localhost","root","admin");
   mysql_select_db("esat");
   $query="SELECT * from notas where cedula_par='$cedula_par'";
   $resultado=mysql_query($query);
?>
<? mysql_connect("localhost","root","admin");
   mysql_select_db("esat");
   $_pagi_sql="SELECT * from notas where cedula_par='$cedula_par'";
   $resultado=mysql_query($_pagi_sql);
   $_pagi_cuantos = 10;
require("paginator.inc.php");
$con_pro = mysql_num_rows($resultado);
?>
<html>
<head>
<LINK REL="Shortcut Icon" HREF="imagenes/iconoceian.ico">
<title>Sistema de Control de Estudios - ESAT</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	color: #000000;
}
.Estilo105 {font-size: 18px; font-weight: bold; }
.Estilo11 {font-size: 10px}
.Estilo54 {font-size: 12px}
.Estilo55 {font-size: 14px}
.Estilo107 {font-size: 18px}
-->
</style>
</head>

<body>

<p align="center"><img src="images/superior.PNG" width="808" height="150"></p>
<div align="center"><strong><br class="Estilo107" align="center">
  INSTITUTO NACIONAL DE INVESTIGACIONES AGR&Iacute;COLAS (INIA)</br>
  <br class="Estilo107" align="center">
  ESCUELA SOCIALISTA DE AGRICULTURA TROPICAL (ESAT)</br>
  <br class="Estilo107" align="center">
  REGISTRO ACAD&Eacute;MICO DE CALIFICACIONES</br>
</strong></div>
<p align="justify" class="Estilo105"><br>
  <span class="Estilo54"><strong>PASAPORTE:</strong></br>
  </span>
  <span class="Estilo54">
  <?php
include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM participantes where cedula='$cedula_par'";
 $res2=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res2);
 while ($ligne2 = @mysql_fetch_array ($res2)) 
 {
 ?>
  <? $ligne2["pasaporte"]; ?>
  <?php }?>
  <?php echo $cedula_par; ?><br>
  <strong>APELLIDOS Y NOMBRES: </strong></br>

  <?php
// include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM participantes where cedula='$cedula_par'";
 $res2=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res2);
 while ($ligne2 = @mysql_fetch_array ($res2)) 
 {
 ?>
  <? echo $ligne2["nombre"]; echo " "; echo $ligne2["apellido"]; ?>
  <?php }?><br>
  <strong>NIVEL:</strong></br>
  DOCTORADO<br>
  <strong>MENCI&Oacute;N:</strong></br>

  <?php
 //include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM inscripcion where cedula_par='$cedula_par' order by id DESC LIMIT 1";
 $res3=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res3);
 while ($ligne3 = @mysql_fetch_array ($res3)) 
 {
 ?>
  <? echo $ligne3["doctorado"]; ?>
  <?php }?><br>
  <strong>COHORTE:</strong></br>

  <?php
 //include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM inscripcion where cedula_par='$cedula_par' order by id DESC LIMIT 1";
 $res3=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res3);
 while ($ligne3 = @mysql_fetch_array ($res3)) 
 {
 ?>
  <? echo $ligne3["cohorte"]; ?>
  <?php }?><br>
  <strong>SEDE:</strong></br>
INIA &ndash; CENIAP &ndash; ESAT </span></p>
<p><strong>Modalidad  de Participante: </strong><strong>
<?php
// include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM participantes where cedula='$cedula_par'";
 $res2=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res2);
 while ($ligne2 = @mysql_fetch_array ($res2)) 
 {
 ?>
<? echo $ligne2["condicion"]; ?>
<?php }?>
</strong></p>
<p align="center">&nbsp;</p>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="121"><div align="center"><strong>CUATRIMESTRE</strong></div></td>
    <td width="99"><strong>C&Oacute;DIGO</strong></td>
    <td width="284"><div align="center"><strong>ASIGNATURA</strong></div></td>
    <td width="128"><div align="center"><strong>U.C.</strong></div></td>
    <td width="111"><div align="center"><strong>TIPO  </strong></div></td>
    <td width="112"><div align="center"><strong>CONDICI&Oacute;N</strong></div></td>
    <td width="187"><div align="center"></div>      <div align="center"><strong>CALIFICACI&Oacute;N EN LETRA </strong></div></td>
    <td width="154"><div align="center"><strong>CALIFICACI&Oacute;N EN N&Uacute;MERO </strong></div></td>
  </tr>
  
  <?php while($fila=mysql_fetch_array($_pagi_result)){?>
  <tr>
    <td class="Estilo54"><?=$fila['cuatrimestre'];
			$cuatrimestre=$fila['cuatrimestre']; ?></td>
    <td class="Estilo54"><?=$fila['codigo_materia'];
			$codigo_materia=$fila['codigo_materia']; ?></td>
    <td class="Estilo11"> <span class="Estilo54"><span class="Estilo55">
      <?php
 //include("conexion44.php");
 $db=conectate();
 $sql4="SELECT * FROM asignaturas where codigo='$codigo_materia'"; 
  //var_dump($sql2); die;
 $res4=mysql_query($sql4,$db);
// $nro_fila2= @mysql_num_rows ($res2);
 $ligne4=@mysql_fetch_array($res4);
 //while ($ligne2 = @mysql_fetch_array ($res2)) 
 //var_dump($ligne); 
 {
 ?>
      <? echo $ligne4["nombre"]; ?></span></span></td>
    <td><div align="center" class="Estilo54">
      <span class="Estilo55"><? echo $ligne4["nombre"]; ?></span>
      <? $fila['facilitador'];
			$facilitador=$fila['facilitador']; ?>
      <? $fila['notaauto'];
			$notaauto=$fila['notaauto']; ?>
      <?php $defauto=$notaauto*1/20; ?>
      <? $fila['totalco'];
			$totalco=$fila['totalco']; ?>
      <?php $definitivoco=$totalco*1/20; ?>
      <?php $definitivoptos=round($facilitador+$defauto+$definitivoco); ?>
    <?php echo $definitivopor=$definitivoptos*100/20; ?></div></td>
    <td><div align="center"><span class="Estilo55"><? echo $ligne4["tipo"]; ?></span><strong>
      <?php } ?>
    </strong></div></td>
    <td><div align="center"><span class="Estilo54">
      <?php
// include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM participantes where cedula='$cedula_par'";
 $res2=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res2);
 while ($ligne2 = @mysql_fetch_array ($res2)) 
 {
 ?>
      <? echo $ligne2["condicion"]; ?>
      <?php }?>
    </span></div></td>
    <td><div align="center"><? if ($definitivoptos=="17") { echo $letra="DIECISIETE"; }?><? if ($definitivoptos=="18") { echo $letra="DIECIOCHO"; }?><? if ($definitivoptos=="16") { echo $letra="DIECISEIS"; }?><? if ($definitivoptos=="19") { echo $letra="DIECINUEVE"; }?><? if ($definitivoptos=="20") { echo $letra="VEINTE"; }?><? if ($definitivoptos=="15") { echo $letra="QUINCE"; }?><? if ($definitivoptos=="14") { echo $letra="CATORCE"; }?><? if ($definitivoptos=="13") { echo $letra="TRECE"; }?><? if ($definitivoptos=="12") { echo $letra="DOCE"; }?><? if ($definitivoptos=="11") { echo $letra="ONCE"; }?><? if ($definitivoptos=="10") { echo $letra="DIEZ"; }?></div></td>
    <td><div align="center"><? echo $definitivoptos; ?></div></td>
  </tr>
  <? }?>
</table>
<p>Escala de calificaciones del uno (01) al veinte (20), nota min&iacute;ma aprobatoria catorce (14), <br>
  U.C: Unidad  de Cr&eacute;dito<br>
  Tipo de  Asignatura: Obligatoria o Electiva<br>
  A: Aprobado  R: Reprobado</p>
<p align="justify">&nbsp;</p>
<p>Constancia que se expide  a solicitud de la parte interesada en Maracay, a los <? echo $fecha= date ("d");?> &nbsp;d&iacute;as del mes  <? echo $fecha= date ("m");?> del a&ntilde;o 
<? echo $fecha= date ("Y"); ?>. </p>
<p><strong>&nbsp;</strong></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center"><strong>LILIANA VEL&Aacute;ZQUEZ</strong><br>
    <strong>DIRECTORA DE SECRETAR&Iacute;A</strong></p>
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
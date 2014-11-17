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
   $query="SELECT * from notas where cedula_par='$cedula_par' and cuatrimestre='$cuatrimestre' order by cuatrimestre";
   $resultado=mysql_query($query);
?>
<? mysql_connect("localhost","root","admin");
   mysql_select_db("esat");
   $_pagi_sql="SELECT * from notas where cedula_par='$cedula_par' and cuatrimestre='$cuatrimestre' order by cuatrimestre";
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
.Estilo53 {font-size: 12px;
	font-weight: bold;
}
.Estilo54 {font-size: 12px}
.Estilo55 {font-size: 14px}
-->
</style>
</head>

<body>

<p align="center"><img src="images/superior.PNG" width="808" height="150"></p>
<p align="center" class="Estilo105"><strong>
  <?php
 include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM inscripcion where cedula_par='$cedula_par' order by id DESC LIMIT 1";
 $res3=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res3);
 while ($ligne3 = @mysql_fetch_array ($res3)) 
 {
 ?>
  <? echo $ligne3["doctorado"]; ?>
  <?php }?>
</strong>FDF</p>
<h1 align="center">CALIFICACIONES DEFINITIVAS </h1>
<p align="center">&nbsp;</p>
<p><strong>Participante: </strong><strong>
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
<?php }?>
</strong>.<br>
    <strong>C&eacute;dula de Identidad  N&deg;: </strong><strong><?php echo $cedula_par; ?></strong></br>
<br>
<strong>Doctorado: </strong><strong>
<?php
// include("conexion44.php");
 $db=conectate();
 $sql="SELECT * FROM inscripcion where cedula_par='$cedula_par'";
 $res2=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res2);
 while ($ligne2 = @mysql_fetch_array ($res2)) 
 {
 ?>
<? echo $ligne2["doctorado"]; ?>
<?php }?>
</strong></br>
<br>
<strong>Modalidad  de Participante: </strong><strong>
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
  </strong>
<p align="center"><strong>COHORTE: 
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
  <?php }?>
</strong><br>
  <strong><?php echo $cuatrimestre; ?> CUATRIMESTRE</strong><br>
</p>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="123" rowspan="2"><div align="center"><strong>C&Oacute;DIGO</strong></div></td>
    <td width="388" rowspan="2"><div align="center"><strong>ASIGNATURA</strong></div></td>
    <td width="259" rowspan="2"><div align="center"><strong>U.C.</strong></div></td>
    <td width="132" rowspan="2"><div align="center"><strong>TIPO DE ASIGNATURA </strong></div></td>
    <td colspan="2"><div align="center"><strong>CALIFICACI&Oacute;N</strong></div></td>
  </tr>
  <tr>
    <td width="166"><div align="center"><strong>EN LETRA </strong></div></td>
    <td width="132"><div align="center"><strong>EN N&Uacute;MERO </strong></div></td>
  </tr>
  <?php while($fila=mysql_fetch_array($_pagi_result)){?>
  <tr>
    <td><span class="Estilo11"><span class="Estilo54">
      <?=$fila['codigo_materia'];
			$codigo_materia=$fila['codigo_materia']; ?>
    </span></span></td>
    <td><span class="Estilo11"> <span class="Estilo54"><span class="Estilo55">
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
      <? echo $ligne4["nombre"]; ?></span></span></span></td>
    <td><div align="center"><span class="Estilo54">
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
    <?php echo $definitivopor=$definitivoptos*100/20; ?></span></div></td>
    <td><div align="center"><span class="Estilo55"><? echo $ligne4["tipo"]; ?></span><strong>
      <?php } ?>
    </strong></div></td>
    <td><div align="center"><? if ($definitivoptos=="17") { echo $letra="DIECISIETE"; }?><? if ($definitivoptos=="18") { echo $letra="DIECIOCHO"; }?><? if ($definitivoptos=="16") { echo $letra="DIECISEIS"; }?><? if ($definitivoptos=="19") { echo $letra="DIECINUEVE"; }?><? if ($definitivoptos=="20") { echo $letra="VEINTE"; }?><? if ($definitivoptos=="15") { echo $letra="QUINCE"; }?><? if ($definitivoptos=="14") { echo $letra="CATORCE"; }?><? if ($definitivoptos=="13") { echo $letra="TRECE"; }?><? if ($definitivoptos=="12") { echo $letra="DOCE"; }?><? if ($definitivoptos=="11") { echo $letra="ONCE"; }?><? if ($definitivoptos=="10") { echo $letra="DIEZ"; }?></div></td>
    <td><div align="center"><? echo $definitivoptos; ?></div></td>
  </tr>
  <? }?>
</table>
<p>Escala del 0  al 20, nota m&iacute;nima aprobatoria diez (10) puntos.<br>
  U.C: Unidad  de Cr&eacute;dito<br>
  Tipo de  Asignatura: Obligatoria o Electiva<br>
  A: Aprobado  R: Reprobado</p>
<p align="justify">&nbsp;</p>
<p>Constancia que se expide  a solicitud de la parte interesada en Maracay, a los <? echo $fecha= date ("d");?> &nbsp;d&iacute;as del mes  <? echo $fecha= date ("m");?> del a&ntilde;o 
<? echo $fecha= date ("Y"); ?>. </p>
<p><strong>&nbsp;</strong></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center"><strong>Liliana Vel&aacute;zquez</strong><br>
<strong>Directora (E) de  Secretar&iacute;a INIA-ESAT</strong></p>
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
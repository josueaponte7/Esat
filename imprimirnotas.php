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
   $query="SELECT * from notas where cedula_par='$cedula_par' and cuatrimestre='$cuatrimestre' order by codigo_materia";
   $resultado=mysql_query($query);
?>
<? mysql_connect("localhost","root","admin");
   mysql_select_db("esat");
   $_pagi_sql="SELECT * from notas where cedula_par='$cedula_par' and cuatrimestre='$cuatrimestre' order by codigo_materia";
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
	font-family: Times New Roman;
	font-size: 14px;
	color: #000000;
}
.Estilo105 {font-size: 18px; font-weight: bold; }
.Estilo54 {font-size: 14px}
.Estilo11 {font-size: 10px}
.Estilo53 {font-size: 12px;
	font-weight: bold;
}
.Estilo106 {font-size: 12px}
-->
</style>
</head>

<body>

<p align="center"><img src="images/logo-esat.png" width="138" height="64" align="left"><strong>REP&Uacute;BLICA BOLIVARIANA DE VENEZUELA</br>
    <br align="center">
MINISTERIO DEL PODER POPULAR PARA LA AGRICULTURA Y TIERRA </br>
<br align="center">
INSTITUTO NACIONAL DE INVESTIGACIONES AGR&Iacute;COLAS </br>
<br align="center">
MARACAY ESTADO ARAGUA </br>
</strong></p>
<p align="center">&nbsp;</p>
<p align="center"><span class="Estilo105">CALIFICACIONES OBTENIDAS </span></p>
<p align="center">&nbsp;</p>
<p align="justify" class="Estilo85 Estilo53"><strong>DATOS DEL PARTICIPANTE:</strong></p>
<p align="justify" class="Estilo54"><strong>C.I.</strong>: <? echo $cedula_par; ?></p>
<p align="justify" class="Estilo54"><strong>Nombre y Apellido</strong>:
  <?php
 include("conexion44.php");
 $db=conectate();
 $sql4="SELECT * FROM participantes where cedula='$cedula_par'"; 
  //var_dump($sql2); die;
 $res4=mysql_query($sql4,$db);
// $nro_fila2= @mysql_num_rows ($res2);
 $ligne4=@mysql_fetch_array($res4);
 //while ($ligne2 = @mysql_fetch_array ($res2)) 
 //var_dump($ligne); 
 {
 ?>
    <? echo $ligne4["nombre"]; ?> <? echo $ligne4["apellido"]; ?><strong>
    <?php } ?>
</strong></p>
<p align="justify" class="Estilo54"><strong>Cohorte</strong>: 
  <?php
 //include("conexion44.php");
 $db=conectate();
 $sql4="SELECT * FROM notas where cedula_par='$cedula_par' and cuatrimestre='$cuatrimestre'"; 
  //var_dump($sql2); die;
 $res4=mysql_query($sql4,$db);
// $nro_fila2= @mysql_num_rows ($res2);
 $ligne4=@mysql_fetch_array($res4);
 //while ($ligne2 = @mysql_fetch_array ($res2)) 
 //var_dump($ligne); 
 {
 ?>
  <? echo $ligne4["cohorte"]; ?> <strong>
  <?php } ?>
  </strong></p>
<p align="justify" class="Estilo54"><strong>Cuatrimestre</strong>: <? echo $cuatrimestre; ?></p>
<table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="250"><div align="center"><strong>C&Ograve;DIGO</strong></div></td>
    <td width="549"><div align="center"><strong>ASIGNATURA</strong></div></td>
    <td width="303"><div align="center"><strong>CALIFICACI&Oacute;N (20 pts.) </strong></div></td>
    <td width="279"><div align="center"><strong>CALIFICACI&Oacute;N (100%) </strong></div></td>
  </tr>
  <?php while($fila=mysql_fetch_array($_pagi_result)){?>
  <tr>
    <td><span class="Estilo106">
      <?=$fila['codigo_materia'];
			$codigo_mat=$fila['codigo_materia']; ?>
    </span></td>
    <td><span class="Estilo106"><span class="Estilo54">
      <?php
 //include("conexion44.php");
 $db=conectate();
 $sql4="SELECT * FROM asignaturas where codigo='$codigo_mat'"; 
  //var_dump($sql2); die;
 $res4=mysql_query($sql4,$db);
// $nro_fila2= @mysql_num_rows ($res2);
 $ligne4=@mysql_fetch_array($res4);
 //while ($ligne2 = @mysql_fetch_array ($res2)) 
 //var_dump($ligne); 
 {
 ?>
      <? echo $ligne4["nombre"]; ?></span> <span class="Estilo54"><strong>
      <?php } ?>
      <? $fila['facilitador'];
			$facilitador=$fila['facilitador']; ?>
      <? $fila['notaauto'];
			$notaauto=$fila['notaauto']; ?>
      <?php $defauto=$notaauto*1/20; ?>
      <? $fila['totalco'];
			$totalco=$fila['totalco']; ?>
    <?php $definitivoco=$totalco*1/20; ?>    </strong></span></span></td>
    <td><span class="Estilo106"><?php echo $definitivoptos=$facilitador+$defauto+$definitivoco; ?></span></td>
    <td><span class="Estilo106"><?php echo $definitivopor=$definitivoptos*100/20; ?></span></td>
  </tr>
  <? }?>
</table>
<p align="justify">&nbsp;</p>
<p align="justify">&nbsp;</p>
<p align="justify">&nbsp;</p>
<p align="center">&nbsp;</p>
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
<?php
require './conex.php';
conectar();
$ninscripcion=$_GET['idu'];



$q="select * from inscripcion where cedula_par=".$ninscripcion;
$result=mysql_query($q);
$filav=mysql_fetch_array($result);

$inv="select * from inscripcion where ninscripcion=".$filav['ninscripcion'];
$invr=mysql_query($inv);
$invr1=mysql_fetch_array($invr);

$invtotal="select * from inscripcion";
$invtotal1=mysql_query($invtotal);

//$query="SELECT * from detalle_presupuesto where npresupuesto='$npresupuesto'";
 //  $resultado=mysql_query($query);
?>
<html>
<head>
<title>Sistema de Control de Estudios - ESAT</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">

body,td,th {
	font-family: Arial;
	font-size: 12px;
}
.Estilo84 {font-size: 16}
.Estilo85 {font-size: 14px; }
.Estilo3 {font-family: Arial}
.Estilo53 {font-size: 14px;
	font-weight: bold;
}
.Estilo54 {font-size: 14px}
.Estilo86 {
	font-size: 16px;
	font-weight: bold;
}
.Estilo87 {font-weight: bold; font-family: Arial;}

</style>
</head>

<body>
<p><img src="images/logo-oficial.jpg" width="1085" height="60"></p>
<p>&nbsp;</p>
<p align="center" class="Estilo85"><span class="Estilo86">COMPROBANTE DE INSCRIPI&Oacute;N </span>
    <?php  $filav['ninscripcion']; ?>
</p>
<p align="center" class="Estilo85">&nbsp;</p>
<p align="justify" class="Estilo53 Estilo85">DATOS DEL PARTICIPANTE:</p>
<p align="justify" class="Estilo54"><strong>C.I.</strong>: <?php echo $filav['cedula_par']; 
  $cedula_par=$filav['cedula_par'];?></p>
<p align="justify" class="Estilo54"><strong>Nombre y Apellido</strong>:
  <?php

 $sql4="SELECT * FROM participantes where cedula='$cedula_par'"; 
  //var_dump($sql2); die;
 $res4=mysql_query($sql4);
// $nro_fila2= @mysql_num_rows ($res2);
 $ligne4=@mysql_fetch_array($res4);
 //while ($ligne2 = @mysql_fetch_array ($res2)) 
 //var_dump($ligne); 
 {
 ?>
    <?php echo $ligne4["nombre"]; ?> <?php echo $ligne4["apellido"]; ?><strong>
    <?php } ?>
  </strong></p>
<p align="justify" class="Estilo54"><strong>Fecha:</strong> <?php echo $filav['fecha']; ?></p>
<p align="justify" class="Estilo54"><strong>Doctorado</strong>: <?php echo $filav['doctorado']; ?></p>
<p align="justify" class="Estilo54"><strong>Cohorte</strong>: <?php echo $filav['cohorte']; ?></p>
<p align="justify" class="Estilo54">&nbsp;</p>
<p align="center" class="Estilo85"><strong>Lista de Asignatura Inscrita </strong></p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" class="Estilo53">
  <tr>
    <td width="316" class="Estilo85"><div align="center" class="Estilo87">C&oacute;digo</div></td>
    <td width="603" class="Estilo85"><div align="center" class="Estilo87">Asignatura</div></td>
    <td width="287" class="Estilo85"><div align="center" class="Estilo87">Cuatrimestre</div></td>
  </tr>
  <?php
$ninscripcion=$ninscripcion;
$cedula_par=$cedula_par;

 $sql="SELECT * FROM detalle_inscripcion where cedula_par='$ninscripcion'";
 $res=mysql_query($sql);
 $nro_fila= @mysql_num_rows ($res);
 while ($ligne = @mysql_fetch_array ($res)) 
 {
 ?>
  <tr>
    <td class="Estilo53"><div align="center"><strong>
      <?php echo $ligne["codigo_materia"]; 
			  $codigo_materia=$ligne["codigo_materia"]; ?>
      <strong><strong>
        <?php $ligne["id"]; 
			  $id=$ligne["id"]; ?>
      </strong></strong></strong></div></td>
    <td class="Estilo53"><div align="center"><strong><span class="Estilo3 Estilo15 Estilo14"><strong>
      <?php
// include("conexion44.php");

 $sql2="SELECT * FROM asignaturas where codigo='$codigo_materia'"; 
  //var_dump($sql2); die;
 $res2=mysql_query($sql2);
 $nro_fila2= @mysql_num_rows ($res2);
 $ligne2=@mysql_fetch_array($res2);
 //while ($ligne2 = @mysql_fetch_array ($res2)) 
 //var_dump($ligne); 
 {
 ?>
      </strong></span><?php echo $ligne2["nombre"]; ?>
      <?php } ?>
      </span></strong></div></td>
    <td class="Estilo53"><div align="center"><strong><span class="Estilo14 Estilo15 Estilo54 Estilo3"><strong><strong>
      <?php echo $ligne["cuatrimestre"]; 
			  $cuatrimestre=$ligne["cuatrimestre"]; ?>
    </strong></strong></span></strong></div></td>
  </tr>
  <?php
	$nro_fila++;
 } ?>
</table>
<p>&nbsp;</p>
<h1 align="center">____________________&nbsp;&nbsp;&nbsp;&nbsp;  ____________________</h1>
<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma Participante&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma Analista</p>
<p align="center">Sello</p>
<p><img src="images/inferior.PNG" width="810" height="92"></p>
<p align="justify" class="Estilo84"></p>
</body>
</html>
<?php


$out=ob_get_contents();
//var_dump($out);
ob_end_clean();
include("MPDF53/mpdf.php");
$mpdf=new mPDF();
$mpdf->WriteHTML($out);
$mpdf->Output();
exit;  ?> 
<?php
 ob_start();
 ?>


<?php mysql_connect("localhost","root","admin");
	mysql_select_db("esat");
$nhorario=$_GET['idu'];
$q="select * from horario where nhorario=".$nhorario;
$result=mysql_query($q);
$filav=mysql_fetch_array($result);

$inv="select * from horario where nhorario=".$filav['nhorario'];
$invr=mysql_query($inv);
$invr1=mysql_fetch_array($invr);

$invtotal="select * from horario";
$invtotal1=mysql_query($invtotal);

//$query="SELECT * from detalle_presupuesto where npresupuesto='$npresupuesto'";
 //  $resultado=mysql_query($query);
?>
<html>
<head>
<title>Sistema de Control de Estudios - ESAT</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
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
.Estilo87 {font-weight: bold; font-family: Arial;}
-->
</style>
</head>

<body>
<p><img src="images/logo-oficial.jpg" width="1085" height="60"></p>
<p>&nbsp;</p>
<p align="center" class="Estilo85"><strong><span class="Estilo54"><? $filav['periodo']; ?></span></strong>
  <?  $filav['nhorario']; ?>
</p>
<p align="center" class="Estilo85"><strong>Per&iacute;odo: <span class="Estilo54">
  <? echo $filav['periodo']; ?>
</span></strong></p>
<p align="center" class="Estilo85"><strong>Menci&oacute;n: <span class="Estilo54"> <? echo $filav['mencion']; ?> </span></strong></p>
<p align="center" class="Estilo53">Horario de Asignaturas
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
    <? echo $ligne4["nombre"]; ?> <? echo $ligne4["apellido"]; ?>
  <?php } ?>
</p>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#000000" class="Estilo53">
  <tr>
    <td width="134" class="Estilo54"><div align="center" class="Estilo87">Cuatrimestre</div></td>
    <td width="373" class="Estilo54"><div align="center" class="Estilo87">Asignatura</div></td>
    <td width="197" class="Estilo54"><div align="center" class="Estilo87">Mes</div></td>
    <td width="175" class="Estilo54"><div align="center">Jueves</div></td>
    <td width="165" class="Estilo54"><div align="center">Viernes</div></td>
    <td width="149" class="Estilo54"><div align="center">Sabado</div></td>
  </tr>
  <?php
$nhorario=$nhorario;
$cedula_par=$cedula_par;
// include("conexion1.php");
 $db=conectate();
 $sql="SELECT * FROM horario where nhorario='$nhorario'";
 $res=mysql_query($sql,$db);
 $nro_fila= @mysql_num_rows ($res);
 while ($ligne = @mysql_fetch_array ($res)) 
 {
 ?>
  <tr>
    <td class="Estilo53"><div align="center">
      <p><strong><strong><strong>
        <?=$ligne["cuatrimestre"]; ?>
   </strong></strong></strong></p>
      <p> <strong><strong><strong>
          (Cohorte: 
          <?=$ligne["cohorte"]; ?>
            </strong></strong></strong>)</p>
    </div></td>
    <td class="Estilo53"><div align="center">
      <p><strong><strong><strong>
        <?=$ligne["asignatura"]; ?>
      </strong></strong></strong></p>
      <p> <strong><strong><strong>
         <?=$ligne["hora"]; ?>
        </strong></strong></strong></p>
    </div></td>
    <td class="Estilo53"><div align="center"><strong><span class="Estilo14 Estilo15 Estilo54 Estilo3"><strong><strong>
      <?=$ligne["mes"]; ?>
    </strong></strong></span></strong></div></td>
    <td class="Estilo53"><div align="center"><strong><strong><strong>
      <?=$ligne["jueves"]; ?>
    </strong></strong></strong></div></td>
    <td class="Estilo53"><div align="center"><strong><strong><strong>
      <?=$ligne["viernes"]; ?>
    </strong></strong></strong></div></td>
    <td class="Estilo53"><div align="center"><strong><strong><strong>
      <?=$ligne["sabado"]; ?>
    </strong></strong></strong></div></td>
  </tr>
  <?php
	$nro_fila++;
 } ?>
</table>
<p>&nbsp;</p>
<p><img src="images/inferior.PNG" width="810" height="92"></p>
<p align="justify" class="Estilo84"></p>
</body>
</html>
<?
//}
//}
?><? 

$out=ob_get_contents();
//var_dump($out);
ob_end_clean();
include("MPDF53/mpdf.php");
$mpdf=new mPDF();
$mpdf->WriteHTML($out);
$mpdf->Output();
exit;  ?> 
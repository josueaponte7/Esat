<?php
include('../rutas.class.php'); 
include(CONTROLLER.'/controller_empleado.php');
include(MODELOS.'/numeros.php');
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<style type="text/css">

p
{line-height: 200%; font-size: 1em }

.Estilo1 {
	font-size: 10px;
	font-weight: bold;
}
</style>
</head>

<body>
<div align="center">
  <table width="780" bordercolor="#000000">
    <tr>
      <td align="right"><div align="right"><img src="<?=SERVER ?>/images/logo2.png" width="130" height="101" /></div></td>
    </tr>
    <tr>
      <td align="left"><div align="left"><br />
  &nbsp;<strong>Asociación:  cooperativa  <br />
  Telecomunicaciones al Máximo de Venezuela R.L   <br />
   Rif.  J- 29482313-0 
      </strong></div></td>
    </tr>
    <tr>
      <td height="23" valign="top" background="imagenes/Imagen2.JPG" class="Estilo97">&nbsp;</td>
    </tr>
    <tr>
      <td height="23" align="right" valign="top" class="Estilo97">&nbsp;</td>
    </tr>
    <tr>
      <td align="center" class="Estilo97"><div align="center"><span class="Estilo91"><strong><u>CONSTANCIA DE EGRESO</u></strong></span></div></td>
    </tr>
    <tr>
      <td align="center" class="Estilo97">&nbsp;</td>
    </tr>
  </table>
  <div class="Estilo5">
    <div align="justify">
      <p align="justify" class="Estilo5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Se  hace constar por medio de la presente&nbsp; que&nbsp;&nbsp;el&nbsp;&nbsp; Ciudadano&nbsp; (a): <strong><? echo $resultado["nombre_emple"]; ?> </strong><strong> </strong>Titular de la C&eacute;dula de Identidad N&deg; <strong><? echo $resultado["cedula_emple"]; ?></strong>, estuvo  laborando en la cooperativa “Telecomunicaciones al Máximo de Venezuela R.L” desde  el <strong><? echo $resultado["fecha_ingreso"]; ?></strong> hasta el <strong><? echo $resultado["fecha_egreso"]; ?></strong> prestando  servicio como <strong><? echo $resul['cargo']; ?></strong> devengando  un sueldo de <strong><?php echo numtoletras ($resultado["sueldo"]); ?>, &nbsp;(
      <? $total_sueldo=$resultado["sueldo"];  echo number_format($total_sueldo, 2, ",", "."); ?>, Bfs..)</strong> Mensual,  en la ciudad de Maracay estado Aragua.</p>
      <p>&nbsp;</p>
    </div>
  </div>
</div>

<div class="Estilo5">Constancia que se  expide a petici&oacute;n de la parte interesada, en Maracay el <?php include(MODELOS.'/fecha_completa.php') ?>.</div>
<table width="100%%">
  <tr>
    <td width="35%">&nbsp;</td>
    <td width="33%">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align="center">_____________________________</div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><div align="center" class="Estilo81"><strong>Juan Ojeda</strong></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><div align="center" class="Estilo81"><strong>C.I. 9.696.686&nbsp;</strong></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><div align="center" class="Estilo81"><strong>Representante Legal</strong></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center"><div align="center"><strong>SELLO</strong></div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="center">&nbsp;</td>
    <td width="32%">&nbsp;</td>
  </tr>
</table>
<div align="center">
  <p align="center" class="Estilo5">Dirección: URB. Paraparal  II, vereda 4 Nº 26,  Maracay-Edo-Aragua.  Correo electrónico: Telecomalmaximo@Hotmail.com.</p>
</div>
<p>&nbsp;</p>
</body>
</html>

<? $out=ob_get_contents();
//var_dump($out);
ob_end_clean();
include("../MPDF53/mpdf.php");
$mpdf=new mPDF();
$mpdf->WriteHTML($out);
$mpdf->Output();
exit; ?> 
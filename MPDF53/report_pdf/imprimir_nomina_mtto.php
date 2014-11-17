<?php
include('../rutas.class.php'); 
include(CONTROLLER.'/controller_nomina.php');
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
</style>
</head>

<body>
<div align="center">
  <table width="780" bordercolor="#000000">
    <tr>
      <td align="right"><div align="right"><img src="<?=SERVER ?>/images/logo2.png" width="130" height="80" /></div></td>
    </tr>
    <tr>
      <td align="left"><div align="left"><br />
  &nbsp;<strong>Asociación:  cooperativa  <br />
  Telecomunicaciones al Máximo de Venezuela R.L   <br />
   Rif.  J- 29482313-0 
      </strong></div></td>
    </tr>
    <tr>
      <td align="center" class="Estilo97"><div align="center"><span class="Estilo91"><strong><u>RECIBO DE PAGO</u></strong></span></div></td>
    </tr>
    <tr>
      <td align="center" class="Estilo97">&nbsp;</td>
    </tr>
  </table>
  <table width="821" border="0" cellpadding="3">
    <tr>
      <td><strong>Periodo Desde&nbsp;</strong> <?php echo $res_nom['fecha_inicio']; ?></td>
      <td width="314"><strong>Hasta</strong> &nbsp; <?php echo $res_nom['fecha_final']; ?> </td>
      <td width="194"><div align="right"><strong>N° Recibo: </strong>&nbsp; 
          <?php  echo sprintf("%05d", $res_nom['cod_nom']); ?>
      </div></td>
    </tr>
    <tr>
      <td height="23"><strong>Cedula: &nbsp;</strong> <?php echo $res_nom['cedula_emple']; ?></td>
      <td> <strong>Nombre: </strong>&nbsp; <?php echo $res_nom['nombre_emple']; ?> &nbsp; <?php echo $res_nom['apellido_emple']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="299" height="23"><strong>Sueldo Mensual: </strong>&nbsp; <?php echo number_format($res_nom['sueldo'], 2, ',', ' '); ?></td>
      <td colspan="2"> <strong>Cargo: </strong>&nbsp; <?php echo $res_nom['cargo']; ?></td>
    </tr>
  </table>
  <table width="819" border="0" cellpadding="3">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td width="229"><div align="left"><strong>Descripción del Concepto</strong></div></td>
      <td width="126"><div align="left"><strong>Dias / Horas</strong></div></td>
      <td width="189"><div align="left"><strong>Asisgnaciones</strong></div></td>
      <td width="122"><div align="left"><strong>Deduciones</strong></div></td>
      <td colspan="2"><div align="center"><strong>Neto a Pagar</strong></div></td>
    </tr>
    <tr>
      <td><div align="left">Adelanto Societario</div></td>
      <td><strong><?php echo $dia15; ?></strong></td>
      <td><strong>
        <?php $suedo_quincenal=$res_nom['sueldo']/2; echo number_format($suedo_quincenal, 2, ',', ' '); ?>
      </strong></td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left">Bono de Alimentación</div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td width="65">&nbsp;</td>
      <td width="62">&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left">Dias Extras</div></td>
      <td><strong><?php echo $res_nom['n_diaslabor']; ?></strong></td>
      <td><strong>
        <?php $total_dias_extr=($res_nom['n_diaslabor'] * $dia_emple); echo number_format($total_dias_extr, 2, ',', ' '); ?>
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left">Horas Extras</div></td>
      <td><strong><?php echo $res_nom['horas_extras'];?></strong></td>
      <td><strong>
        <?php  	$diaempleado= ($res_nom['sueldo']/30);
				$dialaboral=($diaempleado/8);
				$totalhora=($res_nom['horas_extras']* $dialaboral); echo number_format($totalhora, 2, ',', ' '); 
		?>
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left">Instalacion telefonica</div></td>
      <td><strong><?php echo $insta_telef; ?></strong></td>
      <td><strong>
        <?php $totalinst= $insta_telef*50; echo number_format($totalinst, 2, ',', ' '); ?>
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left">Instalacion telefonica sobre meta </div></td>
      <td><strong><?php echo $insta_telef_meta; ?></strong></td>
      <td><strong>
        <?php $totalinst_meta= $insta_telef_meta*75; echo number_format($totalinst_meta, 2, ',', ' '); ?>
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left"><strong>Descuentos</strong></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left">Dias  no Laborados</div></td>
      <td><strong><?php echo $res_nom['dias_no_lab'];?></strong> </td>
      <td>&nbsp;</td>
      <td><strong>
        <?php $total_des=($res_nom['dias_no_lab'] * $dia_emple); echo number_format($total_des, 2, ',', ' '); ?>
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left">Descuento de Telefono</div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><strong><?php echo $res_nom['dsct_tlf']; ?></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left">F.A.O</div></td>
      <td><strong><?php echo $leypolitica; ?>%</strong></td>
      <td>&nbsp;</td>
      <td><strong>
        <?php $des_fao=($res_nom['sueldo']*$leypolitica)/100; echo number_format($des_fao, 2, ',', ' '); ?>
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left">S.O.S</div></td>
      <td><strong><?php echo $seg_social;?>%</strong></td>
      <td>&nbsp;</td>
      <td><strong>
        <?php $des_seg=($res_nom['sueldo']*$seg_social)/100; echo number_format($des_seg, 2, ',', ' '); ?>
      </strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	 <tr>
      <td><div align="left">Servico Funerario</div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><strong><?php echo $servicofune=$serv_fun/2; ?></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left"></div></td>
      <td> <?php
	  $total_suma=$suedo_quincenal + $total_dias_extr + $horas_extras_empl + $totalinst + $totalinst_meta;
	  $total_desc=$total_des + $res_nom['dsct_tlf'] + $des_fao + $des_seg + $servicofune; 
	  
	  $redond_total_suma=number_format($total_suma, 2, ',', ' ');
	  $redond_total_desc=number_format($total_desc, 2, ',', ' ');
	  
	  //var_dump("total suma=>", $redond_total_suma, "total descuento=>", $redond_total_desc);
	  
	  $total_pagar=$total_suma - $total_desc;
	  ?></td>
      <td><strong>Total: <?php echo $redond_total_suma; ?></strong></td>
      <td><strong>Total: <?php echo $redond_total_desc; ?></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left"></div></td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left"><strong>N° CHEQUE:
	   <?php 
	  if($res_nom['n_cheque']==0){
	  	$ncheque="";
	  }else{
	  	$ncheque=$res_nom['n_cheque'];
	  }
	   ?>
	  
	  </strong></div></td>
      <td colspan="3"><strong>BANCO: <?php echo $res_nom['banco']; ?></strong></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left"></div></td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><div align="left"><strong>TOTAL ASOSICADO</strong></div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2"><strong>
        <?php  echo number_format($total_pagar, 2, ',', ' '); ?>
      </strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
    </tr>
  </table>
</div>
<div class="Estilo5">Recibo que se  expide a petici&oacute;n de la parte interesada, en Maracay el <?php include(MODELOS.'/fecha_completa.php') ?>.</div>
<table width="100%%">
  <tr>
    <td width="35%">&nbsp;</td>
    <td width="33%">&nbsp;</td>
    <td width="32%">&nbsp;</td>
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
    <td align="center"><div align="center" class="Estilo81"><strong>Recibo Conforme</strong></div></td>
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
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>

<?php

 $out=ob_get_contents();
//var_dump($out);
ob_end_clean();
include("../MPDF53/mpdf.php");
$mpdf=new mPDF();
$mpdf->WriteHTML($out);
$mpdf->Output();
exit; 
?> 
<?php

	$app["subtitle"] = "Reportes" ;
	$lnk = connect();
	$aid = $url[2];
	message::info("Seleccione el reporte que desea generar.");
?>
<table class="list" cellpadding="1" cellspacing="1" width="100%">
<tr>
<th>Reporte</th>
<th>Acci&oacute;n</th>
</tr>
<?php 
    
	$reportes = array("Participantes","Asignaturas","Facilitadores");
    
    foreach($reportes as $reporte){

  
?>
<tr>
<td align="center"><?= $reporte ?></td>
<td align="center"><button type="button" class="bb pdf" value="pdf/<?=strtolower($reporte); ?>.pdf.php">Abrir</button></td>
</tr>
<?php        
        
    }

?>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
</table>

<?php

		$app["subtitle"] = "Lista de Asignaturas" ;

?>
<table class="list" cellpadding="1" cellspacing="1" width="100%">
<tr>
<th>C&oacute;digo</th>
<th>Nombre</th>
<th>UC</th>
<th>Especialidad/Menci&oacute;n</th>
<th>Acci&oacute;n</th>
</tr>
<?php 
    
    $lnk = connect();
   
	$sql = "SELECT * FROM `asignaturas` ORDER BY `cod_asi`";
   
    $cta = mysql_query($sql,$lnk);
    
    while($row = mysql_fetch_array($cta)){

		$men = _info('menciones','cod_men',$row["cod_men"]);
    
?>
<tr>
<td align="center"><?= strtoupper($row["codigo"]); ?></td>
<td align="center"><?= ucwords($row["nombre"]); ?></td>
<td align="center"><?= $row["uc"]; ?></td>
<td align="center"><?= $men["nombre"]; ?></td>
<td align="center"><button type="button" class="bb action" value="asignaturas/editar/<?= $row["cod_asi"]?>">Editar</button></td>
</tr>
<?php        
        
    }

?>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
</table>

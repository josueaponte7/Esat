<?php

		$app["subtitle"] = "Lista de Participantes" ;

?>
<table class="list" cellpadding="1" cellspacing="1" width="100%">
<tr>
<th>C&oacute;digo</th>
<th>Nombre</th>
<th>Apellido</th>
<th>C&eacute;dula</th>
<th>No. Pasaporte</th>
<th>Edo. Civil</th>
<th>Fecha Nac.</th>
<th>Lugar Nac.</th>
<th>Direcci&oacute;n</th>
<th>Acci&oacute;n</th>
</tr>
<?php 
    
    $lnk = connect();
   
	$sql = "SELECT * FROM `participantes` ORDER BY `cod_par`";
   
    $cta = mysql_query($sql,$lnk);
    
    while($row = mysql_fetch_array($cta)){

   
    
?>
<tr>
<td align="center"><?= $row["cod_par"]; ?></td>
<td align="center"><?= $row["nombre"]; ?></td>
<td align="center"><?= $row["apellido"]; ?></td>
<td align="center"><?= $row["cedula"]; ?></td>
<td align="center"><?= $row["pasaporte"]; ?></td>
<td align="center"><?= $row["estado_civil"]; ?></td>
<td align="center"><?= _convert_date($row["fecha_nacimiento"]); ?></td>
<td align="center"><?= $row["lugar_nacimiento"]; ?></td>
<td align="center"><?= $row["direccion"]?></td>
<td align="center"><button type="button" class="bb action" value="participantes/editar/<?= $row["cod_par"]?>">Editar</button></td>
</tr>
<?php        
        
    }

?>
<tr>
<td colspan="10">&nbsp;</td>
</tr>
</table>

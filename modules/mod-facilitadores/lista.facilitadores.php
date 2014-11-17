<?php

		$app["subtitle"] = "Lista de Facilitadores" ;

?>
<table class="list" cellpadding="1" cellspacing="1" width="100%">
<tr>
<th>C&eacute;dula</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Sexo</th>
<th>Acci&oacute;n</th>
</tr>
<?php 
    
    $lnk = connect();
   
	$sql = "SELECT * FROM `facilitadores` ORDER BY `cod_fac`";
   
    $cta = mysql_query($sql,$lnk);
    
    while($row = mysql_fetch_array($cta)){

		
    
?>
<tr>
<td align="center"><?= $row["cedula"]; ?></td>
<td align="center"><?= $row["nombre"]; ?></td>
<td align="center"><?= $row["apellido"]; ?></td>
<td align="center"><?= $row["sexo"]; ?></td>
<td align="center"><button type="button" class="bb action" value="facilitadores/editar/<?= $row["cod_fac"]?>">Editar</button></td>
</tr>
<?php        
        
    }

?>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
</table>


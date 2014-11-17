
<?php

		$app["subtitle"] = "Lista de usuarios" ;

?>
<table class="list" cellpadding="1" cellspacing="1" width="100%">
<tr>
<th>Usuario</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Email</th>
<th>Acci&oacute;n</th>
</tr>
<?php 
    
    $lnk = connect();
   
	$sql = "SELECT * FROM `usuarios` ORDER BY `cod_usu`";
   
    $cta = mysql_query($sql,$lnk);
    
    while($row = mysql_fetch_array($cta)){

		
    
?>
<tr>
<td align="center"><?= $row["usuario"]; ?></td>
<td align="center"><?= $row["nombre"]; ?></td>
<td align="center"><?= $row["apellido"]; ?></td>
<td align="center"><?= $row["email"]; ?></td>
<td align="center"><button type="button" class="bb action" value="usuarios/editar/<?= $row["cod_usu"]?>">Editar</button></td>
</tr>
<?php        
        
    }

?>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
</table>


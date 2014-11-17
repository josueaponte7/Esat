<?php

		$app["subtitle"] = "Inscribir Asignaturas" ;

		$par = info_student($url[2],'cedula');

?>
<h3>Participante</h3>
<table class="frm" cellpadding="0" cellspacing="0">
	<tr>
		<td class="title">C&eacute;dula</td>
		<td class=""><input type="text" name="nombre" value="<?php echo $par["cedula"]; ?>" /></td>
		<td class="title">&nbsp;</td>
		<td class="">&nbsp;</td>
	</tr>
	<tr>
		<td class="title">Nombre</td>
		<td class=""><input type="text" name="nombre" value="<?php echo $par["nombre"]; ?>" /></td>
		<td class="title">Apellido</td>
		<td class=""><input type="text" name="apellido" value="<?php echo $par["apellido"]; ?>" /></td>
	</tr>
</table>
<h3>Asignaturas Ofertadas</h3>
<form method="post" id="asignaturas-ofertadas">
<table class="list" style="width:100%;">
	<tr>
	<th><input type="checkbox" /></th>
	<th>Cuatrimestre</th>
	<th>Asignatura</th>
	<th>C&oacute;digo</th>
	<th>Condici&oacute;n</th>
	<th>UC</th>
	</tr>
	<?php
	
		$cnn = connect();
		$sql = "SELECT * FROM `asignaturas` WHERE `cuatrimestre` = 1 ";
		$qry = mysql_query($sql,$cnn);
		
		while($row = mysql_fetch_array($qry)):
	
	?>
	<tr><td align="center"><input type="checkbox" value="<?php echo $row["cod_asi"]?>" /></td><td align="center"><?php echo $row["cuatrimestre"]?></td><td><?php echo $row["nombre"]?></td><td align="center"><?php echo $row["codigo"]?></td><td align="center">Obligatoria</td><td align="center"><?php echo $row["uc"]?></td></tr>
	<?php
	
		endwhile;
	
	?>
</table>
<br />
<button type="submit" class="bb">Inscribir Seleccionadas</button>
</form>

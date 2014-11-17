
<?php

		$app["subtitle"] = "Editar Usuario" ;
		$lnk = connect();
		$uid = $url[2];
?>
<script language="javascript">
$(function(){
	
 	    
 	$("#registrar-usuario").submit(function(){
		
		var error = false;
		var msg =  "";
		
		var nombre = $("input[name=nombre]").val();
		var apellido = $("input[name=apellido]").val();
		var contrasena 	= $("input[name=contrasena]").val();
		var nivel 	= $("select[name=nivel]").val();
		var usuario = $("input[name=usuario]").val();
		var email = $("input[name=email]").val();
		
		
		if( nombre.length < 2 ){
			
			error = true;
			msg += '<li>El campo <b>Nombre</b> debe poseer al menos dos caracteres.</li>';
			
		}else{
		
			if(!isNaN(nombre)){
			
				error = true;
				msg += '<li>El campo <b>Nombre</b> solo acepta letras.</li>';
			
			}
			
		}
		
		if( apellido.length < 2 ){
			
			error = true;
			msg += '<li>El campo <b>Apellido</b> debe poseer al menos dos caracteres.</li>';
			
		}else{
		
			if(!isNaN(apellido)){
			
				error = true;
				msg += '<li>El campo <b>Nombre</b> solo acepta letras.</li>';
			
			}
			
		}
		
		
		// Validar Contrasena
		if( contrasena != "" ){
			
			if( contrasena.length < 8 ){
			
				error = true;
				msg += '<li>El campo <b>Contrase&ntilde;a</b> debe poseer al menos 8 caracteres.</li>';
				
			}
			
		}
			
		
		
		// Validar el campo sexo
		if( nivel == 0 ){
		
			error = true;
			msg += '<li>Debe elegir una opci&oacute;n en el campo <b>Nivel</b></li>';
			
		}
		
		// Validar email
		if( email.length < 12 ){
			
			error = true;
			msg += '<li>El campo <b>Email</b> debe poseer 12 caracteres.</li>';
			
		}
		
		
		
		if( error != true ){
			
			return true;
			
		}else{
			
			$("#msg").html('<div class="error"><ul>'+msg+'</ul></div>').show('slow');
		
			return false;
			
		}
		
		
		
		
		
			
	});
 	    
});
</script>
<h4>Datos del Usuario</h4>
<form method="post" id="registrar-usuario">
<div id="msg"></div>
<?php
	
	if(isset($_POST["guardar"])):
    
         
        $nombre = $_POST["nombre"];
		$apellido 	= $_POST["apellido"];
		$usuario = $_POST["usuario"];
		$nivel = $_POST["nivel"];
		$email = $_POST["email"];
		$estatus = $_POST["estatus"];
		$contrasena = md5($_POST["contrasena"]);
		
		
		if($_POST["contrasena"] != ""):
		// Cuando se actualizar incluyendo a la contrasena
			$sql = "UPDATE `usuarios` 
					SET `usuario` = '$usuario',
					`nombre` = '$nombre',
					`apellido` = '$apellido',
					`email` = '$email',
					`nivel` = '$nivel',
					`estatus` = '$estatus',
					`contrasena` = '$contrasena' WHERE `cod_usu` = '$uid'";
		else:
		
			$sql = "UPDATE `usuarios` 
					SET `usuario` = '$usuario',
					`nombre` = '$nombre',
					`apellido` = '$apellido',
					`email` = '$email',
					`nivel` = '$nivel',
					`estatus` = '$estatus' WHERE `cod_usu` = '$uid'";
					
		endif;
        
        if(mysql_query($sql,$lnk)):

            message::success("Se ha actualizado al usuario correctamente.");

        else:

            message::error("Ha ocurrido un error al actualizar al usuario.");

        endif;

    endif;
	
	$sql = "SELECT * FROM `usuarios` WHERE `cod_usu` = '$uid'";
    $qry = mysql_query($sql,$lnk);
    $row = mysql_fetch_array($qry);

?>
<table class="frm" cellpadding="0" cellspacing="0">
<tr>
<td class="title">Usuario</td>
<td><input type="text" name="usuario" placeholder="Ej. pedroperez12" autocomplete="off" value="<?=$row["usuario"]?>" /></td>
<td class="title">Contrase&ntilde;a</td>
<td><input type="password" name="contrasena" autocomplete="off"  /></td>
</tr>
<tr>
<td class="title" style="width:20%">Nombre</td>
<td><input type="text" name="nombre" placeholder="Ej. Pedro" autocomplete="off" value="<?=$row["nombre"]?>" /></td>
<td class="title">Apellido</td>
<td><input type="text" name="apellido"  placeholder="Ej. Perez" autocomplete="off" value="<?=$row["apellido"]?>" /></td>
</tr>
<tr>
 <td class="title">Email</td>
 <td><input type="text" name="email" placeholder="Ej. pedroperz@gmail.com" autocomplete="off" value="<?=$row["email"]?>" /></td>
 <td class="title">Nivel</td>
 <td>
 <select name="nivel">
 <option value="0">Seleccione:</option>
 <? if($row["nivel"]=='administrador'): ?>
 <option value="administrador" <? if($row["nivel"] == 'administrador') echo 'selected'; ?>>Administrador</option>
 <? endif; ?>
 <? if($row["nivel"]!='administrador'): ?>
 <option value="analistace" <? if($row["nivel"] == 'analistace') echo 'selected'; ?>>Analista Control de Estudio</option>
 <option value="analistacd" <? if($row["nivel"] == 'analistacd') echo 'selected'; ?>>Analista Coordinaci&oacute;n de Doctorado</option>
 <? endif; ?>
 </select>
 </td>
</tr>
<tr>
<td class="title">Estatus</td>
<td colspan="3">
<select name="estatus">
 <option value="0">Seleccione:</option>
 <option value="Activo" <? if($row["estatus"] == 'Activo') echo 'selected'; ?>>Activo</option>
 <option value="Inactivo" <? if($row["estatus"] == 'Inactivo') echo 'selected'; ?>>Inactivo</option>
 </select>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3"><button type="submit" class="bb" name="guardar">Actualizar</button></td></tr>
</table>
</form>

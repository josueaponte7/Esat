
<?php

		$app["subtitle"] = "Registrar Usuario" ;
		$lnk = connect();

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
		if( contrasena.length < 8 ){
			
			error = true;
			msg += '<li>El campo <b>Contrase&ntilde;</b> debe poseer al menos 8 caracteres.</li>';
			
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
		$contrasena = md5($_POST["contrasena"]);
		
				
        $sql = "INSERT INTO `usuarios` 
				SET `usuario` = '$usuario',
				`nombre` = '$nombre',
				`apellido` = '$apellido',
				`email` = '$email',
				`nivel` = '$nivel',
				`estatus` = 'Activo',
				`contrasena` = '$contrasena'";
        
        if(mysql_query($sql,$lnk)):

            message::success("Se ha registrado al usuario correctamente.");

        else:

            message::error("Ha ocurrido un error al registrar al usuario.");

        endif;

    endif;

?>
<table class="frm" cellpadding="0" cellspacing="0">
<tr>
<td class="title">Usuario</td>
<td><input type="text" name="usuario" placeholder="Ej. pedroperez12" autocomplete="off"  /></td>
<td class="title">Contrase&ntilde;a</td>
<td><input type="password" name="contrasena" autocomplete="off"  /></td>
</tr>
<tr>
<td class="title" style="width:20%">Nombre</td>
<td><input type="text" name="nombre" placeholder="Ej. Pedro" autocomplete="off"  /></td>
<td class="title">Apellido</td>
<td><input type="text" name="apellido"  placeholder="Ej. Perez" autocomplete="off"/></td>
</tr>
<tr>
 <td class="title">Email</td>
 <td><input type="text" name="email" placeholder="Ej. pedroperz@gmail.com" autocomplete="off" /></td>
 <td class="title">Nivel</td>
 <td>
 <select name="nivel">
 <option value="0">Seleccione:</option>
 <option value="analistace">Analista Control de Estudio</option>
 <option value="analistacd">Analista Coordinaci&oacute;n de Doctorado</option>
 </select>
 </td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3"><button type="reset" class="bb" >Cancelar</button>&nbsp;<button type="submit" class="bb" name="guardar">Registrar</button></td></tr>
</table>
</form>

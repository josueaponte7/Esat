<?php

		$app["subtitle"] = "Registrar Facilitador" ;
		$lnk = connect();

?>
<script language="javascript">
$(function(){
	
 	    
 	$("#registrar-facilitador").submit(function(){
		
		var error = false;
		var msg =  "";
		
		var nombre = $("input[name=nombre]").val();
		var apellido = $("input[name=apellido]").val();
		var cedula 	= $("input[name=cedula]").val();
		var sexo 	= $("select[name=sexo]").val();
		var direccion = $("input[name=direccion]").val();
		var email = $("input[name=email]").val();
		var telefono = $("input[name=telefono]").val();
		
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
		
		// Validar UC
		if( isNaN(cedula) ){
			
				error = true;
				msg	+= '<li>El campo <b>C&eacute;dula</b> debe poseer s&oacute;lo n&uacute;meros.</li>';
				
		}else{
		
			if( cedula.length < 6 || cedula.length > 8 ){
			
				error = true;
				msg += '<li>El campo <b>C&eacute;dula</b> debe poseer entre 6  y 8 d&iacute;gitos.</li>';
			
			}
			
		}
		
		// Validar el campo sexo
		if( sexo == 0 ){
		
			error = true;
			msg += '<li>Debe elegir una opci&oacute;n en el campo <b>Sexo</b></li>';
			
		}
		
		// Validar telefono
		if( telefono.length < 11 ){
			
			error = true;
			msg += '<li>El campo <b>Tel&eacute;fono</b> debe poseer 11 d&iacute;gitos.</li>';
			
		}
		
		// Validar telefono
		if( direccion.length < 18 ){
			
			error = true;
			msg += '<li>El campo <b>Direcci&oacute;n</b> debe poseer al menos 18 caracteres.</li>';
			
		}
		
		if( error != true ){
			
			return true;
			
		}else{
			
			$("#msg").html('<div class="error"><ul>'+msg+'</ul></div>').show('slow');
		
			return false;
			
		}
		
		console.log("Sexo " + sexo);
		
		
		
			
	});
 	    
});
</script>
<h4>Datos del Facilitador</h4>
<form method="post" id="registrar-facilitador">
<div id="msg"></div>
<?php
	
	if(isset($_POST["guardar"])):
    
         
        $nombre = $_POST["nombre"];
		$apellido 	= $_POST["apellido"];
		$cedula = $_POST["cedula"];
		$sexo = $_POST["sexo"];
		$email = $_POST["email"];
		$telefono = $_POST["telefono"];
		$direccion = $_POST["direccion"];
				
        $sql = "INSERT INTO `facilitadores` 
				SET `nombre` = '$nombre',
				`apellido` = '$apellido',
				`sexo` = '$sexo',
				`cedula` = '$cedula'";
        
        if(mysql_query($sql,$lnk)):

            message::success("Se ha registrado al facilitador correctamente.");

        else:

            message::error("Ha ocurrido un error al registrar al facilitador.");

        endif;

    endif;

?>
<table class="frm" cellpadding="0" cellspacing="0">
<tr>
<td class="title" style="width:20%">Nombre</td>
<td><input type="text" name="nombre" placeholder="Ej. Pedro" autocomplete="off"  /></td>
<td class="title">Apellido</td>
<td><input type="text" name="apellido"  placeholder="Ej. Perez" autocomplete="off"/></td>
</tr>
<tr>
<td class="title">C&eacute;dula</td>
<td><input type="text" name="cedula" placeholder="Ej. 12345678" autocomplete="off" /></td>
<td class="title">Sexo</td>
<td>
<select name="sexo">
	<option value="0">Seleccione:</option>
	<option value="Masculino">Masculino</option>
	<option value="Femenino">Femenino</option>
</select>
</td>
</tr>
<tr>
 <td class="title">Email</td>
 <td><input type="text" name="email" placeholder="Ej. pedroperz@gmail.com" autocomplete="off" /></td>
 <td class="title">Tel&eacute;fono</td>
 <td><input type="text" name="telefono" placeholder="Ej. 041412345678" autocomplete="off" /></td>
</tr>
<tr>
 <td class="title">Direcci&oacute;n</td>
 <td colspan="3"><input type="text" name="direccion" style="width:80%;" placeholder="Ej. Av. Principal, Casa 1, Sector A, Maracay, Edo. Aragua" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td colspan="3"><button type="reset" class="bb" >Cancelar</button>&nbsp;<button type="submit" class="bb" name="guardar">Registrar</button></td></tr>
</table>
</form>

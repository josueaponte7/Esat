<?php

		$app["subtitle"] = "Registro de Participantes" ;

?>
<script>
$(function(){
	
 	$(".fecha").datepick();
 	    
 	$("#registrar-participante").submit(function(){
		
		var error = false;
		var msg =  "";
		
		var nombre = $("input[name=nombre]").val();
		var apellido = $("input[name=apellido]").val();
		var cedula = $("input[name=cedula]").val();
		var pasaporte = $("input[name=pasaporte]").val();
		var direccion = $("input[name=direccion]").val();
		var email = $("input[name=email]").val();
		var telefono = $("input[name=telefono]").val();
		var fecha = $("input[name=fecha_nacimiento]").val();
		var lugar = $("input[name=lugar_nacimiento]").val();
		
		if( nombre.length < 2 || apellido.length < 2){
			
			error = true;
			msg += '<li>Los campos <b>Nombre</b> y <b>Apellido</b> deben poseer al menos dos caracteres.</li>';
			
		}else{
			
			if( !isNaN(nombre) || !isNaN(apellido) ){
				
				error = true;
				msg += '<li>Los campos <b>Nombre</b> y <b>Apellido</b> deben poseer s&oacute;lo letras.</li>';
				
			}
		
		
		} 
		
		
		// Validar Cedula
		if( isNaN(cedula) ){
			
				error = true;
				msg	+= '<li>El campo <b>C&eacute;dula</b> debe poseer s&oacute;lo n&uacute;meros.</li>';
				
		}else{
		
			if( cedula.length < 6 ){
			
				error = true;
				msg += '<li>El campo <b>C&eacute;dula</b> debe poseer al menos 6 d&iacute;gitos.</li>';
			
			}
			
		}
		
		// Validar fecha de nacimiento
		if( fecha == "" ){
			
			error = true;
			msg += '<li>El campo <b>Fecha de Nacimiento</b> no puede estar vac&iacute;o.</li>';
			
		}
		// Validar lugar de nacimiento
		if( lugar == "" ){
			
			error = true;
			msg += '<li>El campo <b>Lugar de Nacimiento</b> no puede estar vac&iacute;o.</li>';
			
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
			
		

		//$.fancybox("Hola");
		
		if( error != true ){
			
			return true;
			
		}else{
			
			$("#msg").html('<div class="error"><ul>'+msg+'</ul></div>').show('slow');
		
			return false;
			
		}
		
		
		
			
	});
 	    
});
</script>
<h4>Datos de Personales</h4>
<?php

	$lnk = connect();

	$pid = $url[2];

    if(isset($_POST["guardar"])):
    
         
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $cedula = $_POST["cedula"];
        $pasaporte = $_POST["pasaporte"];
        $condicion = $_POST["condicion"];
        $sexo = $_POST["sexo"];
        $email = $_POST["email"];
        $edo_civil = $_POST["edo_civil"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $lugar_nac = $_POST["lugar_nacimiento"];
        $fecha_nac = _convert_date($_POST["fecha_nacimiento"],'en_US');
        //$activo = $_POST["activo"];
		
        $sql = "UPDATE `participantes` 
				SET `nombre` = '$nombre',
				`apellido` = '$apellido',
				`cedula` = '$cedula',
				`pasaporte` = '$pasaporte',
				`sexo` = '$sexo',
				`email` = '$email',
				`estado_civil` = '$edo_civil',
				`lugar_nacimiento` = '$lugar_nac',
				`fecha_nacimiento` = '$fecha_nac',
				`direccion` = '$direccion',
				`telefono` = '$telefono',
				`estatus` = 'Activo' WHERE `cod_par` = '$pid'";
        
        if(mysql_query($sql,$lnk)):

            message::success("Se han actualizado los datos del participante.");

        else:

            message::error("Ha ocurrido un error al actualizar los datos del participante. Error: ".mysql_error()."");

        endif;

    endif;
    
    
    $sql = "SELECT * FROM `participantes` WHERE `cod_par` = '$pid'";
    $qry = mysql_query($sql,$lnk);
    $row = mysql_fetch_array($qry);

?>
<form method="post" id="registrar-participante">
<div id="msg"></div>
<table class="frm" cellpadding="0" cellspacing="0">
<tr>
<td width="15%" class="title">Nombre</td>
<td><input type="text" name="nombre" placeholder="Ej. Pedro" value="<?=$row["nombre"]?>" /></td>
<td width="15%" class="title">Apellido</td>
<td><input type="text" name="apellido" placeholder="Ej. P&eacute;rez" value="<?=$row["apellido"]?>" /></td>
</tr>
<tr>
<td width="15%" class="title">C&eacute;dula de Identidad</td>
<td><input type="text" name="cedula" placeholder="Ej. 12345678" value="<?=$row["cedula"]?>" /></td>
<td width="15%" class="title">Pasaporte No.</td>
<td><input type="text" name="pasaporte" placeholder="Ej. 12345678" value="<?=$row["pasaporte"]?>" /></td>
</tr>
<tr>
<td width="15%" class="title">Fecha de Nacimiento</td>
<td><input type="text" name="fecha_nacimiento" placeholder="Ej. 01/01/1969" class="fecha" readonly value="<?=_convert_date($row["fecha_nacimiento"])?>" /></td>
<td width="15%" class="title">Lugar de Nacimiento</td>
<td><input type="text" name="lugar_nacimiento" placeholder="Ej. Maracay, Edo Aragua" value="<?=$row["lugar_nacimiento"]?>" /></td>
</tr>
<tr>
<td class="title">Sexo</td>
<td>
<input type="radio" name="sexo" id="sexo_masculino" value="Masculino" <? if($row["sexo"] == 'Masculino') echo 'checked'; ?> /><label for="sexo_masculino">Masculino</label>
<input type="radio" name="sexo" id="sexo_femenino" value="Femenino" <? if($row["sexo"] == 'Femenino') echo 'checked'; ?> /><label for="sexo_femenino">Femenino</label>
</td>
<td class="title">Edo. Civil</td>
<td>
<label><input type="radio" name="edo_civil"  value="Soltero" <? if($row["estado_civil"] == 'Soltero') echo 'checked'; ?>  />Soltero</label>
<label><input type="radio" name="edo_civil"  value="Casado" <? if($row["estado_civil"] == 'Casado') echo 'checked'; ?> />Casado</label>
<label><input type="radio" name="edo_civil"  value="Divorciado" <? if($row["estado_civil"] == 'Divorciado') echo 'checked'; ?> />Divorciado</label>
<label><input type="radio" name="edo_civil"  value="Viudo" <? if($row["estado_civil"] == 'Viudo') echo 'checked'; ?> />Viudo</label>
</td>
<tr>
<td class="title">Tel&eacute;fono</td>
<td><input type="text" name="telefono" placeholder="Ej. 041412345678" maxlength="11" value="<?=$row["telefono"]?>" /></td>
<td class="title">Email</td>
<td><input type="text" name="email" placeholder="Ej. pedroperez@gmail.com" value="<?=$row["email"]?>" /></td>
</tr>
</tr>
<tr>
<td class="title">Direcci&oacute;n</td>
<td colspan="3"><input type="text" name="direccion" style="width:74%" placeholder="Ej. Av. Principal, Casa 1, Sector A, Maracay, Edo. Aragua" value="<?=$row["direccion"]?>" /></td>
</tr>
<tr>
<td class="title">Condici&oacute;n</td>
<td>
	<label><input type="radio" name="condicion" value="Regular" <? if($row["condicion"] == 'Regular') echo 'checked'; ?> />Regular</label><label><input type="radio" name="condicion" value="Libre" <? if($row["condicion"] == 'Libre') echo 'checked'; ?> />Libre</label></td><td></td><td></td>
</tr>
<tr><td>&nbsp;</td><td><button type="submit" class="bb" name="guardar">Actualizar</button></td></tr>
</table>
</form>


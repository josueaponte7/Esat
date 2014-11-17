<?php

		$app["subtitle"] = "Registro de Participantes" ;

?>
<script>
$(function(){
	
 	$(".fecha").datepick();
 	    
 	// Verificar si el participante ya esta registrado
 	$("button[name=buscar]").click(function(){
	
			if( $("input[name=cedula]").val().length  > 5){
			
				$.getJSON("remote/verificar-participante.php",{
					
						ced: $("input[name=cedula]").val()
			
					
					},function(data){
					
						if(data.existe == true){
						
							//$("#ced-rsp").html('<img src="images/cross-circle.png" />');
							//alert("Participante registrado");
							$("#mencion").attr("disabled", true);

						
						}else{
							
							
							$("#mencion").attr("disabled", false);
							
							//$("#ced-rsp").html('<img src="images/tick-circle.png" />');
							//alert('El numero de cedula ingresado no esta registrado en la base de datos');
							
							
						}
					
				});	
				
			}else{
			
			
					//$("#ced-rsp").html('');
				
			}
		
	});    
 	    
 	// Mencion
 	
 	$("button[name=cargar-ofertas]").click(function(){
		
		$("#asignaturas-table tbody").html('');
		
		$.getJSON("remote/asignaturas-mencion.php",{men:$("#mencion").val()},function(data){
		
			if(data.codigo.length > 0){
			
		
				$.each(data.codigo,function(i){
							
					var html = '<tr><td style="text-align:center"><input type="checkbox" /></td><td align="center">'+data.cuatrimestre[i]+'</td><td>'+data.codigo[i]+'</td><td>'+data.nombre[i]+'</td><td style="text-align:center">'+data.uc[i]+'</td></tr>';
							
					$("#asignaturas-table").append(html);
								
				});
				
			}
				
			
		});
		
	});
 	    
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
/*
	echo '<textarea rows="8">';
	print_r(ofertas(12345679));
	echo '</textarea>';
*/

	$lnk = connect();

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
		
        $sql = "INSERT INTO `participantes` 
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
				`condicion` = '$condicion',
				`estatus` = 'Activo'";
        
        if(mysql_query($sql,$lnk)):

            message::success("Se han registrado los datos del participante.");

        else:

            message::error("Ha ocurrido un error al registrar al participante.");

        endif;

    endif;

?>
<form method="post" id="registrar-participante">
<div id="msg"></div>
<table class="frm" cellpadding="0" cellspacing="0">
<tr>
<td width="15%" class="title">C&eacute;dula de Identidad</td>
<td><input type="text" name="cedula" placeholder="Ej. 12345678"  maxlength="8" />
<button type="button" name="buscar" class="bb">Buscar</button>
<!--<span id="ced-rsp"></span>-->
</td>
<td width="15%" class="title">Pasaporte No.</td>
<td><input type="text" name="pasaporte" placeholder="Ej. 12345678" />
</td>
</tr>
<tr>
<td width="15%" class="title">Nombre</td>
<td><input type="text" name="nombre" placeholder="Ej. Pedro" autocomplete="off"/></td>
<td width="15%" class="title">Apellido</td>
<td><input type="text" name="apellido" placeholder="Ej. P&eacute;rez" /></td>
</tr>
<tr>
<td width="15%" class="title">Fecha de Nacimiento</td>
<td><input type="text" name="fecha_nacimiento" placeholder="Ej. 01/01/1969" class="fecha" readonly /></td>
<td width="15%" class="title">Lugar de Nacimiento</td>
<td><input type="text" name="lugar_nacimiento" placeholder="Ej. Maracay, Edo Aragua" /></td>
</tr>
<tr>
<td class="title">Sexo</td>
<td>
<input type="radio" name="sexo" id="sexo_masculino" value="Masculino" checked /><label for="sexo_masculino">Masculino</label>
<input type="radio" name="sexo" id="sexo_femenino" value="Femenino" /><label for="sexo_femenino">Femenino</label>
</td>
<td class="title">Edo. Civil</td>
<td>
<label><input type="radio" name="edo_civil"  value="Soltero" checked />Soltero</label>
<label><input type="radio" name="edo_civil"  value="Casado" />Casado</label>
<label><input type="radio" name="edo_civil"  value="Divorciado" />Divorciado</label>
<label><input type="radio" name="edo_civil"  value="Viudo" />Viudo</label>
</td>
<tr>
<td class="title">Tel&eacute;fono</td>
<td><input type="text" name="telefono" placeholder="Ej. 041412345678" maxlength="11" /></td>
<td class="title">Email</td>
<td><input type="text" name="email" placeholder="Ej. pedroperez@gmail.com" /></td>
</tr>
</tr>
<tr>
<td class="title">Direcci&oacute;n</td>
<td colspan="3"><input type="text" name="direccion" style="width:74%" placeholder="Ej. Av. Principal, Casa 1, Sector A, Maracay, Edo. Aragua" /></td>
</tr>
<tr>
<td class="title">Condici&oacute;n</td>
<td>
	<label><input type="radio" name="condicion" value="Regular" />Regular</label>
	<label><input type="radio" name="condicion" value="Libre"  />Libre</label></td>
<td class="title">Especialidad/Menci&oacute;n</td>
<td>
	<select name="mencion" id="mencion" disabled>
	<option value="0">Seleccione:</option>
	<?php 
	
		$sql = "SELECT * FROM `menciones`";
		$qry = mysql_query($sql,$lnk);
		
		while( $row = mysql_fetch_array($qry)):
	
	?>
	<option value="<?php echo $row["cod_men"]; ?>"><?php echo $row["nombre"]; ?></option>
	<?php 
		endwhile;  
	?>
	</select>
</td>
</tr>
</table>
<h4>Asignaturas Disponibles</h4>
<button type="button" class="bb" name="cargar-ofertas">Ver Ofertas</button>
<div class="warning">Seleccione las asignaturas que desea inscribir</div>
<table class="frm" cellpadding="0" cellspacing="0" id="asignaturas-table">
<thead>
<tr>
<th style="text-align:center"><input type="checkbox" name="todos" id="todos" /></th>
<th>Cuatrimestre</th>
<th>C&oacute;digo</th>
<th>Asignatura</th>
<th>NUC</th>
</tr>
</thead>
<tbody>
</tbody>
<tfoot>
<tr>
<td>&nbsp;</td>
<td><button type="reset" class="bb" >Cancelar</button>&nbsp;<button type="submit" class="bb" name="guardar">Registrar</button></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</tfoot>
</table>
</form>


<?php

		$app["subtitle"] = "Registrar Asignaturas" ;
		$lnk = connect();

?>
<script>
$(function(){
	
 	    
 	$("#registrar-asignatura").submit(function(){
		
		var error = false;
		var msg =  "";
		
		var nombre = $("input[name=nombre]").val();
		var codigo = $("input[name=codigo]").val();
		var uc 		= $("input[name=uc]").val();
		var mencion = $("select[name=mencion]").val();
		
		
		if( nombre.length < 2 ){
			
			error = true;
			msg += '<li>El campo <b>Nombre</b> debe poseer al menos dos caracteres.</li>';
			
		}
		
		if( codigo.length < 2 ){
			
			error = true;
			msg += '<li>El campo <b>C&oacute;digo</b> debe poseer al menos dos caracteres.</li>';
			
		}
		
		// Validar UC
		if( isNaN(uc) ){
			
				error = true;
				msg	+= '<li>El campo <b>UC</b> debe poseer s&oacute;lo n&uacute;meros.</li>';
				
		}else{
		
			if( uc.length < 1 ){
			
				error = true;
				msg += '<li>El campo <b>UC</b> debe poseer al menos 1 d&iacute;gitos.</li>';
			
			}
			
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
<h4>Datos de la Asignatura</h4>
<form method="post" id="registrar-asignatura">
<div id="msg"></div>
<?php
	
	if(isset($_POST["guardar"])):
    
         
        $nombre = $_POST["nombre"];
		$uc 	= $_POST["uc"];
		$mencion = $_POST["mencion"];
		$codigo = $_POST["codigo"];
		
        $sql = "INSERT INTO `asignaturas` 
				SET `nombre` = '$nombre',
				`cod_men` = '$mencion',
				`uc` = '$uc',
				`codigo` = '$codigo'";
        
        if(mysql_query($sql,$lnk)):

            message::success("Se ha registrado la nueva asignatura correctamente.");

        else:

            message::error("Ha ocurrido un error al registrar la asignatura.");

        endif;

    endif;

?>
<table class="frm" cellpadding="0" cellspacing="0">
<tr>
<td class="title" style="width:20%">Nombre</td>
<td><input type="text" name="nombre"  /></td>
</tr>
<tr>
<td class="title">Especialidad / Menci&oacute;n</td>
<td>
<select name="mencion">
<?php 
	
	
	
	$sqlMen = "SELECT * FROM `menciones` ORDER BY  `nombre`";
	
	$qryMen = mysql_query($sqlMen, $lnk);
	
	while( $rowMen = mysql_fetch_array($qryMen) ):
?>
	<option value="<?=$rowMen["cod_men"]?>"><?=$rowMen["nombre"]?></option>
<?php 
	endwhile;
?>
</select>
</td>
</tr>
<tr><td class="title">C&oacute;digo</td><td><input type="text" name="codigo" /></td></tr>
<tr><td class="title">UC</td><td><input type="text" name="uc" /></td></tr>
<tr><td>&nbsp;</td><td><button type="submit" class="bb" name="guardar">Registrar</button></td></tr>
</table>
</form>

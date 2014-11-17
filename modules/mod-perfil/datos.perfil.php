<?php

    $uid = $_SESSION["admin.id"];
    $cnn = connect();
    if(isset($_POST["guardar"])):

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        //$sexo = $_POST["sexo"];
        //$estatus = $_POST["estatus"];
        $nivel = $_POST["nivel"];

        $sql = "UPDATE usuarios SET  email='$email',nombre = '$nombre', apellido = '$apellido' WHERE `cod_usu` = '$uid' ";

        if(mysql_query($sql,$cnn)):
            message::success('Se han actualizado los datos del usuario correctamente');

        else:
            message::error('Ha ocurrido un error al actualizar los datos del  usuario, por favor intente nuevamente<br />Error: '.mysql_error().'','error');

        endif;

    endif;

    $prs = _SQL("SELECT * FROM usuarios WHERE cod_usu = '$uid' ");
    $niveles = array("administrador"=>"Administrador","analistace"=>"Analista de Control de Estudio", "analistacd"=>"Analista Coordinaci&oacute;n de Doctorado");

?>
<form method="post" id="reg-usr">
<h3>Editar Usuario</h3>
<table class="frm" cellpadding="1" cellspacing="0">
<tr>
<td width="10%" class="title">Usuario</td>
<td><input type="text" name="usuario" value="<?= $prs[0]["usuario"]; ?>" readonly="readonly" style="width: 25%;"  /></td>
</tr>
<tr>
<td class="title">Nombre</td>
<td><input type="text" name="nombre" value="<?= $prs[0]["nombre"]; ?>"  style="width: 25%;" /></td>
</tr>
<tr>
<td class="title">Apellido</td>
<td><input type="text" name="apellido" value="<?= $prs[0]["apellido"]; ?>"  style="width: 25%;" /></td>
</tr>
<tr>
<td class="title">Email</td>
<td><input type="text" name="email" value="<?= $prs[0]["email"]; ?>"  style="width: 25%;" /></td>
</tr>
<!--<tr>
<td class="title">Sexo</td>
<td>
<label><input type="radio" name="sexo" value="Femenino" <?if($prs[0]["sexo"]=='Femenino'){ echo 'checked="checked"';}?> />Femenino</label>
<label><input type="radio" name="sexo" value="Masculino" <?if($prs[0]["sexo"]=='Masculino'){ echo 'checked="checked"';}?> />Masculino</label>
</td>
</tr>-->
<tr>
<td class="title">Nivel</td>
<td><?php echo $niveles[$_SESSION["nivel"]]?></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><button type="submit" class="bb" name="guardar">Guardar</button></td>
</tr>
</table>
</form>

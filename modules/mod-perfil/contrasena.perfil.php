<?php

    $uid = $_SESSION["admin.id"];
    $cnn = connect();
    $prs = _SQL("SELECT * FROM usuarios WHERE cod_usu = '$uid' ");

    $mes_actual = date("m");
    $ano_actual = date("Y");
    $dia_actual = date("d");

    if($mes_actual > 8){
      $ano_nuevo = $ano_actual + 1;
      $mes_nuevo = 4 - (12 - $mes_actual);
    }else{
      $ano_nuevo = $ano_actual;
      $mes_nuevo = $mes_actual + 4;
    }

    if($mes_nuevo < 10){
      $mes_nuevo = '0'.$mes_nuevo;
    }
    if($dia_actual < 10){
      $dia_actual = '0'.$dia_actual;
    }

    $cambio = $ano_nuevo."-".$mes_nuevo."-".$dia_actual;

    if(isset($_POST["guardar"])):

        $nueva = md5($_POST["nueva"]);

        $repita = md5($_POST["repita"]);

        $sql = "UPDATE usuarios SET  contrasena = '$nueva' WHERE cod_usu = '$uid' ";

        if(mysql_query($sql,$cnn)):

            $_SESSION["admin.cambiar_contrasena"] = false;
            message::success('Se han actualizado los datos del usuario correctamente');

        else:

            message::error('Ha ocurrido un error al actualizar los datos del  usuario, por favor intente nuevamente.<br />Error: '.mysql_error().'','error');

        endif;

    endif;



?>
<form method="post" id="cmb-pwd">
<h3>Cambio de Contrase&ntilde;a</h3>
<?
     if($_SESSION["admin.cambiar_contrasena"] == true):
        message::warning("Su contrase&ntilde;a ha caducado, por favor cambiela para poder realizar operaciones en el sistema.");
    endif;
?>
<table class="frm" cellpadding="1" cellspacing="0">
<tr>
<td width="22%" class="title">Contrase&ntilde;a Actual</td>
<td><input type="password" name="actual" id="actual"  style="width: 25%;"  /></td>
</tr>
<tr>
<td class="title">Nueva Contrase&ntilde;a</td>
<td><input type="password" name="nueva" id="nueva"   style="width: 25%;" /></td>
</tr>
<tr>
<td class="title">Repita Contrase&ntilde;a</td>
<td><input type="password" name="repita" id="repita"   style="width: 25%;" /></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><button type="submit" class="bb" name="guardar">Guardar</button></td>
</tr>
</table>
<input type="hidden" id="actual-bd" value="<?=$prs[0]["contrasena"]?>" />
</form>

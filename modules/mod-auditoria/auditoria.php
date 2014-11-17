<?php
    if($_SESSION["nivel"]=='administrador'):
    $link = connect();
    $sql = "SELECT * FROM `auditoria`";
    $cta = mysql_query($sql,$link);
    $num = mysql_num_rows($cta);
    $rpp = 20;// Registros por pagina
    $tpg = ceil($num / $rpp);//Total de Paginas
    if(isset($_GET["pag"])){
        
        $pga = $_GET["pag"];
        
        if($pga > 0 ){
            
            $pgi = ($pga-1)*$rpp;

        }else{
            
            $pgi = 0;
            
        }
        
    }else{
        
        $pga = 1;
        
        $pgi = 0;
        
    }   
    
?>
<script>
$(function(){
 	    $(".fecha").datepick();
    });
</script>
<form method="post">
<fieldset>
<legend>Auditor&iacute;a</legend>
<table class="list" cellpadding="1" cellspacing="1" width="100%">
<tr>
<td colspan="4">&nbsp;</td>
<td align="center" colspan="3" width="20%">Desde&nbsp;<input type="text" name="desde" class="fecha" style="width:20%" value="<? if(isset($_POST["desde"])) echo $_POST["desde"]?>" />&nbsp;Hasta&nbsp;<input type="text" name="hasta" class="fecha" style="width:20%" value="<? if(isset($_POST["hasta"])) echo $_POST["hasta"]?>" /><button type="submit" name="filtrar" class="bb" value="fechas">Filtrar</button><?if(isset($_POST["filtrar"])) if($_POST["filtrar"]=='fechas'){ echo '<button type="button" class="action" value="reportes/informe-auditoria/0/'._convert_date($_POST["desde"],'en_US').'/'._convert_date($_POST["hasta"],'en_US').'">Exportar</button>';}?></td>
<td align="center" width="20%">
<select name="usuario">
<option value="0">Usuario:</option>
<?
    $cnn = connect();
    $sql = "SELECT DISTINCT `usuario` FROM `auditoria`";
    $qry = mysql_query($sql,$cnn);
    while($row = mysql_fetch_array($qry)){
      echo '<option value="'.$row["usuario"].'">'._info('usuarios','usuario',$row["usuario"]).'</option>';
    }

?>
</select><button type="submit" class="bb" name="filtrar" value="usuario">Filtrar</button>
</td>
</tr>
<tr>
<th>ID</th>
<th width="8%">Fecha</th>
<th>Hora</th>
<th>Archivo</th>
<th>Acci&oacute;n</th>
<th>Resultado</th>
<th width="20%">IP</th>
<th width="20%">Usuario</th>
</tr>
<?php 
    
    if(isset($_POST["criterio"])):
        $criterio = $_POST["criterio"];
    else:
        $criterio = NULL;
    endif;
    if(isset($_POST["filtrar"])){
        
        
        
        if($_POST["filtrar"]=='fechas'){

          $d = explode('/',$_POST["desde"]);
          $desde = $d[2].'-'.$d[1].'-'.$d[0];
          $h = explode('/',$_POST["hasta"]);
          $hasta = $h[2].'-'.$h[1].'-'.$h[0];

          if(!empty($desde) and !empty($hasta)){

            $sql = "SELECT * FROM `auditoria` WHERE `fecha` BETWEEN '$desde' AND '$hasta'";

          }

        }

        if($_POST["filtrar"]=='usuario'){

            $usuario = $_POST["usuario"];
            $usr = _uid($usuario);

            $sql = "SELECT * FROM `auditoria` WHERE `usuario` = '$usuario'";
        }

        
    }else{
        
        if(isset($_GET["pag"])){
            
            $sql = "SELECT * FROM `auditoria` ORDER BY `fecha` DESC LIMIT $pgi,$rpp";
       
       }else{
       
            $sql = "SELECT * FROM `auditoria` ORDER BY `fecha` DESC  LIMIT $rpp";
       }  
        
    }
    $cta = mysql_query($sql,$link);
    while($row = mysql_fetch_array($cta)){

    $row["accion"] = str_replace($criterio,'<span class="rb">'.$criterio.'</span>',$row["accion"]);
    $row["fecha"] = str_replace($criterio,'<span class="rb">'.$criterio.'</span>',$row["fecha"]);
    
?>
<tr>
<td align="center"><?= $row["id"]; ?></td>
<td align="center"><?= $row["fecha"]; ?></td>
<td align="center"><?= $row["hora"]; ?></td>
<td align="center"><?= $row["archivo"]; ?></td>
<td align="center"><?= $row["accion"]; ?></td>
<td align="center"><?= $row["resultado"]; ?></td>
<td align="center"><?= $row["ip"]; ?>&nbsp;<a href="http://ip-lookup.net/?ip=<?=$row["ip"]?>" target="_blank"><small>[Rastrear]</small></a></td>
<td align="center"><a href="?modulo=usuarios&&accion=editar&&id=<?= $row["usuario"]?>"><?= _info('usuarios','usuario',$row["usuario"]); ?></a></td>
</tr>
<?php        
        
    }

?>
<tr>
<td colspan="8">&nbsp;</td>
</tr>
</table>
</fieldset>
</form>
<?
    else:
        message::warning("Disculpe, usted no tiene los permisos necesarios para acceder a este recurso.");
    endif;

?>

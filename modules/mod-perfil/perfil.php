<div id="submenu" align="right">
<button class="action" value="perfil/datos">Mis Datos</button><button class="action" value="perfil/contrasena">Cambio de Contrase&ntilde;a</button>
</div>
<div class="clear">
<?php

    if(isset($url[1])):
    $action = $url[1];
      if(file_exists("modules/mod-$module/$action.$module.php")):

          require "modules/mod-$module/$action.$module.php";

      else:

          message::error("<h3>El archivo <code>".$action.".".$module.".php</code> al que intenta acceder no se encuentra en nuestros directorios</h3>");

      endif;
    else:
        $action = "datos";
        if(file_exists("modules/mod-$module/$action.$module.php")):

          require "modules/mod-$module/$action.$module.php";

        else:

          message::error("<h3>El archivo <code>".$action.".".$module.".php</code> al que intenta acceder no se encuentra en nuestros directorios</h3>");

        endif;
    endif;

?>
</div>

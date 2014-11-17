<?php
    
     if(isset($_GET["r"])) $url = $_GET["r"]; else $url = "";
     $url = explode("/",$url);
     $module = $url[0];

        
      if(isset($url[1])):

        $action = $url[1];

        if(file_exists("modules/mod-$module/$action.$module.php")):

            require "modules/mod-$module/$action.$module.php";

        else:

            message::error("<h3>El archivo <code>".$action.".".$module.".php</code> al que intenta acceder no se encuentra en nuestros directorios.</h3>");

        endif;
      else:
          $action = "form";
          $module = 'login';
          if(file_exists("modules/mod-$module/$action.$module.php")):

            require "modules/mod-$module/$action.$module.php";

          else:

            message::error("<h3>El archivo <code>".$action.".".$module.".php</code> al que intenta acceder no se encuentra en nuestros directorios.</h3>");

          endif;
     endif; 

?>
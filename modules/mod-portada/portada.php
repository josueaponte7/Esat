<div id="main">
<?php
	
	
		$module = isset($url[1]) ? $url[1] : 'portada';
		
		$action = isset($url[2]) ? $url[2] : $_SESSION["nivel"];
	
  
		if(file_exists("modules/mod-$module/$action.$module.php")):

			  require "modules/mod-$module/$action.$module.php";

		else:

			  message::error("<h3>El archivo <code>".$action.".".$module.".php</code> al que intenta acceder no se encuentra en nuestros directorios</h3>");

		endif;
    
  

?>
</div>



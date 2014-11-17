<div id="main">
<?
	

	//if(isset($_SESSION["admin"])):
	
		$url = $_GET["r"];
		
		$url = explode("/",$url);
		
		$module = $url[0];
		
		
		if(file_exists("modules/mod-$module/$module.php")):
		

			require "modules/mod-$module/$module.php";
			

		else:
		

			require "modules/mod-portada/portada.php";
			

		endif;
		
		
	//else:
	
		//message::error("Acceso denegado. Est&aacute; realizando una operaci&oacute;n indebida");
		
	//endif;
?>
</div>

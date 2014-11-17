<html>
<head>
<title><?=SG_TITLE?></title>
<base href="<?=SG_URL?>" />
<link href="<?=SG_TEMPLATE_URL?>general.css" rel="stylesheet"  type="text/css">
<link href="javascript/jquery.datepick.package-4.1.0/jquery.datepick.css" rel="stylesheet"  type="text/css" media="screen">
<link href="javascript/nivo-slider/themes/light/light.css" rel="stylesheet"  type="text/css" media="screen" />
<link href="javascript/nivo-slider/nivo-slider.css" rel="stylesheet"  type="text/css" media="screen" />
<script language="javascript" src="javascript/jquery-1.8.3.min.js" type="text/javascript"></script>
<script language="javascript" src="javascript/jquery.md5.js" type="text/javascript"></script>
<script language="javascript" src="javascript/jquery.datepick.package-4.1.0/jquery.datepick.js" type="text/javascript"></script>
<script language="javascript" src="javascript/jquery.datepick.package-4.1.0/jquery.datepick-es-PE.js" type="text/javascript"></script>
<script language="javascript" src="javascript/common.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">
    <div id="header">
		<div id="sg-logo"><img src="images/logo-oficial.png"  /></div>
	</div>
    <div id="bar" align="left"><a href="<?=SG_URL?>">Inicio</a>
	<?php
	
			if(isset($_SESSION["admin"])):
			
			$usr = info_user($_SESSION["admin.id"]);
	
	?>
    &nbsp;|&nbsp;Usuario:&nbsp;<a href="<?=SG_URL?>perfil"><?=$usr["nombre"].' '.$usr["apellido"]?></a>&nbsp;|&nbsp;<a>Nivel: <?php echo $_SESSION["nivel"]?></a>&nbsp;|&nbsp;<a href="logout" style="float:right;margin-right:10px" id="salir">Salir</a>
	<?php
	
			endif;
	
	?>
	<a href="#" style="float:right">&nbsp;|&nbsp;</a>
	<a href="manual-de-usuario.pdf" style="float:right;margin-right:10px">Manual de Usuario</a><a href="#" style="float:right">&nbsp;|&nbsp;</a>
	<a href="#" style="float:right;margin-right:10px">Ayuda</a>
    </div>
    <div id="subtitle"></div>
    <?php if($_SESSION["admin"]): ?>
    <div id="leftbar">
	<?php
	
			$nivel = $_SESSION["nivel"];
            
            require_once 'lib/inc/menu.'.strtolower($nivel).'.php';
            $content = (isset($_SESSION["nivel"])) ? 'content' : 'content-1';
	
	?>
	</div>
    <?php 
    
		endif; 
		
    ?>
    <div id="<?php echo $content?>">
    <?

        if(!isset($_SESSION["admin"])){
			
            if(login_fails() < 3 or non_banned() == true){
				
                require_once 'modules/mod-login/login.php';
                
            }else{
				
                message::error('Por motivos de seguridad hemos restringido el acceso a la aplicaci&oacute;n a esta IP: '.$_SERVER["REMOTE_ADDR"].'','error');
                
            }

        }else{
			
            
            
            require_once 'lib/inc/content.php';

        }


    ?>
    </div>
</div>
<input type="hidden" id="app-subtitle" value="<?=$app["subtitle"]?>" /> 
</body>
</html>

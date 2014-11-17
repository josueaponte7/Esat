<html>
<head>
<title><?php echo SG_TITLE?></title>
<base href="<?php echo SG_URL?>" />
<link href="<?php echo SG_TEMPLATE_URL?>general.css" rel="stylesheet"  type="text/css">
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
    
    <div id="bar" align="left"><a href="index.php">Inicio</a>
	<?php
	
			if(isset($_SESSION["admin"])):
			
			$usr = info_user($_SESSION["admin.id"]);
	
	?>
    &nbsp;|&nbsp;Usuario:&nbsp;
    <a href="<?php echo SG_URL?>perfil"><?php echo $usr["nombre"].' '.$usr["apellido"]?></a>&nbsp;|&nbsp;
    <a>Nivel: <?php echo $_SESSION["nivel"]?></a>&nbsp;|&nbsp;
    <a href="logout" style="float:right;margin-right:10px" id="salir">Salir</a>
	<?php
	
			endif;
	
	?>
	<a href="#" style="float:right">&nbsp;|&nbsp;</a>
	<a href="manual-de-usuario.pdf" style="float:right;margin-right:10px">Manual de Usuario</a><a href="#" style="float:right">&nbsp;|&nbsp;</a>
	<a href="#" style="float:right;margin-right:10px">Ayuda</a>
    </div>
    
</div>
</body>
</html>

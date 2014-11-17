<?php

		$app["subtitle"] = "Bienvenidos al Sistema de Control de Estudios - ESAT";

?>
<form method="post" id="login-form" action="login/login">
<div id="login">
<h1>Acceso al sistema</h1>
	  <div style="display:none;padding:2px;" id="username-error"></div>
	  <!--<label>Usuario</label>-->
	  <div><input type="text" name="username" style="width:280px;background:url('images/iconos/16x16/user.png')no-repeat right center" maxlength="20" value="<? if(isset($_POST["username"])) echo $_POST["username"]?>" placeholder="Usuario" /></div>
	  <!--<label>Contrase&ntilde;a</label>-->
	  <div style="display:none;padding:2px;" id="password-error"></div>
	  <div><input type="password" name="password" style="width:280px;background:url('images/iconos/16x16/lock.png')no-repeat right center" placeholder="Contrase&ntilde;a" /></div>
	  <!--<div id="right"></div>-->
	  <div style="clear:both;padding-top:10px;"><a href="login/recuperar">Olvid&eacute; mi contrase&ntilde;a</a></div>
	  <div style="clear:both;margin-top:10px;"><button type="submit" class="bb" name="login" />Ingresar al Sistema</button></div>
</div>
<!--- Slider -->
<div id="rightbar" class="slider-wrapper">
	<div id="slider" class="nivoSlider">
		<img src="images/slider/01.jpg" data-thumb="images/slider/01.jpg" alt="" title="Amplias y Modernas Aulas de Clase"/>
		<img src="images/slider/01.jpg" data-thumb="images/slider/01.jpg" alt="" title="Amplias y Modernas Aulas de Clase" />
		<img src="images/slider/01.jpg" data-thumb="images/slider/01.jpg" alt="" title="Amplias y Modernas Aulas de Clase" />
		<img src="images/slider/01.jpg" data-thumb="images/slider/01.jpg" alt="" title="Amplias y Modernas Aulas de Clase" />
	</div>
</div>
</form>
<script type="text/javascript" src="javascript/nivo-slider/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider({
			effect:"random",
			slices:15,
			boxCols:8,
			boxRows:4,
			animSpeed:500,
			pauseTime:3000,
			startSlide:0,
			directionNav:false,
			controlNav:false,
			controlNavThumbs:false,
			pauseOnHover:true,
			manualAdvance:false
        });
    });
</script>

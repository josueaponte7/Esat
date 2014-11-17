<?php 
function conectate()
{
	if 
	(!($based = mysql_connect("localhost","root",'123456')))
	{
		exit();
	}
	if (!mysql_select_db ("esat",$based))
	{
		
		exit();
	}
	return $based;
} 
?>

<style type="text/css">
<!--
body,td,th {
	color: #000000;
}
-->
</style><?php                                   
/* Funciones para una interfaz de base de datos simple  */
/* ---------------------------------------------------- */

function send_sql($db, $sql) 
	{
		 if (! $res=@mysql_db_query($db, $sql))
	{
		   echo mysql_error();
		   exit;
	}
		   return $res;
	}
	function tab_out($result) 
	{
		$cant=mysql_num_fields($result);
		$ancho=100/$cant."%";
		echo "<table width=100% border=1 cellpadding='2' cellspacing='2'>";
		echo "<tr bgcolor=#000000>";
		for ($i=0;$i<$cant;$i++)
	{
	echo "<th width='$ancho'><font size='2'> ";
	echo mysql_field_name($result,$i);
	echo "</font> </th>";
	}
	echo "</tr>";
	echo "<tr>";
	
	$num = mysql_num_rows($result);
	for ($j = 0; $j < $num; $j++) 
	
	{
		$row = mysql_fetch_array($result);
		echo "<table width=100% border=1 cellpadding='2' cellspacing='2'>";
		echo "<tr bgcolor=#000066>";
		for ($k=0;$k<$cant;$k++)
	{
		$fn=mysql_field_name($result,$k);
		echo " <td width='$ancho'> <font size='2'> $row[$fn] </font> </td> " ;
	}
		echo "<tr>";
		echo "</tr>";
	}
		echo "</table>";
	}
 


?>

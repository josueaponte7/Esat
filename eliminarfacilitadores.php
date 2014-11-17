<? mysql_connect("localhost","root","admin");
mysql_select_db("esat");
$qd="delete from facilitadores where cod_fac=".$_GET['cod_fac'];
mysql_query($qd);
header("location:consfacilitadores.php");
?>
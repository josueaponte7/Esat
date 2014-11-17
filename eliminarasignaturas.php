<? mysql_connect("localhost","root","admin");
mysql_select_db("esat");
$qd="delete from asignaturas where cod_asi=".$_GET['cod_asi'];
mysql_query($qd);
header("location:consasignaturas.php");
?>
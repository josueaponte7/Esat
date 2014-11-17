<? mysql_connect("localhost","root","admin");
mysql_select_db("esat");
$qd="delete from asignacion where id=".$_GET['id'];
mysql_query($qd);
header("location:consasignaciones.php");
?>
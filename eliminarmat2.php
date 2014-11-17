<? mysql_connect("localhost","root","admin");
mysql_select_db("esat");
$qd="delete from detalle_inscripcion where id=".$_GET['id'];
mysql_query($qd);

header("location:alumnoregular4.php");
?>
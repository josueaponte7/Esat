<? mysql_connect("localhost","root","admin");
mysql_select_db("esat");
$qd="delete from horario where id=".$_GET['id'];
mysql_query($qd);
header("location:conshorarios.php");
?>
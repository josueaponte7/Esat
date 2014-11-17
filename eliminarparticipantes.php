<? mysql_connect("localhost","root","admin");
mysql_select_db("esat");
$qd="delete from participantes where cod_par=".$_GET['cod_par'];
mysql_query($qd);
header("location:consparticipantes.php");
?>
<?php
require './conex.php';
conectar();
$cod_mencion = $_POST['cod_men'];
$cod_tipo    = $_POST['cod_tipo'];

$sql = "SELECT codigo FROM asignaturas WHERE mencion='$cod_mencion' AND tipo='$cod_tipo' ORDER BY codigo DESC LIMIT 1";
$result = mysql_query($sql);
$total = mysql_num_rows($result);
if($total > 0){
    $row = mysql_fetch_array($result);
    $codigo = (int)$row[0]+1;
    $codigo = str_pad($codigo, 2,'0',STR_PAD_LEFT);
    echo $codigo;
    
}else{
    echo '01';
}
 
?>

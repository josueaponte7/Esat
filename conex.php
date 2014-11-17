<?php

function conectar(){

$con = mysql_connect('localhost', 'root', '123456') or die('No se pudo conectar: ' . mysql_error());
mysql_select_db('esat') or die('No se pudo seleccionar la base de datos');

return $con;

}
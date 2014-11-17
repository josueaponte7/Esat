<?php 
function Conectarse() 
{ 
   if (!($link=@mysql_connect("localhost","root","admin"))) //se conecta a la base de datos
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } ////siarcp
   if (!mysql_select_db("esat",$link)) //selecciona la tabla
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link; 
}
$link = Conectarse();
?>
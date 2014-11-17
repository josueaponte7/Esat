<?php

   function connect(){

        if(!$link = mysql_connect("localhost","root","admin")){

            die('Error al conectarse a la base de datos');

        }

        if(!mysql_select_db("esat",$link)){

            die("Error al seleccionar la base de datos");

        }

        return $link;

   }

?>

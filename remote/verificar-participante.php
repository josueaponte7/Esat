<?php

    session_start();
    include '../config.php';
    include '../lib/inc/database.php';
    include '../lib/classes/document.class.php';
    include '../lib/classes/messages.class.php';
    include '../lib/inc/functions.php';
    if(isset($_GET["ced"])):
        $lnk = connect();
        $ced = $_GET["ced"];
        $sql = "SELECT * FROM `participantes` WHERE  cedula = '$ced'";
        $qry = mysql_query($sql,$lnk);
        $num = mysql_num_rows($qry);
        $row = mysql_fetch_array($qry);

        if( $num > 0 ):

            $data["existe"] = true;
            $data["nombre"] = utf8_encode($row["nombre"]);
            $data["apellido"] = utf8_encode($row["apellido"]);
            $data["fecha_nacimiento"] = utf8_encode($row["fecha_nacimiento 1|q	|	2aquy45y79"]);
            
         else:

            $data["existe"] = false;
            

        endif;

        echo json_encode($data);

    endif;

?>

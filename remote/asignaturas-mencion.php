<?php

    session_start();
    include '../config.php';
    include '../lib/inc/database.php';
    include '../lib/classes/document.class.php';
    include '../lib/classes/messages.class.php';
    include '../lib/inc/functions.php';
    if(isset($_GET["men"])):
        $lnk = connect();
        $men = $_GET["men"];
        $sql = "SELECT * FROM `asignaturas` WHERE  cod_men = '$men' AND  cuatrimestre = 1";
        $qry = mysql_query($sql,$lnk);
        $num = mysql_num_rows($qry);
        
        while($row = mysql_fetch_array($qry)):

			$data["id"][] = $row["cod_asi"];
			$data["codigo"][] = $row["codigo"];
			$data["nombre"][] = utf8_encode($row["nombre"]);
			$data["uc"][] = $row["uc"];
			$data["cuatrimestre"][] = $row["cuatrimestre"];
			
		endwhile;
		
        echo json_encode($data);

    endif;

?>

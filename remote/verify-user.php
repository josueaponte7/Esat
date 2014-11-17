<?php

    session_start();
    include '../config.php';
    include '../lib/inc/database.php';
    include '../lib/classes/document.class.php';
    include '../lib/classes/messages.class.php';
    include '../lib/inc/functions.php';
    if(isset($_GET["user"])):
        $lnk = connect();
        $usr = $_GET["user"];
        $sql = "SELECT * FROM usuarios WHERE  usuario = '$usr'";
        $qry = mysql_query($sql,$lnk);
        $num = mysql_num_rows($qry);
        $row = mysql_fetch_array($qry);

        if( $num > 0 ):

            $data["exists"] = true;

        else:

            $data["exists"] = false;

        endif;

        echo json_encode($data);

    endif;

?>

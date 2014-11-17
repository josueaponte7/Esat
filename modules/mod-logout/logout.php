<?php

        session_unset();
        session_destroy();
        document::redirect(SG_URL);

?>

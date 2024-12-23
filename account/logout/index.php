<?php
    session_start();
    session_unset();
    session_destroy();
    //redirect the user
    header("Location: ../../index.php");
?>
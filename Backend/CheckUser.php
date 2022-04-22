<?php

    session_start();

    if (isset($_SESSION["usernameonnavbar"]) && $_SESSION["usernameonnavbar"] == 'admin'){}
    else {
        header("location: ../index.php");
    }

?>

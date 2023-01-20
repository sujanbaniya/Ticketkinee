<?php

    session_start();


    if(!isset($user_id)){
        header("login.php");
    }

?>
<?php

    $db_server = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'main_ticket_kinee';

    $conn = mysqli_connect($db_server, $db_username, $db_password, $db_name);

    if(!$conn){
        die("Sorry failed to connect to database. TicketKinee.");
    }

?>
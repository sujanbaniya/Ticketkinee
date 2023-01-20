<?php
    $dbServername = "localhost";
    $dbUsername ="root";
    $dbPassword =""; 
    $dbName ="main_ticket_kinee";

    // Creat e a connection
    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

    if(!$conn){
        die("SORRY FAILED TO CONNECT TO DATABASE -TicketKinee:   " . mysqli_connect_error());
    }
    
?>
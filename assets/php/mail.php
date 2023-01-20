<?php 
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: dummy.sumitshrestha@gmail.com" . "\r\n";

    $to = "sumitshrestha027@gmail.com";
    $subject = "Ticket Booked";
    $body = "Hello, successfully mail has been sent" ;
    echo $body;
        

    $success=mail($to, $subject, $body, $headers);

    if($success){
        echo $success;
    }
    if (!$success) {
        echo('Not Successful');
    }

?>
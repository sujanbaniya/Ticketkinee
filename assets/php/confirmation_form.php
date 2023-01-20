<?php

    include 'database_configure.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    }

    $location_from = $_POST['location'];
    $destination = $_POST['destination'];            
    $departure_datetime = $_POST['departure_date'];
    $arrival_datetime = $_POST['arrival_date'];
    $flight_no = $_POST['flight_no'];
    $price = $_POST['price'];
    $no_of_travellers = $_POST['no_of_travellers'];

    $total_price = $price * $no_of_travellers;

    
    $result = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
    $data=$result->fetch_assoc();
    $first_name=$data['user_first_name'];
    $email=$data['user_email'];

    $sql_insert= "INSERT INTO `booked_flight`(`bf_id`, `flight_id`, `name`, `user_email`, `location`, `destination`, `departure_date`, `arrival_date`) VALUES ('','$flight_no','$first_name','$email','$location_from','$destination', '$departure_datetime', '$arrival_datetime')";
    mysqli_query($conn, $sql_insert);
    $to = $email;

    $text_subject="Ticket Booked.";

    $file = $conn->query("SELECT qr_location FROM booked_flight WHERE user_email='$email'");
    $file_data=$result->fetch_assoc();
    $file_name=$file_data['uqr_location'];

    $name = $file_name;

    $handle = fopen($name, "r");  // set the file handle only for reading the file
    $content = fread($handle, $size); // reading the file
    fclose($handle);

    $encoded_content = chunk_split(base64_encode($content));
    $boundary = md5("random");

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
    $headers .= "From: dummy.sumitshrestha@gmail.com" . "\r\n";
    $headers .= "Content-Type: multipart/mixed;";
    $headers .= "boundary = $boundary\r\n";

    $to = $email;
    $subject = $text_subject;
    $body_message = "<!DOCTYPE html>
    <html>
    
    <head>
        <style>
            body {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                background-color: #2e72d183;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                text-decoration: none;
                margin: auto;
            }
            
            a {
                text-decoration: none;
            }
    
            table{
                border: none;
            }
    
            td{
                text-align: center;
            }
            
            .logo-container img {
                max-height: 8rem;
                max-width: auto;
            }
            
            .email-text {
                font-size: 1rem;
                padding: 0;
            }
            
            .text-body {
                font-size: 1rem;
            }

            .text-body-details{
                text-align: center;
            }
            
            .footer-text-body {
                color: #2e72d1;
            }
        </style>
    </head>
    
    <body>
        <table>
            <tr>
                <td>
                    <div class='logo-container'>
                        <a href='landing_page.php'><img src='https://lh3.googleusercontent.com/pw/AM-JKLXCDX3KGE27TacsK_5uKgt5Dq7IStDVbrndJed3_GIgvCpshWjitsSIsnNV9QDPLWAIK5sXmoJVOXZ3vqB4uPsM740o6cVAQRc3GJ5AAKbraaVa8IE3fAh1jHwmllCeW17mYe56QYfSvbkjR4ym37VoNg=w858-h442-no?authuser=0'></a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 class='email-text'>Hi, $first_name</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 class='email-text'>Ticket Confirmed</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 class='text-body'>You have successfully booked the flight ticket for $destination.</h3>
                </td>
            </tr>
            <tr>
                <td>
                    <h3 class='text-body'>The flight details are as follows:</h3>
                </td>
            </tr>
            <tr>
                <td class='text-body-details'>Flight No.: $flight_no</td>
            </tr>
            <tr>
                <td  class='text-body-details'>From: $location_from</td>
            </tr>
            <tr>
                <td class='text-body-details'>To: $destination</td>
            </tr>
            <tr>
                <td class='text-body-details'>Departure Date: $departure_datetime</td>
            </tr>
            <tr>
                <td class='text-body-details'>Return Date: $arrival_datetime</td>
            </tr>
            <tr>
                <td class='text-body-details'>Number of travellers: $no_of_travellers</td>
            </tr>
            <tr>
                <td class='text-body-details'>Price: $total_price</td>
            </tr>
            <tr>
                <td>
                    <div class='text-body'>
                        <p><small>If this wasn't you then please contact <a href='contact_us.php'>TicketKinee.</a></small></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class='footer-text-body'>
                        <p><small>TicketKinee © 2022 TicketKinee, Inc. All Rights Reserved.</br>Kathmandu, Bagmati Province, Nepal.</small></p>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>";

//plain text
$body = "--$boundary\r\n";
$body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
$body .= "Content-Transfer-Encoding: base64\r\n\r\n";
$body .= chunk_split(base64_encode($body_message));
     
//attachment
$body .= "--$boundary\r\n";
$body .="Content-Type: $type; name=".$name."\r\n";
$body .="Content-Disposition: attachment; filename=".$name."\r\n";
$body .="Content-Transfer-Encoding: base64\r\n";
$body .="X-Attachment-Id: ".rand(1000, 99999)."\r\n\r\n";
$body .= $encoded_content; // Attaching the encoded file with email

$_SESSION['successMessage'] = 'Ticket Booked Successfully.';

        

    $success=mail($email, $subject, $body, $headers);
    
    if (!$success) {
        echo('Not Successful');
    }

?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>TicketKinee | Book Two Way Tickets</title>

            <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

            <!-- favicon code  -->
            <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
            <!-- favicon code ends  -->

            <!-- font awesome cdn link  -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <!-- font awesome cdn link ends  -->

            <!-- custom css file link  -->
            <link rel="stylesheet" href="../css/find_flights_style.css">
            <!-- custom css file link ends  -->
        </head>
    <body>
        <form action="main_page.php" method="post">
            <div class="project">
                <a href="main_page.php"><img src="../logos/TicketKinee_Logo.png" alt="Logo" class="logo"></a>
                <div class="edit">
                    <label style="font-size:20px;">From: <?php echo "<b>".$location_from."</b>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">To: <?php echo "<b>".$destination."</b>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">Flight Date: <?php echo "<b>".$departure_datetime."</b>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">Flight No: <?php echo "<b>".$flight_no."</b>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">Number of travellers: <?php echo "<b>".$no_of_travellers."</b>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">Price: <?php echo "<b>".$total_price."</b>";?></label>
                </div>
                <input text="text" name="location" hidden value="<?php echo $location_from?>">
                <input text="text" name="destination" hidden value="<?php echo $destination?>">
                <input text="text" name="departure_date" hidden value="<?php echo $departure_datetime?>">
                <input text="text" name="arrival_date" hidden value="<?php echo $arrival_datetime?>">
                <input text="text" name="flight_no" hidden value="<?php echo $flight_no?>">
                <input text="text" name="price" hidden value="<?php echo $price?>">
                <input text="text" name="first_name" hidden value="<?php echo $first_name?>">
                <input text="text" name="email" hidden value="<?php echo $email?>">
                <button class="btn" type="submit" href="main_page.php">Mail has been sent into your mail.</button>

            </div>  
    </form>       
</body>
</html>
<?php
    include 'database_configure.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    }

    function random_strings($length_of_string)
    {
    
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    
        // Shuffle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result),
                        0, $length_of_string);
    }

    $payment_ref_code = $_REQUEST['refId'];

    $location_from = $_SESSION['location'];
    $destination = $_SESSION['destination'];            
    $departure_datetime = $_SESSION['departure_date'];
    $arrival_datetime = $_SESSION['arrival_date'];
    $flight_no = $_SESSION['flight_no'];
    $price = $_SESSION['price'];
    $no_of_travellers = $_SESSION['no_of_travellers'];
    $total_price = $price * $no_of_travellers;

    $result = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
    $data=$result->fetch_assoc();
    $first_name=$data['user_first_name'];
    $last_name=$data['user_last_name'];
    $email=$data['user_email'];
    
    include "phpqrcode/qrlib.php";
    $PNG_TEMP_DIR ='temp/';
    if(!file_exists($PNG_TEMP_DIR)){
        mkdir($PNG_TEMP_DIR);
    }

    $filename = $PNG_TEMP_DIR . 'test.png';

    $QR_Data = "Name: ".$first_name." ".$last_name. "\n";
    $QR_Data .= "From: ".$location_from . "\n";
    $QR_Data .= "To: ".$destination . "\n";
    $QR_Data .= "No. of passengers: ".$no_of_travellers . "\n";
    $QR_Data .= "Departure Date: ".$departure_datetime . "\n";
    $QR_Data .= "Flight No.: ".$flight_no . "\n";
    $QR_Data .= "Payment Reference Code: ".$payment_ref_code . "\n";
    

    $filename = $PNG_TEMP_DIR . $first_name."_".$last_name."_".$flight_no.'.png';

    // if($_SESSION['Extra_ticket']='1'){
    //     $filename = $PNG_TEMP_DIR . $first_name."_".$last_name."_".$flight_no.rand(1,10).'.png';
    // }

    $qr_location_local_pc = "C:/xampp/htdocs/mainProject_TicketKinee/assets/php/".$filename;

    $sql_insert= "INSERT INTO `booked_flight`(`bf_id`, `flight_id`, `name`, `user_email`, `location`, `destination`, `departure_date`, `arrival_date`, `qr_location`) VALUES ('','$flight_no','$first_name','$email','$location_from','$destination', '$departure_datetime', '$arrival_datetime', '$qr_location_local_pc')";
    mysqli_query($conn, $sql_insert);

    QRcode::png($QR_Data, $filename);

    $to = $email;

    $text_subject="Ticket Booked.";

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
                <td class='text-body-details'>eSewa Payment Ref. Code: $payment_ref_code</td>
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
                        <p><small>TicketKinee ?? 2022 TicketKinee, Inc. All Rights Reserved.</br>Kathmandu, Bagmati Province, Nepal.</small></p>
                    </div>
                </td>
            </tr>
        </table>
    </body>
</html>";



//plain text
$body = $body_message;

    $success=mail($email, $subject, $body, $headers);
    $sql_insert_transaction= "INSERT INTO `transaction`(`id`, `user_email`, `booked_id`, `amount`, `payment_ref_code`) VALUES ('','$email','$flight_no','$total_price','$payment_ref_code')";
    mysqli_query($conn, $sql_insert_transaction);
    $_SESSION['successMessage'] = 'Ticket Booked Successfully.';
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
                <div class="edit">
                    <label style="font-size:20px;">Payment Reference Code: <?php echo "<b>".$payment_ref_code."</b>";?></label>
                </div>
                <div class="edit">
                    <img src="<?php echo $filename?>">
                </div>
                <button class="btn" type="submit" href="main_page.php">Mail has been sent into your mail.</button>

            </div>  
    </form>       
</body>
</html>
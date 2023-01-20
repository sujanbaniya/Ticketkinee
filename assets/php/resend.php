<?php
include 'database_configure.php';
session_start();

$email = $_SESSION['user_email'];

$token_data = $conn->query("SELECT token FROM verification_token WHERE user_email='$email'");
$result_token = $token_data->fetch_assoc();
$otp=$result_token['token'];


$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
$headers .= "From: dummy.sumitshrestha@gmail.com" . "\r\n";

$to = $email;
$subject = "Verify your TicketKinee Account.";
$body = "<!DOCTYPE html>
<html lang='en'>

<head>
    <!-- font awesome cdn link  -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css'>
    <!-- font awesome cdn link ends  -->

    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin: 0;
            background-color: #2e72d183;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            text-decoration: none;
            margin: auto;
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
            padding: 1rem 1rem;
        }
        
        .confirm-email-text {
            font-weight: bolder;
            font-size: 2.5rem;
            padding: 0;
        }
        
        .text-body {
            font-size: 1rem;
        }
        
        .otp-code {
            margin: 2rem 0rem;
        }
        
        .otp-code h2 {
            color: #061935;
        }
    </style>
</head>

<body>
        <table>
            <tr>
                <td>
                    <div class='logo-container'>
                        <img src='https://lh3.googleusercontent.com/pw/AM-JKLXCDX3KGE27TacsK_5uKgt5Dq7IStDVbrndJed3_GIgvCpshWjitsSIsnNV9QDPLWAIK5sXmoJVOXZ3vqB4uPsM740o6cVAQRc3GJ5AAKbraaVa8IE3fAh1jHwmllCeW17mYe56QYfSvbkjR4ym37VoNg=w858-h442-no?authuser=0'>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                <div class='confirm-email-text'>
                    Confirm Your Email
                </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class='text-body'>
                        <p>You have received this message because your email address has been registered with our site.</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class='text-body'>
                        <p>Please enter the OTP given below in our site to login.</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class='otp-code'>
                        <span><h2>$otp</h2></span>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class='text-body'>
                        <p><small>Once confirmed, this email will be uniquely associated with your account.</small></p>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class='text-body'>
                        <p><small>If you did not register with us, please disregard this email.</small></p>
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

</html>" ;

$success=mail($to, $subject, $body, $headers);
if($success){
        header('location: account_verification.php');
    }
    else{
        echo "<script>alert('OTP couldn't be fetched into database. Please try again later.'";
    }
?>
<?php

    include 'database_configure.php';
    session_start();

    error_reporting(E_ERROR | E_PARSE);

    $input_code = mysqli_real_escape_string($conn, $_POST["otp"]);

    $email = $_SESSION['user_email'];

    if(empty($email)){
        header("location:login.php");
    }

    if(!empty($_SESSION['user_email'])){
        $verification_check = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_email` = '$email' OR `user_username` = '$email'") or die('query failed');
        $verification_check_data = mysqli_fetch_assoc($verification_check);
        $verification_check_info = $verification_check_data['verification_status'];
        $user_data_check = mysqli_query($conn, "SELECT * FROM `users` WHERE `user_email` = '$email' OR `user_username` = '$email'") or die('query failed');
        $user_data = mysqli_fetch_assoc($user_data_check);
        $email_data = $user_data['user_email'];


        if($verification_check_info == "verified"){
            echo "<script>alert('Your account is already verified.');</script>";
            header("location:login.php");
        }
    }
    $verification_data = mysqli_query($conn, "SELECT token FROM `verification_token` WHERE `user_email` = '$email_data'") or die('query failed');
        $verification_code = mysqli_fetch_assoc($verification_data);
        $verification_code_data = $verification_code['token'];


    // if(!empty($_SESSION['user_id'])){
    //     header("location:main_page.php");
    // }

    if (isset($_POST["submit"])){
        $verification_data = mysqli_query($conn, "SELECT token FROM `verification_token` WHERE `user_email` = '$email_data'") or die('query failed');
        $verification_code = mysqli_fetch_assoc($verification_data);
        $verification_code_data = $verification_code['token'];
        
        if($input_code === $verification_code_data){
            $verify_sql = "UPDATE `users` SET `verification_status`='verified' WHERE user_email = '$email_data'";
            $verified_query = mysqli_query($conn, $verify_sql);

            if($verified_query){
                $token_deletion_sql = "DELETE FROM `verification_token` WHERE `user_email` = '$email_data'";
                $deletion_query = mysqli_query($conn, $token_deletion_sql) or die('query failed');

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
                $headers .= "From: dummy.sumitshrestha@gmail.com" . "\r\n";

                $to = $email_data;
                $subject = "Registered TicketKinee Account.";
                $body = "<!DOCTYPE html>
                <html lang='en'>
                
                <head>
                
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
                            padding: 1rem 1rem;
                        }
                        
                        .email-text {
                            font-weight: bolder;
                            font-size: 2.5rem;
                            padding: 0;
                        }
                        
                        .text-body {
                            font-size: 1rem;
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
                                <div class='email-text'>
                                    Account Created.
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class='text-body'>
                                    <h3>$email has been successfully registered into TicketKinee system.</h3>
                                </div>
                            </td>
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
                
                </html>" ;

                mail($to, $subject, $body, $headers);

                header("location:login.php");
            }
        }else{
            $message[] = 'Invalid OTP';
        }
    }
    
?>

<!DOCTYPE html>
<html>

<head>
    <title>TicketKinee | Verification</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- favicon code  -->
    <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
    <!-- favicon code ends  -->

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- font awesome cdn link ends  -->

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/project_Ekin.css">
    <link rel="stylesheet" href="../css/message.css">
    <!-- custom css file link ends  -->
</head>

<body>
    <div class="project">
        <img src="../logos/TicketKinee_Logo.png" alt="Logo" class="logo">
        <form action="account_verification.php" method="post" enctype="multipart/form-data">
            <div class="edit">
                <input disabled>
                <label>Enter the code sent to your mail below.</label>
            </div>
            <div class="edit">
                <input type="text" name="otp" required>
                <label>OTP</label>
            </div>
            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
            }
            ?>
            <button class="btn" name="submit" type="submit">Verify</button>
            <p class="text" name="resend_otp"> Resend OTP? <a href="resend.php">Resend Code</a></p>
        </form>
    </div>
    <script src="../js/javascript_Ekin.js"></script>
    <script>
        alert("OTP has been sent to your email.");
    </script>
</body>

</html>
<?php
    // session_start();
    

    include 'database_configure.php';
    session_start();

    error_reporting(E_ERROR | E_PARSE);

    $user_id = $_SESSION['user_id'];

    if(!empty($_SESSION['user_id'])){
        header("location:main_page.php");
    }

    try{
        if (isset($_POST["submit"])){
            $first_name = mysqli_real_escape_string($conn, $_POST["first_name"]);
            $last_name = mysqli_real_escape_string($conn, $_POST["last_name"]);
            $user_name = mysqli_real_escape_string($conn, $_POST["user_name"]);
            $user_contact_no = mysqli_real_escape_string($conn, $_POST["contact_no"]);
            $email = mysqli_real_escape_string($conn, $_POST["email"]);
            $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
            $confirm_password = mysqli_real_escape_string($conn, md5($_POST["confirm_password"]));

            $user_creation_time = date('c', time());
            $user_type = "normal";

            $verification_status = "unverified";
            
            $sql = "INSERT INTO `users` (`user_first_name`, `user_last_name`, `user_username`, `user_email`, `user_contact_no`, `user_password`, `user_type`, `verification_status`) VALUES ('$first_name', '$last_name', '$user_name', '$email', '$user_contact_no', '$password', '$user_type', '$verification_status')";
            
            // die($sql);
            
            $select = mysqli_query($conn, "SELECT * FROM `users` WHERE user_email = '$email' AND user_password = '$password'") or die('query failed');

            if(mysqli_num_rows($select) > 0){
                $message[] = 'user already exists';
                
            }else{
                if($password != $confirm_password){
                    $message[] = 'confirm password not matched';
                }else{
                    $insert = mysqli_query($conn, $sql);

                    if($insert){
                        $message[] = 'Registered Successfully';
                        var_dump($_POST);

                        $otp = rand(100000, 999999);
                        // Email otp verification mailing code
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
                            $token_sql = "INSERT INTO `verification_token`(`id`, `user_email`, `token`) VALUES ('','$email','$otp')";
                            $token_query = mysqli_query($conn, $token_sql);
                            if($token_query){
                                $_SESSION['user_email'] = $email;
                                header('location: account_verification.php');
                            }
                            else{
                                echo "<script>alert('OTP couldn't be uploaded into database. Please try again later.'";
                            }
                            
                        }
                        if (!$success) {
                            echo "<script>alert('OTP couldn't be sent to your mail. Please try again later.');</script>";
                        }

                        // header('location: login.php');
                        
                        }else{
                            $message[] = 'Registration Failed! Please try again later.';
                        }
                    }
                }
            }
            mysqli_close($conn);

        }catch(exception $e){
            die("Error Occured: " . $e->getMessage());
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>TicketKinee | Register</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- favicon code  -->
    <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
    <!-- favicon code ends  -->

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- font awesome cdn link ends  -->

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/register.css">
    <link rel="stylesheet" href="../css/message.css">
    <!-- custom css file link ends  -->
</head>

<body>
    <div class="register">

        <a href="../../index.php" class="logo"><img src="../logos/TicketKinee_Logo.png" alt="Logo" class="logo"></a>
        <form action="register.php" method="POST">
            <div class="edit">
                <input type="text" name="first_name" required>
                <label>First Name</label>
            </div>
            <div class="edit">
                <input type="text" name="last_name" required>
                <label>Last Name</label>
            </div>
            <div class="edit">
                <input type="text" name="user_name" required>
                <label>UserName</label>
            </div>
            <div class="edit">
                <input type="text" name="contact_no" required>
                <label>Contact Number</label>
            </div>
            <div class="edit">
                <input type="text" name="email" required>
                <label>Email</label>
            </div>
            <div class="edit">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <div class="edit">
                <input type="password" name="confirm_password" required>
                <label>Confirm Password</label>
            </div>

            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
            }
            ?>
            
            <button class="btn" name="submit">Register</button>
            <p class="text"> Already have an account? <a href="login.php">Login</a></p>

        </form>
    </div>

    <script src="../js/javascript_Ekin.js"></script>

</body>

</html>
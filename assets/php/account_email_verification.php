<?php
    // session_start();
//***************** */
    // include 'database_configure.php';
    // session_start();

    // error_reporting(E_ERROR | E_PARSE);

    // $user_id = $_SESSION['user_id'];

    //***************** */

    // if(!empty($_SESSION['user_id'])){
    //     header("location:main_page.php");
    // }
//***************** */
    // $verification = mysqli_query($conn, "SELECT `status` FROM `users` WHERE (user_email = '$email' or user_username='$email' or user_contact_no = '$email') AND user_password = '$password'") or die('query failed');
//***************** */
    // if(isset($user_id)){
    //     header('location:main_page.php');
    // }

    //***************** */
    // if (isset($_POST["submit"])){
    //     $email = mysqli_real_escape_string($conn, $_POST["username/email"]);
    //     $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
        
    //     $select = mysqli_query($conn, "SELECT * FROM `users` WHERE (user_email = '$email' or user_username='$email' or user_contact_no = '$email') AND user_password = '$password'") or die('query failed');

    //     if(mysqli_num_rows($select) > 0){
    //         $row = mysqli_fetch_assoc($select);
    //         $_SESSION['user_id'] = $row['user_id'];
    //         // echo "";
    //         header('location:main_page.php');
            
    //     }else{
    //         $message[] = 'Incorrect Email/Password!';
    //     }
    // }
    //***************** */
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
        <form action="login.php" method="post" enctype="multipart/form-data">
            <div class="edit">
                <input disabled>
                <label>Enter the OTP from your mail below.</label>
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
            <p class="text"> Resend OTP? <a href="resend.php">Resend</a></p>
        </form>
    </div>
    <script src="../js/javascript_Ekin.js"></script>
    <script>
        alert("OTP has been sent to your email.");
    </script>
</body>

</html>
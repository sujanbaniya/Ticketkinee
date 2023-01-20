<?php
    // session_start();

    include 'database_configure.php';
    session_start();

    error_reporting(E_ERROR | E_PARSE);

    $user_id = $_SESSION['user_id'];

    if(!empty($_SESSION['user_id'])){
        header("location:main_page.php");
    }

    // if(isset($user_id)){
    //     header('location:main_page.php');
    // }

    if (isset($_POST["submit"])){
        $email = mysqli_real_escape_string($conn, $_POST["username/email"]);
        $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
        
        $select = mysqli_query($conn, "SELECT * FROM `users` WHERE (user_email = '$email' or user_username='$email' or user_contact_no = '$email') AND user_password = '$password'") or die('query failed');
        $verification_data = mysqli_query($conn, "SELECT * FROM `users` WHERE (user_email = '$email' or user_username='$email' or user_contact_no = '$email') AND user_password = '$password'") or die('query failed');
        $verification_status = mysqli_fetch_assoc($verification_data);
        $verification_status_data = $verification_status['verification_status'];
        $username = $verification_status['user_username'];
        if($verification_status_data == 'verified'){
            if(mysqli_num_rows($select) > 0){
                $row = mysqli_fetch_assoc($select);
                $_SESSION['user_id'] = $row['user_id'];
                // echo "";
                $_SESSION['successMessage'] = 'Loged in as '.$username.'.';
                header('location:main_page.php');
                
            }else{
                $message[] = 'Incorrect Email/Password!';
            }
        }else{
            $message[] = 'Incorrect Email/Password!';
        }
        
        if($verification_status_data == 'unverified'){
            $_SESSION['user_email'] = $email;
            header('location:account_verification.php');
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <title>TicketKinee | Login</title>

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
        <a href="../../index.php" class="logo"><img src="../logos/TicketKinee_Logo.png" alt="Logo" class="logo"></a>
        <form action="login.php" method="post" enctype="multipart/form-data">
            <div class="edit">
                <input type="text" name="username/email" required>
                <label>Email/Username</label>
            </div>
            <div class="edit">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
            }
            ?>
            <button class="btn" name="submit" type="submit">Login</button>
            <p class="text"> Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>
    <script src="../js/javascript_Ekin.js"></script>
</body>

</html>
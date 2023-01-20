<?php

    include 'database_configure.php';
    session_start();

    error_reporting(E_ERROR | E_PARSE);

    $user_id = $_SESSION['user_id'];

    $data = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
    $user_first_name = $data->fetch_assoc();
    $first_name=$user_first_name['user_first_name'];
    $last_name=$user_first_name['user_last_name'];
    $user_type = $user_first_name['user_type'];
    $database_password = $user_first_name['user_password'];

    if($user_type === "normal"){
        $user_description = "TicketKinee User";
        $_SESSION['admin'] = '0';
    }

    if (isset($_POST["submit"])){
        $old_password = md5($_POST["old_password"]);
        $password = md5($_POST["new_password"]);
        $confirm_password = md5($_POST["confirm_new_password"]);
        
        if($old_password != $database_password){
                $message[] = 'Current Password Not Matched.';
        }else if($password != $confirm_password){
            $message[] = 'New Passwords Not Matched.';
        }else{
            $update_data = mysqli_query($conn, "UPDATE `users` SET `user_password`='$confirm_password' WHERE `user_id`='$user_id'") or die('query failed');
            $_SESSION['successMessage'] = 'Password Changed Successfully.';
            header('location:main_page.php');
        }   
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>TicketKinee | Change Password</title>

            <!-- favicon code  -->
            <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
            <!-- favicon code ends  -->

            <!-- font awesome cdn link  -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <!-- font awesome cdn link ends  -->

            <!-- custom css file link  -->
            <link rel="stylesheet" href="../css/home.css">
            <link rel="stylesheet" href="../css/message.css">
            <link rel="stylesheet" href="../css/account_dropdown.css">
            <!-- custom css file link ends  -->
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

            <style>
            /* html, body {
            display: flex;
            justify-content: center;
            font-family: Roboto, Arial, sans-serif;
            font-size: 15px;
            } */

            form {
            border: 5px solid #f1f1f1;
            justify-content: center;
            align-items: center;
            }

            input[type=text], input[type=password] {
            width: 100%;
            padding: 16px 8px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            }

            .icon {
            font-size: 110px;
            display: flex;
            justify-content: center;
            color: #4286f4;
            }

            button {
                border-radius: 5px;
                background-color: #4286f4;
                color: white;
                padding: 14px 0;
                margin: 10px 0;
                border: none;
                cursor: grab;
                width: 48%;
            }

            h1 {
            text-align:center;
            font-size: 18;
            }

            label{
                font-size: large;
            }

            button:hover {
            opacity: 0.8;
            }

            .formcontainer {
            text-align: center;
            width: 50%;
            margin: 24px 50px 12px;
            margin-left: auto;
            margin-right: auto;
            }
            
            .container {
            padding: 16px 0;
            margin-right: 16px;
            text-align:left;
            }
            
            span.psw {
            float: right;
            padding-top: 0;
            padding-right: 15px;
            }
            /* Change styles for span on extra small screens */
            @media screen and (max-width: 300px) {
            span.psw {
            display: block;
            float: none;
            }
                }
            </style>
    </head>
<body>
<header class="header">
        
        <a href="main_page.php" class="logo"><img src="../logos/TicketKinee_LogoHorizontal.png" alt="Logo" class="logo"></a>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <!-- <div class="fas fa-search" id="search-btn"></div> -->
            <!-- <div class="fas fa-shopping-cart" id="cart-btn"></div> -->
            <!-- <a href="logout.php"> -->
            <!-- <div class="fa-solid fa-arrow-right-from-bracket" id="login-btn">
            </div>
            </a> -->
            <div class="fa-solid fa-user" id="user-btn" onclick="menuToggle();"></div>
        </div>
        <div class="action">
            <!-- <div class="profile" onclick="menuToggle();">
                <div class="fa-solid fa-user" id="cart-btn"></div>
            </div> -->
            <div class="menu">
                <div class="photo">
                    <div class="profile" onclick="menuToggle();">
                        <img src="../images/img1.jpg" alt="">
                    </div>
                </div>
                <h3><?php echo $first_name." ".$last_name?><br><span><?php echo $user_description?></span></h3>
                    <ul>
                        <li><img src="../icons/home.png"><a href="main_page.php">Home</a></li>
                        <li><img src="../icons/edit.png"><a href="edit_profile.php">Edit Profile</a></li>
                        <!-- <li><img src="../icons/inbox.png"><a href="#">Inbox</a></li> -->
                        <li><img src="../icons/ticket.png"><a href="#">My Tickets</a></li>
                        <!-- <li><img src="../icons/help.png"><a href="#">Help</a></li> -->
                        <li><img src="../icons/logout.png"><a href="logout.php">Logout</a></li>
                    </ul>
            </div>
        </div>
        <script>
            function menuToggle(){
                const toggleMenu = document.querySelector('.menu');
                toggleMenu.classList.toggle('active');
            }
        </script>

        </div>
        
        <!-- <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form> -->
    </header>
    <form action="change_password.php" method="POST">
      <h1>Change Password</h1>
      <div class="icon">
        <i class="fas fa-user-circle"></i>
      </div>
      <div class="formcontainer">
        <div class="container">
            <label for="old_password">Enter Old Password</label>
            <input type="password" placeholder="Enter Old Password" name="old_password" required>
        </div>
        <div class="container">
            <label for="new_password">Enter New Password</label>
            <input type="password" placeholder="Enter New Password" name="new_password" required>
        </div>
        <div class="container">
            <label for="confirm_new_password">Confirm New Password</label>
            <input type="password" placeholder="Confirm New Password" name="confirm_new_password" required>
        <?php
            if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
            }
            if(isset($success_message)){
                foreach($success_message as $success_message){
                    echo '<div class="message" background-color: green;>'.$success_message.'</div>';
                }
            }
            ?>
        <button type="submit" name="submit">Change</button>
    </form>
  </body>
</html>
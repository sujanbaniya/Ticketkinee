<?php

    include 'database_configure.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    $data = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
    $user_first_name = $data->fetch_assoc();
    $first_name=$user_first_name['user_first_name'];
    $last_name=$user_first_name['user_last_name'];
    $user_type = $user_first_name['user_type'];

    if(!isset($user_id) && $user_type === 'normal'){
        header('location: ../php/login.php');
    } else if(isset($user_id) && $user_type === 'normal'){
        header('location: ../../../php/main_page.php');
    }

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>TicketKinee | Admin Panel</title>

            <!-- ===== BOX ICONS ===== -->
            <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

            <!-- ===== font awesome cdn link ===== -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
            <!-- ===== font awesome cdn link ends ===== -->

            <!-- ===== custom css file link =====  -->
            <link rel="stylesheet" href="../css/booked_details.css">
            <link rel="stylesheet" href="../../../css/account_dropdown.css">
            <!-- ===== custom css file link ends =====  -->

            <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

            <!-- ===== favicon code =====  -->
            <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
            <!-- ===== favicon code ends =====  -->
        </head>
    <body>
    <header class="header">
    
        <a href="../../index.php" class="logo"><img src="../logos/TicketKinee_LogoHorizontal.png" alt="Logo" class="logo"></a>

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
                        <img src="../../../images/img1.jpg" alt="">
                    </div>
                </div>
                <h3><?php echo $first_name." ".$last_name?><br><span style="text-transform:capitalize"><?php echo $user_type?></span></h3>
                    <ul>
                        <li><img src="../../../icons/home.png"><a href="../../index.php">Home</a>
                        <!-- <li><img src="../icons/edit.png"><a href="edit_profile.php">Edit Profile</a></li> -->
                        <!-- <li><img src="../icons/inbox.png"><a href="#">Inbox</a></li> -->
                        <!-- <li><img src="../icons/ticket.png"><a href="#">My Tickets</a></li> -->
                        <!-- <li><img src="../icons/help.png"><a href="#">Help</a></li> -->
                        <li><img src="../../../icons/logout.png"><a href="../../../php/logout.php">Logout</a></li>
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

    <section class="review" id="selet_way" style="height:auto;">
        <div class="section-container">
            <h1 class="heading"> Movie <span>Tickets</span> </h1>
                <div class="review-slider">
                    <?php
                    $booked_movie_data = $conn->query("SELECT * FROM `movie` AS `movie`") ;

                    while($rows_movie_data = $booked_movie_data->fetch_assoc()){
                    ?>
                <div class="box">
                    
                    <?php
                    $desc = $rows_movie_data['sub_description'];
                    $booked_movie_name = $conn->query("SELECT * FROM `movie` WHERE sub_description = '$desc'") ;
                    $rows_movie_name_data = $booked_movie_name->fetch_assoc();
                    ?>

                    <img src="../../../movie/images/uploads/<?php echo $rows_movie_data['image'] ?>" alt="">
                    <h3><?php echo $rows_movie_name_data['name'] ?></h3>
                    <h1>Date: <?php echo $rows_movie_data['release_date'] ?></h1>
                    <h1>Duration: <?php echo $rows_movie_data['duration'] ?></h1>
                    <h1>Price: <?php echo $rows_movie_data['price'] ?></h1>
                </div>
                <?php
                }
                if(mysqli_num_rows($booked_movie_data)<1){
                ?>
                <div class="review-slider">
                    <div class="box">
                        <h3 style="padding:0;">No records found.</h3>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
    </section>
    </body>
</html>
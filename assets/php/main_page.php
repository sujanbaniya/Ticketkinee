<?php

    include 'database_configure.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    

    $data = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
    $user_first_name = $data->fetch_assoc();
    $first_name=$user_first_name['user_first_name'];
    $last_name=$user_first_name['user_last_name'];
    $user_type = $user_first_name['user_type'];

    if(!isset($user_id)){
        header('location:login.php');
    }else if(isset($user_id) && $user_type === 'admin'){
        $_SESSION['admin'] = '1';
        header('location: ../admin/index.php');
    }

    if($user_type === "normal"){
        $user_description = "TicketKinee User";
        $_SESSION['admin'] = '0';
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TicketKinee | A place to buy tickets.</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- favicon code  -->
    <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
    <!-- favicon code ends  -->

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- font awesome cdn link ends  -->

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/account_dropdown.css">
    <link rel="stylesheet" href="../css/flash_message.css">
    <!-- custom css file link ends  -->

</head>

<body>
    <!-- header/navbar section starts  -->

    <header class="header">
    
        <a href="main_page.php" class="logo"><img src="../logos/TicketKinee_LogoHorizontal.png" alt="Logo" class="logo"></a>

        <nav class="navbar">
            <a href="#HOME">HOME</a>
            <a href="#TICKETS">TICKETS</a>
            <a href="#PAYMENT">PAYMENT</a>

        </nav>

        <div class="icons">
            <!-- <div class="fas fa-bars" id="menu-btn"></div>
            <div class="fas fa-shopping-cart" id="cart-btn"></div> -->
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
                        <!-- <li><img src="../icons/profile.png"><a href="#">My Profile</a></li> -->
                        <li><img src="../icons/edit.png"><a href="edit_profile.php">Edit Profile</a></li>
                        <!-- <li><img src="../icons/inbox.png"><a href="#">Inbox</a></li> -->
                        <li><img src="../icons/ticket.png"><a href="my_tickets.php">My Tickets</a></li>
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

        <!-- backup of account dropdown -->
        <!-- <div class="action">
            <div class="profile" onclick="menuToggle();">
                <img src="../images/img1.jpg" alt="">
            </div>
            <div class="menu">
                <h3>Someone Famous<br><span>Wesite Designer</span></h3>
                    <ul>
                        <li><img src="../icons/profile.png"><a href="#">My Profile</a></li>
                        <li><img src="../icons/edit.png"><a href="#">Edit Profile</a></li>
                        <li><img src="../icons/inbox.png"><a href="#">Inbox</a></li>
                        <li><img src="../icons/setting.png"><a href="#">Settings</a></li>
                        <li><img src="../icons/help.png"><a href="#">Help</a></li>
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

        </div> -->
        <!-- backup of account dropdown -->
        
        <!-- <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form> -->
    </header>
    <!-- header/navbar section ends -->

    <!-- banner/ads section begins -->
    <section class="home" id="HOME">
        <div class="middle">
            <div class="banner">
                <div class="slider">
                    <div class="slides">
                        <input type="radio" name="radio-btn" class="changeBtn" id="radio1">
                        <input type="radio" name="radio-btn" class="changeBtn" id="radio2">
                        <input type="radio" name="radio-btn" class="changeBtn" id="radio3">
                        <input type="radio" name="radio-btn" class="changeBtn" id="radio4">

                        <div class="slide first">
                            <img src="../ads/Ad3.png" alt="logo">
                        </div>
                        <div class="slide">
                            <img src="../ads/Ad1.png" alt="logo">
                        </div>
                        <div class="slide">
                            <img src="../ads/Ad6.png" alt="logo">
                        </div>
                        <div class="slide">
                            <img src="../ads/Ad7.png" alt="logo">
                        </div>

                        <div class="navigation-auto">
                            <div class="auto-btn1"></div>
                            <div class="auto-btn2"></div>
                            <div class="auto-btn3"></div>
                            <div class="auto-btn4"></div>
                        </div>

                    </div>

                    <div class="navigation-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                        <label for="radio4" class="manual-btn"></label>
                    </div>
                </div>

                <script type="text/javascript">
                    document.getElementById("radio1").checked = true;

                    var counter = 2;

                    setInterval(function() {
                        document.getElementById('radio' + counter).checked = true;
                        counter++;
                        if (counter > 4) {
                            counter = 1;
                        }
                    }, 3000);
                </script>
            </div>
            <!-- banner/ads section ends -->

            <!-- home section begins  -->

    <section class="features home review" id="TICKETS" style="margin-top:100px;">
        <h1 class="heading"> BOOK <span>TICKETS</span> </h1>
        <!-- <div class="review-slider">
                <div class="box">
                    <div><img src="../icons/PLANEICON.png" alt=""></div>
                    <h3>DOMESTIC AIRLINE</h3>
                    <a href="way_selector.php" class="btn">BOOK NOW</a>
                </div>
                <div class="box box1">
                    <div class="abc"><img src="../icons/PLANEICON.png" alt="">
                    <h3>INTERNATIONAL AIRLINE</h3>
                    <a href="#" class="btn">BOOK NOW</a>   
                </div>
                    <div class="text" style="align-items: center; justify-content: center; z-index: 100;">COMMING SOON</div> 
                </div>
            </div> -->

        <div class="box-container">
            <div class="box">
                <img src="../icons/two-way.png" alt="logo">
                <h3>FLIGHTS</h3>
                <!-- <div class="price"> RS3000--RS10000 </div> -->
                <a href="redirect_flight.php" class="btn">BOOK NOW</a>
            </div>
            <div class="box">
                <img src="../icons/bus.jpg" alt="logo">
                <h3>BUS</h3>
                <!-- <div class="price"> RS3000--RS10000 </div> -->
                <a href="redirect_bus.php" class="btn">BOOK NOW</a>
            </div>
            <div class="box">
                <img src="../icons/movie.jpg" alt="logo">
                <h3>MOVIE</h3>
                <!-- <div class="price"> RS3000--RS10000 </div> -->
                <a href="../movie/main.php" class="btn">BOOK NOW</a>
            </div>
            <div class="box">
                <img src="../icons/ropeway.jpg" alt="logo">
                <h3>CABLE CAR</h3>
                <!-- <div class="price"> RS3000--RS10000 </div> -->
                <a href="redirect_cablecar.php" class="btn">BOOK NOW</a>
            </div>
        </div>
    </section>
        <script src="../js/loginscript.js"></script>
        <!-- home section ends  -->

        <!-- payment partner details section begins  -->
        <section class="review" id="PAYMENT" style="margin-bottom:100px;">

            <h1 class="heading"> PAYMENT <span>PARTNERS</span> </h1>

            <div class="review-slider">
                <div class="box">
                    <div><img src="../logos/esewa.png" alt=""></div>
                    <h3>ESEWA</h3>
                    <p>TicketKinee uses a widely use digital...</p>
                    <a href="esewa.php" class="btn">read more</a>
                </div>
            </div>
        </section>
        <!-- payment partner details section ends  -->
        <?php
            include_once 'flash_message.php';
        ?>

        <footer class="footer">
            <div class="content">
                <div class="row">
                    <div class="footer-col">
                        <h4>TicketKinee</h4>
                        <ul>
                            <li><a href="about_us.php">about us</a></li>
                            <li><a href="main_page.php#TICKETS">our services</a></li>
                            <li><a href="main_page.php#HOME">Home</a></li>
                            <li><a href="main_page.php#TICKETS">Book Tickets</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Get Help</h4>
                        <ul>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="esewa.php">payment options</a></li>
                        </ul>
                    </div>
                    <div class="footer-col">
                        <h4>Follow Us</h4>
                        <div class="social-links">
                            <a href="https://facebook.com/TicketKinee"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="footer-col">
                        <h4>Developers</h4>
                        <div class="social-links">
                            <a href="https://instagram.com/__ekinnnn__" target="_blank"><i class="fa-solid fab fa-laptop-code"></i></a>
                            <a href="https://instagram.com/s1_1mit" target="_blank"><i class="fa-solid fa-database"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer section ends  -->
    </body>
</html>
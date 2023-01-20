<?php

    include 'database_configure.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
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
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/home.css">
    <!-- custom css file link ends  -->

    <!-- internal css begins  -->
    <style>
        h1{
            text-align: center;
             margin: 5%;
        }
        p{
            margin: 3%;
            padding: 3%;
            font-size: large;
            text-align: justify;
        }
        .css{
            border: 10px;
            border-radius: 10px black
            ;
        }
  
        body{
            font-family: sans-serif;
        }
        .main{
        margin: auto;
        width: 50%;
        padding: 3%;
        }
        .main input,button{
        width:75%;
        border:2px solid white;
        border-right:0px;
        font-size: 18px;
        padding:12px;
        background-color: transparent;
        color:black;
        }
        .main input:hover{
        opacity: .8;
        }
        .main button{
        width:25%;
        background-color: #eee;
        color:black;
        transition: all 0.3s;
        float: right;
        border-left:0px;
        }
        .main button:hover{
        opacity: .8;
        }
    </style>
    <!-- internal css ends  -->

</head>
<body>
    <header class="header">

        <a href="main_page.php" class="logo"><img src="../logos/TicketKinee_LogoHorizontal.png" alt="Logo" class="logo"></a>

        <nav class="navbar">
            
            <!-- <a href="#HOME">HOME</a>
            <a href="#TICKETS">TICKETS</a>
            <a href="#PAYMENT">REVIEWS</a> -->

        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <!-- <div class="fas fa-search" id="search-btn"></div> -->
            <a href="logout.php">
                <div class="fa-solid fa-arrow-right-from-bracket" id="login-btn">
                </div>
            </a>
        </div>

        <!-- <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form> -->
    </header>
    <script src="../js/loginscript.js"></script>
    <!-- <div class="main">
        <input type="text" name="Search" placeholder="Search...">
        <button>SEARCH</button>
    </div> -->
   
    <h1 class="heading"  style="margin-top:100px;"> About <span>Us</span> </h1>
    <div class="css">
       <p>TicketKinee is a web-based flight ticket booking system where clients are provided with the facility of booking and reserving tickets for flights. TicketKinee provides a easy way of booking tickets from anywhere without the need to wait in ticket counters.
TicketKinee helps people with busy schedule to save time and buy tickets for flights. TicketKinee also provides information, reviews, comments, experiences of facilities and services of movies, travelling experience as well as the services providers from customers who have already visited or used thoses facilities.
TicketKinee provides platform where all services are under one place. TicketKinee also used digital payment system for booking where the amount is determined and can be paid at the time of booking itself.
TicketKinee also comes with TicketKinee points which after collection of certain points, these points can be used to get discounts on booking a number of tickets from TicketKinee. TicketKinee also comes with timely coupons on different occasions such as New Year, Christmas and many other international festivals. Those coupons can be used to get various cashbacks and offers where the customers can enjoy the use of TicketKinee in economical way.
TicketKinee mainly focuses on saving time, being economically benefit as well as to provide services for people to get rid of the long queues of ticket counters.</p>
    </div>

    <!-- footer section begins  -->

    <footer class="footer">
            <div class="content">
                <div class="row">
                    <div class="footer-col">
                        <h4>TicketKinee</h4>
                        <ul>
                            <li><a href="#">about us</a></li>
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

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
   
    <h1 class="heading"  style="margin-top:100px;"> About <span>Esewa</span> </h1>
    <div class="css">
       <p>Just imagine: In this digital era, you making all your payments and transactions standing in a queue outside the office. It’s Nerve-wracking, right? To get you out of this situation, when the Internet was one of the luxurious things we Nepalese enjoyed, eSewa came into existence. With over a decade of operation, eSewa has been able to simplify the lives of various Nepalese assisting the simple payments to payments to the large corporate houses.
        Established in 2009, eSewa is a household name today. South Asia’s first digital wallet, licensed Payment Service Provider from Nepal Rastra Bank (Central Bank of Nepal), and an ISO 27001:2013 certified, eSewa is a subsidiary company of F1Soft International, a leading FinTech company of Nepal. Team eSewa has been working tirelessly to achieve its vision to create a cashless economy. For this, the company has onboarded more than 150k merchants, 50+ Banks and Financial Institutions (BFIs) and established a wider network of agents nationwide.        Customers of eSewa can make various bill payments easily from eSewa’s mobile app or website login. Now, recharging mobile, paying utility bills (NEA, Khanepani, Landline, etc.), internet bills, TV bills, school fees, and many more are all on your fingertip. Being able to make the payment to government offices as Inland Revenue Department, Traffic Fine Payment, payment to Department of Foreign Employment, and more act as a cherry on top for our customers.
        <br>
        <br>
        <br>
        <b>Mission</b><br><br>
        As a pioneer in the digital payment industry and as a pacesetter in Nepal, eSewa is driven by a mission to provide a secured, integrated and most comprehensive payment process for businesses, associations, etc. by going above and beyond to help customers, banks, merchants, and maintaining high-quality customer service and risk management.
        <br>
        <br>
        <br>
        <b>Vision</b><br><br>
        eSewa envisions to create a cashless economy by covering every part of the payment sector (Big/Small, Retail/Wholesale, Public/Private), provide quality financial service, and become the most preferred service provider in the country.
        <br>
        <br>
        <br>
        <b>Values</b><br><br>
        With a group of dynamic individuals that make up the team of eSewa, the company values trust, innovation, and works to achieve growth with whatever it takes.</p>
    </div>

    <!-- footer section begins  -->

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
                            <li><a href="#">payment options</a></li>
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

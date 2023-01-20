<?php

    include 'database_configure.php';
    session_start();

    $user_id = $_SESSION['user_id'];
    

    $data = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
    $user_first_name = $data->fetch_assoc();
    $first_name=$user_first_name['user_first_name'];
    $last_name=$user_first_name['user_last_name'];
    $user_email=$user_first_name['user_email'];
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

    date_default_timezone_set('Asia/Kathmandu');
    $current_date = date('Y-m-d');

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
    <link rel="stylesheet" href="../css/booked_details.css">
    <link rel="stylesheet" href="../css/account_dropdown.css">
    <link rel="stylesheet" href="../css/flash_message.css">
    <link rel="stylesheet" href="../movie/css/home_page_middle.css">
    <!-- custom css file link ends  -->

</head>

<body>
    <!-- header/navbar section starts  -->

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

    <?php
        include "flash_message.php";
    ?>

    <div></div>
        <!-- payment partner details section begins  -->
        <section class="review" id="selet_way" style="height:auto;">

            <h1 class="heading"> My <span>flight</span> Tickets </h1>
                <div class="review-slider">
                    <?php
                    $booked_flight_data = $conn->query("SELECT * FROM `booked_flight` AS `b_flight`
                    INNER JOIN `flight_lists` AS `flight_ticket` ON b_flight.flight_id = flight_ticket.flight_no
                    INNER JOIN `airlines` AS `airline` ON flight_ticket.airlines_id = airline.id
                    WHERE user_email = '$user_email'") ;

                    while($rows_flight_data = $booked_flight_data->fetch_assoc()){
                        $flight_booked_id = $rows_flight_data['bf_id'];
                        $flight_logo = $rows_flight_data['airlines_logo_path'];
                        $flight_ticket_no = $rows_flight_data['flight_id'];
                        $flight_departure_datetime = $rows_flight_data['departure_datetime'];
                        $flight_arrival_datetime = $rows_flight_data['arrival_datetime'];
                        $flight_departure_place = $rows_flight_data['location_from'];
                        $flight_destination = $rows_flight_data['destination'];
                        $flight_price = $rows_flight_data['price'];
                        ?>
                    <div class="box">
                        <img src="<?php echo $flight_logo?>" alt="">
                        <h3>Flight: <?php echo $flight_ticket_no;?></h3>
                        <h1>Departure Date: <?php echo $flight_departure_datetime?></h1>
                        <?php
                        if($flight_arrival_datetime!=''){
                            ?>
                            <h1>Arrival Date: <?php echo $flight_arrival_datetime?></h1>
                        <?php
                        }
                        ?>
                        <h1>From: <?php echo $flight_departure_place?></h1>
                        <h1>To: <?php echo $flight_destination?></h1>
                        <h1>Price: <?php echo $flight_price?></h1>
                        <?php if($current_date > $flight_departure_datetime){?>
                        <button class="blocked-btn" name="na-cancel">Cancel</button>
                        <?php }else{
                        ?>
                        <a href="cancel_flight_ticket.php?bookingId=<?php echo $flight_booked_id?>" class="btn">Cancel</a>
                        <?php } ?>
                    </div>
                    <?php
                    }
                    if(mysqli_num_rows($booked_flight_data)<1){
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

            <h1 class="heading"> My <span>bus</span> Tickets </h1>
            <div class="review-slider">
                <?php
                    $booked_bus_data = $conn->query("SELECT * FROM `booked_bus` AS `b_bus`
                    INNER JOIN bus_tickets_list AS `bus_ticket` ON b_bus.bus_ticket_list_id = bus_ticket.bus_ticket_no
                    INNER JOIN bus_travel_company AS `bus_travel` ON bus_ticket.bus_travel_company_id = bus_travel.id
                    WHERE user_email = '$user_email'") ;

                    while($rows_data = $booked_bus_data->fetch_assoc()){
                        $bus_booked_id = $rows_data['bb_id'];
                        $bus_logo = $rows_data['company_logo'];
                        $bus_ticket_no = $rows_data['bus_ticket_list_id'];
                        $bus_departure_datetime = $rows_data['departure_datetime'];
                        $bus_departure_place = $rows_data['location'];
                        $bus_destination = $rows_data['destination'];
                        $bus_price = $rows_data['price'];
                        ?>
                <div class="box">
                    <img src="<?php echo $bus_logo?>" alt="">
                    <h3><?php echo $bus_ticket_no;?></h3>
                    <h1>Departure Date: <?php echo $bus_departure_datetime?></h1>
                    <h1>From: <?php echo $bus_departure_place?></h1>
                    <h1>To: <?php echo $bus_destination?></h1>
                    <h1>Price: <?php echo $bus_price?></h1>
                    <?$_SESSION['bus_booking_id'] = $bus_booked_id;?>
                    <a href="cancel_bus_ticket.php?bookingId=<?php echo $bus_booked_id?>" class="btn">Cancel</a>
                </div>
                <?php
                }
                if(mysqli_num_rows($booked_bus_data)<1){
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

            <h1 class="heading"> My <span>Movie</span> Tickets </h1>
            <div class="review-slider">
            <?php
                $booked_movie_data = $conn->query("SELECT * FROM `bookings` AS `book`
                INNER JOIN `movie` AS `movie` ON book.movie = movie.id
                INNER JOIN `hall` AS `hall` ON book.hall = hall.id
                WHERE user = '$user_id'") ;

                while($rows_movie_data = $booked_movie_data->fetch_assoc()){
                    $idd = $rows_movie_data['movie'];
            ?>
                <div class="box">
                    
                    <?php
                    $desc = $rows_movie_data['sub_description'];
                    $booked_movie_name = $conn->query("SELECT * FROM `movie` WHERE sub_description = '$desc'") ;
                    $rows_movie_name_data = $booked_movie_name->fetch_assoc();
                    ?>

                    <img src="../movie/images/uploads/<?php echo $rows_movie_data['image'] ?>" alt="">
                    <h3><?php echo $rows_movie_name_data['name'] ?></h3>
                    <h1>Hall No.: <?php echo $rows_movie_data['name'] ?></h1>
                    <h1>Date: <?php echo $rows_movie_data['release_date'] ?></h1>
                    <h1>Duration: <?php echo $rows_movie_data['duration'] ?></h1>
                    <h1>Seats: <?php echo $rows_movie_data['seat'] ?></h1>
                    <h1>Price: <?php echo $rows_movie_data['price'] ?></h1>
                    <a href="oneway_form.php" class="btn">Cancel</a>
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

            <h1 class="heading"> My <span>cable car</span> Tickets </h1>
            <div class="review-slider">
                <?php
                    $booked_cable_data = $conn->query("SELECT * FROM `booked_bus` AS `b_bus`
                    INNER JOIN cable_tickets AS `cable_ticket` ON b_bus.bus_ticket_list_id = cable_ticket.cable_car_no
                    INNER JOIN cable_company AS `cable_travel` ON cable_ticket.cable_company_id = cable_travel.id
                    WHERE user_email = '$user_email'") ;

                    while($rows_cable_data = $booked_cable_data->fetch_assoc()){
                        $cable_booked_id = $rows_cable_data['bb_id'];
                        $cable_logo = $rows_cable_data['company_logo'];
                        $cable_ticket_no = $rows_cable_data['bus_ticket_list_id'];
                        $cable_departure_datetime = $rows_cable_data['departure_datetime'];
                        $cable_departure_place = $rows_cable_data['location'];
                        $cable_price = $rows_cable_data['price'];
                        ?>
                <div class="box">
                    <img src="<?php echo $cable_logo?>" alt="">
                    <h3><?php echo $cable_ticket_no;?></h3>
                    <h1>Date: <?php echo $cable_departure_datetime?></h1>
                    <h1>From: <?php echo $cable_departure_place?></h1>
                    <h1>Price: <?php echo $cable_price?></h1>
                    <a href="cancel_cable_ticket.php?bookingId=<?php echo $cable_booked_id?>" class="btn">Cancel</a>
                </div>
                <?php
                }
                if(mysqli_num_rows($booked_cable_data)<1){
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
        <!-- payment partner details section ends  -->

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
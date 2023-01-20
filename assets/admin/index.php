<?php

    include '../php/database_configure.php';
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
        header('location: ../php/main_page.php');
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
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/account_dropdown.css">
    <link rel="stylesheet" href="assets/css/flash_message.css">
    <!-- ===== custom css file link ends =====  -->

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- ===== favicon code =====  -->
    <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
    <!-- ===== favicon code ends =====  -->

</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>

        <div class="header__greetings">
            <p>Hey, <b><?php echo $first_name;?></b></p>
        </div>
        

        <!-- Dropdown Menu -->
        <div class="action">
            <div class="profile" onclick="menuToggle();">
                <!-- <img src="../images/img1.jpg" alt=""> -->
                <div class="header__img">
                    <img src="../images/img1.jpg" alt="">
                </div>
            </div>
            <div class="menu">
                <h3><?php echo $first_name." ".$last_name?><br><span style="text-transform: capitalize;"><?php echo $user_type;?></span></h3>
                    <ul>
                        <!-- <li><img src="../icons/profile.png"><a href="#">My Profile</a></li>
                        <li><img src="../icons/edit.png"><a href="#">Edit Profile</a></li>
                        <li><img src="../icons/inbox.png"><a href="#">Inbox</a></li>
                        <li><img src="../icons/setting.png"><a href="#">Settings</a></li>
                        <li><img src="../icons/help.png"><a href="#">Help</a></li> -->
                        <li><img src="../icons/logout.png"><a href="../php/logout.php">Logout</a></li>
                    </ul>
            </div>
        </div>
        <script>
            function menuToggle(){
                const toggleMenu = document.querySelector('.menu');
                toggleMenu.classList.toggle('active');
            }
        </script>

        <!-- End of Dropdown menu -->
        
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="#" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">TicketKinee</span>
                </a>

                <div class="nav__list">
                    <a href="#dashboard" class="nav__link active">
                        <i class='bx bx-grid-alt nav__icon'></i>
                        <span class="nav__name">Dashboard</span>
                    </a>

                    <a href="#users" class="nav__link">
                        <i class='bx bx-user nav__icon'></i>
                        <span class="nav__name">Users</span>
                    </a>

                    <a href="#manage" class="nav__link">
                        <i class='bx bx-edit nav__icon'></i>
                        <span class="nav__name">Info</span>
                    </a>

                    <a href="#data" class="nav__link">
                        <i class='bx bx-folder nav__icon'></i>
                        <span class="nav__name">Data</span>
                    </a>

                    <a href="#finance" class="nav__link">
                        <i class='bx bx-receipt nav__icon'></i>
                        <span class="nav__name">Finance</span>
                    </a>
                </div>
            </div>

            <a href="../php/logout.php" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>
    <section id="dashboard">
        <div class="section-container">
            <h1 class="heading"> Welcome to <span>Admin Panel</span> </h1>

            <div class="review-slider">
                <div class="box">
                    <div><i class="fa-solid fa-user box-icon" style="font-size: 50px;"></i></div>
                    <h3>Total Users</h3>
                    <!-- p ko satta h1 banako -->
                    <h1><?php
                    $data1 = mysqli_query($conn, "SELECT * FROM users");
                    $user_counter = mysqli_num_rows($data1);
                    echo $user_counter; ?></h1>
                </div>
                <!-- </div> -->

                <!-- <div class="review-slider "> -->
                <div class="box ">
                    <div><i class="fa-solid fa-money-bill-transfer box-icon" style="font-size: 50px; "></i></div>
                    <h3>Total Transaction Amount</h3>
                    <!-- p ko satta h1 banako -->
                    <h1>Rs. <?php
                    $tran_data = $conn->query("SELECT SUM(amount) AS amount FROM `transaction`");
                    $tran = $tran_data->fetch_assoc();
                    $transaction_data=$tran['amount'];
                    echo $transaction_data; ?></h1>
                </div>
                <!-- </div> -->
            </div>

    </section>

    <?php
        include_once 'assets/php/flash_message.php';
    ?>

    <section id="users">
        <div class="section-container">
            <h1 class="heading"><span>Users</span></h1>

            <div class="review-slider ">
                <div class="box ">
                    <a href="assets/php/view_Users.php">
                        <div><i class="fa-solid fa-users box-icon" style="font-size: 50px; "></i></div>
                        <h3>View Users</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Total Users : <?php
                            echo $user_counter; ?></h1>
                    </a>
                </div>
                <div class="box">
                    <a href="assets/php/delete_user.php">
                        <div><i class="fa-solid fa-user-check box-icon" style="font-size: 50px; "></i></div>
                        <h3>Manage Users</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Total Users : <?php
                            echo $user_counter; ?></h1>
                    </a>
                </div>
            </div>
    </section>

    <section id="manage">
        <div class="section-container">
            <h1 class="heading "> System <span>Information</span> </h1>

            <div class="review-slider ">
                <div class="box">
                    <a href="assets/php/info_flights.php">
                        <div><i class="fa-solid fa-plane-departure box-icon" style="font-size: 50px; "></i></div>
                        <h3>Flights</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Total Flight Tickets : <?php 
                            $manage_flights = mysqli_query($conn, "SELECT * FROM `flight_lists`");
                            $manage_flights_counter = mysqli_num_rows($manage_flights);
                            echo $manage_flights_counter; ?></h1>
                    </a>
                </div>
                <div class="box">
                    <a href="assets/php/info_bus.php">
                        <div><i class="fa-solid fa-bus-simple box-icon" style="font-size: 50px; "></i></div>
                        <h3>Bus Tickets</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Total Bus Tickets : <?php 
                            $manage_bus_tickets = mysqli_query($conn, "SELECT * FROM `bus_tickets_list`");
                            $manage_bus_tickets_counter = mysqli_num_rows($manage_bus_tickets);
                            echo $manage_bus_tickets_counter; ?></h1>
                    </a>
                </div>

                <div class="box">
                    <a href="../movie/admin/home.php">
                        <div><i class="fa-solid fa-ticket box-icon" style="font-size: 50px; "></i></div>
                        <h3>Movie Tickets</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Movies : <?php 
                        $movie_bookings = mysqli_query($conn, "SELECT * FROM `movie`");
                        $movie_bookings_counter = mysqli_num_rows($movie_bookings);
                        echo $movie_bookings_counter; ?></h1>
                    </a>
                </div>

                <div class="box">
                    <a href="assets/php/info_cable.php">
                        <div><i class="fa-solid fa-warehouse box-icon" style="font-size: 50px; "></i></div>
                        <h3>Cable Car Tickets</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Total Bus Tickets : <?php 
                            $manage_cable_tickets = mysqli_query($conn, "SELECT * FROM `cable_tickets`");
                            $manage_cable_tickets_counter = mysqli_num_rows($manage_cable_tickets);
                            echo $manage_cable_tickets_counter; ?></h1>
                    </a>
                </div>
            </div>
    </section>

    <section id="data">
        <div class="section-container">
            <h1 class="heading "> Data <span>Addition</span> </h1>

            <div class="review-slider ">
                <div class="box">
                    <a href="assets/php/addFlights.php">
                        <div><i class="fa-solid fa-plane-departure box-icon" style="font-size: 50px; "></i></div>
                        <h3>Add Flights</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Total Airports : <?php 
                            $total_airport = mysqli_query($conn, "SELECT * FROM `airport_list`");
                            $total_airport_counter = mysqli_num_rows($total_airport);
                            echo $total_airport_counter; ?></h1>
                    </a>
                </div>

                <div class="box">
                    <a href="assets/php/addBusTicket.php">
                        <div><i class="fa-solid fa-road box-icon" style="font-size: 50px; "></i></div>
                        <h3>Add Bus Tickets</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Total Bus Tickets : <?php 
                            $total_tickets_list = mysqli_query($conn, "SELECT * FROM `bus_tickets_list`");
                            $total_tickets_list_counter = mysqli_num_rows($total_tickets_list);
                            echo $total_tickets_list_counter; ?></h1>
                    </a>
                </div>

                <div class="box">
                    <a href="assets/php/addCableCarTicket.php">
                        <div><i class="fa-solid fa-warehouse box-icon" style="font-size: 50px; "></i></div>
                        <h3>Add Cable Car Tickets</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Total Cable Car Company : 10</h1>
                    </a>
                </div>

                <div class="box">
                    <a href="../movie/admin/home.php">
                        <div><i class="fa-solid fa-warehouse box-icon" style="font-size: 50px; "></i></div>
                        <h3>Manage Movie Tickets</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Total Movie Tickets : <?php 
                        echo $movie_bookings_counter; ?></h1>
                    </a>
                </div>

            </div>
    </section>

    <section id="finance">
        <div class="section-container">
            <h1 class="heading">Financial <span>Statements</span></h1>

            <div class="review-slider ">
                <div class="box ">
                    <a href="assets/php/financial_transaction.php">
                        <div><i class="fa-solid fa-money-bill-transfer box-icon" style="font-size: 50px; "></i></div>
                        <h3>Financial Report</h3>
                        <!-- p ko satta h1 banako -->
                        <h1>Total Turnover : Rs. <?php
                        $tran_data = $conn->query("SELECT SUM(amount) AS amount FROM `transaction`");
                        $tran = $tran_data->fetch_assoc();
                        $transaction_data=$tran['amount'];
                        echo $transaction_data; ?></h1>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!--===== MAIN JS =====-->
    <script src="assets/js/main.js "></script>
</body>

</html>
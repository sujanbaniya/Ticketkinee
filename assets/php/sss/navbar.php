<?php
    require_once 'connect.php';
    if (isset($_SESSION['id']) ){
        $sql = "SELECT * FROM users WHERE id = ".$_SESSION['id'].";";
        $result = mysqli_query($conn ,$sql) ;
        $uid = mysqli_fetch_assoc($result)["admin"];
    }
?>

<?php

    include '../php/database_configure.php';
    $user_id = $_SESSION['user_id'];

    $data = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
    $user_first_name = $data->fetch_assoc();
    $first_name=$user_first_name['user_first_name'];
    $last_name=$user_first_name['user_last_name'];
    $user_type = $user_first_name['user_type'];

    if(!isset($user_id)){
        header('location:login.php');
    }else if(isset($user_id) && $user_type === 'admin'){
        header('location: ../admin/index.php');
    }

    if($user_type === "normal"){
        $user_description = "TicketKinee User";
    }

?>

<head>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- font awesome cdn link ends  -->

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/account_dropdown.css">
    <!-- custom css file link ends  -->
</head>

<!-- TicketKinee NavBar -->

<header class="header">
    
        <a href="main_page.php" class="logo"><img src="../logos/TicketKinee_LogoHorizontal.png" alt="Logo" class="logo"></a>

        <nav class="navbar">
            <a href=""><?php echo"Hello, ".$first_name.""?><a>
            <a href="main.php">Movies</a>
            <a href="bookedSeats.php">Booked Seats</a>
        </nav>

        <div class="icons">
            <div class="fas fa-bars" id="menu-btn"></div>
            <!-- <div class="fas fa-search" id="search-btn"></div> -->
            <div class="fa-solid fa-user" id="user-btn" onclick="menuToggle();"></div>
        </div>
        <div class="action">
            <div class="menu">
                <div class="photo">
                    <div class="profile" onclick="menuToggle();">
                        <img src="../images/img1.jpg" alt="">
                    </div>
                </div>
                <h3><?php echo $first_name." ".$last_name?><br><span><?php echo $user_description?></span></h3>
                    <ul>
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

        </div>
        
        <!-- <form action="" class="search-form">
            <input type="search" id="search-box" placeholder="search here...">
            <label for="search-box" class="fas fa-search"></label>
        </form> -->
    </header>

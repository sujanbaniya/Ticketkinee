<?php
    session_start();
?>
<?php
    require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- <link rel="stylesheet" href="css/navbar.css"> -->
    <link rel="stylesheet" href="css/bookedSeats.css">
    <link rel="stylesheet" href="css/flash_message.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <title>My Tickets</title>
    <link rel="icon" href="assets/logos/TicketKinee_favicon.png" type="image/ico">
</head>
<body>

    <!-- NAVBAR -->

    <?php
        include_once 'navbar.php';
    ?>


<!-- ---------------------------------------------------------------------------------------------------------- -->

<!-- MIDDLE -->

<?php

    $sql = "SELECT * FROM bookings ;";
    $result = mysqli_query($conn , $sql) ;
    $num = mysqli_num_rows($result);

    if ($num > 0 ){
?>  
    <div class="bookedContainer">
        <span>My Booked Seats</span>

        <?php
            while($rows = mysqli_fetch_assoc($result)){

        ?>
        
        <div class="seatsBookedContainer">
            <div class="bookingId">Booking Id : <?php echo $rows['id'] ?></div>

            <?php
                $hallId = $rows['hall'];
                $sql_1 = "SELECT * FROM hall where id = $hallId ;";
                $result_1 = mysqli_query($conn ,$sql_1) ;
                $forHall = mysqli_fetch_assoc($result_1);

                $movieId = $rows['movie'];
                $sql_2 = "SELECT * FROM movie where id = $movieId ;";
                $result_2 = mysqli_query($conn ,$sql_2) ;
                $forMovie = mysqli_fetch_assoc($result_2);
            ?>
            <div class="movieName">Movie : <a href="movie_page.php?id=<?php echo $rows['movie'] ?>"><?php echo $forMovie['name'] ?> </a> </div>
            <div>Hall : <?php echo $forHall['name'] ?></div>
            <div>Seats Booked : <?php echo $rows['seat'] ?></div>
        </div>

        <?php
            }
        ?>
    </div>

<?php
    }
    else{

?>
    <div class="noOrderContainer">
        <span class="nospan">No Booked Tickets</span>
        <img src="images/noOrders.svg" alt="No Booked Seats">
        <div>Please book your seats ! <a href="main.php"><button>Go To Movies</button></a></div>
    </div>
<?php
    }
?>


<!-- ---------------------------------------------------------------------------------------------------------- -->

<!-- FOOTER -->

<?php
    include_once 'footer.php';
?>

</body>
</html>
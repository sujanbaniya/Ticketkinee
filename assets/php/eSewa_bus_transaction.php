<?php

    include 'database_configure.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    }

    $result = $conn->query("SELECT * FROM users WHERE user_id='$user_id'");
    $data=$result->fetch_assoc();
    $first_name=$data['user_first_name'];
    $email=$data['user_email'];

    $location_from = $_POST['location'];
    $destination = $_POST['destination'];            
    $departure_datetime = $_POST['departure_date'];
    $arrival_datetime = $_POST['arrival_date'];
    $bus_ticket_no = $_POST['bus_ticket_no'];
    $price = $_POST['price'];
    $no_of_travellers = $_POST['no_of_travellers'];
    $total_price = $price * $no_of_travellers;

    $epay_url ="https://uat.esewa.com.np/epay/main";

    $pid= $first_name.$bus_ticket_no.rand(100, 999);   

?>

<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>TicketKinee | Book One Way Tickets</title>

            <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

            <!-- favicon code  -->
            <link rel="icon" href="../logos/TicketKinee_favicon.png" type="image/ico">
            <!-- favicon code ends  -->

            <!-- font awesome cdn link  -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
            <!-- font awesome cdn link ends  -->

            <!-- custom css file link  -->
            <link rel="stylesheet" href="../css/find_flights_style.css">
            <!-- custom css file link ends  -->
        </head>
    <body>
            <div class="project">
                <a href="main_page.php"><img src="../logos/TicketKinee_Logo.png" alt="Logo" class="logo"></a>
                <div class="edit">
                    <label style="font-size:20px;">From: <?php echo "<b>".$location_from."</b>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">To: <?php echo "<b>".$destination."</b>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">Departure Date: <?php echo "<b>".$departure_datetime."</b>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">Bus No: <?php echo "<b>".$bus_ticket_no."</b>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">Number of travellers: <?php echo "<b>".$no_of_travellers."</b>";?></label>
                </div>
                <div class="edit">
                    <label style="font-size:20px;">Price: <?php echo "<b>".$total_price."</b>";?></label>
                </div>

                <form action=<?php echo $epay_url?> method="POST">
                    <input value= "<?php echo $total_price?>" name="tAmt" type="hidden">
                    <input value= "<?php echo $total_price?>" name="amt" type="hidden">
                    <input value= "0" name="txAmt" type="hidden">
                    <input value= "0" name="psc" type="hidden">
                    <input value= "0" name="pdc" type="hidden">
                    <input value="EPAYTEST" name="scd" type="hidden">
                    <input value= "<?php echo $pid?>" name="pid" type="hidden">
                    <input value="http://localhost/mainProject_TicketKinee/assets/php/esewa_bus_success_QR.php?q=su" type="hidden" name="su">
                    <input value="http://localhost/mainProject_TicketKinee/assets/php/eSewa_failure_redirect.php?q=fu" type="hidden" name="fu">

                    <input value="Pay With eSewa" type="submit" class="btn">
                </form>
            </div>        
</body>
</html>
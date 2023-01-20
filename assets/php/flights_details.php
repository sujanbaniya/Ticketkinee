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
            <title>TicketKinee | Book Two Way Tickets</title>

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
        <div class="project" style="width:900px;">
            <a href="main_page.php"><img src="../logos/TicketKinee_Logo.png" alt="Logo" class="logo"></a>
        
        <!-- list of flights is shown from here -->
        <div class="header_fixed">
        
        <table>
                <th>Company</th>
                <th>Location_from</th>
                <th>Destination</th>
                <th>Flight_no</th>
                <th>Price</th>
                <th>Book</th>
                  
            <tbody>
            
            <?php
            $location_from = $_POST['from_place'];
            $destination = $_POST['to_place'];            
            $departure_datetime = $_POST['date'];
            $arrival_datetime = $_POST['rdate'];
            $no_of_travellers = $_POST['no_of_travellers'];
            echo " From:".$location_from."<br><br>"; 
            echo " To:".$destination."<br><br>";
            echo " Departure Date:".$departure_datetime."<br><br>";
            echo " Return Date:".$arrival_datetime."<br><br>";
            echo " Number of Travellers:".$no_of_travellers."<br><br>";

                $result = $conn->query("SELECT * FROM flight_lists WHERE location_from='$location_from' AND destination='$destination' AND departure_datetime='$departure_datetime' AND arrival_datetime='$arrival_datetime'");
                        while($row=$result->fetch_assoc()):
                            $airlines_id=$row['airlines_id'];
                            $airlines_details = $conn->query("SELECT airlines_logo_path FROM airlines WHERE id='$airlines_id'");
                            $airlines_data = $airlines_details->fetch_assoc();
                    ?>
                <tr>    
                <td><img src="<?php echo $airlines_data['airlines_logo_path']?>"></td>
                    <td><?php echo $row['location_from']?></td>
                    <td><?php echo $row['destination']?></td>
                    <td><?php echo $row['flight_no']?></td>
                    <td><?php echo $row['price']?></td>
                    <form method="post" action="eSewa_trasaction.php">
                    <input text="text" name="location" hidden value="<?php echo $row['location_from']?>">
                    <input text="text" name="destination" hidden value="<?php echo $row['destination']?>">
                    <input text="text" name="departure_date" hidden value="<?php echo $departure_datetime?>">
                    <input text="text" name="arrival_date" hidden value="<?php echo $arrival_datetime?>">
                    <input text="text" name="flight_no" hidden value="<?php echo $row['flight_no']?>">
                    <input text="text" name="price" hidden value="<?php echo $row['price']?>">
                    <input text="text" name="no_of_travellers" hidden value="<?php echo $no_of_travellers?>">

                    <?php
                    $_SESSION['location'] = $row['location_from'];
                    $_SESSION['destination'] = $row['destination'];
                    $_SESSION['departure_date'] = $departure_datetime;
                    $_SESSION['arrival_date'] = $arrival_datetime;
                    $_SESSION['flight_no'] = $row['flight_no'];
                    $_SESSION['price'] = $row['price'];
                    $_SESSION['no_of_travellers'] = $no_of_travellers;
                    ?>
                    
                    <td><button type="submit" class="btn btn-form" style="background-color: #030f4c;">Book</button></td>
                    </form>
                </tr>
                <?php endwhile; ?>
                <?php if($row=$result->fetch_assoc()<1)
                    echo '<tr style="width:100%;">
                    <td>No Other flights Available.</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    </tr>';
                ?>
        </table>
    </div>
    </div>  
       
</body>
</html>
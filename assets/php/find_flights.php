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


        <!-- Section one begins -->
        <div class="project">
            <a href="main_page.php"><img src="../logos/TicketKinee_Logo.png" alt="Logo" class="logo"></a>
            <h2>FIND FLIGHTS</h2>
            <hr>
                                
                <form id="manage" action="flights_details.php" method="post">
                    <div class="edit">
                        <label for="from_place">FROM</label>
                            <select name="from_place">
                                <option value></option>
                                    <?php
                                    $location = $conn->query("SELECT * FROM airport_list");
                                    while($row = $location->fetch_assoc()):
                                    ?>
                                <option value="<?php echo $row['location'] ?>" <?php echo isset($from_place) && $from_place == $row['id'] ? "selected" : '' ?>><?php echo $row['location']?></option>
                                    <?php endwhile; ?>
                            </select>
                    </div>
                    <div class="edit">
                        <label for="to_place">TO</label>
                            <select name="to_place">
                                <option value></option>
                                    <?php
                                    $location = $conn->query("SELECT * FROM airport_list");
                                    while($row = $location->fetch_assoc()):
                                    ?>
                                <option value="<?php echo $row['location'] ?>" <?php echo isset($from_place) && $from_place == $row['id'] ? "selected" : '' ?>><?php echo $row['location']?></option>
                                    <?php endwhile; ?>
                            </select>
                    </div>
                <div class="edit">
                    <label for="date">DEPARTURE DATE</label>
                    <input type="date" class="form-input" name="date" autocomplete="off" required min="2022-04-03" max="2022-04-01">
                </div>    
                <div class="edit">        
                    <label for="rdate">RETURN DATE</label>
                    <input type="date" class="form-input" name="rdate" autocomplete="off"  required min="2022-04-03" max="2022-06-01">
                </div>
                    <button class="btn" name="submit" type="submit">Find Flights</button>
                </form>
        </div>
        <!-- Section one ends -->

        

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


        <!-- Section one begins -->
        <div class="project">
            <a href="main_page.php"><img src="../logos/TicketKinee_Logo.png" alt="Logo" class="logo"></a>
            <h2>FIND BUSES</h2>
            <hr>
                                
                <form id="manage" action="oneway_bus_details.php" method="post">
                    <div class="edit">
                        <label for="from_place">FROM</label>
                            <select name="from_place" required>
                                <option value></option>
                                    <?php
                                    $location = $conn->query("SELECT * FROM bus_routes");
                                    while($row = $location->fetch_assoc()):
                                    ?>
                                <option value="<?php echo $row['location'] ?>" <?php echo isset($from_place) && $from_place == $row['id'] ? "selected" : '' ?>><?php echo $row['location']?></option>
                                    <?php endwhile; ?>
                            </select>
                    </div>
                    <div class="edit">
                        <label for="to_place">TO</label>
                            <select name="to_place" required>
                                <option value></option>
                                    <?php
                                    $location = $conn->query("SELECT * FROM bus_routes");
                                    while($row = $location->fetch_assoc()):
                                    ?>
                                <option value="<?php echo $row['location'] ?>" <?php echo isset($from_place) && $from_place == $row['id'] ? "selected" : '' ?>><?php echo $row['location']?></option>
                                    <?php endwhile; ?>
                            </select>
                    </div>
                <div class="edit">
                    <label for="date">DEPARTURE DATE</label>
                    <input type="date" class="form-input" name="date" autocomplete="off" required min="2022-05-27" max="2022-06-15">
                </div>
                <div class="edit">
                    <label for="no_of_travellers">NUMBER OF TRAVELLERS</label>
                    <input type="number" class="form-input" name="no_of_travellers" autocomplete="off" required min=1 max=10>
                </div>
                <button class="btn" name="submit" type="submit">Find Buses</button>    
                </form>
        </div>
        <!-- Section one ends -->
    </body>
</html>

        

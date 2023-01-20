<?php

    include 'database_configure.php';
    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
        header('location:login.php');
    }

?>

?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>TicketKinee | Delete Users</title>

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
            <link rel="stylesheet" href="../css/admin/movie.css">
            <!-- custom css file link ends  -->
        </head>
    <body>
        <div class="project" style="width:80vw; margin:auto;">
            <a href="main_page.php"><img src="../logos/TicketKinee_Logo.png" alt="Logo" class="logo"></a>
        <h2 class="project">Users</h2>
        
        <!-- list of flights is shown from here -->
        <table style="width:auto">
            <th>user_id</th>
            <th>user_first_name</th>
            <th>user_last_name</th>
            <th>user_username</th>
            <th>user_email</th>
            <th>user_contact_no</th>
        <?php
            $result = $conn->query("SELECT * FROM users");
            while($row=$result->fetch_assoc()):
                // $user_details = $conn->query("SELECT airlines_logo_path FROM airlines WHERE id='$airlines_id'");
                // $user_data = $user_details->fetch_assoc();
                ?>
            <tr>    
                <td><?php echo $row['user_id']?></td>
                <td><?php echo $row['user_first_name']?></td>
                <td><?php echo $row['user_last_name']?></td>
                <td><?php echo $row['user_username']?></td>
                <td><?php echo $row['user_email']?></td>
                <td><?php echo $row['user_contact_no']?></td>
                <td><div class="delete"><a href="delete_user.php?delete=<?php echo $row['user_id'] ?>"><img src="../images/delete.svg" title="Delete"></a></div></td>
            </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html>
<?php
    session_start();
?>

<?php
    if (isset($_SESSION['user_id']) ){
        if (($_SESSION['admin'] != "0") ){
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/admin/home.css">
    <link rel="stylesheet" href="../css/flash_message.css">
    <link rel="icon" type="image/x-icon" href="../images/llgg.png">
</head>
<body>
    <?php
        include_once 'nav.php';
    ?>
    

    <div class="table">
        <h1>Table Names : </h1>
        <div class="names">
            <div><a href="user_table.php">Users</a></div>
            <div><a href="movie.php">Movie</a></div>
            <div><a href="now_playing.php">Now Playing</a></div>
            <div><a href="seats.php">Seats</a></div>
            <div><a href="hall.php">Halls</a></div>
            <div><a href="orders.php">Orders</a></div>
        </div>
    </div>  

<!-- ---------------------------------------------------------------------------------------------------------- -->

</body>
</html>

<?php
    }
    else {
        header("location: ../main.php");
        exit();
    }
}
else {
    header("location: ../main.php");
    exit();
}
?>


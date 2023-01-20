<?php
    session_start();

    include 'database_configure.php';

?>

<?php
    if (isset($_SESSION['user_id']) ){
        if (($_SESSION['admin'] != "0") ){
?>

<?php
    if(isset($_POST['submit'])){
        $airlines_id = $_POST["airlines_id"];
        $flight_no = $_POST["flight_no"];
        $departure_datetime = $_POST["departure_datetime"];
        $arrival_datetime = $_POST["arrival_datetime"];
        $location_from = $_POST["location_from"];
        $destination = $_POST["destination"];
        $seats = $_POST["seats"];
        $price = $_POST["price"];
        
        $sql = "INSERT INTO `flight_lists`(`id`, `airlines_id`, `flight_no`, `departure_datetime`, `arrival_datetime`, `location_from`, `destination`, `seats`, `price`) VALUES ('', '$airlines_id','$flight_no','$departure_datetime','$arrival_datetime','$location_from','$destination','$seats', '$price');";
        $result = mysqli_query($conn ,$sql) ;

        header("location: ../../index.php");
        exit();
    }
    else{   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    <link rel="stylesheet" href="../css/admin/home.css">
    <link rel="stylesheet" href="../css/admin/user_table.css">
    <link rel="stylesheet" href="../css/flash_message.css">
    <link rel="stylesheet" href="../css/admin/add_movie.css">
    <link rel="icon" type="image/x-icon" href="../images/llgg.png">
</head>
<body>
    <?php
        include_once 'nav.php';
    ?>
    <div class="topic">Add Flights :</div>
    <form action="addFlights.php" method="post" enctype="multipart/form-data">
        airlines_id : <input type="text" name="airlines_id"><br>
        flight_no : <input type="text" name="flight_no"><br>
        departure_datetime : <input type="date" name="departure_datetime"><br>
        arrival_datetime : <input type="date" name="arrival_datetime"><br>
        location_from : <input type="text" name="location_from"><br>
        destination : <input type="test" name="destination"><br>
        seats : <input type="text" name="seats"><br> 
        price : <input type="text" name="price"><br>
        <input type="submit" name="submit" class="submit-btn"> 
    </form>

<!-- ---------------------------------------------------------------------------------------------------------- -->


</body>
</html>

<?php
    }
?>

<?php
    }
    else {
        header("location: ../../../php/main_page.php");
        exit();
    }
}
else {
    header("location: ../../../php/main_page.php");
    exit();
}
?>